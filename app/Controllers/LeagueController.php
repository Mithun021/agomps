<?php

namespace App\Controllers;

use App\Models\Sports_model;

class LeagueController extends BaseController
{
    public function league_session()
    {
        $sports_model = new Sports_model();
        $data = ['title' => 'League Session'];
        if ($this->request->is('get')) {
            return view('admin/league-session', $data);
        } else if ($this->request->is('post')) {
            
            
        }
    }

    public function league_category()
    {
        $data = ['title' => 'League Category'];
        if ($this->request->is('get')) {
            return view('admin/league-category', $data);
        } else if ($this->request->is('post')) {
            # code...
        }
    }
}
