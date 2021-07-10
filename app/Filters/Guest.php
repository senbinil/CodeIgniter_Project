<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Guest implements FilterInterface
{
    public function before(RequestInterface $request,$argument=null)
    {
        
      
           if(session()->get('gid')===NULL)
           {
               session()->destroy();
               return redirect()->to('/home');
           }
         //}
        
    }
    public function after(RequestInterface $request,ResponseInterface $response,$arguments=null)
    {
        
    }
}


?>