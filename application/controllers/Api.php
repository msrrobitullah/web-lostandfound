<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load database CodeIgniter
        $this->load->database();
        // Set header response agar dibaca sebagai JSON oleh Android
        header('Content-Type: application/json');
    }

    // =========================================================
    // GET: Mengambil Semua Data Barang untuk Tampil di Android
    // Endpoint: GET https://web-lostandfound-production.up.railway.app/api/get_barang
    // =========================================================
    public function get_barang() {
        // Ambil data barang diurutkan dari yang terbaru
        $this->db->order_by('id_barang', 'DESC');
        $data = $this->db->get('barang')->result_array();

        if (!empty($data)) {
            echo json_encode([
                'status'  => true,
                'message' => 'Berhasil mengambil data',
                'data'    => $data
            ]);
        } else {
            echo json_encode([
                'status'  => false,
                'message' => 'Data barang kosong',
                'data'    => []
            ]);
        }
    }

    // =========================================================
    // POST: Menambah Data Barang Baru dari Android
    // Endpoint: POST https://web-lostandfound-production.up.railway.app/api/tambah_barang
    // =========================================================
    public function tambah_barang() {
        // Tangkap input dari Android Retrofit
        $nama_barang = $this->input->post('nama_barang');
        $kategori    = $this->input->post('kategori');
        $jenis       = $this->input->post('jenis');
        $lokasi      = $this->input->post('lokasi');
        $titipan     = $this->input->post('titipan');

        // Normalisasi format jenis laporan agar sesuai kriteria enum/string database ('hilang' / 'ditemukan')
        $jenis_laporan = (strtolower($jenis) == 'temuan' || strtolower($jenis) == 'ditemukan') ? 'ditemukan' : 'hilang';

        // Penanganan ID Kategori (jika angka gunakan langsung, jika teks default ke 1)
        $id_kategori = is_numeric($kategori) ? $kategori : '1';

        // Susun array data sesuai nama kolom persis di tabel 'barang' MySQL
        $data_insert = [
            'id_user'          => 1, // Default user ID agar tidak memicu NULL error
            'id_kategori'      => $id_kategori,
            'jenis_laporan'    => $jenis_laporan,
            'nama_barang'      => $nama_barang ?: 'Barang Tanpa Nama',
            'deskripsi'        => $nama_barang ?: '-',
            'lokasi_kejadian'  => $lokasi ?: '-',
            'tanggal_kejadian' => date('Y-m-d'),
            'waktu'            => date('H:i:s'),
            'foto_barang'      => 'default.jpg',
            'tempat_penitipan' => !empty($titipan) ? $titipan : '-',
            'status'           => 'Mencari Pemilik',
            'is_validated'     => '0',
            'created_at'       => date('Y-m-d H:i:s')
        ];

        // Simpan ke database
        $insert = $this->db->insert('barang', $data_insert);

        if ($insert) {
            echo json_encode([
                'status'  => true,
                'message' => 'Berhasil menyimpan data ke database!'
            ]);
        } else {
            $db_error = $this->db->error();
            echo json_encode([
                'status'  => false,
                'message' => 'Gagal DB: ' . $db_error['message']
            ]);
        }
    }
}