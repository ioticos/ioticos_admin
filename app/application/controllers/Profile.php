<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model');

		if(!isset($_SESSION['user_id'])){
			redirect(base_url('login'), 'refresh');
		}
	}

  public function index()
  {
		$this->load->view('head');
		$this->load->view('scripts');
		$this->load->view('open');
		$this->load->view('header');
		$this->load->view('sidebar');
    $this->load->view('contents/profile');
		$this->load->view('close');
  }

	public function change(){
	$user_id = $this->session->userdata('user_id');

	//$numero = strip_tags($this->input->post('numero'));
	$username = strip_tags($this->input->post('user_name'));
	$password= sha1(strip_tags($this->input->post('password')));
	$email= strip_tags($this->input->post('email'));

	//echo "<pre>";
	//print_r($retiro_local);
	//echo "</pre>";
	//die();
	$config['upload_path']          = '../images/';
	$config['allowed_types']        = 'jpg|png|jpeg';
	$config['max_size']             = 3000000;
	$config['max_width']            = 5000;
	$config['max_height']           = 5000;

	$this->load->library('upload', $config);

	$file_ext1 = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

	$file_name1 = $_FILES['image']['name'];
	$file_name1 = "https://ioticosadmin.ml/images/".$file_name1;

	$upload_data =  $this->upload->do_upload('image');

	$this->session->set_userdata(array(
			'user_name' => $username,
			'user_email' => $email,
			'user_image' => $file_name1
	));

	$this->db->set('user_name', $username);
	$this->db->set('user_password', $password);
	$this->db->set('user_email', $email);
	$this->db->set('user_image', $file_name1);
	$this->db->where('user_id', $user_id);
	$this->db->update('users');


	redirect(base_url('/profile') , 'refresh');

	}
}
