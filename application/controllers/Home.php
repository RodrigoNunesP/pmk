<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array( 
			"styles" => array(
				"dataTables.bootstrap.min.css",
				"datatables.min.css"
			),
			"scripts" => array(
				"sweetalert2.all.min.js",
				"dataTables.bootstrap.min.js",
				"datatables.min.js",
				"util.js",
				"home.js" 
			)
		);

		$this->load->model("doadores_model");
		$data["interval_donation"] = $this->doadores_model->list_interval();
		$data["payment"] = $this->doadores_model->list_payments();

		$this->load->helper('form');
		$this->template->show('home.php', $data);
	}

	public function ajax_save_donor() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$this->load->model("doadores_model");

		$data = $this->input->post();

		if (!empty($json["error_list"])) {
			$json["status"] = 0;
		} else {

			if (empty($data["donor_id"])) {
				$this->doadores_model->insert($data);
			} else {
				$donor_id = $data["donor_id"];
				unset($data["donor_id"]);
				$this->doadores_model->update($donor_id, $data);
			}
		}

		echo json_encode($json);
	}

	public function ajax_get_donor_data() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["input"] = array();

		$this->load->model("doadores_model");

		$donor_id = $this->input->post("donor_id");
		$data = $this->doadores_model->get_data($donor_id)->result_array()[0];
		$json["input"]["donor_id"] = $data["donor_id"];
		$json["input"]["name"] = $data["name"];
		$json["input"]["email"] = $data["email"];
		$json["input"]["cpf"] = $data["cpf"];
		$json["input"]["fone1"] = $data["fone1"];
		$json["input"]["fone2"] = $data["fone2"];
		$json["input"]["date_birthday"] = $data["date_birthday"];
        $json["input"]["date_register"] = $data["date_register"];
        $json["input"]["interval_donation"] = $data["interval_donation"];
        $json["input"]["value"] = $data["value"];
        $json["input"]["payment"] = $data["payment"];
        $json["input"]["adress"] = $data["adress"];
        
		echo json_encode($json);
	}

	public function ajax_delete_donor_data() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;

		$this->load->model("doadores_model");
		$donor_id = $this->input->post("donor_id");
		$this->doadores_model->delete($donor_id);

		echo json_encode($json);
	}

	public function ajax_list_donor() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$this->load->model("Payments_model");
		$this->load->model("Interval_model");
		$this->load->model("doadores_model");
		$donors = $this->doadores_model->get_datatable();

		$data = array();
		foreach ($donors as $donor) {

			$interval = $this->Interval_model->get_interval_data($donor->interval_donation);
			$payment = $this->Payments_model->get_payment_data($donor->payment);

			$row[] = $donor->name;
			$row[] = $donor->email;
			$row[] = $donor->cpf;
			$row[] = $donor->fone1;
			$row[] = $donor->fone2;
			$row[] = $donor->date_birthday;
			$row[] = $donor->date_register;
			$row[] = $interval->type;
			$row[] = $donor->value;
			$row[] = $payment->type;
			$row[] = $donor->adress;

			$row[] = '<div style="display: inline-block;">
						<button class="btn btn-primary btn-edit-donor" 
							donor_id="'.$donor->donor_id.'">
							<i class="fa fa-edit"></i>
						</button>
						<button class="btn btn-danger btn-del-donor" 
							donor_id="'.$donor->donor_id.'">
							<i class="fa fa-times"></i>
						</button>
					</div>';

			$data[] = $row;

		}

		$json = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->doadores_model->records_total(),
			"recordsFiltered" => $this->doadores_model->records_filtered(),
			"data" => $data,
		);

		echo json_encode($json);
    }
    
}