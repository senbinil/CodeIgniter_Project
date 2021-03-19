<?php namespace App\Models;

use CodeIgniter\Model;

class StaffLogin extends Model
{
    protected $table='staff_log';
    protected $allowedFields=['emp_id','email','password'];
}



?>