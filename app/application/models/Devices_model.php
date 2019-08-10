<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Devices_model extends CI_Model
{

  public function get_devices($user_id){
    $this->db->SELECT();
    $this->db->FROM('devices');
    $this->db->WHERE('device_user_id',$user_id);
    $result =	$this->db->get()->result_array();
    return $result;
  }

  public function change_device($user_id, $device_id){
    //check if user own the device
    $this->db->select('*');
    $this->db->from('devices');
    $this->db->where('device_user_id', $user_id);
    $this->db->where('device_id', $device_id);

    $query = $this->db->get();

    if ($query->num_rows() == 1) {
      $this->db->set('user_selected_device', $device_id);
      $this->db->where('user_id', $user_id);
      $this->db->update('users'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
      $_SESSION['selected_device'] = $device_id;
      return True;
    }else{
      return False;
    }
  }

  public function delete_device($user_id, $device_id){
    //check if user own the device
    $this->db->select('*');
    $this->db->from('devices');
    $this->db->where('device_user_id', $user_id);
    $this->db->where('device_id', $device_id);

    $query = $this->db->get();

    if ($query->num_rows() == 1) {
      $this->db->where('device_id', $device_id);
      $this->db -> delete('devices');
      return True;
    }else{
      return False;
    }
  }

  public function add($user_id,$device_alias,$device_serial_number)
  {

    $this->db->select('device_sn');
    $this->db->from('devices');
    $this->db->where('device_sn', $device_serial_number);
    $this->db->where('device_user_id', $user_id);

    $query = $this->db->get();

    if($query->num_rows() > 0)
    {
      return "exist";
    }

    $data = array(
      'device_user_id' => $user_id,
      'device_alias' => $device_alias,
      'device_sn' => $device_serial_number,
      'device_topic' => $user_id."-".$this->generateRandomString(10)
    );

    if ($this->db->insert('devices', $data))
    {
      return "success";
    }
    else
    {
      return "fail";
    }
  }

  function generateRandomString($length = 10)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }


}
