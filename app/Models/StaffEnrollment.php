<?php namespace App\Models;
 use CodeIgniter\Model;


 class StaffEnrollment extends Model
 {
     protected $table='staffenroll';
     protected $allowedFields=['frm_no','apply_date','emp_name','dob','gender','nationality','cat','martial','exp','mobile','email','blod','caddress','paddress','education','spec','emp_type','department','desig','j_date','acc_no','bank_name','ifsc'];
     
 }


?>