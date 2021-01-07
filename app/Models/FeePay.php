<?php namespace App\Models;

use CodeIgniter\Model;


class FeePay extends Model
{
    protected $table='feelog';
    protected $allowedFields=['admin_no','semester','amount','payment_mode','phone'];
}






?>