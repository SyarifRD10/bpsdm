<?php

namespace App\Models;

use CodeIgniter\Model;

class pegawaiM extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'idpegawai';
    protected $allowedFields = ['namaPegawai', 'no_identitas', 'JK', 'idInstansi', 'user_idUser'];


    public function gabung()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('pegawai');
        $builder->join('instansi', 'instansi.idInstansi = pegawai.idInstansi');
        $query = $builder->get();

        return $query->getResult();
    }

    public function detailPegawai($id)
    {

        $builder = $this->db->table('pegawai');
        $builder->select('pegawai.*, instansi.*');
        $builder->join('instansi', 'instansi.idInstansi = pegawai.idInstansi');
        $builder->where('pegawai.idpegawai', $id);
        $query = $builder->get();
        return $query->getResult();



        // $builders = $this->db->table('pegawai');
        // $builders->join('instansi', 'instansi.idInstansi = pegawai.idInstansi');
        // $query = $builders->where('idpegawai', $id)->get();

        // return $query->getResult();
    }

    // public function show_d($table, $field)
    // {
    //     $data = $this->query("SHOW COLUMNS FROM" . $table . "WHERE `field` = " . $field);
    //     return $data;
    // }

    // function get_enum_values()
    // {
    //     $type = $this->db->query("SHOW COLUMNS FROM 'pegawai' WHERE Field = 'JK'");
    //     preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
    //     $enum = explode("','", $matches[1]);
    //     return $enum;
    // }
}
