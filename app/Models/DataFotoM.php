<?php

namespace App\Models;

use CodeIgniter\Model;

class DataFotoM extends Model
{
    protected $table = 'data_foto';
    protected $primaryKey = 'iddata_foto';
    protected $allowedFields = ['nama', 'foto', 'idpegawai'];

    public function insert_file($data)
    {
        return $this->db->table('data')->insert($data);
    }
}
