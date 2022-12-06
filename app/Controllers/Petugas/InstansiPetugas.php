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
        $insts = $this->instansiModel->getInst($id);
        $data = [
            'title' => 'Petugas | Edit Data Instansi',
            'subtitle' => 'Edit Data Instansi',
            'menu' => 'instansi',
            'insts' => $insts,
            'validation' => \Config\Services::validation(),
        ];
        return view('petugas_view/edit_InstansiPetugas', $data);
    }

    public function update($id)
    {
        $this->instansiModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/addInstansi');
    }
}
