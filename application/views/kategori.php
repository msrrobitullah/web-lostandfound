<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Produk - Manajemen Toko</title>
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

        /* Hero Section */
        .about-hero {
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

        .about-hero::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, var(--light), transparent);
            z-index: 1;
        }

        .about-hero-content {
            position: relative;
            z-index: 2;
        }

        .about-hero h1 {
            font-size: 3.2rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            animation: fadeInUp 1s ease;
        }

        .about-hero p {
            font-size: 1.3rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.95;
            animation: fadeInUp 1s ease 0.2s both;
        }

        /* Section Styles */
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

        /* Sejarah Section */
        .sejarah-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .sejarah-text p {
            margin-bottom: 1.8rem;
            color: var(--gray);
            font-size: 1.05rem;
            line-height: 1.8;
        }

        .sejarah-image {
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

        .sejarah-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1553413532-a1b73372911b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80') center/cover no-repeat;
            opacity: 0.9;
            transition: var(--transition);
        }

        .sejarah-image:hover::before {
            transform: scale(1.05);
        }

        /* Visi Misi Section */
        .visi-misi {
            background: var(--light);
        }

        .visi-misi-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .visi-card, .misi-card {
            background: white;
            padding: 45px 35px;
            border-radius: 16px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .visi-card::before, .misi-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(26, 86, 219, 0.03) 0%, transparent 100%);
            z-index: 0;
        }

        .visi-card:hover, .misi-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .visi-card h3, .misi-card h3 {
            color: var(--secondary);
            margin-bottom: 25px;
            font-size: 1.6rem;
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            z-index: 1;
        }

        .visi-card h3::before {
            content: "🏷️";
            font-size: 2rem;
        }

        .misi-card h3::before {
            content: "🔍";
            font-size: 2rem;
        }

        .visi-card p {
            color: var(--gray);
            position: relative;
            z-index: 1;
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .misi-card ul {
            list-style-type: none;
            position: relative;
            z-index: 1;
        }

        .misi-card li {
            margin-bottom: 14px;
            padding-left: 30px;
            position: relative;
            color: var(--gray);
            line-height: 1.6;
        }

        .misi-card li::before {
            content: "✓";
            color: var(--success);
            position: absolute;
            left: 0;
            font-weight: bold;
            font-size: 1.2rem;
        }

        /* Nilai Section */
        .nilai-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 35px;
        }

        .nilai-card {
            background: white;
            padding: 45px 30px;
            border-radius: 16px;
            box-shadow: var(--shadow);
            text-align: center;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .nilai-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(26, 86, 219, 0.03) 0%, transparent 100%);
            z-index: 0;
        }

        .nilai-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--shadow-lg);
        }

        .nilai-icon {
            font-size: 3.5rem;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
            display: inline-block;
            transition: var(--transition);
        }

        .nilai-card:hover .nilai-icon {
            transform: scale(1.2) rotate(5deg);
        }

        .nilai-card h3 {
            color: var(--secondary);
            margin-bottom: 18px;
            font-size: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .nilai-card p {
            color: var(--gray);
            position: relative;
            z-index: 1;
            line-height: 1.7;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sejarah-content,
            .visi-misi-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .sejarah-image {
                height: 350px;
                order: -1;
            }

            .nilai-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .about-hero h1 {
                font-size: 2.5rem;
            }

            .about-hero p {
                font-size: 1.1rem;
            }

            .section-title h2 {
                font-size: 2.2rem;
            }

            .visi-card,
            .misi-card {
                padding: 35px 25px;
            }
        }

        @media (max-width: 480px) {
            .about-hero {
                padding: 100px 0 60px;
            }

            .about-hero h1 {
                font-size: 2.2rem;
            }

            section {
                padding: 60px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container about-hero-content">
            <h1 class="fade-in">Kategori Produk</h1>
            <p class="fade-in delay-1">Klasifikasi dan segmentasi inventaris barang untuk mempermudah manajemen stok dan pencarian</p>
        </div>
    </section>

    <!-- Sejarah / Pengantar Section -->
    <section class="sejarah">
        <div class="container">
            <div class="section-title">
                <h2>Sistem Klaster Barang</h2>
                <p>Pengelompokan barang berdasarkan fungsi dan target pasokan retail</p>
            </div>
            <div class="sejarah-content">
                <div class="sejarah-text fade-in">
                    <p>Sistem inventarisasi toko kami mengadopsi klasifikasi modern berbasis kategori guna mempermudah konsumen dalam memilih produk yang sesuai, sekaligus mempercepat proses audit pergudangan (SOP Stock Opname).</p>
                    <p>Melalui pembagian kategori yang jelas, pendistribusian barang dari pihak supplier menuju rak penjualan berjalan dengan lebih efisien dan terstruktur dengan rapi tanpa risiko tercampur.</p>
                </div>
                <div class="sejarah-image fade-in delay-1"></div>
            </div>
        </div>
    </section>

    <!-- Visi Misi / Kebijakan Kategori Section -->
    <section class="visi-misi">
        <div class="container">
            <div class="visi-misi-grid">
                <div class="visi-card fade-in">
                    <h3>Aturan Kategori</h3>
                    <p>Setiap item baru wajib didaftarkan ke dalam minimal satu kategori utama untuk keperluan pembuatan laporan keuangan otomatis serta sinkronisasi POS kasir.</p>
                </div>
                <div class="misi-card fade-in delay-1">
                    <h3>Keuntungan Klasifikasi</h3>
                    <ul>
                        <li>Memudahkan analisis barang terlaris (Fast Moving).</li>
                        <li>Optimalisasi tata letak penyimpanan gudang utama.</li>
                        <li>Mencegah kekosongan pasokan barang musiman.</li>
                        <li>Mempercepat penentuan margin harga promo.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Nilai / Jenis Klasifikasi Utama Section -->
    <section class="nilai">
        <div class="container">
            <div class="section-title">
                <h2>Kelompok Kategori Utama</h2>
                <p>Pembagian segmen inventarisasi aset komoditas toko</p>
            </div>
            <div class="nilai-grid">
                <div class="nilai-card fade-in">
                    <div class="nilai-icon">⚡</div>
                    <h3>Elektronik</h3>
                    <p>Mencakup gawai, perlengkapan IT kantor, kabel, adaptor, komputer, dan perangkat keras pendukung operasional teknologi.</p>
                </div>
                <div class="nilai-card fade-in delay-1">
                    <div class="nilai-icon">🍿</div>
                    <h3>Konsumsi</h3>
                    <p>Produk makanan olahan, minuman ringan siap saji, serta kebutuhan sembako harian dengan penanganan tanggal kedaluwarsa ketat.</p>
                </div>
                <div class="nilai-card fade-in delay-2">
                    <div class="nilai-icon">🧸</div>
                    <h3>Peralatan Rumah</h3>
                    <p>Koleksi perkakas, perabotan penunjang aktivitas rumah tangga, furnitur minimalis, serta komoditas pelengkap dekorasi.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Animation on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in');
            
            const fadeInOnScroll = function() {
                fadeElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150;
                    
                    if (elementTop < window.innerHeight - elementVisible) {
                        element.style.opacity = 1;
                        element.style.transform = 'translateY(0)';
                    }
                });
            };
            
            // Set initial state
            fadeElements.forEach(element => {
                element.style.opacity = 0;
                element.style.transform = 'translateY(40px)';
                element.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            });
            
            window.addEventListener('scroll', fadeInOnScroll);
            fadeInOnScroll(); // Check on load
        });
    </script>
</body>
</html>