<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

  public function index()
  {
    $data['msg']="";
		$data['email']="";
    $this->load->view('contents/login',$data);
  }

	public function dologin()
	{
		$email = strip_tags($this->input->post('email'));
		$password = sha1(strip_tags($this->input->post('password')));
		$return = $this->Login_model->login($email, $password);

		 if ($return==1) {
				 redirect(base_url('main'), 'refresh');
		 }

		 if ($return==0) {
				 $data['msg'] = 'Credenciales inválidas';
				 $data['email']=$email;
		     $this->load->view('contents/login',$data);
		 }

	 }

}
