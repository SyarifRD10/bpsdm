<?php

namespace App\Models;

use CodeIgniter\Model;

class DataFotoM extends Model
{
    protected $table = 'data_foto';
    protected $primaryKey = 'iddata_foto';
    protected $allowedFields = ['nama', 'foto', 'user_idUser'];

    public function insert_file($data)
    {
        return $this->db->table('data')->insert($data);
    }

    public function dataByUser($userId)
    {
        // $user = $this->db->table('data_foto')
        //     ->where('user_idUser', $userId)
        //     ->get()
        //     ->getRow();
        // return $user;

        return $this->where('user_idUser', $userId)->findAll();
    }

    public function dataByIdPegawai($id)
    {
        $builder = $this->db->table('data_foto');
        $builder->where('user_idUser', $id);
        $query = $builder->get();

        return $query->getRow();
    }

    public function gabungIdUser()
    {
        $builder = $this->db->table('data_foto');
        $builder->select('data_foto.*,user.*');
        $builder->join('user', 'user.idUser = data_foto.user_idUser');
        $query = $builder->get();

        return $query->getResult();
    }
}
