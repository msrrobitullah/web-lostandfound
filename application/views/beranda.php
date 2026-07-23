<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Lost & Found UNUJA</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-body: #050505;
            --bg-card: rgba(22, 27, 34, 0.7);
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --accent-primary: #6366f1;
            --accent-glide: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --shadow-card: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
            --ease-elastic: cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        body {
            margin: 0; padding: 0;
            background-color: var(--bg-body);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-primary);
            min-height: 100vh;
            display: flex; justify-content: center; align-items: center;
            background-image: radial-gradient(circle at top right, rgba(99, 102, 241, 0.15), transparent 40%),
                              radial-gradient(circle at bottom left, rgba(168, 85, 247, 0.15), transparent 40%);
        }

        .container {
            width: 90%; max-width: 800px; padding: 40px;
            background: var(--bg-card); backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 24px;
            box-shadow: var(--shadow-card); text-align: center;
            animation: fadeIn 0.8s var(--ease-elastic);
        }

        h1 {
            font-size: 2.5rem; font-weight: 700; margin-bottom: 10px;
            background: var(--accent-glide); -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }

        p.lead { color: var(--text-secondary); font-size: 1.1rem; line-height: 1.6; margin-bottom: 30px; }
        .grid-layanan { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin: 40px 0; }
        .card-fitur { background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.05); padding: 20px; border-radius: 16px; transition: all 0.3s ease; }
        .card-fitur:hover { transform: translateY(-5px); background: rgba(255, 255, 255, 0.06); border-color: var(--accent-primary); }
        .card-fitur .icon { font-size: 2rem; margin-bottom: 10px; }
        .card-fitur h3 { margin: 10px 0; font-size: 1.2rem; }
        .card-fitur p { font-size: 0.9rem; color: var(--text-muted); margin: 0; }

        .btn-jelajah {
            display: inline-block; padding: 14px 32px; background: var(--accent-glide);
            color: white; text-decoration: none; font-weight: 600; border-radius: 12px;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4); transition: all 0.3s ease;
        }

        .btn-jelajah:hover { transform: scale(1.05); box-shadow: 0 6px 20px rgba(99, 102, 241, 0.6); }
        .login-link { display: block; margin-top: 25px; color: var(--text-muted); text-decoration: none; font-size: 0.9rem; transition: color 0.3s; }
        .login-link:hover { color: var(--text-secondary); }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>

    <div class="container">
        <h1>Selamat Datang di UNUJA</h1>
        <p class="lead">Universitas Nurul Jadid menyediakan platform Lost & Found terintegrasi untuk membantu civitas akademika melaporkan atau mencari barang yang hilang di lingkungan kampus.</p>
        
        <a href="<?php echo site_url('barang'); ?>" class="btn-jelajah">Jelajahi Lost & Found</a>

        <div class="grid-layanan">
            <div class="card-fitur">
                <div class="icon">🔍</div>
                <h3>Pencarian Cepat</h3>
                <p>Sistem filter pintar berdasarkan kategori dan lokasi.</p>
            </div>
            <div class="card-fitur">
                <div class="icon">⚡</div>
                <h3>Respons Real-Time</h3>
                <p>Notifikasi sistem terintegrasi yang instan dan cepat.</p>
            </div>
            <div class="card-fitur">
                <div class="icon">🛡️</div>
                <h3>Keamanan Terjamin</h3>
                <p>Verifikasi ketat kepemilikan barang lewat admin.</p>
            </div>
        </div>

        <a href="<?php echo site_url('login'); ?>" class="login-link">Masuk sebagai Administrator &rarr;</a>
    </div>

</body>
</html>