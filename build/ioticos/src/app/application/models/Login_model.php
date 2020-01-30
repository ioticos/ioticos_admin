<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function login($email, $password)
    {
        //corroboramos si hay un usuario con dicho email y pass
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_email', $email);
        $this->db->where('user_password', $password);

        $query = $this->db->get();

        //si lo hay...
        if ($query->num_rows() == 1) {

            $result = $query->row();

            $user_id = $result->user_id;

            //cargo todos sus datos en variable de sesión (nos puede servir luego en otro .php del sistema)
            $this->session->set_userdata(array(
                'user_id' => $result->user_id,
                'user_name' => $result->user_name,
                'user_email' => $result->user_email,
                'user_image' => $result->user_image,
                'selected_device' => $result->user_selected_device
            ));


            //obtengo cual es el dispositivo seleccionado que tiene ese usuario (ver columna selected_device) de la tabla users
            //de esta manera entramos al dashboard sabiendo cual es el dispo que el usuario dejó seleccionado, mostrando el selector correctamente configurado, o sea mostrando el dispo seleccionado.
            $this->db->select('*');
            $this->db->from('devices');
            $this->db->where('device_user_id', $user_id);
            $this->db->where('device_id', $_SESSION['selected_device']);

            $result =	$this->db->get()->result_array();

            //luego de hacer la consulta, puede que estemos ante un usuario nuevo, que no tenga dispo creado por ende ninguno seleccionado
            //entonces con este if prevengo error,
            //si no encuentro dispo seleccionado entonces no intento cargar en memoria de sesión
            if (count($result)==1){
                $_SESSION['selected_topic'] = $result[0]['device_topic'];
            }

            $_SESSION['msg_type'] = "";
            $_SESSION['msg_title'] = "";
            $_SESSION['msg_body'] = "";
            $_SESSION['msg_footer'] = "";

            return 1;
        } else {
            return 0;
        }
    }
}
