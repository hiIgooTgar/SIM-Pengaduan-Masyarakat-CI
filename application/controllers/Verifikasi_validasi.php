<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi_validasi extends CI_Controller {

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
        $data['app_title'] = 'Verifikasi dan Validasi';
		$data['app_url'] = base_url('verifikasi_validasi');

        $this->db->select('pengaduan.*, users.nama_lengkap');
        $this->db->from('pengaduan');
        $this->db->join('users', 'pengaduan.nik = users.nik', 'left');
        $data['verifikasi_validasi'] = $this->db->get()->result();

        $this->template->admin('verifikasi_validasi/index', $data);
    }

    public function belum($id_pengaduan)
    {

        $data = array('status' => '1');
        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('pengaduan', $data);

        $this->session->set_flashdata('notif', 'Pengaduan sudah diverifikasi!');
        $this->session->set_flashdata('sweet_alert', 'success');
        redirect('verifikasi_validasi');
    }

    public function proses($id_tanggapan)
	{
		$data['app_title'] = 'Form Tanggapi Laporan';
		$data['app_url'] = base_url('verifikasi_validasi');
		$data['verifikasi_validasi'] = $this->selectIdPengaduan($id_tanggapan);
		$this->template->admin('verifikasi_validasi/proses', $data);
	}

    public function prosesStore()
    {
        $id_users = $this->session->userdata('user_id'); 
        $id_pengaduan = $this->input->post('id_pengaduan');
        
        // Update status pengaduan menjadi 2 (selesai)
        $update_status = array(
            'status' => 2
        );
        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('pengaduan', $update_status);
        
        // Simpan tanggapan ke tabel tanggapan
        $tanggapan = array(
            'tgl_pengaduan' => date('Y-m-d'),
            'isi_tanggapan' => $this->input->post('isi_tanggapan'),
            'id_users' => $id_users,
            'id_pengaduan' => $id_pengaduan // Sesuaikan nama kolom dengan tabel Anda
        );
        $this->db->insert('tanggapan', $tanggapan);
        
        $this->session->set_flashdata('notif', 'Pengaduan sudah ditanggapi!');
        $this->session->set_flashdata('sweet_alert', 'success');
        redirect('verifikasi_validasi');
    }

    public function selesai($id_pengaduan)
	{
		$data['app_title'] = 'Detail Tanggapi Laporan';
		$data['app_url'] = base_url('verifikasi_validasi');
		$data['verifikasi_validasi'] = $this->selectIdTanggapan($id_pengaduan);
		$this->template->admin('verifikasi_validasi/selesai', $data);
	}

    public function edit($id_tanggapan)
	{
		$data['app_title'] = 'Edit Tanggapi Laporan';
		$data['app_url'] = base_url('verifikasi_validasi');
		$data['verifikasi_validasi'] = $this->selectIdTanggapan($id_tanggapan);
		$this->template->admin('verifikasi_validasi/edit', $data);
	}

    public function update() 
    {
		$object = array(
			'isi_tanggapan' => $this->input->post('isi_tanggapan')
		);
		$this->db->where('id_pengaduan', $this->input->post('id_pengaduan'));
		$this->db->update('tanggapan', $object );
		$this->session->set_flashdata('notif', 'Tanggapan pengaduan berhasil diubah!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('verifikasi_validasi');
    }
    
    
    public function selectIdTanggapan($id_pengaduan)
    {
        // Mengambil data pengaduan berdasarkan id_pengaduan
        $this->db->select('pengaduan.*, tanggapan.isi_tanggapan, users.nama_lengkap');
        $this->db->from('pengaduan');
        $this->db->join('tanggapan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan', 'left');
        $this->db->join('users', 'pengaduan.nik = users.nik', 'left');
        $this->db->where('pengaduan.id_pengaduan', $id_pengaduan);
        return $this->db->get()->row();
    }
    

	public function selectIdPengaduan($id_pengaduan)
	{
		return $this->db->get_where('pengaduan', array('id_pengaduan' => $id_pengaduan))->row();
	}

	
}

