<?php
class Payment extends CI_Controller
{
    public function index()
    {
        $this->load->model('payment_model');
        $filters = array(
            'start_date' => $this->input->get('start_date'),
            'end_date' => $this->input->get('end_date'),
            'category_id' => $this->input->get('category_id'),
            'currency_id' => $this->input->get('currency_id')
        );
        $data['payments'] = $this->payment_model->get_payments($filters);
        $this->load->view('payments_list', $data);
    }
}
