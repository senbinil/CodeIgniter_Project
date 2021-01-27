<?php namespace App\Controllers;

use App\Models\HomeModel;
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
           $model=new HomeModel();
           $data['msg']=$model->select('msg')->orderby('msg_id','DESC')->findall();
        //    var_dump($data['msg'][0]['msg']);
        echo view('templates/header');
        echo view('resources/home-style');
        echo view('templates/body');
        echo view('pages/'.$page,$data);
        echo view('templates/particle');
        echo view('templates/footer');
       }
        else{

            switch($page)
            {
                case "about":   echo view('templates/header');

                                echo view('templates/body');

                                echo view('pages/'.$page);
                     //    echo view('templates/particle');
                                echo view('templates/footer');
                                break;
                case "more":echo view('templates/header');
                            echo view('resources/more-style');
                            echo view('templates/body');
                            echo view('pages/more');
                            echo view('templates/footer');
                            break;
                default:redirect()->to('/home');
            }
     
        }
      
    }
}