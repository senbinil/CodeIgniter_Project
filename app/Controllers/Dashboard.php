<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Suggestion;
use App\Models\Enrollment;
use App\Models\FeePay;
use App\Models\Designation;
use App\Models\StaffEnrollment;
use App\Models\Department;
use App\Models\Course;
use App\Models\HomeModel;

use Exception;

class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        $recentFee=new FeePay();
        $data['paymentinfo']=$recentFee->select()->orderBy('payment_id','DESC')->findAll(5);
       
        // echo "Welcome back, ".$session->get('user_id');
        $data['username']=$session->get('user_id');
        echo view('dashboard/admin-home',$data);
        var_dump($data);

    }

    public function adminView($page)
    { 
        $session = session();
        $designation=new Designation();
        $department=new Department();
        $desig['contentx']=$department->select(['department_id','department_name'])->findAll();
        $desig['content']=$designation->select(['pos_id','pos_name'])->findAll();
        $data['username']=$session->get('user_id');
        

        switch($page)
        {
            case "student-enroll": echo view('dashboard/student-enrollment');
                                    break;
            case "feeupdate": echo view('dashboard/fee-collector');
                                    break;
            // case "global-search":redirect()->to('/admin/common/global-search');
            //                      break;
           
            case "staff-enroll":echo view('dashboard/staff-enrollment',$desig);
                                break;
          
            default:redirect()->to('/home');
        }
        // echo var_dump($_SESSION);
    }


    public function enroll()
    {   $session=session();
        $model=new Enrollment();
        if($this->request->getMethod()=='post')
        {
            try{
            $model->save([
                    'fname'=>$this->request->getPost('fname'),
                    'lname'=>$this->request->getPost('lname'),
                    'dob'=>$this->request->getPost('dob'),
                    'blood_group'=>$this->request->getPost('blood-group'),
                    'address'=>$this->request->getPost('caddress'),
                    'state'=>$this->request->getPost('state'),
                    'city'=>$this->request->getPost('city'),
                    'zip_code'=>$this->request->getPost('pincode'),
                    'gender'=>$this->request->getPost('gender'),
                    'guard_fname'=>$this->request->getPost('gfname'),
                    'guard_lname'=>$this->request->getPost('glname'),
                    'relation'=>$this->request->getPost('relation'),
                    'gphone'=>$this->request->getPost('gphone'),
                    'year_pass'=>$this->request->getPost('ypass'),
                    'exroll_no'=>$this->request->getPost('exroll'),
                    'e_mail'=>$this->request->getPost('email'),
                    'ug_course'=>$this->request->getPost('ugcourse'),
                    'prevcourse'=>$this->request->getPost('pcourse'),

            ]);
            $no=$this->request->getPost('exroll');
            // echo $no;
            $data=$model->asArray()->where('exroll_no',$no)->first();
            // if($data)
            // $ses_data=[
            //     'admin_no'=>$data['admin_no']
            // ];
            // $session->set($ses_data);
            // $data['admin_no']=$session['admin_no'];
            // var_dump($data);
            echo view('dashboard/student-enrollment',$data);
        }
        catch(Exception $e)
        {
            $data['admin_no']="Student already enrolled";
            echo view('dashboard/student-enrollment',$data);
        }
        }
        else
        echo view('dashboard/student-enrollment');
    }

    public function staffEnroll()
    {
        $session=session();
        $staffModel=new StaffEnrollment();
        if($this->request->getMethod()=='post')
        {
            try
            {
                $staffModel->save([
                    'frm_no'=>$this->request->getPost('frm_no'),
                    'apply_date'=>$this->request->getPost('app_date'),
                    'emp_name'=>$this->request->getPost('emp_name'),
                    'dob'=>$this->request->getPost('dob'),
                    'gender'=>$this->request->getPost('gen'),
                    'nationality'=>$this->request->getPost('nation'),
                    'cat'=>$this->request->getPost('cat'),
                    'martial'=>$this->request->getPost('martial'),
                    'exp'=>$this->request->getPost('exp'),
                    'mobile'=>$this->request->getPost('mob'),
                    'email'=>$this->request->getPost('email'),
                    'blod'=>$this->request->getPost('blod'),
                    'caddress'=>$this->request->getPost('caddress'),
                    'paddress'=>$this->request->getPost('paddress'),
                    'education'=>$this->request->getPost('edu'),
                    'spec'=>$this->request->getPost('spec'),
                    'emp_type'=>$this->request->getPost('emp_type'),
                    'department'=>$this->request->getPost('department'),
                    'desig'=>$this->request->getPost('desig'),
                    'j_date'=>$this->request->getPost('j_date'),
                    'acc_no'=>$this->request->getPost('acc_no'),
                    'bank_name'=>$this->request->getPost('bank_name'),
                    'ifsc'=>$this->request->getPost('ifsc'),
                ]);
                $idval=$this->request->getPost('frm_no');
                $acc_no=$this->request->getPost('acc_no');
                $staff_id=$staffModel->select('emp_id')->where('frm_no',$idval)->first();
                  $emp_id=$staff_id['emp_id'];
                  $session->setFlashdata('emp_id',$emp_id);
                 return redirect()->to('/admin-home/staff-enroll');

            }
            catch(Exception $e)
            {
                echo $e;            }
        }
    }
    public function announce()
    {   
        $session=session();
        $model=new Enrollment();
        if($this->request->getMethod()=="post")
        {
            try
            {
                $model->where('semester',$this->request->getPost('semester'))
                    ->set(['remark'=>$this->request->getPost('message')])
                    ->update();
                    $session->setFlashdata('stat','<script>alert("Done");</script>');
                    return redirect()->to('/admin-home/message-center');

            }
            catch(Exception $e)
            {
                return redirect()->to('/admin-home/message-center');
            }
        }
        else{
            return redirect()->to('/admin-home/message-center');
        }

    }


    public function feeMod($action)
    {   $session=session();
        $modelStudent=new Enrollment();
        $feemodel=new FeePay();
        $cs=new Course();
        if($action=='fetch' && $this->request->getPost('type')==1)
        {
            $id=$this->request->getPost('id');
            if($data_dump=$modelStudent->select(['semester','ug_course','gphone'])->where('admin_no',$id)->first())
            {   

                $post_data['course']=$cs->select()->where('course_id',$data_dump['ug_course'])->first();
                $post_data['phone']=$data_dump['gphone'];
                $post_data['sem']=$data_dump['semester']+1;
                if($post_data['sem']==6)
                return redirect()->to('/admin-home/feeupdate');
                else
                echo json_encode($post_data);
            }
            else
            {
                echo json_encode(0);
            }
            // echo json_encode(array('stat'=>1));
        }
        if($action=='review' && $this->request->getMethod()=='post' )
        {
            $data=[
                'admin_no'=>$this->request->getPost('admin_no'),
                'course'=>$this->request->getPost('course'),
                'sem'=>$this->request->getPost('semester'),
                'amount'=>$this->request->getPost('amount'),
                'payment_mode'=>$this->request->getPost('mode'),
                'phone'=>$this->request->getPost('phone')
            ];
            // var_dump($data);
            echo view('dashboard/fee-review',$data);
        }
            $modelStudent=new Enrollment();
            $studentDetails=$modelStudent->where('admin_no',$this->request->getPost('admission'),'phone',$this->request->getPost('mphone'))->first();
            if($action=='commit' && $this->request->getMethod()=='post' && $studentDetails)
            {   
              try
             {
                    $feemodel->save([
                        'admin_no'=>$this->request->getPost('admission'),
                        'semester'=>$this->request->getPost('semester'),
                        'amount'=>$this->request->getPost('amt'),
                        'payment_mode'=>$this->request->getPost('pay'),
                        //'phone'=>$this->request->getPost('mphone')
                    ]);
                    $data=$feemodel->select('payment_id')->where('admin_no',$this->request->getPost('admission'),'semester',$this->request->getPost('semester'))->first();
                    $postsem=['semester'=>$this->request->getPost('semester')];
                    $sds=$modelStudent->where('admin_no',$this->request->getPost('admission'))->update(NULL,$postsem);
                    echo view('dashboard/fee-collector',$data);
                }
               catch(Exception $e)
               {
                  return redirect()->to('/admin-home/feeupdate');
               }
            }
             else
             redirect()->to('/admin-home/feeupdate');
    }
            
public function getDetails($cat){

    if($cat=="student" && $this->request->getMethod()=='post')
    {
        $studModel=new Enrollment();
        try{
            $user=$studModel->where('admin_no',$this->request->getPost('student_id'))->first();
            if(isset($user))
            echo view('dashboard/global-search-student',$user);
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
        echo view('dashboard/global-search-staff',$user);
        else
            return redirect()->to('/admin-home');

    }
    else
        return redirect()->to('/admin-home');

}

public function Notify()
{   
    $notify=new HomeModel();
    // if()
    // {

    // }
    // elseif()
    // {

    // }

}
}

?>