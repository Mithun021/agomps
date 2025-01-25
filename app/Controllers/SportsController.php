<?php

namespace App\Controllers;

use App\Models\Sports_model;

class SportsController extends BaseController
{
    public function sports_category()
    {
        $sports_model = new Sports_model();
        $data = ['title' => 'Sports Category'];
        if ($this->request->is('get')) {
            return view('admin/sports-category',$data);
        }else if ($this->request->is('post')) {
            $sportsPhoto = $this->request->getFile('sports_category_image');
            if ($sportsPhoto->isValid() && ! $sportsPhoto->hasMoved()) {
                $sportsPhotoImageName = "admission" . $sportsPhoto->getRandomName();
                $sportsPhoto->move(ROOTPATH . 'public/admin/uploads/sports', $sportsPhotoImageName);
            } else {
                $sportsPhotoImageName = "";
            }
            $data = [
                'sports_category_name' => $this->request->getPost('sports_category_name'),
                'sports_category_image' => $sportsPhotoImageName,
                'sports_category_description' => $this->request->getPost('sports_category_description'),
                'status' => $this->request->getPost('status')
            ];
            $result = $sports_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/sports-category')->with('status','<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/sports-category')->with('status','<div class="alert alert-danger" role="alert"> '.$result.' </div>');
            }
        }
    }
}
