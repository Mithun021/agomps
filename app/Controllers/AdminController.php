<?php

namespace App\Controllers;

use App\Models\Teams_model;
use App\Models\User_model;

class AdminController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Home'];
        return view('admin/index', $data);
    }

    public function admin_login()
    {
        $user_model = new User_model();
        $data = ['title' => 'Admin Login'];
        if ($this->request->is('get')) {
            if (isset($_SESSION['adminLoginned'])) {
                return view("admin/index");
            }
            return view('admin/login', $data);
        } else if ($this->request->is('post')) {
            $userId = $this->request->getPost('userId');
            $userPassword = $this->request->getVar('userPassword');

            $data = $user_model->where('email_address', $userId)
                ->orWhere('user_phone', $userId)->first();
            if ($data) {
                $session_data = [
                    'loggeduserName' => $data['username'],
                    'loggeduseremail' => $data['email_address'],
                    'loggeduserId' => $data['id']
                ];
                if (password_verify($userPassword, $data['user_password'])) {
                    $this->session->set('loggedUserData', $session_data);
                    $this->session->set('adminLoginned', "adminLoginned");
                    echo "dataMatch";
                } else {
                    echo 'User ID or Password Mismatch';
                }
            } else {
                echo "Given Username or Phone Number not found";
            }
        }
    }

    public function teams()
    {
        $teams_model = new Teams_model();
        $data = ['title' => 'Teams'];
        if ($this->request->is('get')) {
            $data['teams'] = $teams_model->get();
            return view('admin/teams', $data);
        } else if ($this->request->is('post')) {
            $logo = $this->request->getFile('team_logo');
            if ($logo->isValid() && ! $logo->hasMoved()) {
                $logoImageName = rand(0, 9999) . $logo->getRandomName();
                $logo->move(ROOTPATH . 'public/assets/sports-logo', $logoImageName);
            } else {
                $logoImageName = "";
            }
            $data = [
                'name' => $this->request->getPost('league_category_name'),
                'logo' => $logoImageName,
                'status' => $this->request->getPost('status')
            ];
            $result = $teams_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/teams')->with('status', '<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/teams')->with('status', '<div class="alert alert-danger" role="alert"> ' . $result . ' </div>');
            }
        }
    }
}
