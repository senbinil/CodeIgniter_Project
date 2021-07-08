<?php namespace App\Controllers;

use App\Models\HomeModel;
use CodeIgniter\Controller;
use App\Models\Suggestion;
use App\Models\Enrollment;
use App\Models\Course;

class Pages extends Controller
{   
    
   
    

    public function view($page = 'home')
    { 
        
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

       if($page=='home'){
           $model=new HomeModel();
           $data['msg']=$model->select('msg')->orderby('msg_id','DESC')->findall(15);
        echo view('templates/header');
        echo view('resources/home-style');
        echo view('templates/body');
        echo view('pages/'.$page,$data);
        echo view('templates/particle');
        echo view('templates/footer');
       }
        else{

            switch($page)
            {
                case "about":   echo view('templates/header');
                                echo view('templates/body');
                                echo view('pages/'.$page);
                                echo view('templates/footer');
                                break;
                case "more":echo view('templates/header');
                            echo view('resources/more-style');
                            echo view('templates/body');
                            echo view('pages/more');
                            echo view('templates/footer');
                            break;
                case 'notification':$model=new HomeModel();
                                    $data['msg']=$model->select()->orderby('msg_id','DESC')->findall();
                                    echo view('templates/header');
                                    echo view('templates/body');
                                    echo view('pages/notification',$data);
                                    echo view('templates/footer');
                                    break; 
                case 'Gallery': echo view('templates/header');
                                echo view('templates/body');
                                echo view('pages/gallery');
                                echo view('templates/footer');
                                break;
                case 'blood': echo view('templates/header');
                                echo view('templates/body');
                                echo view('pages/blood');
                                echo view('templates/footer');
                                break;
                default:return redirect()->to('/home');
            }
     
        }
      
    }

    public  function logSuggest()
    {
        $suggest_box=new Suggestion();
        if($this->request->getMethod()=='post' && $this->request->getPost('type')==1)
        {
            $email=$this->request->getPost('id');
            if(filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $message=$this->request->getPost('message');
                $suggest_box->save([
                    'email_id'=>$email,
                    'content'=>$message
                ]);
                echo json_encode(array('stat'=>1));
            }
            else
            echo json_encode(array('stat'=>0));
        }
        elseif($this->request->getMethod()=='post' and $this->request->getPost('type')==2)
        {
            $id=$this->request->getPost('del_id');
            if(isset($id))
           {
                $suggest_box->where('sug_id',$id)->delete();
                echo json_encode(array('stat'=>1));
           }
            else
                echo json_encode(array('stat'=>0));
        }
        elseif ($this->request->getMethod()=='post' and $this->request->getPost('type')==3) {
            # code...
            $blod=$this->request->getVar('bgroup');
            $studDel=new Enrollment();
            $cs=new Course();
            try{
                $data['student']=$studDel->select(['fname','lname','ug_course','semester'])->where('blood_group',$blod)->findAll(10);
                if(\count($data['student'])==0)
                return json_encode(array('stat'=>0));
                for($i=0;$i<=count($data);$i++)
                $data['cs'][$i]=$cs->select('course_name')->where('course_id',$data['student'][$i]['ug_course'])->first();
                echo json_encode($data);
            }
            catch(Exception $e)
            {
                echo 0;
            }
        }
        else
         return redirect()->to('/home');

    }
}