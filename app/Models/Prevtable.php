<?php namespace App\Models;
use CodeIgniter\Model;

class Prevtable extends Model
{
    protected $table='role';
    protected $allowedFields=['role_id','role_name','access'];
}



?>