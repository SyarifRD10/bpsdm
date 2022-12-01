<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\DataM;

class HomePetugas extends BaseController
{
    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new DataM();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Petugas | Dashboard Petugas',
            'subtitle' => 'Dashboard',
            'menu' => 'dashboard',
            'validation' => \Config\Services::validation(),
        ];
        return view('petugas_view/homePetugas', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'dokumen1' => [
                'rules' => 'uploaded[dokumen1]|max_size[dokumen1,10024]|ext_in[dokumen1,xls,xlt,xml,xlsx,xlsm]|mime_in[dokumen1,application/xls,application/excel,application/msexcel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'errors' => [
                    'uploaded' => 'File tidak boleh sama denga yang ada',
                    'max_size' => 'Ukuran dokumen terlalu besar',
                    'ext_in' => 'Format file tidak sesuai Kax',
                    'mime_in' => 'Format file tidak sesuai',
                ],
            ],
        ])) {

            session()->setFlashdata('validation', $this->validator->listErrors());
            return redirect()->back()->withInput();

            // $validation = \Config\Services::validation();
            // return redirect()->to('/')->withInput()->with('validation', $validation);

        }

        $fileFormat = $this->request->getFile('dokumen1');
        $namaFile = $fileFormat->getRandomName();
        $fileFormat->move('doc', $namaFile);

        // $namaFile = $fileFormat->getName();

        $this->dataModel->save([
            'dokumen1' => $namaFile,
        ]);

        // session()->setFlashdata('pesan', )
        return redirect()->to('/')->with('succes', 'Data berhasil disimpan');
        // return redirect()->to(site_url('/'))->withInput()->with('validation', $validation);
        // $data = $this->request->getPost();
        // $this->dataModel->insert($data);

    }

}
