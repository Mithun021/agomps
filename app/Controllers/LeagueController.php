<?php

namespace App\Controllers;

class LeagueController extends BaseController
{
    public function league_session()
    {
        $data = ['title' => 'League Session'];
        if ($this->request->is('get')) {
            return view('admin/league-session',$data);
        }else if ($this->request->is('post')) {
            # code...
        }
    }

    public function league_category()
    {
        $data = ['title' => 'League Category'];
        if ($this->request->is('get')) {
            return view('admin/league-category',$data);
        }else if ($this->request->is('post')) {
            # code...
        }
    }
}
