<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;

class HomePegawai extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home Pegawai',
            'menu' => 'home'
        ];
        echo view('pegawai_view/homePegawai', $data);
    }
}
