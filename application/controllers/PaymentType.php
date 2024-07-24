<?php
class Paymenttype extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PaymentType_model');
    }
    public function index()
    {
        $this->load->view('payment_type_form');
    }
    public function add()
    {
        $name = $this->input->post('name');
        if ($this->PaymentType_model->add_payment_type($name)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
    public function list()
    {
        $data['payment_types'] = $this->PaymentType_model->get_all_payment_types();
        $this->load->view('payment_type_list', $data);
    }
}
