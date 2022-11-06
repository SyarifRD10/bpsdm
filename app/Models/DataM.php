<?php

namespace App\Models;

use CodeIgniter\Model;

class DataM extends Model
{
    protected $table      = 'data';
    protected $primaryKey = 'iddata';
    protected $allowedFields = ['nama_pegawai'];
}
