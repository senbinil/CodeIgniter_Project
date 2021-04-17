<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UserOnly implements FilterInterface
{
    public function before(RequestInterface $request,$argument=null)
    {
        
      
           if(!session()->get('logged_in') and !isset($_SESSION['admin']))
           {
               
               return redirect()->to('/home');
           }
         //}
        
    }
    public function after(RequestInterface $request,ResponseInterface $response,$arguments=null)
    {
        
    }
}


?>