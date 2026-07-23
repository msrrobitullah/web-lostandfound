<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Bantuan Pengguna - UNUJA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #1a56db;
            --secondary: #0e2a6c;
            --accent: #f59e0b;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
            --success: #10b981;
            --transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            --shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.12);
            --gradient: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, var(--light) 0%, #e2e8f0 100%);
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            line-height: 1.7;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .contact-hero {
            background: 
                radial-gradient(circle at 20% 80%, rgba(26, 86, 219, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(245, 158, 11, 0.1) 0%, transparent 50%),
                var(--gradient);
            color: white;
            padding: 120px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .contact-hero::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, var(--light), transparent);
            z-index: 1;
        }

        .contact-hero-content {
            position: relative;
            z-index: 2;
        }

        .contact-hero h1 {
            font-size: 3.2rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            animation: fadeInUp 1s ease;
        }

        .contact-hero p {
            font-size: 1.3rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.95;
            animation: fadeInUp 1s ease 0.2s both;
        }

        section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.8rem;
            color: var(--secondary);
            margin-bottom: 1.2rem;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: var(--accent);
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .section-title p {
            color: var(--gray);
            max-width: 650px;
            margin: 2rem auto 0;
            font-size: 1.1rem;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .contact-info, .contact-form {
            background: white;
            padding: 45px 35px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .contact-info::before, .contact-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(26, 86, 219, 0.03) 0%, transparent 100%);
            z-index: 0;
        }

        .contact-info:hover, .contact-form:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .contact-info h3, .contact-form h3 {
            color: var(--secondary);
            margin-bottom: 35px;
            font-size: 1.6rem;
            position: relative;
            z-index: 1;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .contact-icon {
            background: var(--gradient);
            color: white;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
            font-size: 1.2rem;
            transition: var(--transition);
        }

        .contact-item:hover .contact-icon {
            transform: scale(1.1);
        }

        .contact-details h4 {
            color: var(--secondary);
            margin-bottom: 8px;
            font-size: 1.1rem;
        }

        .contact-details p {
            color: var(--gray);
            margin-bottom: 3px;
            line-height: 1.6;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 35px;
        }

        .social-link {
            width: 50px;
            height: 50px;
            background: var(--gradient);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: var(--transition);
            font-size: 1.2rem;
        }

        .social-link:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(26, 86, 219, 0.4);
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: var(--dark);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: var(--transition);
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 86, 219, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 140px;
        }

        .submit-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--gradient);
            color: white;
            border: none;
            padding: 16px 35px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 8px 25px rgba(26, 86, 219, 0.4);
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(26, 86, 219, 0.6);
        }

        .submit-btn i {
            transition: var(--transition);
        }

        .submit-btn:hover i {
            transform: translateX(5px);
        }

        .lokasi {
            background: var(--light);
        }

        .lokasi-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .lokasi-info h3 {
            color: var(--secondary);
            margin-bottom: 25px;
            font-size: 1.8rem;
            font-weight: 600;
        }

        .lokasi-info p {
            margin-bottom: 20px;
            color: var(--gray);
            line-height: 1.7;
        }

        .lokasi-features {
            list-style-type: none;
            margin-top: 25px;
        }

        .lokasi-features li {
            margin-bottom: 14px;
            padding-left: 32px;
            position: relative;
            color: var(--gray);
            line-height: 1.6;
        }

        .lokasi-features li::before {
            content: "📍";
            position: absolute;
            left: 0;
            font-size: 1.2rem;
        }

        .map-container {
            background: var(--gradient);
            height: 450px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .map-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat;
            opacity: 0.9;
            transition: var(--transition);
        }

        .map-container:hover::before {
            transform: scale(1.05);
        }

        .jam-operasional {
            background: white;
        }

        .jam-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 35px;
        }

        .jam-card {
            background: white;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: var(--shadow);
            text-align: center;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .jam-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient);
        }

        .jam-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .jam-icon {
            font-size: 3rem;
            margin-bottom: 25px;
            color: var(--primary);
            transition: var(--transition);
        }

        .jam-card:hover .jam-icon {
            transform: scale(1.1);
            color: var(--accent);
        }

        .jam-card h3 {
            color: var(--secondary);
            margin-bottom: 20px;
            font-size: 1.4rem;
        }

        .jam-card p {
            color: var(--gray);
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .faq-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 35px;
        }

        .faq-item {
            background: white;
            padding: 35px 30px;
            border-radius: 16px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .faq-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(26, 86, 219, 0.03) 0%, transparent 100%);
            z-index: 0;
        }

        .faq-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .faq-item h4 {
            color: var(--secondary);
            margin-bottom: 15px;
            font-size: 1.2rem;
            position: relative;
            z-index: 1;
        }

        .faq-item p {
            color: var(--gray);
            position: relative;
            z-index: 1;
            line-height: 1.6;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in { animation: fadeInUp 0.8s ease forwards; }
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }

        @media (max-width: 768px) {
            .contact-hero h1 { font-size: 2.5rem; }
            .contact-grid, .lokasi-content, .faq-grid, .jam-content { grid-template-columns: 1fr; }
            .map-container { height: 350px; order: -1; }
        }
    </style>
</head>
<body>

    <section class="contact-hero">
        <div class="container contact-hero-content">
            <h1 class="fade-in">Pusat Bantuan & Layanan</h1>
            <p class="fade-in delay-1">Layanan aduan Kehilangan dan Penemuan Barang Kampus Universitas Nurul Jadid</p>
        </div>
    </section>

    <section class="contact-main">
        <div class="container">
            <div class="section-title">
                <h2>Kontak Helpdesk</h2>
                <p>Silakan hubungi pos pelayanan kami atau kirim pesan validasi klaim di bawah ini</p>
            </div>
            <div class="contact-grid">
                <div class="contact-info fade-in">
                    <h3>Sekretariat Lost & Found</h3>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="contact-details">
                            <h4>Gedung Rektorat UNUJA</h4>
                            <p>Lt. 1 Ruang Pelayanan Umum & Kemahasiswaan</p>
                            <p>Jl. KH. Zainul Arifin No. 7, Paiton, Probolinggo</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-phone"></i></div>
                        <div class="contact-details">
                            <h4>Hotline Pengaduan</h4>
                            <p>+62 335 427 123 (Ext. 104)</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div class="contact-details">
                            <h4>Email Hubungan Layanan</h4>
                            <p>lostfound@unuja.ac.id</p>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="contact-form fade-in delay-1">
                    <h3>Kirim Tiket Pertanyaan</h3>
                    <form action="proses_aduan.php" method="POST">
                        <div class="form-group">
                            <label>Perihal Masalah</label>
                            <input type="text" name="subject" class="form-control" placeholder="Contoh: Kesulitan Verifikasi Klaim Dompet" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Detail</label>
                            <textarea name="pesan" class="form-control" placeholder="Tuliskan kronologi singkat atau kendala teknis Anda..." required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">
                            Kirim Laporan <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="lokasi">
        <div class="container">
            <div class="lokasi-content">
                <div class="lokasi-info">
                    <h3>Lokasi Pengambilan Barang</h3>
                    <p>Setiap barang penemuan yang telah divalidasi sistem dapat diambil langsung di posko pusat keamanan utama atau sub-bagian administrasi fakultas terkait.</p>
                    <ul class="lokasi-features">
                        <li>Membawa KTM / ID Card resmi Civitas Akademika.</li>
                        <li>Menunjukkan bukti kepemilikan unik (foto barang sebelumnya/pola sandi jika berupa smartphone).</li>
                    </ul>
                </div>
                <div class="map-container">
                    <span>Peta Kampus Utama UNUJA</span>
                </div>
            </div>
        </div>
    </section>

    <section class="jam-operasional">
        <div class="container">
            <div class="section-title">
                <h2>Jam Operasional Pelayanan</h2>
                <p>Pastikan Anda berkunjung pada waktu kerja di bawah ini untuk memproses klaim offline</p>
            </div>
            <div class="jam-content">
                <div class="jam-card">
                    <div class="jam-icon"><i class="fas fa-calendar-day"></i></div>
                    <h3>Senin - Kamis</h3>
                    <p>07.30 WIB - 15.30 WIB</p>
                    <p>Istirahat: 12.00 - 13.00 WIB</p>
                </div>
                <div class="jam-card">
                    <div class="jam-icon"><i class="fas fa-mosque"></i></div>
                    <h3>Jumat</h3>
                    <p>07.30 WIB - 11.00 WIB</p>
                    <p>Setengah Hari Kerja</p>
                </div>
                <div class="jam-card">
                    <div class="jam-icon"><i class="fas fa-mug-hot"></i></div>
                    <h3>Sabtu - Minggu</h3>
                    <p>TUTUP</p>
                    <p>Pelayanan Online Tetap Berjalan</p>
                </div>
            </div>
        </div>
    </section>

    <section class="faq">
        <div class="container">
            <div class="section-title">
                <h2>Pertanyaan Sering Diajukan (FAQ)</h2>
                <p>Ringkasan informasi dasar mengenai tata kelola barang hilang di UNUJA</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <h4>Berapa lama barang penemuan disimpan?</h4>
                    <p>Barang berharga disimpan selama maksimal 3 bulan. Jika tidak ada klaim, barang akan didonasikan atau dimusnahkan sesuai kebijakan kampus.</p>
                </div>
                <div class="faq-item">
                    <h4>Bagaimana jika penemu adalah pihak luar?</h4>
                    <p>Pihak luar dapat melapor ke Pos Keamanan Gerbang Utama, petugas keamanan yang akan menginput data ke sistem internal ini.</p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>