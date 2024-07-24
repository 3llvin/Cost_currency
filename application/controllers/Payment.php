<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_model');
        $this->load->model('PaymentType_model');
        $this->load->model('Currency_model');
    }

    // Form verilerini yüklemek için yöntem
    public function get_form_data()
    {
        $categories = $this->PaymentType_model->get_all_payment_types();
        $currencies = $this->Currency_model->get_all_currencies();
        echo json_encode(['categories' => $categories, 'currencies' => $currencies]);
    }

    public function add()
    {
        $data = [
            'amount' => $this->input->post('amount'),
            'category_id' => $this->input->post('category_id'),
            'currency_id' => $this->input->post('currency_id'),
            'type' => $this->input->post('type'),
            'comment' => $this->input->post('comment')
        ];
        if ($this->Payment_model->insert_payment($data)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
}
