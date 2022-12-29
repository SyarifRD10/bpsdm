<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Connection;
use CodeIgniter\Model;

class DataJwbM extends Model
{
    protected $table = 'data_jwb';
    protected $primaryKey = 'iddata_jwb';
    protected $allowedFields = ['data_jwb',  'user_idUser'];

    public function insert_file($data)
    {
        return $this->db->table('data')->insert($data);
    }

    // public function jon()
    // {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('data_jwb');
    //     $builder->join('instansi', 'instansi.idInstansi = data_jwb.instansi_idInstansi');
    //     $query = $builder->get();

    //     return $query->getResult();
    // }
}
