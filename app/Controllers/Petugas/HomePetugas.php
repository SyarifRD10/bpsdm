<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\AdminM;
use App\Models\instansiM;
use App\Models\pegawaiM;

class HomePetugas extends BaseController
{
    protected $Format;
    protected $Instansi;
    protected $Pegawai;
    public function __construct()
    {
        $this->Pegawai = new pegawaiM();
        $this->Format = new AdminM();
        $this->Instansi = new instansiM();
        helper('form');
    }
    public function index()
    {
        // $session = session();
        // $idUser = $session->get('idUser');
        // $get = $this->Format->getName($idUser);

        // $users = $this->Format->gabung();
        $pegawai = $this->Pegawai->gabung();
        $inst = $this->Instansi->findAll();
        // dd($pegawai);
        $data = [
            'title' => 'Petugas | Dashboard Petugas',
            'subtitle' => 'Dashboard',
            'menu' => 'dashboard',
            'inst' => $pegawai,
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

    public function detailPegawai($id = null)
    {
        $detail = $this->Pegawai->detailPegawai($id);

        // dd($detail);
        $data = [
            'title' => 'Petugas | Detail Data Pegawai',
            'subtitle' => 'Detail Data',
            'menu' => 'dashboard',
            'datas' => $detail,
        ];


        return view('petugas_view/detailPgw', $data);
    }
}
