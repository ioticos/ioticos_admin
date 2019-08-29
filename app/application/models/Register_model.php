<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {


  public function register ($name, $email, $password)
  {

    //ante todo debemos ver si ese email que nos pasa el usuario existe en la base de datos, para
    // no tener usuarios duplicados
    $this->db->select('user_email');
    $this->db->from('users');
    $this->db->where('user_email', $email);

    $query = $this->db->get();

    //si existe...
    if($query->num_rows() > 0)
    {
      return "exist";
    }

    //si no existe entonces procedemos a cargar en base de datos
    else
    {

      //cargamos el usuario
      $data = array(
        'user_email' => $email,
        'user_password' =>  sha1($password),
        'user_name' => $name
      );

      if ($this->db->insert('users', $data))
      {
        return "success";
      }
      else
      {
        return "fail";
      }
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
