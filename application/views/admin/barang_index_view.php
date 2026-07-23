<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #050505;
            --bg-card: rgba(22, 27, 34, 0.7);
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
            --accent-glide: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --border-color: rgba(255, 255, 255, 0.08);
        }
        body {
            background-color: var(--bg-body);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-primary);
            margin: 0;
            padding: 40px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        h1 {
            margin: 0;
            font-size: 2rem;
            background: var(--accent-glide);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .btn-add {
            padding: 12px 24px;
            background: var(--accent-glide);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }
        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .alert-success {
            background-color: rgba(16, 185, 129, 0.2);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.4);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--bg-card);
            backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            overflow: hidden;
        }
        th, td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }
        th {
            background-color: rgba(255, 255, 255, 0.03);
            color: var(--text-secondary);
            font-size: 0.85rem;
            text-transform: uppercase;
            font-weight: 700;
        }
        td {
            font-size: 0.95rem;
        }
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
        }
        .badge-temuan {
            background-color: rgba(16, 185, 129, 0.2);
            color: #10b981;
        }
        .badge-hilang {
            background-color: rgba(239, 68, 68, 0.2);
            color: #ef4444;
        }
        .btn-action {
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            margin-right: 5px;
            display: inline-block;
        }
        .btn-edit {
            background-color: rgba(59, 130, 246, 0.2);
            color: #3b82f6;
            border: 1px solid rgba(59, 130, 246, 0.4);
        }
        .btn-delete {
            background-color: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.4);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Daftar Barang Lost & Found</h1>
        <a href="<?php echo site_url('barang/addBarang'); ?>" class="btn-add">+ Tambah Laporan</a>
    </div>

    <!-- Notifikasi Sukses -->
    <?php if($this->session->flashdata('sukses')): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('sukses'); ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jenis</th>
                <th>Lokasi</th>
                <th>Tanggal & Waktu</th>
                <th>Titipan</th>
                <th>Status Admin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($barang)): ?>
                <?php $no = 1; foreach($barang as $row): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><strong><?php echo $row->nama_barang; ?></strong></td>
                    <td><?php echo $row->nama_kategori ? $row->nama_kategori : 'Umum'; ?></td>
                    <td>
                        <?php if(strtolower($row->jenis_laporan) == 'ditemukan'): ?>
                            <span class="badge badge-temuan">Temuan</span>
                        <?php else: ?>
                            <span class="badge badge-hilang">Hilang</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $row->lokasi_kejadian; ?></td>
                    <td>
                        <?php echo date('d-m-Y', strtotime($row->tanggal_kejadian)); ?><br>
                        <small style="color: var(--text-secondary);"><?php echo date('H:i', strtotime($row->waktu)); ?> WIB</small>
                    </td>
                    <td>
                        <?php echo (!empty($row->tempat_penitipan) && strtolower($row->jenis_laporan) == 'ditemukan') ? $row->tempat_penitipan : '-'; ?>
                    </td>
                    <td>
                        <span style="color: #6366f1; font-weight: 600;"><?php echo $row->status; ?></span>
                    </td>
                    <td>
                        <a href="<?php echo site_url('barang/editBarang/' . $row->id_barang); ?>" class="btn-action btn-edit">Edit</a>
                        <a href="<?php echo site_url('barang/hapusBarang/' . $row->id_barang); ?>" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" style="text-align: center; color: var(--text-secondary);">Belum ada data barang.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>