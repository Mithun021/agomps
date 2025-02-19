<?php

namespace App\Controllers;

use Razorpay\Api\Api;
use App\Models\Investment_model;
use App\Models\Investment_users_model;
use App\Models\Players_model;
use Exception;

class InvestmentUsersController extends BaseController
{
    public function investment_details($id)
    {
        $investment_users_model = new Investment_users_model();
        $players_model = new Players_model();
        $investment_model = new Investment_model();
        $data = ['title' => 'Investment Details', 'investment_id' => $id];

        if ($this->request->getMethod() === 'get') {
            // echo "ok"; die;
            $data['investment'] = $investment_model->get($id);
            return view('investment-details', $data);
        } elseif ($this->request->getMethod() === 'post') {
            $sessionData = session()->get('loggedPlayerData');
            if (!$sessionData) {
                return redirect()->to('/')->with('alert', 'Please log in to proceed.');
            }

            $loggedplayerId = $sessionData['loggedplayerId'];
            $investment_amount = $this->request->getPost('investment_amount');
            $player = $players_model->get($loggedplayerId);

            if (!$player) {
                return redirect()->to('/')->with('alert', 'Player data not found.');
            }

            $email_address = $player['email_address'];
            $mobile_number = $player['mobile_number'];

            // Razorpay API Configuration
            $api = new Api(getenv('RAZORPAY_KEY'), getenv('RAZORPAY_SECRET'));
            $orderData = [
                'receipt'         => "INVEST_" . time(),
                'amount'          => $investment_amount * 100, // Convert to paise
                'currency'        => 'INR',
                'payment_capture' => 1 // Auto-capture payment
            ];

            try {
                $razorpayOrder = $api->order->create($orderData);
            } catch (Exception $e) {
                return redirect()->to('/investment-details/' . $id)->with('status', '<div class="alert alert-danger">Payment initialization failed: ' . $e->getMessage() . '</div>');
            }

            // Save order details in DB
            $data = [
                'user_id'             => $loggedplayerId,
                'investment_id'       => $id,
                'investment_amount'   => $investment_amount,
                'payment_status'      => 0,
                'razorpay_order_id'   => $razorpayOrder['id']
            ];

            $investment_users_model->add($data);

            // Redirect to payment page
            return view('investment/process', [
                'key'         => getenv('RAZORPAY_KEY'),
                'amount'      => $investment_amount,
                'order_id'    => $razorpayOrder['id'],
                'player_email'=> $email_address,
                'player_phone'=> $mobile_number
            ]);
        }
    }

    public function verify_payment()
    {
        $investment_users_model = new Investment_users_model();
        $request = $this->request->getPost();

        if (!$request) {
            return redirect()->to('investment/failed')->with('status', '<div class="alert alert-danger">Invalid Payment Attempt.</div>');
        }

        try {
            // Verify payment signature
            if (!verifyRazorpaySignature($request)) {
                throw new Exception("Payment Signature Mismatch.");
            }

            // Update payment status
            $updateData = [
                'payment_status'     => 1,
                'razorpay_payment_id'=> $request['razorpay_payment_id'],
                'razorpay_signature' => $request['razorpay_signature']
            ];

            $investment_users_model->updatePaymentStatus($request['razorpay_order_id'], $updateData);

            return redirect()->to('investment/success')->with('status', '<div class="alert alert-success">Payment successful! Your investment is confirmed.</div>');
        } catch (Exception $e) {
            return redirect()->to('investment/failed')->with('status', '<div class="alert alert-danger">Payment verification failed: ' . $e->getMessage() . '</div>');
        }
    }
}

?>