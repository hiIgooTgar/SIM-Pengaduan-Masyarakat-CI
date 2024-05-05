<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_masyarakat extends CI_Controller {

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

    public function index()
    {
        $data['app_title'] = 'Data Masyarakat';
		$data['app_url'] = base_url('beranda');
        $data['masyarakat'] = $this->getAll();
        $this->template->admin('data_masyarakat/index', $data);
    }

	public function select($id_users)
	{
		return $this->db->get_where('users', array('id_users' => $id_users))->row();
	}

	public function show($id_users)
	{
		$data['app_title'] = 'Detail Data Masyarakat';
		$data['app_url'] = base_url('data_masyarakat');
		$data['masyarakat'] = $this->select($id_users);
		$this->template->admin('data_masyarakat/detail', $data);
	}

	public function create()
	{
		$data['app_title'] = 'Tambah Data Masyarakat';
		$data['app_url'] = base_url('data_masyarakat');
		$this->template->admin('data_masyarakat/create', $data);
	}

	public function store()
	{
	$password = $this->encryption->encrypt($this->input->post('password'));
		$object = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'nik' => $this->input->post('nik'),
			'username' => $this->input->post('username'),
			'password' => $password,
			'level' => 'masyarakat',
			'telp' => $this->input->post('telp'),
			'status' => $this->input->post('status'),
		);
		$this->db->insert('users', $object);
		$this->session->set_flashdata('notif', 'Data berhasil ditambahkan!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('data_masyarakat');
	}
    
	public function edit($id_users)
	{
		$data['app_title'] = 'Edit Data Masyarakat';
		$data['app_url'] = base_url('data_masyarakat');
		$data['masyarakat'] = $this->select($id_users);
		$this->template->admin('data_masyarakat/edit', $data);
	}

	public function update()
	{
		$password = $this->encryption->encrypt($this->input->post('password'));
		$object = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'nik' => $this->input->post('nik'),
			'username' => $this->input->post('username'),
			'password' => $password,
			'level' => $this->input->post('level'),
			'telp' => $this->input->post('telp'),
			'status' => $this->input->post('status'),
		);
		$this->db->where('id_users', $this->input->post('id_users'));
		$this->db->update('users', $object );
		$this->session->set_flashdata('notif', 'Data berhasil diubah!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('data_masyarakat');
	}

	public function destroy($id_users)
	{
		$this->db->delete('users', array('id_users' => $id_users));
		$this->session->set_flashdata('notif', 'Data berhasil dihapus!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('data_masyarakat');
	}
	
}

