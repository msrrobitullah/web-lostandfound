<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {
    
    // Mengambil semua data barang bergabung dengan nama kategorinya
    public function get_all_barang() {
        $this->db->select('barang.*, kategori.nama_kategori');
        $this->db->from('barang');
        // Pastikan nama kolom primary key di tabel kategori adalah 'id_kategori' atau 'id' sesuai database Anda nanti
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_barang($data) {
        return $this->db->insert('barang', $data);
    }

    public function barang_by_id($id) {
        // Menyesuaikan dengan nama kolom primary key, misal 'id_barang'
        return $this->db->get_where('barang', array('id_barang' => $id))->row();
    }

    public function update_barang($data, $id) {
        $this->db->where('id_barang', $id);
        return $this->db->update('barang', $data);
    }

    public function delete_barang($id) {
        $this->db->where('id_barang', $id);
        return $this->db->delete('barang');
    }
    
    // Dibutuhkan untuk dropdown kategori di form tambah/edit barang
    public function get_all_kategori() {
        $query = $this->db->get('kategori');
        return $query->result();
    }
}