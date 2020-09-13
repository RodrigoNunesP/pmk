<?php

class Interval_model extends CI_Model 
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_interval_data($interval_id) {

		$this->db
			->select("interval_id, type")
            ->from("interval_donations")
            ->where("interval_id", $interval_id);

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
		$this->db->where("interval_id", $id);
		return $this->db->get();
    }
}