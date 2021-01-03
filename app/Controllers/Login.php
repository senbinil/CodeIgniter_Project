<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use CodeIgniter\HTTP\Request;
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

            default:echo view('welcome-message');
        }
    }

    public function auth()
    {
        $session=session();
        $model=new LoginModel();
        $username=$this->request->getVar('admin_username');
        $password=$this->request->getVar('admin_password');
        $data=$model->where('username',$username)->first();
        if($data)
        {
            $pass=$data['password'];
            if($password==$pass)
            {
                $ses_data=[
                    'user_id' =>$data['username'],
                    'email_id' =>$data['email_id'],
                    'logged_in'=>TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dash');
            }
            else
            {
                $session->setFlashdata('msg','Wrong Password');
                return redirect()->to('/admin-login');
            }
        }
        else
        {
            $session->setFlashdata('msg','Wrong Username');
            return redirect()->to('/admin-login');
        }
     }

     public function logout()
     {
         $session=session();
         $session->destroy();
         Return redirect()->to('/home');
     }
}





?>