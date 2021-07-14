<?php namespace App\Models;
use CodeIgniter\Model;

class Studlogin extends Model
{
    protected $table='student_log';
    protected $allowedFields=['student_id','pass','email'];
}

?>