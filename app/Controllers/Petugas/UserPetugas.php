<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\UserPetugasM;

class UserPetugas extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserPetugasM();
    }

    public function index()
    {
        $user = $this->UserModel->findAll();

        $data = [
            'title' => 'Petugas | Data Pendata',
            'subtitle' => 'Data Pendata',
            'user' => $user,
            'menu' => 'datapegawai'
        ];


        echo view('petugas_view/userPetugas', $data);
    }
}
