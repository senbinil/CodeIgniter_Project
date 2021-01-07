<?php namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table='bulletin';
    protected $allowedFields=['msg_id','msg_cat'];
}