<?php namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table='adminlog';
    protected $allowedFields=['username','password','email_id'];

}





?>