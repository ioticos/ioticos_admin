<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		//si no estas logueado... FUERA!!!
		if(!isset($_SESSION['user_id'])){
			redirect(base_url('login'), 'refresh');
		}

		//cargamos los modelos que vamos a usar...
		$this->load->model('Main_model');
		$this->load->model('Devices_model');
	}

  public function index()
  {

		$user_id = $this->session->userdata('user_id');

		//obtenemos los dispositivos de este usuario
		//no importa qué vista estemos mostrando
		//el header, como tiene el selector de dispos, necesitará en todo momento la lista completa...
		$data['devices'] = $this->Devices_model->get_devices($user_id);

		//como estamos por mostrar el dashboard y éste muestra los gráficos históricos.
		//pero ojo, solo los históricos del dispo seleccionado
		//es que traeremos todos los datos de la tabla data que pertenezcan al id del dispo seleccionado.
		$device_data = $this->Main_model->get_data($user_id, $_SESSION['selected_device']);

		$temps="";
		$hums = "";
		$dates="";

		//la librería charts.js que usamos para dibujar los charts, nos pide los datos, separados por coma,
		//entonces armamos un string para las temperaturas
		//otro para las humedades, y otro para las fechas, ya te darás cuenta de qué tendrás que modificar si usas más variables...
		foreach ($device_data as $d) {
			$temps .= $d['data_temp'].",";
			$hums .= $d['data_hum'].",";
			$dates .= "'".$d['data_date']."',";
		}

		//como todo dato que necesitemos pasar a la vista lo prepararemos en el array $data
		$data['temps'] = $temps;
		$data['hums'] = $hums;
		$data['dates'] = $dates;

		//ya tenemos todo lo necesario para cargar las partes del panel, mostrarla y pasarle "DATA" a cada parte que necesite de estos "DATA"
		$this->load->view('head');
		$this->load->view('scripts');
		$this->load->view('open');
		$this->load->view('header',$data); //el header necesita que le pase la lista de dispos para el selector
		$this->load->view('sidebar');
    $this->load->view('contents/main',$data); //el main entre otra cosas necesitará los datos para graficar históricos.
		$this->load->view('close');
  }
}
