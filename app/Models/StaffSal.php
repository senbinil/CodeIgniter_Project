<?php namespace App\Models;

use CodeIgniter\Model;


class StaffSal extends Model
{
    protected $table='sallog';
    protected $allowedFields=['pay_id','emp_id','name','acc_no','ifsc','sal','month','yrs','pay_time'];
}



?>