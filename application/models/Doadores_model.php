<?php

class Doadores_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_data($id, $select = NULL) {
		if (!empty($select)) {
			$this->db->select($select);
		}
		$this->db->from("donors");
		$this->db->where("donor_id", $id);
		return $this->db->get();
	}

	public function insert($data) {
		$this->db->insert("donors", $data);
	}

	public function update($id, $data) {
		$this->db->where("donor_id", $id);
		$this->db->update("donors", $data);
	}

	public function delete($id) {
		$this->db->where("donor_id", $id);
		$this->db->delete("donors");
	}

	public function is_duplicated($field, $value, $id = NULL) {
		if (!empty($id)) {
			$this->db->where("donor_id <>", $id);
		}
		$this->db->from("donors");
		$this->db->where($field, $value);
		return $this->db->get()->num_rows() > 0;
	}

	var $column_search = array("name", "email" , "cpf" , "date_birthday");
	var $column_order = array("name", "email" , "cpf" , "date_birthday");

	private function _get_datatable() {

		$search = NULL;
		if ($this->input->post("search")) {
			$search = $this->input->post("search")["value"];
		}
		$order_column = NULL;
		$order_dir = NULL;
		$order = $this->input->post("order");
		if (isset($order)) {
			$order_column = $order[0]["column"];
			$order_dir = $order[0]["dir"];
		}

		$this->db->from("donors");
		if (isset($search)) {
			$first = TRUE;
			foreach ($this->column_search as $field) {
				if ($first) {
					$this->db->group_start();
					$this->db->like($field, $search);
					$first = FALSE;
				} else {
					$this->db->or_like($field, $search);
				}
			}
			if (!$first) {
				$this->db->group_end();
			}
		}

		if (isset($order)) {
			$this->db->order_by($this->column_order[$order_column], $order_dir);
		}
	}

	public function get_datatable() {

		$length = $this->input->post("length");
		$start = $this->input->post("start");
		$this->_get_datatable();
		if (isset($length) && $length != -1) {
			$this->db->limit($length, $start);
		}
		return $this->db->get()->result();
	}

	public function records_filtered() {

		$this->_get_datatable();
		return $this->db->get()->num_rows();

	}

	public function records_total() {

		$this->db->from("donors");
		return $this->db->count_all_results();

	}

	public function list_interval() {   
		$this->db->select('interval_id,type');
		$results = $this->db->get('interval_donations')->result();
		$list_interval = array();
			foreach ($results as $result) {
				$list_interval[$result->interval_id] = $result->type;                
			}
		return $list_interval;
	}

	public function list_payments() {   
		$this->db->select('payment_id,type');
		$results = $this->db->get('payments')->result();
		$list_payments = array();
			foreach ($results as $result) {
				$list_payments[$result->payment_id] = $result->type;                
			}
		return $list_payments;
	}

	public function calcularIdade($date){
		$time = strtotime($date);
		if($time === false){
		  return '';
		}
	 
		$year_diff = '';
		$date = date('Y-m-d', $time);
		list($year,$month,$day) = explode('-',$date);
		$year_diff = date('Y') - $year;
	 
		return $year_diff;
	}

	public function validaCPF($cpf) {
 
		$cpf = preg_replace( '/[^0-9]/is', '', $cpf );
		 
		if (strlen($cpf) != 11) {
			return false;
		}
	
		if (preg_match('/(\d)\1{10}/', $cpf)) {
			return false;
		}
	
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf[$c] * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf[$c] != $d) {
				return false;
			}
		}
		return true;
	}
	
}

