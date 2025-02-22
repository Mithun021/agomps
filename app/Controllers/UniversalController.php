<?php

namespace App\Controllers;

use App\Models\Investment_duration_model;
use App\Models\Sports_model;
use App\Models\Sports_subcategory_model;
use App\Models\State_city_model;

class UniversalController extends BaseController
{
    public function findcity(){
        $state_city_model = new State_city_model();
        $state = $this->request->getPost('state');
        $data = $state_city_model->find_city($state);
        return $this->response->setJSON($data);
    }

    public function fetch_sports_subcategory(){
        $sports_subcategory_model = new Sports_subcategory_model();
        $sports_id = $this->request->getPost('sports_id');
        $data = $sports_subcategory_model->find_sports($sports_id);
        return $this->response->setJSON($data);
    }

    public function getDuration(){
        $investment_duration_model = new Investment_duration_model();
        $plan_type = $this->request->getPost('plan_type');
        $data = $investment_duration_model->get_by_plan_id($plan_type);
        return $this->response->setJSON($data);
    }

    public function getprofit(){
        $investment_duration_model = new Investment_duration_model();
        $duration_id = $this->request->getPost('duration_id');
        $data = $investment_duration_model->get($duration_id);
        return $this->response->setJSON($data);
    }

    public function test_mail(){
        $email = \Config\Services::email();

            // Set SMTP configuration (if not configured globally)
            $email->setFrom('contact@agomps.com', 'AGOMPS');
            $email->setTo('mithunkr79038@gmail.com');
            $email->setSubject('Test Emai');

            // HTML message with embedded image
            $email->setMessage('
                <html>
                <body>
                    <h1>Welcome to AGOMPS</h1>
                    <p>Kese ho dosto:</p>
                    <p>Thank you for choosing us!</p>
                </body>
                </html>
            ');
    
            // Send the email
            if ($email->send()) {
                echo "Email with logo successfully sent!";
            } else {
                echo "Failed to send email. Debug: " . $email->printDebugger(['headers']);
            }
    }


}
