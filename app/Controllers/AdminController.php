<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Home'];
        return view('admin/index', $data);
    }

    public function admin_login()
    {
        $data = ['title' => 'Admin Login'];
        if ($this->request->is('get')) {
            return view('admin/login', $data);
        }else if ($this->request->is('post')) {

        }
    }
}
