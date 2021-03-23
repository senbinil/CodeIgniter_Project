<?php namespace App\Controllers;
 use CodeIgniter\Controller;

 class Faculty extends Controller
 {
     public function Pagger($page)
     {  
         $session=session();
         switch($page)
         {
            case "home":  echo view('userview/header');
                             echo view('userview/facultyview');
                             break;
         }

     }
 }


?>