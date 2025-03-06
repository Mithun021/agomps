<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'User Dashboard'];
        return view('users/index',$data);
    }
}
