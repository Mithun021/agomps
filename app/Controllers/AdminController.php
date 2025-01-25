<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Home'];
        return view('admin/index',$data);
    }
}
