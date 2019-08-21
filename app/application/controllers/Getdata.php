<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getdata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Getdata_model');
	}

  public function gettopics(){

    $password = strip_tags($this->input->post('gdp'));

		if ($password == GET_DATA_PASSWORD){
			$device_sn = strip_tags($this->input->post('sn'));
	    $result = $this->Getdata_model->gettopics($device_sn);
			echo ROOT_TOPIC."/".$result[0]['device_topic']."#".MQTT_USER."#".MQTT_PASSWORD."# ";
		}else{
			echo "access denied";
		}

  }

}
