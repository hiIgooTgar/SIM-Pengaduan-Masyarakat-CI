<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('encryption');		
		if ($this->session->userdata('isLogin')==false) {
			redirect('login');
		}
	}

    public function index()
    {
        $data['app_title'] = 'Generate Laporan';
		$data['app_url'] = base_url('generate_laporan');

        $this->db->select('pengaduan.*, users.nama_lengkap');
        $this->db->from('pengaduan');
        $this->db->join('users', 'pengaduan.nik = users.nik', 'left');
        $data['generate_laporan'] = $this->db->get()->result();

        $this->template->admin('generate_laporan/index', $data);
    }

	public function select($id_users)
	{
		return $this->db->get_where('users', array('id_users' => $id_users))->row();
	}

	public function show($id_users)
	{
		$data['app_title'] = 'Data Masyarakat';
		$data['app_url'] = base_url('data_masyarakat');
		$data['masyarakat'] = $this->select($id_users);
		$this->template->admin('data_masyarakat/detail', $data);
	}

    public function pdfPrint()
    {
        $this->data['title_pdf'] = 'Data Generate Laporan';
        
        $file_pdf = 'Generate Laporan';
        $paper = 'A4';
        $orientation = "portrait";
        
        // Menggabungkan tabel pengaduan dan users berdasarkan kolom nik
        $this->db->select('pengaduan.*, users.nama_lengkap');
        $this->db->from('pengaduan');
        $this->db->join('users', 'pengaduan.nik = users.nik', 'left');
        $data['generate_laporan'] = $this->db->get()->result();
        
        $this->data['generate_laporan'] = $data['generate_laporan'];
        $html = $this->load->view('generate_laporan/pdf_view', $this->data, true);	    
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
    
	
}

