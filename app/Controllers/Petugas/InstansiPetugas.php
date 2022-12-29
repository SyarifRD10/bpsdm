<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\instansiM;

class InstansiPetugas extends BaseController
{
    protected $instansiModel;
    public function __construct()
    {
        $this->instansiModel = new instansiM();
        helper('form');
    }
    public function index()
    {
        $inst = $this->instansiModel->findAll();
        $data = [
            'title' => 'Petugas | Data Instansi',
            'subtitle' => 'Data Instansi',
            'menu' => 'instansi',
            'inst' => $inst,
            'validation' => \Config\Services::validation(),
        ];
        return view('petugas_view/instansiPetugas', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'lable' => 'Nama',
                'rules' => 'required|is_unique[instansi.nama]',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'is_unique' => '{field} telah digunakan. Tolong isi {field} baru'
                ]
            ],
            'alamat' => [
                'lable' => 'alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ]
        ])) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->instansiModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('/addInstansi');
    }

    public function delete($id)
    {
        $this->instansiModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/addInstansi');
    }

    public function edit($id)
    {
        // $inst = $this->instansiModel->findAll();

        $data = [
            'title' => 'Petugas | Edit Data Instansi',
            'subtitle' => 'Edit Data Instansi',
            'menu' => 'instansi',
            'insts' => $this->instansiModel->getInst($id),
            'validation' => \Config\Services::validation(),
        ];
        return view('petugas_view/edit_InstansiPetugas', $data);
    }

    public function update($id)
    {

        $data = [
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
        ];
        $this->instansiModel->save($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/addInstansi');
    }
}
