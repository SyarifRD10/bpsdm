<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserPetugasM;

class Signup extends BaseController
{
    protected $M_userPetugas;
    public function __construct()
    {
        $this->M_userPetugas = new UserPetugasM();
        helper('html');
    }

    public function index()
    {
        $datas = $this->M_userPetugas->get();
        // $datta = $this->M_userPetugas->enum_select('pegawai', 'agama');
        $datas['agama'] = $this->M_userPetugas->enum_select('pegawai', 'agama');
        // $datas = $this->M_userPetugas->show_d('pegawai', 'agama');
        // $datas = $this->M_userPetugas->getIndexData('pegawai');
        // $datas['pegawai'] = $this->M_userPetugas->get()->result();
        // $datas = form_dropdown('test', $this->db->enum_select('pegawai', 'agama'));
        // $enum = $this->M_userPetugas->show_d();
        $data = [
            'title' => 'LATSAR | Sign Up',
            'data' => $datas,
        ];
        echo view('Auth/regis', $data);
    }

    public function nambah()
    {
        $datas['agama'] = $this->M_userPetugas->enum_select('pegawai', 'agama');

    }

}
