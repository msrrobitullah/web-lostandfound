<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Proteksi Keamanan
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu!');
            redirect('login');
        }
        
        // Load model untuk database users
        $this->load->model('M_users');
    }

    // 1. TAMPILKAN DATA USERS
    public function index() {
        $data['users'] = $this->M_users->get_all_users();
        $data['title'] = "Kelola Users";
        
        $this->load->view('admin/users_index_view', $data);
    }

    // 2. FORM TAMBAH USER
    public function addUsers() {
        $this->load->view('admin/users_tambah_view');
    }

    // 3. PROSES SIMPAN USER
    public function simpanUsers() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama_lengkap = $this->input->post('nama_lengkap');

        $data_insert = array(
            'username'     => $username,
            'password'     => md5($password), // Menggunakan MD5 sesuai rancangan awal Anda
            'nama_lengkap' => $nama_lengkap
        );

        $this->M_users->insert_user($data_insert);

        $this->session->set_flashdata('sukses', 'Data user berhasil ditambahkan!');
        redirect('admin/users');
    }

    // 4. FORM EDIT USER
    public function editUsers($id) {
        $data['user'] = $this->M_users->get_user_by_id($id);
        $this->load->view('admin/users_edit_view', $data);
    }

    // 5. PROSES UPDATE USER
    public function updateUsers() {
        $id = $this->input->post('id_user');
        $username = $this->input->post('username');
        $nama_lengkap = $this->input->post('nama_lengkap');

        $data_update = array(
            'username'     => $username,
            'nama_lengkap' => $nama_lengkap
        );

        $password = $this->input->post('password');
        if (!empty($password)) {
            $data_update['password'] = md5($password);
        }

        $this->M_users->update_user($id, $data_update);

        $this->session->set_flashdata('sukses', 'Data user berhasil diperbarui!');
        redirect('admin/users');
    }

    // 6. PROSES HAPUS USER
    public function hapusUsers($id) {
        $this->M_users->delete_user($id);

        $this->session->set_flashdata('sukses', 'Data user berhasil dihapus!');
        redirect('admin/users');
    }
}