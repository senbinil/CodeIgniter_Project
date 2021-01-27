<?php namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\Enrollment;
use App\Models\FeePay;
use Exception;

class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        // echo "Welcome back, ".$session->get('user_id');
        $data['username']=$session->get('user_id');
        echo view('dashboard/admin-home',$data);
    }

    public function adminView($page)
    {
        switch($page)
        {
            case "student-enroll": echo view('dashboard/student-enrollment');
                                    break;
            case "message-center": echo view('dashboard/message-center');
                                    break;
            case "feeupdate": echo view('dashboard/fee-collector');
                                    break;
            case "global-search":echo view('dashboard/global-search');
                                break;
            default:$session = session();
                                // echo "Welcome back, ".$session->get('user_id');
                                $data['username']=$session->get('user_id');
                                echo view('dashboard/admin-home',$data);
        }
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
        if($action=='review' && $this->request->getMethod()=='post')
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
        else
        {   $modelStudent=new Enrollment();
            $studentDetails=$modelStudent->where('admin_no',$this->request->getPost('admission'),'phone',$this->request->getPost('mphone'))->first();
            if($action=='commit' && $this->request->getMethod()=='post' && $studentDetails)
            {   $model=new FeePay();
                try
                {
                    $model->save([
                        'admin_no'=>$this->request->getPost('admission'),
                        'semester'=>$this->request->getPost('semester'),
                        'amount'=>$this->request->getPost('amt'),
                        'payment_mode'=>$this->request->getPost('pay'),
                        'phone'=>$this->request->getPost('mphone')
                    ]);
                    $data=$model->where('admin_no',$this->request->getPost('admission'),'semester',$this->request->getPost('semester'))->first();
                    // var_dump($data);
                    echo view('dashboard/fee-collector',$data);
                }
                catch(Exception $e)
                {
                    // echo $this->request->getPost('mphone');
                }
            }
            else
            return redirect()->to('/admin-home/feeupdate');
        }

    }
            
public function getDetails($cat){

    if($cat=="student" && $this->request->getMethod()=='post')
    {
        $studModel=new Enrollment();
        try{
            $user=$studModel->where('admin_no',$this->request->getPost('student_id'))->first();
            echo view('dashboard/global-search',$user);
        }
        catch(Exception $e)
        {
            echo $e;
        }
    }

}

}

?>