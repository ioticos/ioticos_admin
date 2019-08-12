<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inserdata_model extends CI_Model
{

  public function insert($device_sn, $temp, $hum){
    $data = array(
      'data_device_sn' => $device_sn,
      'data_temp' => $data_temp,
      'data_hum' => $data_hum
    );

    if ($this->db->insert('data', $data)){
      return "1";
    }else {
      return "0";
    }

  }
}
