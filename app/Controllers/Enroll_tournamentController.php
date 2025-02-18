<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Razorpay\Api\Api;
use App\Models\Sports_model;
use App\Models\Sports_subcategory_model;
use App\Models\Players_model;
use App\Models\Enroll_tournament_model;
use App\Models\Tournament_model;
use Exception;

class Enroll_tournamentController extends BaseController
{
    public function enroll_tournament_payment($enroll_tournament_id)
    {
//         echo getenv('RAZORPAY_KEY');
// echo getenv('RAZORPAY_SECRET');
// exit;
        $enroll_tournament_model = new Enroll_tournament_model();
        $players_model = new Players_model();
        $tournament_model = new Tournament_model();
        
        $sessionData = session()->get('loggedPlayerData');
        if (!$sessionData) {
            return redirect()->to('/login')->with('status', 'Please log in to proceed.');
        }
        
        $loggedplayerId = $sessionData['loggedplayerId'];
        $find_tournament_id = $enroll_tournament_model->get($enroll_tournament_id);
        $tournament = $tournament_model->get($find_tournament_id['tournament_id']);
        $player = $players_model->get($loggedplayerId);
        
        // Razorpay API Configuration
        $api = new Api(getenv('RAZORPAY_KEY'), getenv('RAZORPAY_SECRET'));
        
        $orderData = [
            'receipt' => 'order_rcptid_' . time(),
            'amount' => $this->request->getPost('tournament_payment') * 100, // Amount in paise
            'currency' => 'INR',
            'payment_capture' => 1 // Auto capture
        ];
        
        $razorpayOrder = $api->order->create($orderData);
        
        // Save order details in DB
        $data = [
            'enroll_payment' => $this->request->getPost('tournament_payment'),
            'payment_status' => 0,
            'razorpay_order_id' => $razorpayOrder['id']
        ];
        $enroll_tournament_model->add($data, $enroll_tournament_id);
        
        return view('process_payment', [
            'order_id' => $razorpayOrder['id'],
            'amount' => $this->request->getPost('tournament_payment'),
            'key' => getenv('RAZORPAY_KEY'),
            'player_email' => $player['email_address'],
            'player_phone' => $player['mobile_number']
        ]);
    }

    public function verify_payment()
    {
        helper('razorpay_helper');
        $enroll_tournament_model = new Enroll_tournament_model();
        $api = new Api(getenv('RAZORPAY_KEY'), getenv('RAZORPAY_SECRET'));

        $razorpay_order_id = $this->request->getPost('razorpay_order_id');
        $razorpay_payment_id = $this->request->getPost('razorpay_payment_id');
        $razorpay_signature = $this->request->getPost('razorpay_signature');

        $attributes = [
            'razorpay_order_id' => $razorpay_order_id,
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_signature' => $razorpay_signature
        ];

        try {
            verifyRazorpaySignature($attributes);
            $updateData = [
                'razorpay_payment_id' => $razorpay_payment_id,
                'razorpay_signature' => $razorpay_signature,
                'payment_status' => 1
            ];
            $enroll_tournament_model->updatePaymentStatus($razorpay_order_id, $updateData);
            return view('payment/success');
        } catch (Exception $e) {
            return view('payment/failed', ['error' => $e->getMessage()]);
        }
    }
}
