<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        echo view('templates/header');
        echo view('resources/guest-register-style');
        echo view('templates/body');

        echo view('register/guest-register');
        echo view('templates/footer');
    }
}




?>