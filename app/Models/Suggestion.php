<?php namespace App\Models;

use CodeIgniter\Model;

class Suggestion extends Model
{
    protected $table='suggest';
    protected $allowedFields=['sug_id','email_id','content','timestamp'];
}



?>