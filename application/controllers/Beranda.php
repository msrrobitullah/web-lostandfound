<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    // 1. HALAMAN UTAMA / LANDING PAGE PUBLIK
    public function index()
    {
        // UBAH DI SINI: dari 'beranda_view' menjadi 'beranda'
        $this->load->view('beranda'); 
    }

    // 2. HALAMAN DASHBOARD ADMIN
    public function admin_index()
    {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu!');
            redirect('login');
        }

        $this->load->view('admin_dashboard_view');
    }
}