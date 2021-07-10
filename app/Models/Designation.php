<?php namespace App\Models;
use CodeIgniter\Model;

class Designation extends Model
{
    protected $table='designation';
    protected $allowedFields=['pos_id','pos_name','role_id','salary'];
}



?>