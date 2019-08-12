<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertdata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Insertdata_model');
	}

  public function insert(){

    $password = strip_tags($this->input->post('idp'));

		if ($password == INSERT_DATA_PASSWORD){
			$device_sn = strip_tags($this->input->post('sn'));
			$temp = strip_tags($this->input->post('temp'));
			$hum = strip_tags($this->input->post('hum'));

			$result = $this->Insertdata_model->insert($device_sn, $temp, $hum);
		}

  }

}
