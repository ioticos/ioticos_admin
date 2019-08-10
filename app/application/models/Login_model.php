<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function login($email, $password)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_email', $email);
        $this->db->where('user_password', $password);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            $result = $query->row();
            $user_id = $result->user_id;

            $this->session->set_userdata(array(
                'user_id' => $result->user_id,
                'user_name' => $result->user_name,
                'user_email' => $result->user_email,
                'user_image' => $result->user_image
            ));

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
