<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\GuestRegister;
use App\Models\Stcat;
use App\Models\Syllabus;
use App\Models\Subject;
use App\Models\GuestModel;
use App\Models\Admissionstat;
use App\Models\Admission_rq;


class Guest extends Controller
{
    public function sendMail()
    {
        if($this->request->getMethod()=='post' and $this->request->getVar('type')==1)
        {
            $email=filter_var($this->request->getVar('email'),FILTER_SANITIZE_EMAIL);
            $phone=$this->request->getVar('phone');
            if(filter_var($email,FILTER_VALIDATE_EMAIL) and filter_var($phone,FILTER_VALIDATE_INT))
            {
                $hash=password_hash($email,PASSWORD_DEFAULT);
                $pass=mt_rand();
                $guestreg=new  GuestRegister();
                try{
                    if($guestreg->insert([
                        'email'=>$email,
                        'password'=>$pass,
                        'hash'=>$hash,
                        'phone'=>$phone
                    ]))
                    $save=1;
                    $urlhash=rawurlencode($hash);
                    $data_dump=$guestreg->select()->where('email',$email)->first();
                    $to = "logger@localhost";
                    $subject = "CASP User Registration";
                    $txt = "
                    Thanks for signing up!
                    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
                    
                    ------------------------
                    Username: ".$data_dump['TID'].'
                    Password: '.$data_dump['password']."
                    ------------------------
                    
                    Please click this link to activate your account:
                    http://localhost/guest/postregister/hash=$urlhash&email=$email
                                        
                    ";
                    $headers = "From: webmaster@codeIgniter.com" ;
                     $stat=mail($to,$subject,$txt,$headers);
                    if(!$stat or !isset($save))   
                    echo json_encode(array('stat'=>0));
                    
                    echo json_encode(array('stat'=>1));
                }
                catch(Exception $e)
                {
                    return json_encode(array('stat'=>0));
                }

            }
            else
            {
                return json_encode(array('stat'=>0));
    
            }  
        }
        else
            return redirect()->to('/home');
        
    }

    public function Postreg($hash,$mail)
    {
      
        if(isset($hash) and isset($mail))
        {
            $gueststat=new GuestRegister();
            $data_dump=$gueststat->select(['hash','active'])->where('email',$mail)->first();
            $rhash=rawurldecode($hash);
            if($data_dump['hash']==$rhash && !$data_dump['active'])
            {   
                $statupdate=['active'=>1];
                $gueststat->where('email',$mail)->update(NULL,$statupdate);
                $data['stat']=TRUE;
                echo view('guest/postregister',$data);
            }
            else
            return redirect()->to('/home');
            

        }

    }
    public function guestView($page)
    {
        switch($page)
        {
            case 'fillup':echo view('guest/register_step1');
                          break;
            case 'profile':if(isset($_SESSION['filled']) and $_SESSION['filled'])
                            {
                                $ghandle=new GuestModel();
                                $data_dump=$ghandle->select()->where('GID',$_SESSION['gid'])->first();
                                $prevcat=new Stcat();
                                $precourse=new Subject();
                                $data_dump['prevstream']=$prevcat->select('category')->where('UID',$data_dump['prevcat'])->first();
                                $data_dump['pcourse']=$precourse->select()->where('CSID',$data_dump['CSID'])->first();
                                echo view('guest/profile',$data_dump);
                            }
                            else
                            redirect()->to('/home');
                            break;


            default:redirect()->to('/home');
        }
    }
    public function completeReg()
    {
        session();
        $guest_dump=new GuestModel();
        if($this->request->getMethod()=='post')
        {
            $fname=filter_var($this->request->getVar('fname'),FILTER_SANITIZE_STRING);
            $lname=filter_var($this->request->getVar('lname'),FILTER_SANITIZE_STRING);
            $gender=filter_var($this->request->getVar('gender'),FILTER_SANITIZE_STRING);
            $blod=filter_var($this->request->getVar('blood'),FILTER_SANITIZE_STRING);
            $dob=$this->request->getVar('dob');
            $addres=filter_var($this->request->getVar('address'),FILTER_SANITIZE_STRING);
            $state=filter_var($this->request->getVar('state'),FILTER_SANITIZE_STRING);
            $city=filter_var($this->request->getVar('city'),FILTER_SANITIZE_STRING);
            $pin=filter_var($this->request->getVar('pin'),FILTER_VALIDATE_INT);
            $gfname=filter_var($this->request->getVar('gfname'),FILTER_SANITIZE_STRING);
            $glname=filter_var($this->request->getVar('glname'),FILTER_SANITIZE_STRING);
            $relation=filter_var($this->request->getVar('relation'),FILTER_SANITIZE_STRING);
            $regno=filter_var($this->request->getVar('regno'),FILTER_VALIDATE_INT);
            $ypass=filter_var($this->request->getVar('ypass'),FILTER_VALIDATE_INT);
            $hscat=filter_var($this->request->getVar('hscat'),FILTER_VALIDATE_INT);
            $prevsyllabus=filter_var($this->request->getVar('prevsyllabus'),FILTER_VALIDATE_INT);
            $sub1=filter_var($this->request->getVar('sub1'),FILTER_VALIDATE_INT);
            $sub2=filter_var($this->request->getVar('sub2'),FILTER_VALIDATE_INT);
            $sub3=filter_var($this->request->getVar('sub3'),FILTER_VALIDATE_INT);
            $sub4=filter_var($this->request->getVar('sub4'),FILTER_VALIDATE_INT);
            $sub5=filter_var($this->request->getVar('sub5'),FILTER_VALIDATE_INT);
            $course=filter_var($this->request->getVar('prevcourse'),FILTER_VALIDATE_INT);
            $userID=$_SESSION['gid'];
            var_dump($course);
            if($guest_dump->save([
                'GID'=>$userID,
                'fname'=>$fname,
                'lname'=>$lname,
                'gender'=>$gender,
                'dob'=>$dob,
                'blood_group'=>$blod,
                'address'=>$addres,
                'state'=>$state,
                'city'=>$city,
                'pincode'=>$pin,
                'gfname'=>$gfname,
                'glname'=>$glname,
                'relation'=>$relation,
                'year_pass'=>$ypass,
                'prevcat'=>$hscat,
                'sub1'=>$sub1,
                'sub2'=>$sub2,
                'sub3'=>$sub3,
                'sub4'=>$sub4,
                'sub5'=>$sub5,
                'prevreg'=>$regno,
                'CSID'=>$course,
                'prev_syllabus'=>$prevsyllabus,
                'email'=>$_SESSION['email'],
                'phone'=>$_SESSION['phone']
            ]))
            {
            //    afer completion
                return redirect()->to('/guest/profile');
            }
            else
            {
                return redirect()->to('/home');
            }
        }
        else
        return redirect()->to('/home');

    }
    
    public function fetchCs()
    {
        if($this->request->getMethod()=='post' and $this->request->getVar('type')==1)
        {
            $data_model=new Stcat();
            $data=$data_model->select()->findAll();
            // var_dump($data);
            return json_encode($data);
        }
        elseif($this->request->getMethod()=='post' and $this->request->getVar('type')==2)
        {
           $syllabus=new Syllabus();
           $data=$syllabus->select()->findAll();
           return json_encode($data);

        }
        elseif($this->request->getMethod()=='post' and $this->request->getVar('type')==3)
        {
            $cat=$this->request->getVar('cat');
            $sub=new Subject();
            $data=$sub->select()->where('cat',$cat)->findAll();
            return json_encode($data);

        }
        elseif($this->request->getMethod()=='post' and $this->request->getVar('type')==4)
        {
            $cat=$this->request->getVar('cat');
            $sub=new Subject();
            $data=$sub->select()->where('CSID',$cat)->findAll();
            return json_encode($data);

        }
        
        
    }
//     public function CompleteReg()
//     {

//     }
    public function fetchAdmission()
    {
        if($this->request->getMethod()=='post' and $this->request->getVar('type')==1)
        {
            $admissionLog=new Admissionstat();
            $data_dump=$admissionLog->select()->where(['year'=>date('Y'),'status'=>1])->findAll();
            echo json_encode($data_dump);
        }
        if($this->request->getMethod()=='post' and $this->request->getVar('type')==2)
        {
            $send_rq=new Admission_rq();
            $user_id=$this->request->getVar('guest_id');
            $option_1=$this->request->getVar('option_1');
            $option_2=$this->request->getVar('option_2');
            if($send_rq->select()->where('guest_id',$user_id)->first())
            echo json_encode(array('stat'=>0));
            else
            {
                try
                {
                    $stat=$send_rq->save([
                        'guest_id'=>$user_id,
                        'option_1'=>$option_1,
                        'option_2'=>$option_2
                    ]);
                    $temp_app=$send_rq->select('application_id')->where('guest_id',$user_id)->first();
                    if($stat and $temp_app)
                    echo json_encode(array('stat'=>1,'app_no'=>$temp_app['application_id']));
                }
                catch (Exception $e){
                    echo json_encode(array('stat'=>2));
                }
            }

        }
    }
}


?>