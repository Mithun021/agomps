<?php

namespace App\Controllers;

use App\Models\Game_category_model;
use App\Models\Sports_model;

class SportsController extends BaseController
{
    public function sports_category()
    {
        $sports_model = new Sports_model();
        $data = ['title' => 'Sports Category'];
        if ($this->request->is('get')) {
            $data['sports'] = $sports_model->get();
            return view('admin/sports-category',$data);
        }else if ($this->request->is('post')) {
            $sportsPhoto = $this->request->getFile('sports_category_image');
            if ($sportsPhoto->isValid() && ! $sportsPhoto->hasMoved()) {
                $sportsPhotoImageName = rand(0,9999) . $sportsPhoto->getRandomName();
                $sportsPhoto->move(ROOTPATH . 'public/admin/uploads/sports', $sportsPhotoImageName);
            } else {
                $sportsPhotoImageName = "";
            }
            $data = [
                'name' => $this->request->getPost('sports_category_name'),
                'sports_image' => $sportsPhotoImageName,
                'description' => $this->request->getPost('sports_category_description'),
                'status' => $this->request->getPost('sports_category_status')
            ];
            $result = $sports_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/sports-category')->with('status','<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/sports-category')->with('status','<div class="alert alert-danger" role="alert"> '.$result.' </div>');
            }
        }
    }

    public function game_category()
    {
        $game_category_model = new Game_category_model();
        $data = ['title' => 'Game Category'];
        if ($this->request->is('get')) {
            $data['game_category'] = $game_category_model->get();
            return view('admin/game-category',$data);
        }else if ($this->request->is('post')) {
            
            $data = [
                'game_category' => $this->request->getPost('game_category_name'),
            ];
            $result = $game_category_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/game-category')->with('status','<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/game-category')->with('status','<div class="alert alert-danger" role="alert"> '.$result.' </div>');
            }
        }
    }

}
