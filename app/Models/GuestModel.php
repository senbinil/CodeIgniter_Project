<?php namespace App\Models;
use CodeIgniter\Model;


class GuestModel extends Model{
    protected $table='guest';
    protected $allowedFields=['GID','fname','lname','gender','dob','blood_group','address','state','city','pincode','gfname','glname','relation','year_pass','prevcat','sub1','sub2','sub3','sub4','sub5','prevreg','CSID','prev_syllabus'];
}


?>