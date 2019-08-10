<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devices extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Devices_model');

		if(!isset($_SESSION['user_id'])){
			redirect(base_url('login'), 'refresh');
		}
	}

  public function index()
  {
		$user_id = $this->session->userdata('user_id');
		$data['devices'] = $this->Devices_model->get_devices($user_id);

		$this->load->view('head');
		$this->load->view('scripts');
		$this->load->view('open');
		$this->load->view('header');
		$this->load->view('sidebar');
    $this->load->view('contents/devices',$data);
		$this->load->view('close');
  }

	public function add(){
		$user_id = $this->session->userdata('user_id');
		$device_alias = strip_tags($this->input->post('device_alias'));
		$device_serial_number = strip_tags($this->input->post('device_serial_number'));
		$result = $this->Devices_model->add($user_id, $device_alias, $device_serial_number);

		if ($result == "exist"){
			$_SESSION['msg_type'] = "warning";
			$_SESSION['msg_title'] = "Warning!";
			$_SESSION['msg_body'] = "Serial number alreade exist!";
			$_SESSION['msg_footer'] = "https://ioticos.org";
		}elseif ($result == "success"){
			$_SESSION['msg_type'] = "success";
			$_SESSION['msg_title'] = "Success!";
			$_SESSION['msg_body'] = "Device added successfully";
			$_SESSION['msg_footer'] = "https://ioticos.org";
		}elseif($resutl == "fail"){
			$_SESSION['msg_type'] = "fail";
			$_SESSION['msg_title'] = "Fail!";
			$_SESSION['msg_body'] = "Fail adding device";
			$_SESSION['msg_footer'] = "https://ioticos.org";
		}

		redirect(base_url('devices'), 'refresh');
	}



}
