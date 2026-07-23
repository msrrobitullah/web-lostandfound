<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat model barang bawaan kamu
        $this->load->model('Barang_model'); 
        // Mengatur header agar output dibaca sebagai JSON
        header('Content-Type: application/json');
    }

    // 1. GET: Mengambil semua data untuk ditampilkan di HP Android
    public function get_barang() {
        $data = $this->db->get('barang')->result_array(); // Sesuaikan nama tabelmu

        echo json_encode([
            'status'  => true,
            'message' => 'Data barang berhasil diambil',
            'data'    => $data
        ]);
    }

    // 2. POST: Menerima data baru yang diinput dari HP Android
    public function tambah_barang() {
        $nama_barang = $this->input->post('nama_barang');
        $kategori    = $this->input->post('kategori');
        $jenis       = $this->input->post('jenis');
        $lokasi      = $this->input->post('lokasi');
        $titipan     = $this->input->post('titipan');

        if (empty($nama_barang) || empty($lokasi)) {
            echo json_encode([
                'status'  => false,
                'message' => 'Nama barang dan lokasi wajib diisi!'
            ]);
            return;
        }

        $data_insert = [
            'nama_barang'   => $nama_barang,
            'kategori'      => $kategori,
            'jenis'         => $jenis,
            'lokasi'        => $lokasi,
            'titipan'       => $titipan,
            'tanggal_waktu' => date('Y-m-d H:i:s'),
            'status_admin'  => 'Mencari Pemilik'
        ];

        $insert = $this->db->insert('barang', $data_insert); // Sesuaikan nama tabelmu

        if ($insert) {
            echo json_encode([
                'status'  => true,
                'message' => 'Data berhasil tersinkron ke Server/Website!'
            ]);
        } else {
            echo json_encode([
                'status'  => false,
                'message' => 'Gagal menyimpan data ke database'
            ]);
        }
    }
}