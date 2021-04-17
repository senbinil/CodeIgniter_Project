<?php namespace App\Models;
use CodeIgniter\Model;

class Syllabus extends Model{
    protected $table='syllabus';
    protected $allowedFields=['CID','Name'];
}

?>