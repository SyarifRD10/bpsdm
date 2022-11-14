<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'LATSAR | Login',
        ];
        echo view('Auth/login', $data);
    }
}
