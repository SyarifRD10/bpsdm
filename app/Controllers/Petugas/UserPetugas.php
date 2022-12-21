<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\pegawaiM;
use App\Models\userM;

class UserPetugas extends BaseController
{
    protected $mPegawai;
    protected $mUser;
    public function __construct()
    {
        $this->mPegawai = new pegawaiM();
        $this->mUser = new userM();
    }

    public function index()
    {
        $pgw = $this->mPegawai->gabung();
        $user = $this->mUser->findAll();
        $data = [
            'title' => 'Petugas | Data Pendata',
            'subtitle' => 'Data Pendata',
            'pgw' => $pgw,
            'user' => $user,
            'menu' => 'datapegawai',
        ];

        echo view('petugas_view/userPetugas', $data);
    }
}
