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
		//recibimos los datos que nos envia el form
		$email = strip_tags($this->input->post('email'));
		$password = sha1(strip_tags($this->input->post('password'))); //recibimos y encriptamos la clave para poder compararla con la clave que tenemos encriptada en la db
		//pasamos los datros al modelo
		$return = $this->Login_model->login($email, $password);

		//si la clave coincide
		 if ($return==1) {
				 redirect(base_url('main'), 'refresh');
		 }

		 if ($return==0) {
			 		//preparo los mensajes para mostrar los motivos de no logueo.
				 $data['msg'] = 'Credenciales inválidas';
				 $data['email']=$email;
		     $this->load->view('contents/login',$data);
		 }
	 }
}
