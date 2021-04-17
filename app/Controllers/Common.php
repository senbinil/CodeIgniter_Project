<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Suggestion;
use App\Models\HomeModel;
use App\Models\FeePay;

class Common extends Controller
{
    public function Pagger($page)
    {   $sesion=session();
        $suggest_box=new Suggestion();
        $suggest_box_content['data']=$suggest_box->select()->orderBy('timestamp','DESC')->findAll(20);
        $suggest_box_content['faculty']=TRUE;
        if($_SESSION['admin']==TRUE) 
        { 
        $suggest_box_content['faculty']=FALSE;
        $commonData['faculty']=FALSE;
        }
        $notify=new HomeModel();
        $commonData['data']=$notify->select(['msg_id','msg','msg_cat'])->orderBy('msg_id','DESC')->findAll(20);
        switch($page)
        {
            case "message-center": echo view('common/message-center');
                                    break;
            case "global-search":echo view('common/global-search');
                                 break;
            case "suggestion-box":echo view('common/suggestion',$suggest_box_content);
                                var_dump($suggest_box_content);
                                  break;
                                  break;
            case 'notification':echo view('common/notify.php',$commonData);
                                var_dump($commonData);
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
}



?>