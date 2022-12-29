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

    public function get_id($id)
    {
        $user = $this->db->table('data_foto')
            ->where('user_idUser', $id)
            ->get()
            ->getRow();
        return $user;
    }
}
