<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\AdminM;
use App\Models\instansiM;

class HomePetugas extends BaseController
{
    protected $Format;
    protected $Instansi;
    public function __construct()
    {
        $this->Format = new AdminM();
        $this->Instansi = new instansiM();
        helper('form');
    }
    public function index()
    {
        $session = session();
        $idUser = $session->get('idUser');
        $get = $this->Format->getName($idUser);

        // $users = $this->Format->gabung();
        $inst = $this->Instansi->findAll();
        $data = [
            'title' => 'Petugas | Dashboard Petugas',
            'subtitle' => 'Dashboard',
            'menu' => 'dashboard',
            'inst' => $inst,
            'user' => $get,
            'validation' => \Config\Services::validation(),
        ];
        return view('petugas_view/homePetugas', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'format' => [
                'rules' => 'max_size[format,2048]|mime_in[format,application/xls,application/excel,application/msexcel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'errors' => [
                    'max_size' => 'Ukuran Format terlalu besar',
                    'mime_in' => 'Format Format tidak sesuai'
                ]
            ]
        ])) {

            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $fileFormat = $this->request->getFile('format');
        $namaFile = $fileFormat->getName();
        $fileFormat->move('doc', $namaFile);

        $this->Format->save([
            'idadmin' => '1',
            'format' => $namaFile,
        ]);

        return redirect()->to('/home')->withInput()->with('pesan', 'Data berhasil disimpan');
    }
}
