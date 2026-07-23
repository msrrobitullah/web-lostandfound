<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Lost & Found UNUJA</title>
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
            margin: 0; padding: 0;
            background-color: var(--bg-body);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-primary);
            min-height: 100vh;
            display: flex; justify-content: center; align-items: center;
            background-image: radial-gradient(circle at top right, rgba(168, 85, 247, 0.15), transparent 40%),
                              radial-gradient(circle at bottom left, rgba(99, 102, 241, 0.15), transparent 40%);
        }

        .login-container {
            width: 100%; max-width: 400px; padding: 40px;
            background: var(--bg-card); backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7); box-sizing: border-box;
        }

        h2 {
            font-size: 1.8rem; margin-bottom: 8px;
            background: var(--accent-glide); -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            text-align: center;
        }

        p.subtitle { color: var(--text-secondary); text-align: center; font-size: 0.9rem; margin-bottom: 30px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-size: 0.85rem; color: var(--text-secondary); margin-bottom: 8px; font-weight: 600; }
        
        input {
            width: 100%; padding: 14px; background: var(--bg-input);
            border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 12px;
            color: white; font-family: inherit; font-size: 0.95rem; box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input:focus { outline: none; border-color: var(--accent-primary); }

        .btn-login {
            width: 100%; padding: 14px; background: var(--accent-glide);
            border: none; border-radius: 12px; color: white;
            font-weight: 600; font-size: 1rem; cursor: pointer;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
            transition: transform 0.2s, box-shadow 0.2s; margin-top: 10px;
        }

        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(99, 102, 241, 0.6); }

        .alert-error {
            background: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444;
            color: #fca5a5; padding: 12px; border-radius: 12px;
            font-size: 0.85rem; margin-bottom: 20px; text-align: center;
        }
        .btn-back { display: block; text-align: center; margin-top: 20px; color: var(--text-secondary); text-decoration: none; font-size: 0.85rem; }
        .btn-back:hover { color: white; }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Administrator</h2>
        <p class="subtitle">Sistem Informasi Lost & Found UNUJA</p>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert-error">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo site_url('login/proses'); ?>" method="post" autocomplete="off">
            <div class="form-group">
                <label for="username">Nomor Induk / NIM</label>
                <input type="text" name="username" id="username" required placeholder="Masukkan nomor induk anda">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="••••••••">
            </div>

            <button type="submit" class="btn-login">Masuk ke Dashboard</button>
        </form>
        <a href="<?php echo base_url(); ?>" class="btn-back">&larr; Kembali ke Beranda</a>
    </div>

</body>
</html>