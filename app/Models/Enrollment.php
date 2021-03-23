<?php namespace App\Models;

use CodeIgniter\Model;

class Enrollment extends Model
{
    protected $table='studentenroll';
    protected $allowedFields=['admin_no','fname','lname','dob','blood_group','address','state','city','zip_code','gender','guard_fname','guard_lname','relation','gphone','year_pass','exroll_no','semester','e_mail','ug_course','prevcourse','remark'];
    
}



?>