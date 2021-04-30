<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\StaffEnrollment;
use App\Models\Designation;
use App\Models\StaffSal;


class Staff extends Controller{
    public  function Pagger($page){
        $staffdetails=new StaffEnrollment();
        $staffSal=new StaffSal();
        $designation=new Designation();
        $del=$staffdetails->select()->where('emp_id',session()->get('D_staff'))->first();
        $desig=$designation->select(['pos_name','salary'])->where('pos_id',$del['desig'])->first();
        $del['desig_name']=$desig;
        $del['salarydel']=$staffSal->select()->where('emp_id',session()->get('D_staff'))->findAll();
        $del['lastsal']=$staffSal->select()->where('emp_id',session()->get('D_staff'))->orderBy('pay_time','DESC')->first();
        switch($page){
            case 'home':echo view('landing/header');
                        echo view('landing/staff',$del);
                        break;
        }
    }
}



?>