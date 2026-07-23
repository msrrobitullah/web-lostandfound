<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Barang - Lost & Found UNUJA</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-body: #050505;
            --bg-card: rgba(22, 27, 34, 0.7);
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
            --accent-glide: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --accent-primary: #6366f1;
            --success: #10b981;
        }
        body {
            margin: 0; padding: 0;
            background-color: var(--bg-body);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-primary);
            min-height: 100vh;
            background-image: radial-gradient(circle at top right, rgba(99, 102, 241, 0.1), transparent 40%);
        }
        .container { max-width: 1200px; margin: 0 auto; padding: 40px 20px; }
        header { text-align: center; margin-bottom: 50px; }
        header h1 { font-size: 2.5rem; background: var(--accent-glide); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 10px; }
        header p { color: var(--text-secondary); }
        .grid-barang { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px; }
        .card { background: var(--bg-card); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 16px; padding: 20px; backdrop-filter: blur(12px); transition: transform 0.3s; }
        .card:hover { transform: translateY(-5px); border-color: var(--accent-primary); }
        .status { display: inline-block; padding: 4px 12px; background: rgba(16, 185, 129, 0.2); color: var(--success); border-radius: 20px; font-size: 0.8rem; font-weight: 600; margin-bottom: 15px; }
        .status.hilang { background: rgba(239, 68, 68, 0.2); color: #fca5a5; }
        .card h3 { margin: 0 0 10px 0; font-size: 1.3rem; }
        .card p { color: var(--text-secondary); font-size: 0.9rem; margin: 5px 0; }
        .meta-info { border-top: 1px solid rgba(255,255,255,0.05); margin-top: 15px; padding-top: 15px; font-size: 0.8rem; color: #64748b; }
        .btn-back { color: var(--text-secondary); text-decoration: none; display: inline-block; margin-bottom: 20px; font-size: 0.9rem; }
        .btn-back:hover { color: white; }
    </style>
</head>
<body>

    <div class="container">
        <a href="<?php echo base_url(); ?>" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
        
        <header>
            <h1>Katalog Barang Kampus</h1>
            <p>Daftar penemuan atau kehilangan barang terbaru di wilayah Universitas Nurul Jadid</p>
        </header>

        <div class="grid-barang">
            <?php if(!empty($barang)): ?>
                <?php foreach($barang as $b): ?>
                    <div class="card">
                        <span class="status <?php echo ($b->status == 'Hilang') ? 'hilang' : ''; ?>">
                            <i class="fas <?php echo ($b->status == 'Hilang') ? 'fa-question-circle' : 'fa-check-circle'; ?>"></i> 
                            <?php echo $b->status; ?>
                        </span>
                        <h3><?php echo htmlspecialchars($b->nama_barang); ?></h3>
                        <p><i class="fas fa-tags"></i> Kategori: <b><?php echo $b->nama_kategori; ?></b></p>
                        <p><i class="fas fa-map-marker-alt"></i> Lokasi: <?php echo htmlspecialchars($b->lokasi); ?></p>
                        <p><i class="fas fa-align-left"></i> Detail: <?php echo htmlspecialchars($b->deskripsi); ?></p>
                        <div class="meta-info">
                            <i class="fas fa-calendar-alt"></i> Tanggal: <?php echo date('d M Y', strtotime($b->tanggal)); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="grid-column: 1/-1; text-align: center; color: var(--text-secondary); padding: 40px 0;">
                    <i class="fas fa-box-open" style="font-size: 3rem; margin-bottom: 10px;"></i>
                    <p>Belum ada data barang laporan saat ini.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>