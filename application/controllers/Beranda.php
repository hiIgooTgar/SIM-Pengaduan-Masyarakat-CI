<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $data['app_title'] = 'Dashboard';
        $data['app_url'] = base_url('beranda');
    
        $this->template->admin('beranda/index.php', $data);
    }
    
    
    
}
