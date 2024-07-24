<?php

class Currency extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Currency_model');
    }

    public function index()
    {
        $this->load->view('currency_form');
    }

    public function create()
    {
        $name = $this->input->post('name');
        if ($this->Currency_model->add_currency($name)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function list()
    {
        $data['currencies'] = $this->Currency_model->get_all_currencies();
        $this->load->view('currency_list', $data);
    }
}
