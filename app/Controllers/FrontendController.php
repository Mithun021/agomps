<?php

namespace App\Controllers;

use App\Models\Enroll_tournament_model;
use App\Models\Enroll_tournament_players_model;
use App\Models\League_category_model;
use App\Models\League_session_model;
use App\Models\Players_model;
use App\Models\Sports_model;
use App\Models\State_city_model;
use App\Models\Tournament_model;

class FrontendController extends BaseController
{

    public function user_registration()
    {
        $state_city_model = new State_city_model();
        $players_model = new Players_model();
        $data = ['title' => 'User Registration'];
        if ($this->request->is('get')) {
            $data['state'] = $state_city_model->get_state();
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
            if ($result === true) {
                // Assuming the user ID is generated after insertion, so you can fetch it like this (if auto-incremented).
                //$userid = $players_model->getInsertID();  // Or however you retrieve the user ID
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
    public function enroll_tournament($tournament_id)
    {
        $tournament_model = new Tournament_model();
        $enroll_tournament_model = new Enroll_tournament_model();
        $enroll_tournament_players_model = new Enroll_tournament_players_model();
        $data = ['title' => 'Enroll Tournament', 'tournament_id' => $tournament_id];
        $sessionData = session()->get('loggedPlayerData');
        if ($sessionData) {
            $loggedplayerId = $sessionData['loggedplayerId'];
        }
        if ($this->request->is('get')) {
            $data['tournaments'] = $tournament_model->get($tournament_id);
            // print_r($data['enroll_tournament']); die;
            return view('enroll-tournament', $data);
        } else if ($this->request->is('post')) {
            $data = [
                'tournament_id' => $tournament_id,
                'player_id' => $this->request->getPost('player_id'),
                'team_name' => $this->request->getPost('team_name'),
                'registration_status' => 1,
                'payment_screenshot' => "invalid.png"
            ];
            $teamPlayers = $this->request->getPost('player_name');
            $teamAges = $this->request->getPost('player_age');
            $player_mobileno = $this->request->getPost('player_mobileno');
            $result = $enroll_tournament_model->add($data);
            if ($result === true) {
                $insert_id = $enroll_tournament_model->getInsertID();
                if (!empty($teamPlayers)) {
                    foreach ($teamPlayers as $key => $value) {
                        $data2 = [
                            'enroll_tournament_id' => $insert_id,
                            'enroll_player_name' => $value,
                            'enroll_player_age' => $teamAges[$key],
                            'enroll_player_mobile_number' => $player_mobileno[$key],
                        ];
                        $enroll_tournament_players_model->add($data2);
                    }
                }
                return redirect()->to('enroll-tournament/' . $tournament_id)->with('status', '<div class="alert alert-success" role="alert"> Thank you for registering! Your team registration has been successfully completed. You can now proceed with the payment to enroll your team in AGOMPS UPPL. </div>');
            }else{
                return redirect()->to('enroll-tournament/' . $tournament_id)->with('status', '<div class="alert alert-danger" role="alert"> ' . $result . ' </div>');
            }

        }
    }

    public function enroll_tournament_payment($enroll_tournament_id)
    {
        $enroll_tournament_model = new Enroll_tournament_model();
        $find_tournament_id = $enroll_tournament_id->get($enroll_tournament_id);
        $payment_screenshot = $this->request->getFile('payment_screenshot');
        if ($payment_screenshot->isValid() && ! $payment_screenshot->hasMoved()) {
            $payment_screenshotImageName = "payment" . $payment_screenshot->getRandomName();
            $payment_screenshot->move(ROOTPATH . 'public/admin/uploads/payment', $payment_screenshotImageName);
        } else {
            $payment_screenshotImageName = "";
        }
        $data = [
            'payment_screenshot' => $payment_screenshotImageName,
            'enroll_payment' => $this->request->getPost('tournament_payment'),
            'payment_status' => 1
        ];
        $result = $enroll_tournament_model->add($data, $enroll_tournament_id);
        if ($result === true) {
            return redirect()->to('enroll-tournament/' . $find_tournament_id['tournament_id'])->with('status', '<div class="alert alert-success" role="alert"> Thank you for successfully completing your payment and enrolling in the tournament. Your registration has been confirmed, and our team will be in touch with you shortly. </div>');
        } else {
            return redirect()->to('enroll-tournament/' . $find_tournament_id['tournament_id'])->with('status', '<div class="alert alert-danger" role="alert"> ' . $result . ' </div>');
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
