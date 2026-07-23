<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu!');
            redirect('login');
        }
        
        $this->load->model('M_barang');
    }

    // 1. TAMPILKAN DAFTAR BARANG
    public function index() {
        $data['barang'] = $this->M_barang->get_all_barang();
        $data['title'] = "Kelola Barang Lost & Found";

        $this->load->view('admin/barang_index_view', $data);
    }

    // 2. FORM TAMBAH BARANG
    public function addBarang() {
        $data['kategori'] = $this->M_barang->get_all_kategori();
        $this->load->view('admin/barang_tambah_view', $data);
    }

    // 3. PROSES SIMPAN BARANG
    public function simpanBarang() {
        $jenis_laporan = $this->input->post('jenis_laporan');
        $tempat_penitipan = $this->input->post('tempat_penitipan');

        // SINKRONISASI TITIPAN: Jika barang hilang, paksa nilainya jadi '-' agar seragam dengan Android
        if ($jenis_laporan == 'hilang') {
            $tempat_penitipan = '-';
        }

        $data = [
            'id_user'          => $this->session->userdata('id_user') ? $this->session->userdata('id_user') : 1, 
            'nama_barang'      => $this->input->post('nama_barang'),
            'id_kategori'      => $this->input->post('id_kategori'),
            'jenis_laporan'    => $jenis_laporan, 
            'deskripsi'        => $this->input->post('deskripsi'),
            'lokasi_kejadian'  => $this->input->post('lokasi_kejadian'),
            'tanggal_kejadian' => $this->input->post('tanggal_kejadian'),
            'waktu'            => $this->input->post('waktu'),
            'tempat_penitipan' => $tempat_penitipan,
            'status'           => 'Mencari Pemilik', 
            'foto_barang'      => 'default.jpg' 
        ];

        $simpan = $this->M_barang->insert_barang($data);

        if ($simpan) {
            $this->session->set_flashdata('sukses', 'Data barang berhasil disimpan!');
            redirect('admin/barang');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data barang!');
            redirect('admin/tambahBarang');
        }
    }

    // 4. FORM EDIT BARANG
    public function editBarang($id) {
        $data['barang'] = $this->M_barang->barang_by_id($id);
        $data['kategori'] = $this->M_barang->get_all_kategori();

        $this->load->view('admin/barang_edit_view', $data);
    }

    // 5. PROSES UPDATE DATA BARANG
    public function updateBarang() {
        $id = $this->input->post('id_barang');
        $jenis_laporan = $this->input->post('jenis_laporan');
        $tempat_penitipan = $this->input->post('tempat_penitipan');

        // SINKRONISASI TITIPAN SAAT UPDATE: Jaga konsistensi data jika jenis laporan diubah
        if ($jenis_laporan == 'hilang') {
            $tempat_penitipan = '-';
        }
        
        $data = [
            'nama_barang'      => $this->input->post('nama_barang'),
            'id_kategori'      => $this->input->post('id_kategori'),
            'jenis_laporan'    => $jenis_laporan,
            'deskripsi'        => $this->input->post('deskripsi'),
            'lokasi_kejadian'  => $this->input->post('lokasi_kejadian'),
            'tanggal_kejadian' => $this->input->post('tanggal_kejadian'),
            'waktu'            => $this->input->post('waktu'),
            'tempat_penitipan' => $tempat_penitipan,
            'status'           => $this->input->post('status') 
        ];

        $update = $this->M_barang->update_barang($data, $id);

        if ($update) {
            $this->session->set_flashdata('sukses', 'Data barang berhasil diperbarui!');
            redirect('admin/barang');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data barang!');
            redirect('admin/editBarang/' . $id);
        }
    }

    // 6. PROSES HAPUS BARANG
    public function hapusBarang($id) {
        $delete = $this->M_barang->delete_barang($id);

        if ($delete) {
            $this->session->set_flashdata('sukses', 'Data barang berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data barang!');
        }
        redirect('admin/barang');
    }
}