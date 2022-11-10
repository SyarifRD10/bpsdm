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
    }
    public function index()
    {
        $data = [
            'title' => 'Petugas | Dashboard Petugas',
            'subtitle' => 'Dashboard',
            'menu' => 'dashboard'
        ];
        echo view('petugas_view/homePetugas', $data);
    }

    public function save()
    {
        // dd($this->request->getVar());
        dd('berhasil');
        $this->dataModel->save([
            'dokumen1' => $this->request->getVar('dokumen1')
        ]);

        return redirect()->to('/');

        // if (!$this->validate([
        //     'document' => 'uploaded[document]|max_size|[document]|mine_in[document,file/xlsx,file/xls]'
        // ])) {
        //     $validation = \Config\Services::validation();
        //     return redirect()->to('/')->withInput();
        // }
    }
}
