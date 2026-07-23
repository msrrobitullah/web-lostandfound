<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang Baru</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #050505;
            --bg-card: rgba(22, 27, 34, 0.7);
            --bg-input: rgba(0, 0, 0, 0.4);
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
            --accent-glide: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --accent-primary: #6366f1;
        }
        body {
            background-color: var(--bg-body);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .form-container {
            width: 100%;
            max-width: 550px;
            padding: 40px;
            background: var(--bg-card);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
        }
        h2 {
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 1.8rem;
            background: var(--accent-glide);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .form-group {
            margin-bottom: 18px;
        }
        .row-flex {
            display: flex;
            gap: 15px;
        }
        .row-flex .form-group {
            flex: 1;
        }
        label {
            display: block;
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 8px;
            font-weight: 600;
        }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            background: var(--bg-input);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: white;
            font-family: inherit;
            font-size: 0.9rem;
            box-sizing: border-box;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--accent-primary);
        }
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: var(--accent-glide);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
            margin-top: 15px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Tambah Laporan Baru</h2>
    
    <!-- Arahkan action ke Controller 'simpanBarang' -->
    <form action="<?php echo site_url('barang/simpanBarang'); ?>" method="post">
        
        <div class="form-group">
            <label>NAMA BARANG *</label>
            <input type="text" name="nama_barang" required placeholder="Contoh: Kunci Motor Honda">
        </div>

        <div class="row-flex">
            <div class="form-group">
                <label>KATEGORI *</label>
                <select name="id_kategori" required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach($kategori as $kat): ?>
                        <option value="<?php echo $kat->id_kategori; ?>"><?php echo $kat->nama_kategori; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>JENIS LAPORAN *</label>
                <select name="jenis_laporan" id="jenis_laporan" required onchange="togglePenitipan()">
                    <!-- Value 'hilang' & 'ditemukan' menggunakan huruf kecil menyesuaikan ENUM di database Anda -->
                    <option value="ditemukan">Barang Temuan</option>
                    <option value="hilang">Barang Hilang</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>LOKASI KEJADIAN *</label>
            <input type="text" name="lokasi_kejadian" required placeholder="Contoh: Gedung, Ruangan, atau Area">
        </div>

        <div class="row-flex">
            <div class="form-group">
                <label>TANGGAL KEJADIAN *</label>
                <input type="date" name="tanggal_kejadian" required value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
                <label>WAKTU KEJADIAN *</label>
                <input type="time" name="waktu" required value="<?php echo date('H:i'); ?>">
            </div>
        </div>

        <!-- Kolom Penitipan ini akan otomatis sembunyi jika memilih 'Barang Hilang' -->
        <div class="form-group" id="group_penitipan">
            <label>DIMANA BARANG DITIPKAN? (Jika Temuan)</label>
            <select name="tempat_penitipan">
                <option value="Kantor Admin">Kantor Admin</option>
                <option value="Pos Satpam">Pos Satpam</option>
                <option value="Saya Bawa">Saya Bawa Sendiri</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>

        <div class="form-group">
            <label>DESKRIPSI TAMBAHAN</label>
            <textarea name="deskripsi" rows="3" placeholder="Ciri khusus, warna, atau kondisi barang..."></textarea>
        </div>

        <button type="submit" class="btn-submit">Kirim Laporan</button>
        <a href="<?php echo site_url('barang'); ?>" class="back-link">&larr; Kembali ke Dashboard</a>
    </form>
</div>

<script>
    // Fungsi sederhana untuk menyembunyikan/menampilkan kolom tempat penitipan (sama seperti logika di Android)
    function togglePenitipan() {
        var jenis = document.getElementById("jenis_laporan").value;
        var groupPenitipan = document.getElementById("group_penitipan");
        
        if (jenis === "hilang") {
            groupPenitipan.style.display = "none";
        } else {
            groupPenitipan.style.display = "block";
        }
    }
</script>

</body>
</html>