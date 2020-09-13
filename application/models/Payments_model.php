<?php

class Payments_model extends CI_Model 
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_payment_data($payment_id) {

		$this->db
			->select("payment_id, type")
            ->from("payments")
            ->where("payment_id", $payment_id);

		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return NULL;
		}
	}

	public function get_data($id, $select = NULL) {
		if (!empty($select)) {
			$this->db->select($select);
		}
		$this->db->from("type");
		$this->db->where("payment_id", $id);
		return $this->db->get();
    }
}