<?php namespace App\Controllers;
use App\Models\LoginModel;
class Home extends BaseController
{
	public function index()
	{
		// $myModel=new LoginModel();
		// $myModel->insert(
		// 	[
		// 		'username'=>'logger',
		// 		'password'=>\password_hash('casp123',PASSWORD_DEFAULT),
		// 		'email_id'=>'casp@gmail.com'
		// 	]
		// 	);
		// echo $myModel->insertID();	
		return view('welcome_message');
		
	}

	//--------------------------------------------------------------------

}
