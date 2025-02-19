<?php

namespace App\Controllers;
use Razorpay\Api\Api;
use App\Models\Investment_model;
use App\Models\Investment_users_model;
use App\Models\Players_model;
use Exception;
class InvestmentUsersController extends BaseController
{
    public function investment_details($id) {
        $investment_users_model = new Investment_users_model();
        $players_model = new Players_model();
        $investment_model = new Investment_model();
        $data = ['title' => 'Investment Datils', 'investment_id' => $id];
        if ($this->request->is('get')) {
            $data['investment'] = $investment_model->get($id);
            return view('investment-details', $data);
        }else if ($this->request->is('post')) {
            $sessionData = session()->get('loggedPlayerData');
            if (!$sessionData) {
                return redirect()->to('/')->with('alert', 'Please log in to proceed.');
            }
            $loggedplayerId = $sessionData['loggedplayerId'];
            $investment_amount = $this->request->getPost('investment_amount');
            // $investment_id = $this->request->getPost('investment_id');
            $player = $players_model->get($loggedplayerId);
            // echo "Userid : ".$loggedplayerId. " Amount : ".$investment_amount. " id : ".$id;
            // Razorpay API Configuration
                
                // Save order details in DB
            $data = [
                'user_id' => $investment_amount,
                'investment_id' => $investment_amount,
                'investment_amount' => $investment_amount,
                'payment_status' => 0,
            ];
            $result = $investment_users_model->add($data);
            if ($result === true) {
                return redirect()->to('investment-details/'.$id)->with('status', '<div class="alert alert-success" role="alert">Your investment amount has been successfully processed and invested. </div>');
            } else {
                return redirect()->to('investment-details/'.$id)->with('status', '<div class="alert alert-danger" role="alert"> ' . $result . ' </div>');
            }
        }

    }
}
