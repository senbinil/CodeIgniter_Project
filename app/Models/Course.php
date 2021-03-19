<?php namespace App\Models;
use CodeIgniter\Model;


class Course extends Model{
    protected $table='ugcourse';
    protected $allowedFields=['course_id','course_name','sem_fee','no_sem'];
}
?>