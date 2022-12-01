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

        $query = $this->userModel->table('user')->getWhere(['email' => $post['email']]);
        $user = $query->getRow();
        if ($user) {
            if (password_verify($post['password'], $user->password)) {
                $params = ['idUser' => $user->idUser];
                session()->set($params);
                return redirect()->to(site_url('/home'));
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
        return redirect()->to(site_url('/'));
    }
}
