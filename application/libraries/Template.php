<?php

class template
{

    protected $_ci;

    function __construct()
    {
        $this->_ci = &get_instance();
    }

    function admin($template, $data = null)
    {
		//$where = "(role = '". $this->session->userdata('level') ."' OR role = '') AND aktif = 1 AND parent = 0";
		$where = "aktif = 1 AND parent = 0";
		$data['menu'] = $this->_ci->db->get_where('tbl_menu', $where)->result();
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $data['_head'] = $this->_ci->load->view('Template/admin/header', $data, true);
        $data['_navbar'] = $this->_ci->load->view('Template/admin/navbar', $data, true);
        $data['_sidebar'] = $this->_ci->load->view('Template/admin/sidebar', $data, true);
        $data['_headerNav'] = $this->_ci->load->view('Template/admin/headerNav', $data, true);
        $data['_footer'] = $this->_ci->load->view('Template/admin/footer', $data, true);
        $this->_ci->load->view('Template/admin/Body_admin.php', $data);
    }

}
