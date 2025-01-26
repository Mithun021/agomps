<?php

namespace App\Controllers;

use App\Models\Enroll_players_model;
use App\Models\Enroll_sports_model;
use App\Models\League_category_model;
use App\Models\Players_model;
use App\Models\Sports_model;
use App\Models\Tournament_model;

class FrontendController extends BaseController
{

    public function user_registration()
    {
        $players_model = new Players_model();
        $data = ['title' => 'User Registration'];
        if ($this->request->is('get')) {
            return view('user-registration', $data);
        } else if ($this->request->is('post')) {
            $userid = $this->request->getPost('mobile_number');
            $password = strtoupper($this->request->getPost('first_name')) . '123456';

            $data = [
                'first_name' => $this->request->getPost('first_name'),
                'middle_name' => $this->request->getPost('middle_name'),
                'last_name' => $this->request->getPost('last_name'),
                'mobile_number' => $this->request->getPost('mobile_number'),
                'whatsapp_number' => $this->request->getPost('whatsapp_number'),
                'email_address' => $this->request->getPost('email_address'),
                'age' => $this->request->getPost('age'),
                'gender' => $this->request->getPost('gender'),
                'aadhar' => $this->request->getPost('aadhar'),
                'state' => $this->request->getPost('state'),
                'city' => $this->request->getPost('city'),
                'pincode' => $this->request->getPost('pincode'),
                'full_address' => $this->request->getPost('full_address'),
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'status' => 1
            ];
            $result = $players_model->add($data);
            if ($result == true) {
                return redirect()->to('user-registration')->with(
                    'status',
                    '<div class="alert alert-success" role="alert"> 
            <h4>Thank you for registering. <br> Below are your login credentials: <br> 
            User ID: ' . $userid . '<br> 
            Password: ' . $password . ' </h4>
        </div>'
                );
            } else {
                return redirect()->to('user-registration')->with(
                    'status',
                    '<div class="alert alert-danger" role="alert"> 
            <h4>' . $result . ' </h4>
        </div>'
                );
            }
        }
    }

    public function team_registration()
    {
        $sports_model = new Sports_model();
        $players_model = new Players_model();
        $data = ['title' => 'Team Registration'];
        if ($this->request->is('get')) {
            $data['sports'] = $sports_model->getActiveData();
            return view('team-registration', $data);
        } else if ($this->request->is('post')) {
            
        }
    }

    public function select_league($id)
    {
        $league_category_model = new League_category_model();
        $data = ['title' => 'Select League', 'sports_id' => $id];
        $data['leagues'] = $league_category_model->getActiveData();
        return view('select-league', $data);
    }
    public function enroll_tournament($sports_id,$league_id){
        $enroll_sports_model = new Enroll_sports_model();
        $tournament_model = new Tournament_model();
        $data = ['title' => 'Enroll Tournament', 'sports_id' => $sports_id, 'league_id' => $league_id];
        if ($this->request->is('get')) {
            $data['tournaments'] = $tournament_model->getBySportsLeague($sports_id, $league_id);
            return view('enroll-tournament', $data);
        } else if ($this->request->is('post')) {
            
        }
    }


    public function privacy_policy()
    {
        $data = ['title' => 'Privacy Policy'];
        return view('privacy-policy', $data);
    }

    public function term_condition()
    {
        $data = ['title' => 'Term Conditions'];
        return view('term-condition', $data);
    }

    public function refund_policy()
    {
        $data = ['title' => 'Refund Policy'];
        return view('refund-policy', $data);
    }
}
