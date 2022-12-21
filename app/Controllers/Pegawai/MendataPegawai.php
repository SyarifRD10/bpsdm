<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\DataM;
use App\Models\DataFotoM;
use App\Models\pegawaiM;

class MendataPegawai extends BaseController
{
    protected $Jwb;
    protected $Foto;
    public function __construct()
    {
        $this->Jwb = new pegawaiM();
        $this->Foto = new DataFotoM();
    }
    public function index()
    {
        $datas = $this->Foto->findAll();
        $data = [
            'title' => 'Mendata',
            'menu' => 'mendata',
            'data' => $datas,
            'validation' => \Config\Services::validation(),
        ];
        echo view('pegawai_view/mendataPegawai', $data);
    }
    public function save($id)
    {
        if (!$this->validate([
            'docJwb' => [
                'rules' => 'uploaded[docJwb]|max_size[docJwb,10024]|ext_in[docJwb,xls,xlt,xml,xlsx,xlsm]|mime_in[docJwb,application/xls,application/excel,application/msexcel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
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

        $fileFormat = $this->request->getFile('docJwb');
        $namaFile = $fileFormat->getName();
        $fileFormat->move('doc/dataPGW', $namaFile);

        $this->Jwb->save([
            'idpegawai' => $id,
            'docJwb' => $namaFile,
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

        $this->ModelFoto->save([
            'foto' => $namaFile,
            'nama' => $namain,
        ]);

        return redirect()->to('/mendatapgw')->with('pesan', 'Data berhasil disimpan');
    }
}
