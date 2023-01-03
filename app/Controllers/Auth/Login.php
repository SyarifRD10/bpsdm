<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\userM;

class Login extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new userM();
        helper('form');
    }
    public function index()
    {
        return redirect()->to(site_url('\login'));
    }

    public function login()
    {

        $data = [
            'title' => 'LATSAR | Login',
            'login' => \Config\Services::validation(),
        ];

        if (session('idUser')) {

            return redirect()->to(site_url('/home'));
        }

        echo view('Auth/login', $data);
    }

    public function loginProcess()
    {
        // echo "Lanjut gan!";
        $post = $this->request->getPost();

        $email = $post['email'];
        $password = $post['password'];
        $user = $this->userModel->getUser($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {

                $data = [
                    'idUser' => $user['idUser'],
                    'email' => $user['email'],
                    'level' => $user['level'],
                ];

                session()->set($data);

                if (session()->get('level') != 1) {
                    return redirect()->to('/mendatapgw');
                }
                return redirect()->to('/home');
            } else {
                return redirect()->back()->with('error', 'Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
        //return redirect()->to(site_url(''));
    }

    public function logout()
    {
        session()->remove('idUser');
        return redirect()->to(site_url('/signin'));
    }
}
