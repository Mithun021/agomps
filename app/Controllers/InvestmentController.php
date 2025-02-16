<?php

namespace App\Controllers;

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
        $data = ['title' => 'Investment Plan'];
        if ($this->request->is('get')) {
            return view('admin/investment/investment-plan', $data);
        } else if ($this->request->is('post')) {

        }
    }
    public function investment_duration()
    {
        $data = ['title' => 'Investment Duration'];
        if ($this->request->is('get')) {
            return view('admin/investment/investment-duration', $data);
        } else if ($this->request->is('post')) {

        }
    }
}
