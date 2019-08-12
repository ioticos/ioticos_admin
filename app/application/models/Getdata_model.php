<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Getdata_model extends CI_Model
{

  public function gettopics($device_sn){
    $this->db->SELECT('device_topic');
    $this->db->FROM('devices');
    $this->db->WHERE('device_sn',$device_sn);
    $result =	$this->db->get()->result_array();
    return $result;
  }

}
