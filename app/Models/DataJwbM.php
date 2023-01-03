<?php

namespace App\Models;

use CodeIgniter\Model;

class DataJwbM extends Model
{
    protected $table = 'jwb';
    protected $primaryKey = 'iddata_jwb';
    protected $allowedFields = ['data_jwb', 'user_idUser'];

    public function insert_file($data)
    {
        return $this->db->table('data')->insert($data);
    }

    public function gabungDataByfk()
    {
        $builder = $this->db->table('jwb');
        $builder->select('jwb.*,user.*');
        $builder->join('user', 'user.idUser = jwb.user_idUser');
        $query = $builder->get();

        return $query->getResult();
    }
    public function dokByIdPegawai($id)
    {
        $builder = $this->db->table('jwb');
        $builder->where('user_idUser', $id);
        $query = $builder->get();

        return $query->getRow();
    }

    public function getFilesName($id)
    {
        $builder = $this->db->table('jwb');
        $builder->where('user_idUser', $id);
        $query = $builder->get();

        return $query->getRow();
    }
}
