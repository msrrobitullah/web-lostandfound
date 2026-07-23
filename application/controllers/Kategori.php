<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu!');
            redirect('login');
        }
        
        $this->load->model('M_kategori');
    }

    // 1. TAMPILKAN DAFTAR KATEGORI
    public function index() {
        $data['kategori'] = $this->M_kategori->get_all_kategori();
        $data['title'] = "Kelola Kategori Barang";

        $this->load->view('admin/kategori_index_view', $data);
    }

    // 2. FORM TAMBAH KATEGORI
    public function addKategori() {
        $this->load->view('admin/kategori_tambah_view');
    }

    // 3. PROSES SIMPAN KATEGORI
    public function simpanKategori() {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'keterangan'    => $this->input->post('keterangan')
        ];

        $simpan = $this->M_kategori->insert_kategori($data);

        if ($simpan) {
            $this->session->set_flashdata('sukses', 'Kategori baru berhasil ditambahkan!');
            redirect('admin/kategori');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan kategori!');
            redirect('admin/tambahKategori');
        }
    }

    // 4. FORM EDIT KATEGORI
    public function editKategori($id) {
        $data['kategori'] = $this->M_kategori->get_kategori_by_id($id);
        $this->load->view('admin/kategori_edit_view', $data);
    }

    // 5. PROSES UPDATE KATEGORI
    public function updateKategori() {
        $id = $this->input->post('id_kategori');
        
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'keterangan'    => $this->input->post('keterangan')
        ];

        $update = $this->M_kategori->update_kategori($data, $id);

        if ($update) {
            $this->session->set_flashdata('sukses', 'Kategori berhasil diperbarui!');
            redirect('admin/kategori');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui kategori!');
            redirect('admin/editKategori/' . $id);
        }
    }

    // 6. PROSES HAPUS KATEGORI
    public function hapusKategori($id) {
        $delete = $this->M_kategori->delete_kategori($id);

        if ($delete) {
            $this->session->set_flashdata('sukses', 'Kategori berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus kategori!');
        }
        redirect('admin/kategori');
    }
}