<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// 1. Koneksi ke Database
$host     = "localhost";
$username = "root";
$password = "";
$database = "db_lostfound_unuja";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    echo json_encode(["status" => "error", "message" => "Koneksi database gagal: " . mysqli_connect_error()]);
    exit();
}

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

if ($aksi == 'get_barang') {
    $query = "SELECT barang.*, kategori.nama_kategori 
              FROM barang 
              LEFT JOIN kategori ON barang.id_kategori = kategori.id_kategori 
              ORDER BY barang.id_barang DESC";
              
    $result = mysqli_query($koneksi, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $response]);

} else if ($aksi == 'simpan_barang') {
    
    // Tangkap data input dari Android
    $nama_barang      = !empty($_POST['nama_barang']) ? $_POST['nama_barang'] : '';
    $kategori_input   = !empty($_POST['id_kategori']) ? $_POST['id_kategori'] : 'Umum';
    $jenis_laporan    = !empty($_POST['jenis_laporan']) ? $_POST['jenis_laporan'] : 'ditemukan';
    $deskripsi        = !empty($_POST['deskripsi']) ? $_POST['deskripsi'] : '';
    $lokasi_kejadian  = !empty($_POST['lokasi_kejadian']) ? $_POST['lokasi_kejadian'] : '';
    $tanggal_kejadian = !empty($_POST['tanggal_kejadian']) ? $_POST['tanggal_kejadian'] : date('Y-m-d');
    $waktu            = !empty($_POST['waktu']) ? $_POST['waktu'] : date('H:i:s');
    $tempat_penitipan = !empty($_POST['tempat_penitipan']) ? $_POST['tempat_penitipan'] : null;

    // FIX: Semua fungsi mysqli_real_escape_string kini sudah memiliki 2 argumen ($koneksi, ...)
    $nama_barang      = mysqli_real_escape_string($koneksi, $nama_barang);
    $kategori_input   = mysqli_real_escape_string($koneksi, $kategori_input);
    $jenis_laporan    = mysqli_real_escape_string($koneksi, $jenis_laporan); // <-- SUDAH DIPERBAIKI DI SINI
    $deskripsi        = mysqli_real_escape_string($koneksi, $deskripsi);
    $lokasi_kejadian  = mysqli_real_escape_string($koneksi, $lokasi_kejadian);
    $tanggal_kejadian = mysqli_real_escape_string($koneksi, $tanggal_kejadian);
    $waktu            = mysqli_real_escape_string($koneksi, $waktu);
    
    if ($tempat_penitipan !== null) {
        $tempat_penitipan = "'" . mysqli_real_escape_string($koneksi, $tempat_penitipan) . "'";
    } else {
        $tempat_penitipan = "NULL";
    }

    if (empty($nama_barang)) {
        echo json_encode(["status" => "error", "message" => "Nama barang kosong!"]);
        exit();
    }

    // Handshake Foreign Key Kategori
    $id_kategori = 1; 
    if (is_numeric($kategori_input)) {
        $cek_kat = mysqli_query($koneksi, "SELECT id_kategori FROM kategori WHERE id_kategori = '$kategori_input'");
        if (mysqli_num_rows($cek_kat) > 0) {
            $id_kategori = $kategori_input;
        } else {
            $insert_kat = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('Umum')");
            $id_kategori = mysqli_insert_id($koneksi);
        }
    } else {
        $cek_kat = mysqli_query($koneksi, "SELECT id_kategori FROM kategori WHERE nama_kategori = '$kategori_input'");
        if (mysqli_num_rows($cek_kat) > 0) {
            $data_kat = mysqli_fetch_assoc($cek_kat);
            $id_kategori = $data_kat['id_kategori'];
        } else {
            $insert_kat = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$kategori_input')");
            $id_kategori = mysqli_insert_id($koneksi);
        }
    }

    // Normalisasi enum jenis laporan
    $jenis_laporan = strtolower($jenis_laporan);
    if ($jenis_laporan != 'hilang' && $jenis_laporan != 'ditemukan') {
        $jenis_laporan = 'ditemukan';
    }

    $id_user = '1'; 

    // Query simpan data barang
    $query = "INSERT INTO barang (id_user, id_kategori, jenis_laporan, nama_barang, deskripsi, lokasi_kejadian, tanggal_kejadian, waktu, tempat_penitipan) 
              VALUES ('$id_user', '$id_kategori', '$jenis_laporan', '$nama_barang', '$deskripsi', '$lokasi_kejadian', '$tanggal_kejadian', '$waktu', $tempat_penitipan)";

    if (mysqli_query($koneksi, $query)) {
        echo json_encode(["status" => "success", "message" => "Data barang berhasil disimpan ke server!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "SQL Error: " . mysqli_error($koneksi)]);
    }

} else {
    echo json_encode(["status" => "error", "message" => "Aksi tidak dikenali!"]);
}

mysqli_close($koneksi);
?>