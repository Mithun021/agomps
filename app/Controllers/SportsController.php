<?php

namespace App\Controllers;

class SportsController extends BaseController
{
    public function sports_category()
    {
        $data = ['title' => 'Sports Category'];
        if ($this->request->is('get')) {
            return view('admin/sports-category',$data);
        }else if ($this->request->is('post')) {
            # code...
        }
    }
}
