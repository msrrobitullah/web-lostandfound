<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING - PROYEK LOST AND FOUND UNUJA (FINAL CLEAN VERSION)
| -------------------------------------------------------------------------
*/

// Halaman Utama / Landing Page Aplikasi
$route['default_controller'] = 'beranda';

// ==========================================
// MODULE: AUTH / LOGIN (Menggunakan Controller Login)
// ==========================================
$route['login']        = 'login';           // Halaman form login
$route['login/proses'] = 'login/proses';    // Aksi submit/proses login
$route['logout']       = 'login/logout';    // Aksi logout

// ==========================================
// MODULE: BERANDA / DASHBOARD ADMIN
// ==========================================
$route['admin/dashboard'] = 'beranda/admin_index'; 

// ==========================================
// MODULE: USERS (Kelola Pengguna)
// ==========================================
$route['admin/users']             = 'users'; 
$route['admin/tambahUsers']       = 'users/addUsers';
$route['admin/simpanUsers']       = 'users/simpanUsers';
$route['admin/editUsers/(:num)']  = 'users/editUsers/$1';
$route['updateUsers']             = 'users/updateUsers';
$route['admin/hapusUsers/(:num)'] = 'users/hapusUsers/$1';

// ==========================================
// MODULE: BARANG (Lost & Found Items)
// ==========================================
$route['admin/barang']             = 'barang';
$route['admin/tambahBarang']       = 'barang/addBarang';
$route['admin/simpanBarang']       = 'barang/simpanBarang';
$route['admin/editBarang/(:num)']  = 'barang/editBarang/$1';
$route['updateBarang']             = 'barang/updateBarang';
$route['admin/hapusBarang/(:num)'] = 'barang/hapusBarang/$1';

// ==========================================
// MODULE: KATEGORI BARANG
// ==========================================
$route['admin/kategori']             = 'kategori';
$route['admin/tambahKategori']       = 'kategori/addKategori';
$route['admin/simpanKategori']       = 'kategori/simpanKategori';
$route['admin/editKategori/(:num)']  = 'kategori/editKategori/$1';
$route['updateKategori']             = 'kategori/updateKategori';
$route['admin/hapusKategori/(:num)'] = 'kategori/hapusKategori/$1';

// ==========================================
// SYSTEM OVERRIDES
// ==========================================
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;