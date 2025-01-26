<?php

namespace App\Controllers;

use App\Models\Sports_model;

class UniversalController extends BaseController
{
    public function get_sports_category()
    {
        $sports_model = new Sports_model();
        $league_id = $this->request->getPost('league_id');
        $data = $sports_model->where('league_id', $league_id)->findAll();

        return view('index');
    }
}
