<?php namespace App\Models;
use CodeIgniter\Model;


class Library extends Model{
    protected $table='library';
    protected $allowedFields=['upload_id','timelog','fileintro','fileHash','stat','cat'];
}



?>