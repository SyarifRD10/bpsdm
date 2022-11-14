<?php

namespace App\Models;

use CodeIgniter\Model;

class DataM extends Model
{
    protected $table = 'data';
    protected $primaryKey = 'iddata';
    protected $allowedFields = ['nama_pegawai', 'dokumen1', 'dokumen2'];

    public function insert_file($data)
    {
        return $this->db->table('data')->insert($data);
    }

}
