<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPetugasM extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'idpegawai';

    // public function show_d($table, $field)
    // {
    //     $data = $this->query("SHOW COLUMNS FROM" . $table . "WHERE `field` = " . $field);
    //     return $data;
    // }

    public function enum_select($table, $field)
    {

        $query = "SHOW COLUMNS FROM " . $table . " LIKE '$field'";
        $row = $this->query("SHOW COLUMNS FROM " . $table . " LIKE '$field'")->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all($regex, $row, $enum_array);
        $enum_fields = $enum_array[6];
        foreach ($enum_fields as $key => $value) {
            $enums[$value] = $value;
        }
        return $enums;
    }
}
