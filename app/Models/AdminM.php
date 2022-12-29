<?php

namespace App\Models;

use CodeIgniter\Model;


class AdminM extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'idadmin';
    protected $allowedFields = ['format', 'user_idUser'];

    public function insert_file($data)
    {
        return $this->db->table('admin')->insert($data);
    }

    public function gabung()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('admin');
        $builder->join('user', 'user.idUser = admin.user_idUser');
        $query = $builder->get();

        return $query->getResult();
    }

    public function getName($idUser)
    {

        $builder = $this->db->table('admin');
        $builder->select('admin.*');
        $builder->where('admin.namaAdmin', $idUser);

        return $builder->get()->getResultArray();
    }
}
