<?php

namespace App\Models;

use CodeIgniter\Model;

class pegawaiM extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'idpegawai';
    protected $allowedFields = ['nama', 'no_identitas', 'JK', 'agama', 'tempat_lahir', 'tgl_lahir', 'email', 'idInstansi'];

    // public function show_d($table, $field)
    // {
    //     $data = $this->query("SHOW COLUMNS FROM" . $table . "WHERE `field` = " . $field);
    //     return $data;
    // }

    function get_enum_values()
    {
        $type = $this->db->query("SHOW COLUMNS FROM 'pegawai' WHERE Field = 'JK'");
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $enum = explode("','", $matches[1]);
        return $enum;
    }
}
