<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load library yang dibutuhkan
        $this->load->library('session');
        $this->load->helper('url');
        
        // PERBAIKAN: Pengecekan redirect login dihapus dari sini agar tidak mencegat fungsi logout()
    }

    // Menampilkan Halaman Form Login
    public function index() {
        // PERBAIKAN: Pengecekan dipindah ke sini. 
        // Jika user MEMANG sudah login dan mencoba buka halaman form login, baru dilempar ke dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('admin/barang');
        }
        
        $this->load->view('login_view');
    }

    // Proses Autentikasi Form Login
    public function proses() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->model('M_users');
        $cek_login = $this->M_users->login_database($username, $password);

        if ($cek_login) {
            $session_data = [
                'id_user'       => $cek_login->id_user,
                'nomor_induk'   => $cek_login->nomor_induk,
                'nama_lengkap'  => $cek_login->nama_lengkap,
                'role'          => $cek_login->role,
                'logged_in'     => TRUE
            ];
            $this->session->set_userdata($session_data);
            
            redirect('admin/barang');
        } else {
            $this->session->set_flashdata('error', 'Nomor Induk atau Password salah/tidak terdaftar!');
            redirect('login');
        }
    }

    // Proses Logout
    public function logout() {
        // Sekarang fungsi ini bisa berjalan dengan aman tanpa dicegat construct
        $this->session->sess_destroy();
        redirect('login');
    }
}