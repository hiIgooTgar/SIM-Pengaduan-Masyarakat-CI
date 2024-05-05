<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pengaduan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('encryption');		
		if ($this->session->userdata('isLogin')==false) {
			redirect('login');
		}
	}

    private $table = "pengaduan";
 
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function index()
    {
        $data['app_title'] = 'Laporan Pengaduan';
		$data['app_url'] = base_url('laporan_pengaduan');
        $data['laporan_pengaduan'] = $this->getAll();
        $this->template->admin('laporan_pengaduan/index', $data);
    }

    public function create()
	{
		$data['app_title'] = 'Tambah Laporan Pengaduan';
		$data['app_url'] = base_url('laporan_pengaduan');
		$this->template->admin('laporan_pengaduan/create', $data);
	}

    public function storePengaduan()
    {
        $config['upload_path'] = FCPATH . 'upload/pengaduan/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = true;
        $config['overwrite'] = true;
    
        $this->load->library('upload', $config);
        $this->upload->initialize($config); // Initialize the upload library

        if (!$this->upload->do_upload('foto')) {
            // If the upload fails, show an error message
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error_message', 'Gagal Tambah: ' . $error);
            redirect('laporan_pengaduan/create'); // Redirect back to the create form
        } else {
            // If the upload is successful
            $foto = $this->upload->data();
            $img = $foto['file_name'];
            $tgl_pengaduan = $this->input->post('tgl_pengaduan');
            $sessionNIK = $this->session->userdata('nik');
            $isi_laporan = $this->input->post('isi_laporan');
            $status = $this->input->post('status');
    
            $data = array(
                'tgl_pengaduan' => $tgl_pengaduan,
                'nik' => $sessionNIK,
                'isi_laporan' => $isi_laporan,
                'foto' => $img,
                'status' => $status,
            );
    
            $this->db->insert('pengaduan', $data);
            $this->session->set_flashdata('success_message', 'Data pengaduan berhasil ditambahkan!, silahkan tunggu tanggapan dari Petugas');
            redirect('laporan_pengaduan');
        }
    }
    
    public function selectIdTanggapan($id_pengaduan)
    {
        // Mengambil data pengaduan berdasarkan id_pengaduan
        $this->db->select('pengaduan.*, tanggapan.isi_tanggapan');
        $this->db->from('pengaduan');
        $this->db->join('tanggapan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan', 'left');
        $this->db->where('pengaduan.id_pengaduan', $id_pengaduan);
        return $this->db->get()->row();
    }

	public function show($id_masyarakat)
	{
        $data['app_title'] = 'Detail Laporan Pengaduan';
		$data['app_url'] = base_url('laporan_pengaduan');
		$data['laporan_pengaduan'] = $this->selectIdTanggapan($id_masyarakat);
		$this->template->admin('laporan_pengaduan/detail', $data);
	}

    public function edit($id_masyarakat)
	{
        $data['app_title'] = 'Edit Laporan Pengaduan';
		$data['app_url'] = base_url('laporan_pengaduan');
		$data['laporan_pengaduan'] = $this->selectIdTanggapan($id_masyarakat);
		$this->template->admin('laporan_pengaduan/edit', $data);
	}

    public function update()
    {
        $config['upload_path'] = FCPATH . 'upload/pengaduan/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = true;
        $config['overwrite'] = true;
    
        $this->load->library('upload', $config);
        $this->upload->initialize($config); // Initialize the upload library
    
        $id_pengaduan = $this->input->post('id_pengaduan');
        $existing_photo = $this->db->get_where('pengaduan', ['id_pengaduan' => $id_pengaduan])->row()->foto;
    
        if ($this->upload->do_upload('foto')) {
            // If a new photo is uploaded, replace the existing photo
            $foto = $this->upload->data();
            $img = $foto['file_name'];
        } else {
            // If no new photo is uploaded, retain the existing photo
            $img = $existing_photo;
        }
    
        $isi_laporan = $this->input->post('isi_laporan');
    
        $data = array(
            'isi_laporan' => $isi_laporan,
            'foto' => $img
        );
    
        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('pengaduan', $data);
    
        $this->session->set_flashdata('success_message', 'Data pengaduan berhasil diubah!');
        redirect('laporan_pengaduan');
    }
    



    public function destroy($id_pengaduan) {
        $this->db->delete('pengaduan', array('id_pengaduan' => $id_pengaduan));
        $this->session->set_flashdata('notif', 'Data pengaduan berhasil dihapus!');
		$this->session->set_flashdata('sweet_alert', 'success');
		redirect('laporan_pengaduan');
        
    }

}
