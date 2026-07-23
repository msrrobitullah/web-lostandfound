<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Laporan</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #050505;
            --bg-card: rgba(22, 27, 34, 0.7);
            --bg-input: rgba(0, 0, 0, 0.4);
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
            --accent-glide: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            --accent-primary: #3b82f6;
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
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
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
    <h2>Edit Data Laporan</h2>
    
    <form action="<?php echo site_url('barang/updateBarang'); ?>" method="post">
        <!-- Hidden ID Barang untuk proses update -->
        <input type="hidden" name="id_barang" value="<?php echo $barang->id_barang; ?>">
        
        <div class="form-group">
            <label>NAMA BARANG *</label>
            <input type="text" name="nama_barang" required value="<?php echo $barang->nama_barang; ?>">
        </div>

        <div class="row-flex">
            <div class="form-group">
                <label>KATEGORI *</label>
                <select name="id_kategori" required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach($kategori as $kat): ?>
                        <option value="<?php echo $kat->id_kategori; ?>" <?php echo ($kat->id_kategori == $barang->id_kategori) ? 'selected' : ''; ?>>
                            <?php echo $kat->nama_kategori; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>JENIS LAPORAN *</label>
                <select name="jenis_laporan" id="jenis_laporan" required onchange="togglePenitipan()">
                    <option value="ditemukan" <?php echo ($barang->jenis_laporan == 'ditemukan') ? 'selected' : ''; ?>>Barang Temuan</option>
                    <option value="hilang" <?php echo ($barang->jenis_laporan == 'hilang') ? 'selected' : ''; ?>>Barang Hilang</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>LOKASI KEJADIAN *</label>
            <input type="text" name="lokasi_kejadian" required value="<?php echo $barang->lokasi_kejadian; ?>">
        </div>

        <div class="row-flex">
            <div class="form-group">
                <label>TANGGAL KEJADIAN *</label>
                <input type="date" name="tanggal_kejadian" required value="<?php echo $barang->tanggal_kejadian; ?>">
            </div>
            <div class="form-group">
                <label>WAKTU KEJADIAN *</label>
                <input type="time" name="waktu" required value="<?php echo $barang->waktu; ?>">
            </div>
        </div>

        <div class="form-group">
            <label>STATUS VERIFIKASI (ADMIN) *</label>
            <select name="status" required>
                <!-- Menyesuaikan ENUM status verifikasi di database asli Anda -->
                <option value="Mencari Pemilik" <?php echo ($barang->status == 'Mencari Pemilik') ? 'selected' : ''; ?>>Mencari Pemilik</option>
                <option value="Dicari" <?php echo ($barang->status == 'Dicari') ? 'selected' : ''; ?>>Dicari</option>
                <option value="Proses Klaim" <?php echo ($barang->status == 'Proses Klaim') ? 'selected' : ''; ?>>Proses Klaim</option>
                <option value="Selesai" <?php echo ($barang->status == 'Selesai') ? 'selected' : ''; ?>>Selesai / Sudah Diambil</option>
            </select>
        </div>

        <div class="form-group" id="group_penitipan">
            <label>DIMANA BARANG DITIPKAN? (Jika Temuan)</label>
            <select name="tempat_penitipan">
                <option value="Kantor Admin" <?php echo ($barang->tempat_penitipan == 'Kantor Admin') ? 'selected' : ''; ?>>Kantor Admin</option>
                <option value="Pos Satpam" <?php echo ($barang->tempat_penitipan == 'Pos Satpam') ? 'selected' : ''; ?>>Pos Satpam</option>
                <option value="Saya Bawa" <?php echo ($barang->tempat_penitipan == 'Saya Bawa') ? 'selected' : ''; ?>>Saya Bawa Sendiri</option>
                <option value="Lainnya" <?php echo ($barang->tempat_penitipan == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
            </select>
        </div>

        <div class="form-group">
            <label>DESKRIPSI TAMBAHAN</label>
            <textarea name="deskripsi" rows="3"><?php echo $barang->deskripsi; ?></textarea>
        </div>

        <button type="submit" class="btn-submit">Simpan Perubahan</button>
        <a href="<?php echo site_url('barang'); ?>" class="back-link">&larr; Batal & Kembali</a>
    </form>
</div>

<script>
    // Jalankan sekali saat halaman pertama kali dibuka
    document.addEventListener("DOMContentLoaded", function() {
        togglePenitipan();
    });

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