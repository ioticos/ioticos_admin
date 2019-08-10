<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');

		if(!isset($_SESSION['user_id'])){
			redirect(base_url('login'), 'refresh');
		}
	}

  public function index()
  {
		$this->load->view('head');
		$this->load->view('scripts');
		$this->load->view('open');
		$this->load->view('header');
		$this->load->view('sidebar');
    $this->load->view('contents/main');
		$this->load->view('close');
  }



}
