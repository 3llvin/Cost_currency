<?php
class Currency_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_currency($name)
    {
        $data = array(
            'name' => $name
        );

        return $this->db->insert('currencies', $data);
    }

    public function get_all_currencies()
    {
        $query = $this->db->get('currencies');
        return $query->result();
    }
}
