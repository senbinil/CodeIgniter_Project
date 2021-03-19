<?php namespace App\Models;

use CodeIgniter\Model;


class TimeMachine extends Model
{
    protected $table='time_machine';
    protected $allowedFields=['user_id','timelog'];
}



?>