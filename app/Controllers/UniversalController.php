<?php

namespace App\Controllers;

use App\Models\Sports_model;
use App\Models\State_city_model;

class UniversalController extends BaseController
{
    public function findcity(){
        $state_city_model = new State_city_model();
        $state = $this->request->getPost('state');
        $data = $state_city_model->find_city($state);
        return $this->response->setJSON($data);
    }
}
