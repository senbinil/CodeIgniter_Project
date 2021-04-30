<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Suggestion;
use App\Models\HomeModel;
use App\Models\Library;
use App\Models\FeePay;
use App\Models\Enrollment;
use App\Models\StaffEnrollment;

class Common extends Controller
{
    public function Pagger($page)
    {   $sesion=session();
        $suggest_box=new Suggestion();
        $suggest_box_content['data']=$suggest_box->select()->orderBy('timestamp','DESC')->findAll(20);
        // $suggest_box_content['faculty']=TRUE;
        // if($_SESSION['admin']==TRUE) 
        // { 
        // $suggest_box_content['faculty']=FALSE;
        // $commonData['faculty']=FALSE;
        // }
        $notify=new HomeModel();
        $commonData['data']=$notify->select(['msg_id','msg','msg_cat'])->orderBy('msg_id','DESC')->findAll(20);
        $lib=new Library();
        $libContent['libBrowse']=$lib->select()->where('stat',1)->orderBy('timelog','DESC')->findAll(20);
        switch($page)
        {
            case "message-center":echo view('common/message-center');
                                    break;
            case "global-search":echo view('common/global-search');
                                 break;
            case "suggestion-box":echo view('common/suggestion',$suggest_box_content);
                                  break;
            case 'notification':echo view('common/notify.php',$commonData);
                                    break;
            case 'resources':echo view('common/library.php',$commonData);
                                break;
            case 'browseLib':echo view('common/libBrowse',$libContent);
                            break;
                            
        }
    }


    public function getFee(){
        session();
        if($_SESSION['admin']==TRUE)
        $data['faculty']=FALSE;
        
        if($this->request->getMethod()=='post')
        {
            $feelog=new FeePay();
            $id=$this->request->getPost('adminno');
            $data['info']=$feelog->select()->where('admin_no',$id)->findAll();
            echo view('common/payment-info',$data);
          
        }
        else{
            if($_SESSION['admin']==TRUE)
            redirect()->to('/admin-home');
            else
            redirect()->to('/faculty/home');
        }
    }

    
    public function addFile()
    {
        $file=$this->request->getFile('filetoload');
        $target_file =  basename($file->getName());
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($this->request->getMethod()=='post')
        {
            $hashed_file=sha1_file($file->getTempName());
            $fileintro=$this->request->getVar('fileintro');
            $cat=$this->request->getVar('cat');
            $libModel=new Library();
            if($libModel->select('fileHash')->where('fileHash',$hashed_file)->first())
            {
                $_SESSION['stat']="File already exist";
                return redirect()->to('/common/resources');
            }
            $category=array('1'=>"Note",'2'=>'Syllabus','3'=>'Book','4'=>"other");
            $check = filesize($file->getTempName());
            if($check<52428800 and $imageFileType==="pdf")
            {
                $newfileName=(string)$hashed_file;
                if($libModel->insert([
                    'fileintro'=>$fileintro,
                    'cat'=>$category[$cat],
                    'fileHash'=>$hashed_file,
                    'stat'=>1
                ]))
                {
                    $file->move('asset/upload/'.$category[$cat].'/',$hashed_file.'.pdf');
                    $_SESSION['stat']="Uploaded !!!";
                    return redirect()->to('/common/resources');
                }
            }
         } 
        else 
        {
            // echo "File is not an image.";
            $_SESSION['stat']="Select an Image File";
            return redirect()->to('/common/resources');

        }
    }

     public function viewer()
     {
        if($this->request->getMethod()=="post" and $this->request->getVar('type')==203)
        {
            $lib=new Library();
            $data=$lib->select()->where('fileHash',$this->request->getVar('fileInfo'))->first();
            if($data)
            {
                echo json_encode(array('cat'=>$data['cat']));
            }
            else
            echo json_encode(array('stat'=>1));
        }
     }


     public function getDetails($cat){

        if($cat=="student" && $this->request->getMethod()=='post')
        {
            $studModel=new Enrollment();
            try{
                $user=$studModel->where('admin_no',$this->request->getPost('student_id'))->first();
                if(isset($user))
                echo view('common/global-search-student',$user);
                else
                return redirect()->to('/admin-home');
            }
            catch(Exception $e)
            {
                echo $e;
            }
        }
        elseif($cat=="staff" && $this->request->getMethod()=='post')
        {
            $stud=new StaffEnrollment();
            $user=$stud->select()->where('emp_id',$this->request->getPost('emp_id'))->first();
            if(isset($user))
            echo view('common/global-search-staff',$user);
            else
                return redirect()->to('/admin-home');

        }
        else
            return redirect()->to('/admin-home');

    }

     
}




?>