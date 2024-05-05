<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		// $this->session->sess_destroy();
		$this->session->unset_userdata('isLogin');
		$this->session->set_flashdata('notif_logout', 'Logout berhasil!');
		redirect('login','refresh');	
	}

}
