<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // GANTI DENGAN NAMA MODEL KAMU YANG BENAR: M_barang
        $this->load->model('M_barang'); 
        header('Content-Type: application/json');
    }

    public function get_barang() {
        // Panggil fungsi yang ada di dalam M_barang kamu (misal: get_all(), get_barang(), atau sejenisnya)
        // Atau jika menggunakan query builder bawaan CI:
        $data = $this->db->get('barang')->result_array();

        echo json_encode([
            'status'  => true,
            'message' => 'Berhasil mengambil data',
            'data'    => $data
        ]);
    }

    public function tambah_barang() {
        $nama_barang = $this->input->post('nama_barang');
        $kategori    = $this->input->post('kategori');
        $jenis       = $this->input->post('jenis');
        $lokasi      = $this->input->post('lokasi');
        $titipan     = $this->input->post('titipan');

        $data_insert = [
            'nama_barang'   => $nama_barang,
            'kategori'      => $kategori,
            'jenis'         => $jenis,
            'lokasi'        => $lokasi,
            'titipan'       => $titipan,
            'tanggal_waktu' => date('Y-m-d H:i:s')
        ];

        $insert = $this->db->insert('barang', $data_insert);

        if ($insert) {
            echo json_encode([
                'status'  => true,
                'message' => 'Berhasil menyimpan data!'
            ]);
        } else {
            echo json_encode([
                'status'  => false,
                'message' => 'Gagal menyimpan ke database'
            ]);
        }
    }
}