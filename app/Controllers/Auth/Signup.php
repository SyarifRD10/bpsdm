<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\instansiM;
use App\Models\pegawaiM;
use App\Models\userM;

class Signup extends BaseController
{
    protected $M_Pegawai;
    protected $M_Inst;
    protected $M_User;
    public function __construct()
    {
        $this->M_Pegawai = new pegawaiM();
        $this->M_Inst = new instansiM();
        $this->M_User = new userM();
        helper('html');
    }

    public function index()
    {
        $data_I = $this->M_Inst->findAll();
        $db = $this->M_Pegawai->findAll();

        $data = [
            'title' => 'LATSAR | Sign Up',
            'dataI' => $data_I,
        ];
        echo view('Auth/regis', $data);
    }

    public function nambah()
    {
        $datas['agama'] = $this->M_userPetugas->enum_select('pegawai', 'agama');
    }
}
