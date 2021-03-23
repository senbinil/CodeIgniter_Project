<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\StaffSal;
use App\Models\LoginModel;
use App\Models\StaffLogin;
use App\Models\Designation;
use App\Models\Prevtable;
use App\Models\StaffEnrollment;
use CodeIgniter\HTTP\Request;
use App\Models\TimeMachine;
use App\Models\Studlogin;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\FeePay;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class Login extends BaseController
{
	public function index()
	{
		return view('welcome_message');
		
    }
    
    public function views($loc){
        switch($loc){
            case 'admin-login':echo view('login/admin-login');
                                break;
            case 'guest-login':echo view('templates/header');
                                echo view('resources/guest-login-style');
                                echo view('templates/body');
                                echo view('login/guest-login');
                                echo view('templates/footer');
                                break;
            case 'staff-login':echo view('login/staff-login');
                                break;
            case 'student-login':echo view('login/student-login');
                                    break;
           default: return redirect()->to('/home');
                    logout();
        }
       
    }

    public function auth()
    {
        $session=session();
        $model=new LoginModel();
        $staffLoginModel=new StaffLogin();
        $staffDesign=new Designation();
        $staffAccess=new StaffEnrollment();
        $accesstable=new Prevtable();
        $username=$this->request->getVar('admin_username');
        $password=$this->request->getVar('admin_password');
        if($username==NULL && $password==NULL)
        return redirect()->to('/home');

        $data=$model->where('username',$username)->first();
        if($data)
        {
            $pass=$data['password'];
            if($password==$pass)
            {
                $ses_data=[
                    'user_id' =>$data['username'],
                    'email_id' =>$data['email_id'],
                    'logged_in'=>TRUE,
                    'admin'=>TRUE,
                    'log_time'=>(int)time(),
                    'log_exp'=>(int)time()+(30*60)
                ];
                $session->set($ses_data);
                return redirect()->to('/admin-home');
            }
            else
            {
                $session->setFlashdata('msg','Wrong Password');
                return redirect()->to('/login/admin-login');
            }
        }
        elseif($staffLoginModel->select('emp_id',$username)->first()!=NULL)
        {   $prepass=$staffLoginModel->select('password')->where('emp_id',$username)->first();
            // var_dump($prepass);
            if(password_verify($password,$prepass['password']))
            {
                $postusername=$staffAccess->select(['emp_name','email','desig'])->where('emp_id',$username)->first();
                $data['username']=$postusername['emp_name'];
                $id_prefetch=(int)$postusername['desig'];
                // var_dump($id_prefetch);
                $access_id=$staffDesign->select('role_id')->where('pos_id',$id_prefetch)->first();
                // var_dump($access_id);
                $access=$accesstable->select('access')->where('role_id',$access_id)->first();
                if($access['access']==2)
                {
                    $ses_data=[
                        'user_id' =>$data['username'],
                        'email_id' =>$postusername['email'],
                        'logged_in'=>TRUE,
                        'admin'=>FALSE,
                        'log_time'=>(int)time(),
                        'log_exp'=>(int)time()+(30*60)
                    ];
                    $session->set($ses_data);
                  return redirect()->to('/faculty/home');
                }
            }
            else
            {
                $session->setFlashdata('msg','Wrong Password');
                return redirect()->to('/login/admin-login');
            }
        }
        else
        {
            $session->setFlashdata('msg','Wrong Username');
            return redirect()->to('/login/admin-login');
        }
     }

     public function logout()
     {
         $session=session();
         $session->destroy();
         Return redirect()->to('/home');
     }


     public function staffLogin()
     {  
         $session=session(); 
         $staffLogin=new StaffLogin();
         $designation=new Designation();
         if($this->request->getMethod()=='post')
         {  
             $username=$this->request->getPost('emp_id');
             $pass=$this->request->getPost('password');
             if($username==NULL && $pass==NULL)
             return redirect()->to('/home');
             $data=$staffLogin->select(['emp_id','password'])->where('emp_id',$username)->first();
             if(isset($data))
            {
                if(password_verify($pass,$data['password']))
                {
                    $staffdetails=new StaffEnrollment();
                    $staffSal=new StaffSal();
                    $timeMac=new TimeMachine();
                    $timeMac->save([
                        'user_id'=>$username
                    ]);
                 
                    $del=$staffdetails->select()->where('emp_id',$username)->first();
                    $desig=$designation->select(['pos_name','salary'])->where('pos_id',$del['desig'])->first();
                    $del['desig_name']=$desig;
                    $del['salarydel']=$staffSal->select()->where('emp_id',$username)->findAll();
                    $del['lastsal']=$staffSal->select()->where('emp_id',$username)->orderBy('pay_time','DESC')->first();
                    $ses_data=[
                        'username'=>$del['emp_name'],
                        'logged_in'=>TRUE,
                        'log_time'=>(int)time(),
                        'log_exp'=>(int)time()+(30*60)
                    ];
                    $session->set($ses_data);
                    $mindata['timedata']=$timeMac->select(['time_jumpid','timelog'])->where('user_id',$username)->orderBy('timelog','DESC')->findAll(10);
                    echo view('landing/header',$mindata);
                    echo view('landing/staff',$del);
                }
                else{
                    $session->setFlashdata('msg','Wrong username or Password');
                    return redirect()->to('/login/staff-login');
                }
            }
            else
            {
                $session->setFlashdata('msg','User not found');
                return redirect()->to('/login/staff-login');

            }
         }

     }


     public function studLogin()
     {
         $session=session();
         $log_chk=new studlogin();
         $txt=password_hash('pass123',PASSWORD_DEFAULT);
         
         if($this->request->getMethod()=='post')
         {
            $user=$this->request->getPost('adminno');
            $pass=$this->request->getPost('pass');
            $log_stat=$log_chk->select(['pass','student_id'])->where('student_id',$user)->first();
            if($log_stat)
            {
                if(password_verify($pass,$log_stat['pass']))
                {
                    $studentdump=new Enrollment();
                    $timeMac=new TimeMachine();
                    $timeMac->save([
                        'user_id'=>$user
                    ]);
            
                    $data_dump=$studentdump->select()->where('admin_no',$user)->first();
                    $cs_id=$data_dump['ug_course'];
                    $course=new Course();
                    $data_dump['course_dump']=$course->select(['course_name','no_sem','sem_fee'])->where('course_id',$cs_id)->first();
                    $ses_data=[
                        'username'=>$data_dump['fname'].$data_dump['lname'],
                        'logged_in'=>TRUE,
                        'log_time'=>(int)time(),
                        'log_exp'=>(int)time()+(30*60)
                    ];
                    $session->set($ses_data);
                    echo view('landing/header');
                    echo view('landing/student',$data_dump);
                }
                else
                {
                    $session->setFlashdata('msg',"Wrong username or password");
                    return redirect()->to('/login/student-login');
                }
            }
            else
            {  
                $session->setFlashdata('msg','User not found');
                return redirect()->to('/login/student-login');
            }

            
         }
         else
         {
            return redirect()->to('/login/student-login');
         }

     }

     public function getLog()
     {
        $time_log=new TimeMachine();
        if($this->request->getPost('type')==1)
        {
            $id=$this->request->getPost('user_id');
            $data=$time_log->select()->orderBy('timelog','DESC')->where('user_id',$id)->findAll(10);
            if($data)
            echo json_encode(array($data));
        }
        elseif($this->request->getPost('type')==2)
        {   
            $fee_log=new FeePay();
            $id=$this->request->getPost('id');
            $sem=$this->request->getPost('semester');
            if($fee_log->select()->where(['semester'=>$sem,'admin_no'=>$id])->first())
            echo json_encode(array('stat'=>1));
            else
            echo json_encode(array('stat'=>1));
        } 
     }
}





?>