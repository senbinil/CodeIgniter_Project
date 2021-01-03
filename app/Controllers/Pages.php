<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{   
    
   
    public function index()
    {
        return view('welcome_message');

    }

    public function view($page = 'home')
    { 
        
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

       if($page=='home'){
        echo view('templates/header');
        echo view('pages/'.$page);
        echo view('templates/particle');
        echo view('templates/footer');
       }
        else{
            echo view('templates/header');
            echo view('pages/'.$page);
         //    echo view('templates/particle');
            echo view('templates/footer');
        }
      
    }
}