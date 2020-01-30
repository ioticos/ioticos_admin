<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertdata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//cargamos el modelo
		$this->load->model('Insertdata_model');
	}

  public function insert(){

		//nos llega la pass que nos pasa el dispositivo,
    $password = strip_tags($this->input->post('idp'));

		//si la pass coincide entonces si le permitimos al dispositivo insertar una fila en la tabla data
		if ($password == INSERT_DATA_PASSWORD){

			//recibimos los datos que nos envía el dispositivo, mediante post...
			$device_sn = strip_tags($this->input->post('sn'));
			$temp = strip_tags($this->input->post('temp'));
			$hum = strip_tags($this->input->post('hum'));

			$result = $this->Insertdata_model->insert($device_sn, $temp, $hum);

		}else{
			//si la clave no coincide...
			echo "access denied";
		}

  }

}
