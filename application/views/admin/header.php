<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Lost & Found UNUJA</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-body: #0b0f19;
            --bg-sidebar: #111827;
            --bg-card: #1f2937;
            --accent: #6366f1;
            --text-light: #f3f4f6;
        }
        body { margin: 0; font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg-body); color: var(--text-light); display: flex; }
        .sidebar { width: 260px; background: var(--bg-sidebar); min-height: 100vh; padding: 20px; box-sizing: border-box; }
        .sidebar h2 { font-size: 1.2rem; text-align: center; margin-bottom: 30px; color: var(--accent); }
        .sidebar a { display: block; padding: 12px 15px; color: #9ca3af; text-decoration: none; border-radius: 8px; margin-bottom: 10px; transition: 0.3s; }
        .sidebar a:hover { background: var(--accent); color: white; }
        .main-content { flex: 1; padding: 40px; box-sizing: border-box; }
        .table-data { width: 100%; border-collapse: collapse; margin-top: 20px; background: var(--bg-card); border-radius: 8px; overflow: hidden; }
        .table-data th, .table-data td { padding: 15px; text-align: left; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .table-data th { background: rgba(255,255,255,0.02); color: var(--accent); }
        .btn { padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.85rem; display: inline-block; }
        .btn-add { background: var(--accent); color: white; margin-bottom: 20px; padding: 10px 20px; font-weight: 600; border:none; border-radius:8px;}
        .btn-edit { background: #eab308; color: black; }
        .btn-delete { background: #ef4444; color: white; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>L&F UNUJA ADMIN</h2>
        <a href="<?php echo site_url('barang/admin_index'); ?>">📦 Kelola Barang</a>
        <a href="<?php echo site_url('kategori'); ?>">🏷️ Kelola Kategori</a>
        <a href="<?php echo site_url('users'); ?>">👥 Kelola Admin</a>
        <br><br>
        <a href="<?php echo site_url('login/logout'); ?>" style="background: rgba(239,68,68,0.1); color: #fca5a5;">🚪 Keluar</a>
    </div>
    <div class="main-content">