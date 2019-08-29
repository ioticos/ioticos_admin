<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//cargamos el modelo
		$this->load->model('Register_model');
		$this->load->model('Login_model');
	}

	public function index()
	{
		//variables para repoblar forumario
		$data['email']="";
		$data['name']="";
		$data['msg']="";
		//cargamos el register (vista)
		$this->load->view('contents/register',$data);
	}

	//si un usuario intenta registrarse
	public function doregister()
	{
		//recibimos por post todos los datos
		$name = strip_tags($this->input->post('name'));
		$email = strip_tags($this->input->post('email'));
		$password = strip_tags($this->input->post('password'));
		$retype = strip_tags($this->input->post('retype'));


		$msg = "";

		//comprobamos que la pass y la repetición sean iguales
		if ($password != $retype)
		{
			//si no son iguales, preparamos mensaje a mostrar y preparamos la repoblación del form
			//codeig tiene una librería más eficiente para hacer esto, lo mejoraremos en breve
			$data['msg'] = "Las claves no coinciden";
			$data['name'] = $name;
			$data['email']= $email;
			$this->load->view('contents/register',$data);
			return;
		}

		if (strlen($password)<6)
		{
			//si la clave es corta...
			$data['msg'] = "La clave debe tener al menos 6 caracteres";
			$data['name'] = $name;
			$data['email']= $email;
			$this->load->view('contents/register',$data);
			return;
		}

		//si todo luce bien le pasamos al modelo los datos del pretendiente a registrarse
		//en nuestro fantástico sistema.
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
