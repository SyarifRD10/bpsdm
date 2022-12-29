<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\DataJwbM;
use App\Models\DataFotoM;
use App\Models\instansiM;

class MendataPegawai extends BaseController
{
    protected $ins;
    protected $Jwb;
    protected $Foto;
    public function __construct()
    {
        $this->ins = new instansiM();
        $this->Jwb = new DataJwbM();
        $this->Foto = new DataFotoM();
    }
    public function index($id = null)
    {
        if (isset($id)) {
            $mydata = $this->Foto->get_id($id);
            $dat = $this->ins->findAll();
            // $datas = $this->Foto->findAll();
            $data = [
                'title' => 'Mendata',
                'menu' => 'mendata',
                'data' => $mydata,
                'dataI' => $dat,
                'validation' => \Config\Services::validation(),
            ];

            return view('pegawai_view/mendataPegawai', $data);
        }

        $dat = $this->ins->findAll();
        $data = [
            'title' => 'Mendata',
            'menu' => 'mendata',
            'dataI' => $dat,
            'data' => null,
            'validation' => \Config\Services::validation(),
        ];
        echo view('pegawai_view/mendataPegawai', $data);
    }
    public function save($id = null)
    {
        if (!isset($id)) {
            // $dat = $this->ins->findAll();
            // $datas = $this->Foto->findAll();
            // $data = [
            //     'title' => 'Mendata',
            //     'menu' => 'mendata',
            //     'data' => $datas,
            //     'dataI' => $dat,
            //     'validation' => \Config\Services::validation(),
            // ];
            return redirect()->to('/mendatapgw');
        }

        if (!$this->validate([
            'data_jwb' => [
                'rules' => 'uploaded[data_jwb]|max_size[data_jwb,10024]|ext_in[data_jwb,xls,xlt,xml,xlsx,xlsm]|mime_in[data_jwb,application/xls,application/excel,application/msexcel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'errors' => [
                    'uploaded' => 'File tidak boleh sama denga yang ada',
                    'max_size' => 'Ukuran dokumen terlalu besar',
                    'ext_in' => 'Format file tidak sesuai Kax',
                    'mime_in' => 'Format file tidak sesuai',
                ],
            ],
        ])) {

            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $fileFormat = $this->request->getFile('data_jwb');
        $namaFile = $fileFormat->getName();
        $fileFormat->move('doc/dataPGW', $namaFile);

        $this->Jwb->save([
            '' => $id,
            'data_jwb' => $namaFile,
        ]);

        return redirect()->to('/mendatapgw')->with('pesan', 'Data berhasil disimpan');
    }

    public function simpan()
    {
        if (!$this->validate([
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,10024]|mime_in[foto,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} tidak boleh sama dengan yang ada',
                    'max_size' => 'Ukuran {field} terlalu besar',
                    'mime_in' => 'Format {field} tidak sesuai',
                ],
            ],
            'nama' => [
                'label' => 'Nama pemilik foto',
                'rules' => 'required|is_unique[data_foto.nama]',
                'errors' => [
                    'is_unique' => '{field} tidak boleh sama dengan yang ada',
                    'required' => '{field} wajib diisi',

                ],
            ],
        ])) {

            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $namain = $this->request->getVar('nama');
        $fileFormat = $this->request->getFile('foto');
        $namaFile = $fileFormat->getName();
        $fileFormat->move('doc/foto', $namaFile);
        $idins = $this->request->getVar('idInstansi');

        $this->Foto->save([
            'foto' => $namaFile,
            'nama' => $namain,
            'instansi_idInstansi' => $idins,
        ]);

        return redirect()->to('/mendatapgw/$idins')->with('pesan', 'Data berhasil disimpan');
    }
}
