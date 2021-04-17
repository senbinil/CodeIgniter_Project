<?php namespace App\Models;
use CodeIgniter\Model;

class Subject extends Model{
    protected $table='subject';
    protected $allowedFields=['CSID','name','cat','sub1','sub2','sub3','sub4','sub5'];
    
}



?>