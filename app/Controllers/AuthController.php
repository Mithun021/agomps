<?php

namespace App\Controllers;

use App\Models\Players_model;

class AuthController extends BaseController
{
    public function userlogin()
    {
        $players_model =  new Players_model();
        $username = $this->request->getVar('username');
        $userpassword = $this->request->getVar('userpassword');

        $data = $players_model->where('email_address', $username)
            ->orWhere('mobile_number', $username)->first();
        if ($data) {
            session()->destroy();
            $session_data = [
                'loggedplayerName' => $data['first_name'],
                'loggedplayerId' => $data['id'],
                'player_login' => true
            ];

            if (password_verify($userpassword, $data['password'])) {
                $this->session->set('loggedPlayerData', $session_data);
                return $this->response->setJSON(true);
            } else {
                return $this->response->setJSON('Invalid login credentials');
            }
        }
    }
}
