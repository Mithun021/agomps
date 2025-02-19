<?php

namespace App\Controllers;
use App\Models\Investment_model;
use App\Models\Players_model;
class InvestmentUsersController extends BaseController
{
    public function investment_details($id) {
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
            $investment_id = $this->request->getPost('investment_id');
            $player = $players_model->get($loggedplayerId);
        }

    }
}
