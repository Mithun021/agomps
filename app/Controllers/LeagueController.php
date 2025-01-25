<?php

namespace App\Controllers;

use App\Models\League_category_model;
use App\Models\Sports_model;

class LeagueController extends BaseController
{
    public function league_session()
    {
        $league_category_model = new League_category_model();
        $sports_model = new Sports_model();
        $data = ['title' => 'League Session'];
        if ($this->request->is('get')) {
            $data['sports'] = $sports_model->getActiveData();
            return view('admin/league-session', $data);
        } else if ($this->request->is('post')) {
        }
    }

    public function league_category()
    {
        $league_category_model = new League_category_model();
        $sports_model = new Sports_model();
        $data = ['title' => 'League Category'];
        if ($this->request->is('get')) {
            $data['league_category'] = $league_category_model->get();
            $data['sports'] = $sports_model->getActiveData();
            return view('admin/league-category', $data);
        } else if ($this->request->is('post')) {
            $sportsPhoto = $this->request->getFile('league_category_image');
            if ($sportsPhoto->isValid() && ! $sportsPhoto->hasMoved()) {
                $sportsPhotoImageName = rand(0, 9999) . $sportsPhoto->getRandomName();
                $sportsPhoto->move(ROOTPATH . 'public/admin/uploads/league', $sportsPhotoImageName);
            } else {
                $sportsPhotoImageName = "";
            }
            $data = [
                'name' => $this->request->getPost('league_category_name'),
                'featured_image' => $sportsPhotoImageName,
                'sports_id' => $this->request->getPost('sports_category'),
                'status' => $this->request->getPost('status')
            ];
            $result = $league_category_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/league-category')->with('status', '<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/league-category')->with('status', '<div class="alert alert-danger" role="alert"> ' . $result . ' </div>');
            }
        }
    }
}
