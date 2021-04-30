<?php namespace App\Models;

use CodeIgniter\Model;

class Admission_rq extends Model{

    protected $table='admission_rq';
    protected $allowedFields=['application_id','guest_id','cat','option_1','option_2','option_3','timelog','fname','lname','admission_slot'];
}



?>