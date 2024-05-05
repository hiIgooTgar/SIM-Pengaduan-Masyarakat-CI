<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('encryption');		
		if ($this->session->userdata('isLogin')==false) {
			redirect('login');
		}
	}

    private $table = "users";
 
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function select($id_users)
	{
		return $this->db->get_where('users', array('id_users' => $id_users))->row();
	}

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->select($user_id); 

        $data['app_title'] = 'Profile User';
        $data['app_url'] = base_url('profile_users');
        $this->template->admin('profile_users/index', $data);
    }

    // Function to update user data
	public function updateUser()
	{
		$user_id = $this->session->userdata('user_id');
		$user = $this->select($user_id);

		// Retrieve data from the form
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nik = $this->input->post('nik');
		$telp = $this->input->post('telp');

		// Update user data in the database
		$data = array(
			'nama_lengkap' => $nama_lengkap,
			'nik' => $nik,
			'telp' => $telp,
		);

		$this->db->where('id_users', $user_id);
		$this->db->update('users', $data);

		$this->session->set_flashdata('notif', 'Data user berhasil diupdate');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('profile_users');
	}
}