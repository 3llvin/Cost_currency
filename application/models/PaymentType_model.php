<?php
class PaymentType_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function add_payment_type($name) {
        $data = array(
            'name' => $name
        );
        return $this->db->insert('payment_types', $data);
    }
    public function get_all_payment_types() {
        $query = $this->db->get('payment_types');
        return $query->result();
    }
}
?>
