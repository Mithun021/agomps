<?php

namespace App\Controllers;

use App\Models\Investment_duration_model;
use App\Models\Investment_plan_model;

class InvestmentController extends BaseController
{
    public function add_investment()
    {
        $data = ['title' => 'Add Investment'];
        if ($this->request->is('get')) {
            return view('admin/investment/add-investment', $data);
        } else if ($this->request->is('post')) {

        }
    }
    public function investment_list()
    {
        $data = ['title' => 'Investment List'];
        if ($this->request->is('get')) {
            return view('admin/investment/investment-list', $data);
        } else if ($this->request->is('post')) {

        }
    }
    public function investment_plan()
    {
        $investment_plan_model = new Investment_plan_model();
        $data = ['title' => 'Investment Plan'];
        if ($this->request->is('get')) {
            $data['investment_plan'] = $investment_plan_model->get();
            return view('admin/investment/investment-plan', $data);
        } else if ($this->request->is('post')) {
            $data = [
                'plan_type'=> $this->request->getPost('plan_type') 
            ];
            $result = $investment_plan_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/investment-plan')->with('status', '<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/investment-plan')->with('status', '<div class="alert alert-danger" role="alert"> ' . $result . ' </div>');
            }
        }
    }
    public function investment_duration()
    {
        $investment_plan_model = new Investment_plan_model();
        $investment_duration_model = new Investment_duration_model();
        $data = ['title' => 'Investment Duration'];
        if ($this->request->is('get')) {
            $data['investment_plan'] = $investment_plan_model->get();
            $data['investment_duration'] = $investment_duration_model->get();
            return view('admin/investment/investment-duration', $data);
        } else if ($this->request->is('post')) {
            $data =[
                'investment_type_id' => $this->request->getPost('plan_type'),
                'duration' => $this->request->getPost('duration')
            ];
            $result = $investment_duration_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/investment-duration')->with('status', '<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/investment-duration')->with('status', '<div class="alert alert-danger" role="alert"> ' . $result . ' </div>');
            }
        }
    }
}
