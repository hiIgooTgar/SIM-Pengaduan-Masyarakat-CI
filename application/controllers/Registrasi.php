<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

    private $_table = "users"; 
    const SESSION_KEY = 'user_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
    }

    public function index()
    {
        $this->load->view('registrasi'); 
    }

    public function processRegistration()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nik = $this->input->post('nik');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $telp = $this->input->post('telp');
        $level = 'masyarakat';
        $status = 1; 

        $existingUser = $this->db->get_where('users', array('username' => $username))->row();
        if ($existingUser) {
            $this->session->set_flashdata('notif_error', 'Username sudah ada. mungkin yang lain nama Usernamenya!');
            redirect('Registrasi', 'refresh');
        }

        $encryptedPassword = $this->encryption->encrypt($password);

        $userData = array(
            'username' => $username,
            'password' => $encryptedPassword,
            'nik' => $nik,
            'nama_lengkap' => $nama_lengkap,
            'telp' => $telp,
            'level' => $level,
            'status' => $status
        );

        $this->db->insert($this->_table, $userData);

        $this->session->set_flashdata('notif_berhasil', 'Registrasi berhasil! Anda sekarang dapat masuk.');

        redirect('Login', 'refresh');
    }
}
