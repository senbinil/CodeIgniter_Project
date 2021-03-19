<?php namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\StaffLogin;
use App\Models\StaffEnrollment;
use App\Models\Enrollment;
use App\Models\Studlogin;

class PassRecovery extends Controller
 {


    public function pviews($loc)
    {
        switch($loc)
        {
            case 'staff-recovery':echo view('precovery/staff');
                                    break;
            case 'student-recovery':echo view('precovery/student');
                                    break;
            
            // default:redirect()->to('/home');
            //             break;
            default:echo view('precovery/staff');
        }
    }

    public function userchk()
    {   $session=session();
        $staffModel=new StaffEnrollment();
        $staffLog=new StaffLogin();
        if($this->request->getPost('type')==1)
        {
            $id =$this->request->getPost('id');
            $mobile=$this->request->getPost('phone');
            $stat=$staffModel->select(['emp_id','email'])->where('emp_id',$id,'mobile',$mobile)->first();
            $sesdata=[
                'id'=>$id,
                'stat'=>$stat['email']
            ];
            $session->set($sesdata);
            if($stat!=NULL)
            echo json_encode(array("statusCode"=>200,"val"=>$stat));
            else
            echo json_encode(array("statusCode"=>201));
        }
        elseif(true)
        {
            $pass=$this->request->getPost('pass');
            $hash_pass=password_hash($pass,PASSWORD_DEFAULT);
            if($staffLog->select('emp_id')->where('emp_id',$_SESSION['id'])->first())
            {
                $data=[
                    'password'=>$hash_pass
                ];
                $passstat=$staffLog->where('emp_id',$_SESSION['id'])->set(['password'=>$data])->update();
                if($passstat)
                echo json_encode(array("statusCode"=>1));
            }
            else
            {
                $data=[
                    'emp_id'=>$_SESSION['id'],
                    'password'=>$hash_pass,
                    'email'=>$_SESSION['stat']
                ];
                $passstat=$staffLog->insert($data);
                if($passstat)
                echo json_encode(array("statusCode"=>1));

            }
        }
        else
        redirect()->to('/precovery/staff-recovery');

    }

    public function studentchk()
    {   $session=session();
        $student_log=new Studlogin();
        $student_dump=new Enrollment();
        if($this->request->getPost('type')==1)
        {
            $id =$this->request->getPost('id');
            $mobile=$this->request->getPost('phone');
            $stat=$student_dump->select(['admin_no','e_mail'])->where('admin_no',$id,'gphone',$mobile)->first();
            $sesdata=[
                'id'=>$id,
                'stat'=>$stat['e_mail']
            ];
            $session->set($sesdata);
            if($stat!=NULL)
            echo json_encode(array("statusCode"=>200,"val"=>$stat));
            else
            echo json_encode(array("statusCode"=>201));
        }

        elseif(true)
        {
            $pass=$this->request->getPost('pass');
            $hash_pass=password_hash($pass,PASSWORD_DEFAULT);
            if($student_dump->select('admin_no')->where('admin_no',$_SESSION['id'])->first())
            {
                $data=[
                    'password'=>$hash_pass
                ];
                $passstat=$student_log->where('student_id',$_SESSION['id'])->set(['pass'=>$data])->update();
                if($passstat)
                echo json_encode(array("statusCode"=>1));
            }
            else
            {
                $data=[
                    'student_id'=>$_SESSION['id'],
                    'pass'=>$hash_pass,
                    'email'=>$_SESSION['stat']
                ];
                $passstat=$student_log->insert($data);
                if($passstat)
                echo json_encode(array("statusCode"=>1));

            }
        }
        else
        redirect()->to('/precovery/student-recovery');

    }

 }

?>