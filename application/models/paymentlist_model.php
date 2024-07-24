<?php
class Payment_model extends CI_Model {
    public function get_payments($filters) {
        $this->db->select('payments.amount, payments.type, payments.comment, categories.name as category_name, currencies.name as currency_name');
        $this->db->from('payments');
        $this->db->join('categories', 'payments.category_id = categories.id');
        $this->db->join('currencies', 'payments.currency_id = currencies.id');

        if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
            $this->db->where('date >=', $filters['start_date']);
            $this->db->where('date <=', $filters['end_date']);
        }
        if (!empty($filters['category_id'])) {
            $this->db->where('category_id', $filters['category_id']);
        }
        if (!empty($filters['currency_id'])) {
            $this->db->where('currency_id', $filters['currency_id']);
        }

        $query = $this->db->get();
        return $query->result();
    }
}
