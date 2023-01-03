<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\FormatM;
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
        $this->Format = new FormatM();
        $this->Instansi = new instansiM();
        helper('form');
    }
    public function index()
    {

        $pegawai = $this->Pegawai->gabung();
        $inst = $this->Instansi->findAll();
        $dataFormat = $this->Format->findAll();

        $data = [
            'title' => 'Petugas | Dashboard Petugas',
            'subtitle' => 'Dashboard',
            'menu' => 'dashboard',
            'inst' => $pegawai,
            'dokFormat' => $dataFormat,
            'validation' => \Config\Services::validation(),
        ];
        return view('petugas_view/homePetugas', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'dok' => [
                'rules' => 'max_size[dok,2048]|mime_in[dok,application/xls,application/excel,application/msexcel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'errors' => [
                    'max_size' => 'Ukuran Format terlalu besar',
                    'mime_in' => 'Format Format tidak sesuai',
                ],
            ],
        ])) {

            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $userId = session()->get('idUser');

        $fileFormat = $this->request->getFile('dok');
        $namaFile = $fileFormat->getName();
        $fileFormat->move('doc', $namaFile);

        $data = [
            'dok' => $namaFile,
            'user_idUser' => $userId,
        ];
        // dd($data);
        $this->Format->save($data);

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

    public function deleteFormat($id)
    {
        $this->Format->delete($id);
        session()->setFlashdata('errors', 'Format berhasil dihapus');
        return redirect()->to('/home');
    }

}
