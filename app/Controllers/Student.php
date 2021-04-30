<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Enrollment;
use App\Models\Course;



class student extends Controller{


    public function Pagger($page)
    {
        $studentdump=new Enrollment();
        $data_dump=$studentdump->select()->where('admin_no',session()->get('student_id'))->first();
        $cs_id=$data_dump['ug_course'];
        $course=new Course();
        $data_dump['course_dump']=$course->select(['course_name','no_sem','sem_fee'])->where('course_id',$cs_id)->first();
        switch($page)
        {
            case 'home':echo view('landing/header');
                        echo view('landing/student',$data_dump);
                        break;
        }
    }
}



?>