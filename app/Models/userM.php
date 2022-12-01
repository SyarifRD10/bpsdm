<?php

namespace App\Models;

use CodeIgniter\Model;

class userM extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'idUser';
    protected $allowedFields = ['namaUser', 'email', 'password', 'level'];

    public function insert_file($data)
    {
        return $this->db->table('data')->insert($data);
    }

}
