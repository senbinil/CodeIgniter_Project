<?php namespace App\Models;

use CodeIgniter\Model;


class GuestRegister extends Model{
    protected $table='guest_register';
    protected $allowedFields=['password','hash','email','phone','active'];
    
}






?>