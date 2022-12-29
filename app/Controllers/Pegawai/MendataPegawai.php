<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\DataJwbM;
use App\Models\DataFotoM;

class MendataPegawai extends BaseController
{
    protected $Jwb;
    protected $Foto;
    public function __construct()
    {
        $this->Jwb = new DataJwbM();
        $this->Foto = new DataFotoM();
    }
    public function index()
    {
        // $mydata = $this->Foto->get_id($id);
        $userId = session()->get('idUser');
        $dat = $this->Foto->dataByUser($userId);
        // $datas = $this->Foto->findAll();
        $data = [
            'title' => 'Mendata',
            'menu' => 'mendata',
            'data' => $dat,
            'validation' => \Config\Services::validation(),
        ];



        echo view('pegawai_view/mendataPegawai', $data);
    }
    public function save()
    {
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

        $userss = session()->get('idUser');

        $this->Jwb->save([
            'data_jwb' => $namaFile,
            'user_idUser' => $userss,
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

        $fileFormat = $this->request->getFile('foto');
        $namaFile = $fileFormat->getName();
        $fileFormat->move('doc/foto', $namaFile);

        $users = session()->get('idUser');

        $this->Foto->save([
            'foto' => $namaFile,
            'nama' => $this->request->getVar('nama'),
            'user_idUser' => $users,
        ]);

        return redirect()->to('/mendatapgw')->with('pesan', 'Data berhasil disimpan');
    }

    public function delete($id)
    {
        $this->Foto->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/mendatapgw');
    }

    public function edit($id)
    {
        // $inst = $this->instansiModel->findAll();

        $data = [
            'title' => 'Mendata',
            'menu' => 'mendata',
            'fot' => $this->Foto->find($id),
            'validation' => \Config\Services::validation(),
        ];
        return view('pegawai_view/editFoto', $data);
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
