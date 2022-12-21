<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\instansiM;
use App\Models\pegawaiM;
use App\Models\userM;

class Signup extends BaseController
{
  protected $M_Pegawai;
  protected $M_Inst;
  protected $M_User;
  public function __construct()
  {
    $this->M_Pegawai = new pegawaiM();
    $this->M_Inst = new instansiM();
    $this->M_User = new userM();
    helper('html');
  }

  public function index()
  {
    $data_I = $this->M_Inst->findAll();
    // $db = $this->M_Pegawai->findAll();

    if (session('idUser')) {

      return redirect()->to(site_url('/home'));
    }

    $data = [
      'title' => 'LATSAR | Sign Up',
      'dataI' => $data_I,
    ];
    echo view('Auth/regis', $data);
  }

  public function save()
  {

    // $datas['agama'] = $this->M_userPetugas->enum_select('pegawai', 'agama');
    if (!$this->validate([
      'namaPegawai'  => [
        'lable' => 'Nama Pegawai',
        'rules' => 'required|is_unique[pegawai.namaPegawai]',
        'errors' => [
          'required' => '{field} wajib diisi!!',
          'is_unique' => '{field} telah pernah digunakan'
        ],
      ],
      'no_identitas'  => [
        'lable' => 'NIK',
        'rules' => 'required|is_unique[pegawai.no_identitas]',
        'errors' => [
          'required' => '{field} wajib diisi!!',
          'is_unique' => '{field} telah pernah digunakan'
        ],
      ],
      'JK'  => [
        'lable' => 'Jenis Kelamin',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} wajib diisi!!',
        ],
      ],
      'idInstansi'  => [
        'lable' => 'Instansi',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} wajib dipilih!!',
        ],
      ],
      'email'  => [
        'lable' => 'Email',
        'rules' => 'required|is_unique[user.email]',
        'errors' => [
          'required' => '{field} wajib diisi!!',
          'is_unique' => '{field} telah pernah digunakan'
        ],
      ],
      'password' => [
        'lable' => 'Password',
        'rules'  => 'required|min_length[3]',
        'errors' => [
          'min_length' => '{field} tidak boleh kurang dari 3',
          'required' => '{field} wajib diisi!!',
        ]
      ],
      'repassword' => [
        'lable' => 'Retype Password',
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => '{field} wajib diisi!!',
          'matches' => '{field} tidak cocok dengan password'
        ]
      ]
    ])) {
      // jika tidak valid
      $err = $this->validator->listErrors();
      // session()->setFlashdata('errors', $this->validator->listErrors());
      return redirect()->back()->withInput()->with('errors', $err);
    }
    $this->M_Pegawai->save([
      'namaPegawai' => $this->request->getVar('namaPegawai'),
      'no_identitas' => $this->request->getVar('no_identitas'),
      'JK' => $this->request->getVar('JK'),
      'idInstansi' => $this->request->getVar('idInstansi'),

    ]);


    $this->M_User->save([
      'email' => $this->request->getVar('email'),
      'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
      'level' => '2',
      'idpegawai' => ''
    ]);


    // // session()->setFlashdata();
    return redirect()->to('/signin')->withInput()->with('login', 'Data berhasil diisi!! Silahkan login');
    // return redirect()->back()->withInput()->with('errors', 'Signup berhasil');
  }
}
