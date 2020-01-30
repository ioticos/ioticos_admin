<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Devices_model extends CI_Model
{

 //obtenemos la lista completa de dispositivos
  public function get_devices($user_id){
    $this->db->SELECT();
    $this->db->FROM('devices');
    $this->db->WHERE('device_user_id',$user_id);
    $result =	$this->db->get()->result_array();
    return $result;
  }

  //cambiamos el dispositivo seleccionado
  public function change_device($user_id, $device_id){

    //para evitar suplantación primero controlamos si el dispositivo que nos pasan le pertenece al usuario logueado
    $this->db->select('*');
    $this->db->from('devices');
    $this->db->where('device_user_id', $user_id);
    $this->db->where('device_id', $device_id);
    $result =	$this->db->get()->result_array();

    //si el dispositivo le pertenece entonces, lo cargamos al id del mismo en variable de sesión.
    if (count($result) == 1) {
      $this->db->set('user_selected_device', $device_id);
      $this->db->where('user_id', $user_id);
      $this->db->update('users');
      $_SESSION['selected_device'] = $device_id;
      $_SESSION['selected_topic'] = $result[0]['device_topic'];
    }else{
      return False;
    }
  }

  //elimina dispositivo, como siempre chequeamos antes de eliminar que ese dispo pertenezca al usuario logueado
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

  //agregar nuevo dispositivo
  public function add($user_id,$device_alias,$device_serial_number)
  {

    //comprobamos que no exista un dispositivo con el mismo numero de serie
    $this->db->select('device_sn');
    $this->db->from('devices');
    $this->db->where('device_sn', $device_serial_number);
    $this->db->where('device_user_id', $user_id);

    $query = $this->db->get();

    if($query->num_rows() > 0)
    {
      return "exist"; //si existe
    }

    //si no existe preparamos el array que será insertado como fila en la tabla devices
    $data = array(
      'device_user_id' => $user_id,
      'device_alias' => $device_alias,
      'device_sn' => $device_serial_number,
      'device_topic' => $this->generateRandomString(10)
    );

    if ($this->db->insert('devices', $data))
    {
      //A esta altura hemos logrado insertar el nuevo dispositivo, entonces, capturamos el id que mysql le ha asignado
      $device_id = $this->db->insert_id();

      //Teniendo el ID que le pertenece a eso dispositivo nos valemos de la función change_device, para dejar seleccionado al nuevo dispo
      $this->change_device($user_id,$device_id);

      return "success";
    }
    else
    {
      return "fail";
    }
  }

  //Función util para generar strings randoms.
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
