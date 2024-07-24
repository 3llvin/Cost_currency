<?php
class Database_test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        if ($this->db->conn_id) {
            echo "Database connection is successful!";
        } else {
            echo "Database connection failed!";
        }
    }
}
