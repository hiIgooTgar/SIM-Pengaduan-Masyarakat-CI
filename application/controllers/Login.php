<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    private $_table = "users";
    const SESSION_KEY = 'user_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
    }

    public function index()
    {
        $login = $this->session->userdata('isLogin');
        if ($login) {
            redirect('home', 'refresh');
        } else {
            $this->load->view('login-page');
        }
    }

    public function cekLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $queryAdmin = $this->db->get_where($this->_table, array('username' => $username));
        $resultAdmin = $queryAdmin->row();

        if ($queryAdmin->num_rows() > 0 && $this->encryption->decrypt($resultAdmin->password) === $password) {
            if ($resultAdmin->status == 1) { 
                $array = array(
                    'user_id' => $resultAdmin->id_users,
                    'nama_lengkap' => $resultAdmin->nama_lengkap,
                    'username' => $resultAdmin->username,
                    'nik' => $resultAdmin->nik,
                    'level' => $resultAdmin->level,
                    'isLogin' => true,
                );
                $this->session->set_userdata($array);
                $this->session->set_flashdata('notif_login', 'Login berhasil!');
                redirect('beranda', 'refresh');
            } else {
                $this->session->set_flashdata('notif', 'Akun Anda tidak aktif. Harap hubungi Administrator.');
                redirect('login', 'refresh');
            }
        } else {
            $this->session->set_flashdata('notif', 'Username atau Password Anda salah atau akun tidak ditemukan!');
            redirect('login', 'refresh');
        }
    }
}
