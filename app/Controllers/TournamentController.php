<?php

namespace App\Controllers;

class TournamentController extends BaseController
{
    public function add_tournament()
    {
        $data = ['title' => 'Add Tournament'];
        if($this->request->is('get')){
            return view('admin/tournament/add-tournament',$data);
        }else if($this->request->is('post')){
            
        }
    }

    public function touranment_list()
    {
        $data = ['title' => 'Tournament List'];
        if($this->request->is('get')){
            return view('admin/tournament/tournament-list',$data);
        }else if($this->request->is('post')){
            
        }
    }
}
