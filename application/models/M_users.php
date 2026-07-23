<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

    // Proses login dengan toleransi multi-enkripsi agar pasti tembus
    public function login_database($username, $password) {
        $this->db->where('nomor_induk', $username);
        $query = $this->db->get('users');
        
        if ($query->num_rows() == 1) {
            $user = $query->row();
            
            // 1. Cek jika password berupa teks biasa (tanpa enkripsi sama sekali)
            if ($password === $user->password) {
                return $user;
            }
            
            // 2. Cek jika password menggunakan MD5 bawaan lama
            if (md5($password) === $user->password) {
                return $user;
            }
            
            // 3. Cek jika password menggunakan password_hash() / Bcrypt
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        
        return FALSE;
    }

    public function get_all_users() {
        return $this->db->get('users')->result();
    }

    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('users', array('id_user' => $id))->row();
    }

    public function update_user($id, $data) {
        $this->db->where('id_user', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id) {
        $this->db->where('id_user', $id);
        return $this->db->delete('users');
    }
}