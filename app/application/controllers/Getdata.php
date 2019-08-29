<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getdata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		//Cargamos el modelo
		$this->load->model('Getdata_model');
	}


  public function gettopics(){

		//recibimos la pass para obtener datos que nos pasa el dispo
    $password = strip_tags($this->input->post('gdp'));

		//si coincide
		if ($password == GET_DATA_PASSWORD){
			//el dispositivo nos pasa por post su número de serie
			$device_sn = strip_tags($this->input->post('sn'));
	    $result = $this->Getdata_model->gettopics($device_sn);
			//le devolvemos topico raíz, usuario y pass mqtt separados por #,
			//ojo, como el string empieza con un #, del lado de nuestro dispositivo, el tópico estará en la posición 1 del array y no en la 0
			echo "<br>#".ROOT_TOPIC."/".$result[0]['device_topic']."#".MQTT_USER."#".MQTT_PASSWORD."# ";
		}else{
			//si la clave no coincide
			echo "access denied";
		}

  }

}
