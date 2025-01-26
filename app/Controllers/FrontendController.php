<?php

namespace App\Controllers;

use App\Models\Enroll_players_model;
use App\Models\Enroll_sports_model;
use App\Models\Players_model;
use App\Models\Sports_model;

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
                'status' => 0
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
        $enroll_sports_model = new Enroll_sports_model();
        $enroll_players_model = new Enroll_players_model();
        $players_model = new Players_model();
        $data = ['title' => 'Team Registration'];
        if ($this->request->is('get')) {
            $data['sports'] = $sports_model->getActiveData();
            return view('team-registration', $data);
        } else if ($this->request->is('post')) {
            $upload_jersey = $this->request->getFile('upload_jersey');
            if ($upload_jersey->isValid() && ! $upload_jersey->hasMoved()) {
                $upload_jerseyNewName = "jersey" . rand(0, 9999) . $upload_jersey->getRandomName();
                $upload_jersey->move(ROOTPATH . 'public/assets/images/upload', $upload_jerseyNewName);
            } else {
                $upload_jerseyNewName = "";
            }

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
                'coach_name' => $this->request->getPost('coach_name'),
                'coach_number' => $this->request->getPost('coach_number'),
                'jersey_photo' => $upload_jerseyNewName,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'status' => 0
            ];

            $teamPlayers = $this->request->getPost('player_name');
            $teamAges = $this->request->getPost('player_age');
            $teamJerseys = $this->request->getPost('player_jersey');

            // if ($teamPlayers) {
            //     foreach ($teamPlayers as $key => $value) {
            //         $data2 = [
            //             'player_id' => 1,
            //             'enroll_player_name' => $value,
            //             'enroll_player_age' => $teamAges[$key],
            //             'enroll_player_jersey_no' => $teamJerseys[$key],
            //         ];
            //         // $enroll_players_model->add($data2);
            //         echo "<pre>";print_r($data2);
            //     }
            // }
            // die;

            $result = $players_model->add($data);
            if ($result == true) {
                $player_id = $players_model->getInsertID();
                if ($teamPlayers) {
                    foreach ($teamPlayers as $key => $value) {
                        $data2 = [
                            'player_id' => $player_id,
                            'enroll_player_name' => $value,
                            'enroll_player_age' => $teamAges[$key],
                            'enroll_player_jersey_no' => $teamJerseys[$key],
                        ];
                        $enroll_players_model->add($data2);
                    }
                }

                $data3 = [
                    'player_id' => $player_id,
                    'sports_name' => 'Cricket'
                ];
                $enroll_sports_model->add($data3);
                return redirect()->to('team-registration')->with(
                    'status',
                    '<div class="alert alert-success" role="alert"> 
            <h4>Thank you for registering. <br> Below are your login credentials: <br> 
            User ID: ' . $userid . '<br> 
            Password: ' . $password . ' </h4>
        </div>'
                );
            } else {
                return redirect()->to('team-registration')->with(
                    'status',
                    '<div class="alert alert-danger" role="alert"> 
            <h4>' . $result . ' </h4>
        </div>'
                );
            }
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
