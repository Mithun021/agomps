<?php

namespace App\Controllers;

use App\Models\League_category_model;
use App\Models\League_session_model;
use App\Models\Sports_model;

class TournamentController extends BaseController
{
    public function add_tournament()
    {
        $sports_model = new Sports_model();
        $league_session_model = new League_session_model();
        $league_category_model = new League_category_model();
        $data = ['title' => 'Add Tournament'];
        if($this->request->is('get')){
            $data['sports'] = $sports_model->getActiveData();
            $data['league_session'] = $league_session_model->getActiveData();
            $data['league_category'] = $league_category_model->getActiveData();
            return view('admin/tournament/add-tournament',$data);
        }else if($this->request->is('post')){
            
        }
    }

    public function tournament_list()
    {
        $data = ['title' => 'Tournament List'];
        if($this->request->is('get')){
            return view('admin/tournament/tournament-list',$data);
        }else if($this->request->is('post')){
            
        }
    }
}
