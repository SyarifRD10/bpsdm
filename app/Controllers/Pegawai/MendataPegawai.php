<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\DataM;

class MendataPegawai extends BaseController
{
    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new DataM();
    }
    public function index()
    {
        $datas = $this->dataModel->findAll();
        $data = [
            'title' => 'Mendata',
            'menu' => 'mendata',
            'data' => $datas,
        ];
        echo view('pegawai_view/mendataPegawai', $data);
    }

}
