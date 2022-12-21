<?php

use App\Models\AdminM;

function userLogin()
{

    $Pegawai = new AdminM();

    $db = \Config\Database::connect();
    return $db->table('user')->where('idUser', session('idUser'))->get()->getRow();
}

function anotherLogin()
{



    $db = \Config\Database::connect();
    return $db->table('admin')->where('user_idUser', session('idadmin'))->get()->getRow();
}
