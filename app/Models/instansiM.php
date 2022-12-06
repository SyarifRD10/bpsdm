<?php

namespace App\Models;

use CodeIgniter\Model;

class instansiM extends Model
{
    protected $table = 'instansi';
    protected $primaryKey = 'idInstansi';
    protected $allowedFields = ['nama', 'alamat'];

    public function insert_file($data)
    {
        return $this->db->table('instansi')->insert($data);
    }

    public function showInst($id)
    {
    }

    public function getInst($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['idInstansi' => $id])->first();
    }
}
