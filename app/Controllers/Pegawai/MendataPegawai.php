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
            'data' => $datas
        ];
        echo view('pegawai_view/mendataPegawai', $data);
    }

    public function save()
    {
        $this->dataModel->save([
            'nama_pegawai' => $this->request->getVar('nama_pegawai')
        ]);

        // $data = $this->request->getPost();
        // $this->dataModel->insert($data);

        return redirect()->to(site_url('/mendatapgw'))->with('succes', 'Data berhasil disimpan');
    }
}
