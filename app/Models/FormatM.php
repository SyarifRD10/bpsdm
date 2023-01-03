<?php

namespace App\Models;

use CodeIgniter\Model;

class FormatM extends Model
{
    protected $table = 'format';
    protected $primaryKey = 'idFormat';
    protected $allowedFields = ['dok'];

    public function insert_file($data)
    {
        return $this->db->table('format')->insert($data);
    }

    public function gabung()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('format');
        $builder->join('user', 'user.idUser = format.user_idUser');
        $query = $builder->get();

        return $query->getResult();
    }

}
