<?php

namespace App\Controllers;

use App\Models\Enroll_tournament_model;
use App\Models\Enroll_tournament_players_model;
use App\Models\Investment_model;
use App\Models\Investment_plan_model;
use App\Models\League_category_model;
use App\Models\League_session_model;
use App\Models\Players_model;
use App\Models\Sports_model;
use App\Models\Sports_subcategory_model;
use App\Models\State_city_model;
use App\Models\Tournament_model;
use Exception;
use Razorpay\Api\Api;
helper('dotenv');

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
            $email_address = $this->request->getPost('email_address');

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

                $email = \Config\Services::email();
                $email->setFrom('contact@agomps.com', 'AGOMPS');
                $email->setTo($email_address);
                $email->setSubject('Welcome to AGOMPS!');
                $email->setMessage('
                    <html>
                    <body>
                        <h1>Welcome to AGOMPS!</h1>
                        <p>Dear User,</p>
                        <p>Thank you for successfully creating your account with <strong>AGOMPS INDIA</strong>! We are excited to have you with us.</p>
                        <p><strong>Your Account Details:</strong></p>
                        <p><strong>User ID:</strong> ' . $userid . '</p>
                        <p><strong>Password:</strong> ' . $password . '</p>
                        <p>For security purposes, we recommend updating your password after logging in for the first time.</p>
                        <p>If you have any questions or need assistance, please do not hesitate to contact us. We are here to help!</p>
                        <p>Thank you for choosing AGOMPS INDIA, and we look forward to serving you!</p>
                        <br>
                        <p>Best regards,</p>
                        <p><strong>AGOMPS Team</strong></p>
                    </body>
                    </html>
                ');        
                $email->send();        

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
        $sports_model = new Sports_model();
        $sports_subcategory_model = new Sports_subcategory_model();
        $players_model = new Players_model();
        $tournament_model = new Tournament_model();
        $enroll_tournament_model = new Enroll_tournament_model();
        $enroll_tournament_players_model = new Enroll_tournament_players_model();
        $data = ['title' => 'Enroll Tournament', 'tournament_id' => $tournament_id];
        $sessionData = session()->get('loggedPlayerData');
        if ($sessionData) {
            $loggedplayerId = $sessionData['loggedplayerId'];
        }
        if ($this->request->is('get')) {
            $title['title'] = 'Home';
            if(!isset($sessionData)){
                session()->setFlashdata('alert', '<div class="alert alert-success" role="alert">Account not found! Please log in you account first.</div>');
                return redirect()->to('/');
            }

            $data['tournaments'] = $tournament_model->get($tournament_id);
            // print_r($data['enroll_tournament']); die;
            return view('enroll-tournament', $data);
        } else if ($this->request->is('post')) {
            $player = $players_model->get($loggedplayerId);
            $tournaments = $tournament_model->get($tournament_id);
            
            $player_name = $player['first_name'];
            $player_email = $player['email_address'];
            $sport = $sports_model->get($tournaments['sports_id'])['name'] ?? '';
            $sport_subcat = $sports_subcategory_model->get($tournaments['sport_subcategory'])['sub_category_name'] ?? '';
            $game_for = $tournaments['league_for'];
            $data = [
                'tournament_id' => $tournament_id,
                'player_id' => $this->request->getPost('player_id'),
                'team_name' => $this->request->getPost('team_name') ?? '',
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

                // ------------ Mail Integration -----------------------------
                $email = \Config\Services::email();
                $email->setFrom('contact@agomps.com', 'AGOMPS');
                $email->setTo($player_email);
                $email->setSubject('Successful Enrollment in AGOMPS '.$sport. ' ' . $sport_subcat .' Tournament');

                // HTML message with embedded content
                $email->setMessage('
                    <html>
                    <body>
                        <h5>Successful Enrollment in AGOMPS '.$sport. ' ' . $sport_subcat .' for ' . $game_for .' Tournament</h5>
                        <p>Dear '.$player_name.',</p>
                        <p>We are excited to inform you that your team has successfully enrolled in the <strong>AGOMPS '.$sport. ' ' . $sport_subcat .' Tournament for ' . $game_for .'</strong>!</p>
                        <p>To confirm your team’s participation, please proceed with the payment at your earliest convenience through our portal. Once the payment is made, kindly confirm by completing the process on our portal.</p>
                        <p>If you need any assistance with the payment process or have any questions, please don’t hesitate to reach out to our team. We are here to help!</p>
                        <p>Thank you for being part of this exciting event, and we look forward to seeing your team compete!</p>
                        <br>
                        <p>Best regards,</p>
                        <p><strong>AGOMPS Team</strong></p>
                    </body>
                    </html>
                ');

                $email->send();

                return redirect()->to('enroll-tournament/' . $tournament_id)->with('status', '<div class="alert alert-success" role="alert"> Thank you for registering! Your team registration has been successfully completed. You can now proceed with the payment to enroll your team in AGOMPS UPPL. </div>');
            }else{
                return redirect()->to('enroll-tournament/' . $tournament_id)->with('status', '<div class="alert alert-danger" role="alert"> ' . $result . ' </div>');
            }

        }
    }


    public function enroll_tournament_payment($enroll_tournament_id)
    {
        // Load required models
        $sports_model = new Sports_model();
        $sports_subcategory_model = new Sports_subcategory_model();
        $players_model = new Players_model();
        $enroll_tournament_model = new Enroll_tournament_model();
        $tournament_model = new Tournament_model();

        // Get logged-in player session data
        $sessionData = session()->get('loggedPlayerData');
        if (!$sessionData) {
            return redirect()->to('login')->with('status', '<div class="alert alert-danger">Please login to proceed.</div>');
        }

        $loggedplayerId = $sessionData['loggedplayerId'];
        
        // Fetch tournament details
        $find_tournament = $enroll_tournament_model->get($enroll_tournament_id);
        if (!$find_tournament) {
            return redirect()->to('tournaments')->with('status', '<div class="alert alert-danger">Invalid tournament.</div>');
        }
        
        $tournament = $tournament_model->get($find_tournament['tournament_id']);
        
        // Fetch player details
        $player = $players_model->get($loggedplayerId);
        if (!$player) {
            return redirect()->to('profile')->with('status', '<div class="alert alert-danger">Player not found.</div>');
        }

        $player_name = $player['first_name'];
        $player_email = $player['email_address'];
        $player_phone = $player['mobile_number'];
        
        // Fetch sports details
        $sport = $sports_model->get($tournament['sports_id'])['name'] ?? '';
        $sport_subcat = $sports_subcategory_model->get($tournament['sport_subcategory'])['sub_category_name'] ?? '';
        $game_for = $tournament['league_for'];
        
        // Get the amount (converted to paise)
        $amount = intval($this->request->getPost('tournament_payment')) * 100; 

        // Retrieve Razorpay API keys
        $api_key = getenv('RAZORPAY_KEY_ID');
        $api_secret = getenv('RAZORPAY_SECRET_KEY');

        if (empty($api_key) || empty($api_secret)) {
            return redirect()->to('enroll-tournament/' . $find_tournament['tournament_id'])
                ->with('status', '<div class="alert alert-danger">Payment failed: API keys are missing.</div>');
        }

        // Initialize Razorpay API
        $api = new Api($api_key, $api_secret);

        try {
            // Create a new Razorpay order
            $order = $api->order->create([
                'receipt' => "order_$enroll_tournament_id",
                'amount' => $amount,
                'currency' => 'INR',
                'payment_capture' => 1
            ]);

            // Save order details in DB
            $data = [
                'order_id' => $order['id'],
                'enroll_payment' => $amount / 100, // Convert back to INR for DB
                'payment_status' => 0
            ];
            $enroll_tournament_model->add($data, $enroll_tournament_id);

            // Load Razorpay payment view
            return view('razorpay_payment', [
                'order_id' => $order['id'],
                'amount' => $amount / 100,
                'player_email' => $player_email,
                'player_phone' => $player_phone,
                'player_name' => $player_name,
                'sport' => $sport,
                'sport_subcat' => $sport_subcat,
                'game_for' => $game_for,
                'tournament_id' => $find_tournament['tournament_id']
            ]);

        } catch (Exception $e) {
            // Log error
            log_message('error', 'Razorpay Payment Error: ' . $e->getMessage());

            return redirect()->to('enroll-tournament/' . $find_tournament['tournament_id'])
                ->with('status', '<div class="alert alert-danger">Payment failed: ' . $e->getMessage() . '</div>');
        }
    }


    public function investment()
    {
        $investment_plan_model = new Investment_plan_model();
        $investment_plan = $investment_plan_model->get();
        $data = ['title' => 'Investment','investment_plan' =>  $investment_plan];
        return view('investment', $data);
    }

    public function investment_details($id) {
        $investment_model = new Investment_model();
        $data = ['title' => 'Investment Datils', 'investment_id' => $id];
        if ($this->request->is('get')) {
            $data['investment'] = $investment_model->get($id);
            return view('investment-details', $data);
        }else if ($this->request->is('post')) {
            # code...
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
    public function contact_us()
    {
        $data = ['title' => 'Contact US'];
        return view('contact-us', $data);
    }
}
