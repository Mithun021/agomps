<?php

namespace App\Controllers;

use App\Models\Sports_model;
use App\Models\Sports_subcategory_model;
use App\Models\State_city_model;

class UniversalController extends BaseController
{
    public function findcity(){
        $state_city_model = new State_city_model();
        $state = $this->request->getPost('state');
        $data = $state_city_model->find_city($state);
        return $this->response->setJSON($data);
    }

    public function fetch_sports_subcategory(){
        $sports_subcategory_model = new Sports_subcategory_model();
        $sports_id = $this->request->getPost('sports_id');
        $data = $sports_subcategory_model->find_sports($sports_id);
        return $this->response->setJSON($data);
    }
}
