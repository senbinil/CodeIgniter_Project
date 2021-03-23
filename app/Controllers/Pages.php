<?php namespace App\Controllers;

use App\Models\HomeModel;
use CodeIgniter\Controller;
use App\Models\Suggestion;
class Pages extends Controller
{   
    
   
    public function index()
    {
        return view('welcome_message');

    }

    public function view($page = 'home')
    { 
        
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

       if($page=='home'){
           $model=new HomeModel();
           $data['msg']=$model->select('msg')->orderby('msg_id','DESC')->findall();
        //    var_dump($data['msg'][0]['msg']);
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
                     //    echo view('templates/particle');
                                echo view('templates/footer');
                                break;
                case "more":echo view('templates/header');
                            echo view('resources/more-style');
                            echo view('templates/body');
                            echo view('pages/more');
                            echo view('templates/footer');
                            break;
                // case "admin-login":
                    // case "suggestion":logSuggest();
                                        
                    //                     break;
                default:redirect()->to('/home');
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

    }
}