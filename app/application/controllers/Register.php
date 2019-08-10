<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Register_model');
		$this->load->model('Login_model');
	}

	public function index()
	{
		$data['email']="";
		$data['name']="";
		$data['msg']="";
		$this->load->view('contents/register',$data);
	}

	public function doregister()
	{
		$name = strip_tags($this->input->post('name'));
		$email = strip_tags($this->input->post('email'));
		$password = strip_tags($this->input->post('password'));
		$retype = strip_tags($this->input->post('retype'));

		$msg = "";

		if ($password != $retype)
		{
			$data['msg'] = "Las claves no coinciden";
			$data['name'] = $name;
			$data['email']= $email;
			$this->load->view('contents/register',$data);
			return;
		}

		if (strlen($password)<6)
		{
			$data['msg'] = "La clave debe tener al menos 6 caracteres";
			$data['name'] = $name;
			$data['email']= $email;
			$this->load->view('contents/register',$data);
			return;
		}

		$return = $this->Register_model->register($name,$email,$password);

		if ($return == "exist")
		{
			$data['msg'] = "Ya hay un usuario registrado con el email ".$email;
			$data['name'] = $name;
			$data['email']= $email;
			$this->load->view('contents/register',$data);
		}

		if ($return == "success")
		{
			$data['msg'] = "Cuenta creada con éxito Ingresa con tus credenciales desde Login <meta http-equiv='refresh' content='3;url=".base_url('login')."' /> ";
			$data['name'] = $name;
			$data['email']= $email;
			$this->load->view('contents/register',$data);

		}

	}

}
