<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {


  public function register ($name, $email, $password)
  {

    $this->db->select('user_email');
    $this->db->from('users');
    $this->db->where('user_email', $email);

    $query = $this->db->get();

    if($query->num_rows() > 0)
    {
      return "exist";
    }
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
