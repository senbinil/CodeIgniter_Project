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
use App\Models\Admissionstat;
use App\Models\Admission_rq;
use App\Models\GuestModel;
use App\Models\Stcat;
use App\Models\Subject;
use App\Models\Syllabus;
use Exception;

class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        $recentFee=new FeePay();
        $admin_rq=new Admission_rq();
        $data['admission_rq']=$admin_rq->select()->orderBy('timelog','DESC')->findAll(5);
        $data['paymentinfo']=$recentFee->select()->orderBy('payment_id','DESC')->findAll(5);
        
        // echo "Welcome back, ".$session->get('user_id');
        $data['username']=$session->get('user_id');
        echo view('dashboard/admin-home',$data);

    }

    public function adminView($page)
    { 
        $session = session();
        $designation=new Designation();
        $department=new Department();
        $desig['contentx']=$department->select(['department_id','department_name'])->findAll();
        $desig['content']=$designation->select(['pos_id','pos_name'])->findAll();
        $data['username']=$session->get('user_id');
        $admissionlog=new Admissionstat();
        $admissionContent['adminlog']=$admissionlog->select()->findAll(10);
        $admin_rq=new Admission_rq();
        $data['admission_rq']=$admin_rq->select()->orderBy('timelog','DESC')->findAll(20);

        switch($page)
        {
            case "student-enroll": echo view('dashboard/student-enrollment');
                                    break;
            case "feeupdate": echo view('dashboard/fee-collector');
                                    break;
           case 'adminlog':echo view('dashboard/admissionLog',$admissionContent);
                            break;
            case "staff-enroll":echo view('dashboard/staff-enrollment',$desig);
                                break;
            case 'admission_log':echo view('dashboard/admission_rq',$data);
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

    // public function Notify()
    // {   
    //     $notify=new HomeModel();
    //     // if()
    //     // {

    //     // }
    //     // elseif()
    //     // {

    //     // }

    // }

    public function addAdmissionlog()
    {
        if($this->request->getMethod()=='post')
        {
            if($this->request->getVar('course')!==NULL and $this->request->getVar('year')!==NULL)
            {
                $session=session();
                $course=new Course();
                $course_get=$this->request->getVar('course');
                $year=$this->request->getVar('year');
                $data_course=$course->select()->where('course_id',$course_get)->first();
                $logger=new Admissionstat();
                if(!$logger->select()->where(['course_id'=>$course_get,'year'=>$year])->first())
                {
                    $logger->save([
                    'course_id'=>$course_get,
                    'Course'=>$data_course['course_name'],
                    'year'=>$year]);
                    $session->setFlashdata('response','Admitted');
                    return redirect()->to('/admin-home/adminlog');
                }
            else
                {
                    $session->setFlashdata('response','Already Exist');
                    return redirect()->to('/admin-home/adminlog');
                }
            }
            else
            return redirect()->to('/admin-home/adminlog');
        }
        else
        return redirect()->to('/home');
    }


    public function getAdmissionRq(){
       if($this->request->getMethod()=='post' and $this->request->getVar('type')==200)
       {
           $user_id=$this->request->getVar('id');
           $ugCourse=new Course();
           $prevcs=new Stcat();
           $prev_sub=new Subject();
           $syllabus=new Syllabus();
           $guest_del=new GuestModel();
           $admin_rq=new Admission_rq();
           $admissionLog=new Admissionstat();
           $data=$guest_del->select()->where('GID',$user_id)->first();
           $data['req']=$admin_rq->select()->where('guest_id',$user_id)->first();
           $data['reqested_cs']=$ugCourse->select()->findAll();
           $data['prev_stream']=$prevcs->select()->where('UID',$data['prevcat'])->first();
           $data['prev_sub']=$prev_sub->select()->where('CSID',$data['CSID'])->first();
           $data['syllabus']=$syllabus->select('Name')->where('CID',$data['prev_syllabus'])->first();
           echo json_encode($data);

       }
       elseif ($this->request->getMethod()=="post" and $this->request->getVar('type')==201) {
           # code...
           $post_user_id=$this->request->getVar('id');
           $post_cs=$this->request->getVar('course');
           $admission=new Enrollment();
           $guest_del=new GuestModel();
           $data_guest=$guest_del->select()->where('GID',$post_user_id)->first();
           if($admission->select()->where(['exroll_no'=>$data_guest['prevreg'],'gphone'=>$data_guest['phone']])->first())
           {
               echo json_encode(array('stat'=>1));
           }
           else
           {
            $admission->insert([
                'fname'=>$data_guest['fname'],
                'lname'=>$data_guest['lname'],
                'dob'=>$data_guest['dob'],
                'blood_group'=>$data_guest['blood_group'],
                'address'=>$data_guest['address'],
                'state'=>$data_guest['state'],
                'city'=>$data_guest['city'],
                'zip_code'=>$data_guest['pincode'],
                'gender'=>$data_guest['gender'],
                'guard_fname'=>$data_guest['gfname'],
                'guard_lname'=>$data_guest['glname'],
                'relation'=>$data_guest['relation'],
                'gphone'=>$data_guest['phone'],
                'year_pass'=>$data_guest['year_pass'],
                'exroll_no'=>$data_guest['prevreg'],
                'e_mail'=>$data_guest['email'],
                'ug_course'=>$post_cs,
                'prevcourse'=>$data_guest['prevcat'],
                'prev_syllabus'=>$data_guest['prev_syllabus'],
                'CSID'=>$data_guest['CSID'],
                'sub1'=>$data_guest['sub1'],
                'sub2'=>$data_guest['sub2'],
                'sub3'=>$data_guest['sub3'],
                'sub4'=>$data_guest['sub4'],
                'sub5'=>$data_guest['sub5'],
            ]);
                    $admit_id=$admission->select('admin_no')->where(['exroll_no'=>$data_guest['prevreg'],'gphone'=>$data_guest['phone']])->first();
                    $id_post=$admit_id['admin_no'];
                    $to = "logger@localhost";
                    $subject = "CASP Admission Completed";
                    $txt = "
                    You have succesfully completed CASP admission procedure
                    Your account has been created, you can login with the following credentials after you have activated your account by setting a password using Password Recovery Portal.
                    
                    ------------------------
                    Admission Number: ".$id_post."
                    ------------------------
                    
                    Please click this link to set a password:
                    http://localhost//precovery/student-recovery
                                        
                    ";
                    $headers = "From: webmaster@codeIgniter.com" ;
                    $stat=mail($to,$subject,$txt,$headers);
            echo json_encode(array('stat'=>0));
           }
           
       }
       elseif (($this->request->getMethod()=="post" and $this->request->getVar('type')==202)) {
           # code...
           $admission_rq=new Admission_rq();
           $id=$this->request->getVar('id');
           $stat=$admission_rq->where('application_id',$id)->delete();
           if(!$stat)
           echo json_encode(array('stat'=>0));
           else
           echo json_encode(array('stat'=>1));
       }
        
    }
}

?>