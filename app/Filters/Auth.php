<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $resquest,$arguments=null)
    {   
         $now=(int)time();
        if($now>session()->get('log_exp'))
            session_destroy();
        if(!session()->get('logged_in'))
        {
            return redirect()->to('/home');
        }
    }
    public function after(RequestInterface $resquest,ResponseInterface $response,$arguments=null)
    {
        
    }
}