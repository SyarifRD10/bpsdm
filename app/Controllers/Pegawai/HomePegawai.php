<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\pegawaiM;

class HomePegawai extends BaseController
{
    protected $modelPegawai;
    public function __construct()
    {
        $this->modelPegawai = new pegawaiM();
    }
    public function index()
    {
        $pgw = $this->modelPegawai->findAll();
        $data = [
            'title' => 'Home Pegawai',
            'menu' => 'home',
            'pgws' => $pgw,
        ];
        echo view('pegawai_view/homePegawai', $data);
    }
}
