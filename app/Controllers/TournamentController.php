<?php

namespace App\Controllers;

class TournamentController extends BaseController
{
    public function add_touranment()
    {
        $data = ['title' => 'Add Tournament'];
        if($this->request->is('get')){
            return view('admin/tournament/add-touranment',$data);
        }else if($this->request->is('post')){
            
        }
    }

    public function touranment_list()
    {
        $data = ['title' => 'Tournament List'];
        if($this->request->is('get')){
            return view('admin/tournament/touranment-list',$data);
        }else if($this->request->is('post')){
            
        }
    }
}
