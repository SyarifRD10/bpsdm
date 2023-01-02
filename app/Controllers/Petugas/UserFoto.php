<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\DataFotoM;
use App\Models\DataJwbM;

class UserFoto extends BaseController
{
    protected $Foto;
    protected $jwb;
    public function __construct()
    {
        $this->Foto = new DataFotoM();
        $this->jwb = new DataJwbM();
    }

    public function index()
    {
        $dokumen = $this->jwb->gabungDataByfk();
        $foto = $this->Foto->gabungIdUser();
        foreach ($foto as &$item) {
            $item->email = substr($item->email, 0, -10);
        }
        foreach ($dokumen as &$items) {
            $items->email = substr($items->email, 0, -10);
        }
        $data = [
            'title' => 'Petugas | Data Pendata',
            'subtitle' => 'Data Pendata',
            'datas' => $foto,
            'datass' => $dokumen,
            'menu' => 'datafoto',
        ];

        echo view('petugas_view/userFoto', $data);
    }
}
