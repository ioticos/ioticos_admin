<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
		$this->load->model('Devices_model');

		if(!isset($_SESSION['user_id'])){
			redirect(base_url('login'), 'refresh');
		}
	}

  public function index()
  {
		$user_id = $this->session->userdata('user_id');
		$data['devices'] = $this->Devices_model->get_devices($user_id);

		$device_data = $this->Main_model->get_data($user_id, $_SESSION['selected_device']);

		$temps="";
		$hums = "";
		$dates="";


		foreach ($device_data as $d) {
			$temps .= $d['data_temp'].",";
			$hums .= $d['data_hum'].",";
			$dates .= "'".$d['data_date']."',";
		}

		$data['temps'] = $temps;
		$data['hums'] = $hums;
		$data['dates'] = $dates;

		$this->load->view('head');
		$this->load->view('scripts');
		$this->load->view('open');
		$this->load->view('header',$data);
		$this->load->view('sidebar');
    $this->load->view('contents/main',$data);
		$this->load->view('close');
  }



}
