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
    }

    public function index()
    {
        $datas = $this->M_userPetugas->get();
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

}
