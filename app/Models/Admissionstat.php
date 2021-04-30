<?php namespace App\Models;

use CodeIgniter\Model;

class Admissionstat extends Model{
    protected $table='admissionlog';
    protected $allowedFields=['admintID','course_id','seat_no','Course','allotted','timelog','year','status'];
    
}


?>