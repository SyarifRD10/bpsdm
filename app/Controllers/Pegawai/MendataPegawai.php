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

    public function edit($id = null)
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

    public function update()
    {

        // Ambil input dari form
        $id = $this->request->getPost('iddata_foto');
        $nama = $this->request->getPost('nama');
        $foto = $this->request->getFile('foto');

        // Validasi input
        if (!$this->validate([
            'nama' => 'required',
            'foto' => [
                'mime_in[foto,image/jpeg,image/png,image/gif]',
                'max_size[foto,10024]',
            ],
        ])) {
            // Tampilkan pesan error
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        // Update data di database

        $namaFile = $foto->getName();
        $foto->move('doc/foto', $namaFile);

        $users = session()->get('idUser');

        $data = [
            'id' => $id,
            'nama' => $nama,
            'foto' => $namaFile,
            'user_idUser' => $users,
        ];

        if (!$this->Foto->update($id, $data)) {
            echo $this->Foto->getError();
            die();
        }

        // if ($foto->getError() == 4) {
        //     // Jika foto tidak dipilih, abaikan update data foto
        //     $this->Foto->save($data);
        // } else {
        //     // Update data foto
        //     $data['foto'] = $foto->getName();
        //     $this->Foto->save($data);
        // }

        // Tampilkan pesan sukses
        return redirect()->to('/mendatapgw')->withInput()->with('message', 'Data berhasil diubah');
    }
}
