<?php $this->extend('layout/headerUser'); ?>

<?php $this->section('content'); ?>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #ffefba, #ffffff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #2c3e50;
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        /* Navbar */
        nav {
            position: relative;
            background-color: #1E2A32;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
            width: 100vw;
            box-sizing: border-box;
            z-index: 100;
        }

        nav .clip-trapezium {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 200px;
            background-color: #f7b500;
            clip-path: polygon(0 0, 70% 0, 100% 100%, 0 100%);
            z-index: 1;
        }

        nav .logo-container {
            position: relative;
            z-index: 10;
            margin-left: 1.5rem;
        }

        nav .menu {
            display: none;
            gap: 1.5rem;
            color: white;
            font-size: 0.875rem;
            font-weight: 500;
            position: relative;
            z-index: 10;
            margin-left: -150px;
        }

        nav .menu li {
            list-style: none;
        }

        nav .menu li a:hover {
            color: #f7b500;
        }

        nav .btn-login {
            position: relative;
            z-index: 10;
            background-color: #f7b500;
            color: black;
            padding: 0.5rem 1.2rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.875rem;
            transition: background-color 0.3s ease;
        }

        nav .btn-login:hover {
            background-color: #e6a700;
        }

        @media (min-width: 768px) {
            nav .menu {
                display: flex;
            }
        }

        /* Profile container */
        .profile-container {
            max-width: 900px;
            margin: 50px auto 70px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: fadeInUp 1s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .profile-image:hover {
            transform: scale(1.05);
            filter: brightness(1.1);
        }

        .profile-content {
            padding: 30px 40px;
        }

        .profile-title {
            font-weight: 700;
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
            text-shadow: 1px 1px 2px #ddd;
        }

        .profile-description {
            font-size: 1.15rem;
            line-height: 1.6;
            color: #34495e;
            text-align: justify;
        }

        .highlight {
            color: #e67e22;
            font-weight: 600;
        }

        /* Animated counters */
        .counters-section {
            max-width: 900px;
            margin: 50px auto 60px;
            padding: 0 30px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 30px;
        }

        .counter-box {
            flex: 1 1 180px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(230, 126, 34, 0.15);
            text-align: center;
            cursor: default;
            transition: box-shadow 0.3s ease;
        }

        .counter-box:hover {
            box-shadow: 0 15px 35px rgba(230, 126, 34, 0.35);
        }

        .counter-number {
            font-size: 48px;
            font-weight: 700;
            color: #e67e22;
        }

        .counter-label {
            margin-top: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            color: #2c3e50;
        }

        /* Timeline Milestone */
        .timeline-section {
            max-width: 900px;
            margin: 0 auto 60px;
            padding: 0 30px;
        }

        .timeline-section h2 {
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 40px;
            color: #2c3e50;
        }

        .timeline-line {
            position: relative;
            margin-left: 40px; /* lebih besar untuk beri ruang icon */
            border-left: 3px solid #e67e22;
            padding-left: 25px;
        }

        .timeline-item {
            margin-bottom: 30px;
            position: relative;
            padding-left: 30px; /* beri jarak kiri agar teks tidak kena icon */
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: -40px; /* pindahkan icon ke kiri luar */
            top: 0;
            background: #e67e22;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            box-shadow: 0 0 8px rgba(230, 126, 34, 0.7);
        }

        .timeline-title {
            margin: 0 0 5px;
            font-weight: 700;
            color: #2c3e50;
        }

        .timeline-desc {
            margin: 0;
            color: #555;
        }

        /* Call to Action */
        .cta-section {
            background: #e67e22;
            padding: 60px 30px;
            text-align: center;
            color: #fff;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .cta-section p {
            font-size: 1.25rem;
            max-width: 600px;
            margin: 0 auto 30px;
            line-height: 1.5;
        }

        .cta-button {
            background: #fff;
            color: #e67e22;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 15px 35px;
            border-radius: 50px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        .cta-button:hover {
            background-color: #f4b640;
        }
    </style>

<body class="antialiased font-normal leading-default bg-[#F6F6F6] text-black">
    <!-- Navbar -->

    <!-- Main Content -->
    <main>
        <div class="profile-container shadow">
            <img src="<?= base_url('img/profiletrace.jpeg') ?>" alt="Trace Food" class="profile-image" />
            <div class="profile-content">
                <h1 class="profile-title">Trace Food - Aplikasi Pelacak Bantuan Makanan Gratis</h1>
                <p class="profile-description">
                    <span class="highlight">Trace Food</span> adalah aplikasi inovatif yang dirancang untuk melacak distribusi bantuan makanan gratis dalam program Prabowo Gibran.
                    Aplikasi ini membantu memastikan siapa saja yang menerima bantuan dan bagaimana alur keuangannya berjalan secara transparan dan akuntabel.
                    Dengan Trace Food, kita dapat memantau distribusi makanan dengan mudah dan tepat sasaran untuk mendukung kesejahteraan masyarakat.
                </p>
            </div>
        </div>

        <!-- Animated Counters -->
        <section class="counters-section" aria-label="Statistik Trace Food">
            <div class="counter-box">
                <div class="counter-number" data-target="<?= $totalBantuan ?>">0</div>
                <div class="counter-label">Bantuan Disalurkan</div>
            </div>
            <div class="counter-box">
                <div class="counter-number" data-target="<?= $penerimaTerdaftar ?>">0</div>
                <div class="counter-label">Penerima Terdaftar</div>
            </div>
            <div class="counter-box">
                <div class="counter-number" data-target="<?= $mitraAktif ?>">0</div>
                <div class="counter-label">Mitra Aktif</div>
            </div>
            <div class="counter-box">
                <div class="counter-number" data-target="<?= $totalDana ?>">0</div>
                <div class="counter-label">Dana Terverifikasi (Rp)</div>
            </div>
        </section>


        <!-- Timeline Milestone -->
        <section class="timeline-section" aria-label="Perjalanan Trace Food">
            <h2>Perjalanan Trace Food</h2>
            <div class="timeline-line">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <h3 class="timeline-title">Peluncuran Aplikasi</h3>
                    <p class="timeline-desc">Januari 2023 - Trace Food resmi diluncurkan untuk publik.</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <h3 class="timeline-title">Integrasi Mitra</h3>
                    <p class="timeline-desc">Mei 2023 - Tersedia integrasi dengan lebih dari 200 mitra distribusi.</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <h3 class="timeline-title">Update Fitur Real-Time</h3>
                    <p class="timeline-desc">Agustus 2023 - Monitoring keuangan dan distribusi dengan data real-time.</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <h3 class="timeline-title">Capai 10.000 Bantuan</h3>
                    <p class="timeline-desc">April 2024 - Telah menyalurkan lebih dari 10.000 bantuan makanan gratis.</p>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="cta-section" aria-label="Ajakan bergabung">
            <h2>Bergabunglah Bersama Kami</h2>
            <p>
                Jadilah bagian dari gerakan melawan kelaparan dan korupsi distribusi bantuan makanan.<br />
                Daftarkan diri Anda sebagai mitra atau unduh aplikasi sekarang juga!
            </p>
            <a href="https://mitra.bgn.go.id/login" target="_blank" rel="noopener noreferrer" class="cta-button">Daftar Mitra Sekarang</a>
        </section>
    </main>

    <script>
        // Animasi fadeInUp profile-container saat load halaman
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelector('.profile-container').style.opacity = '1';
        });

        // Animated counters
        const counters = document.querySelectorAll('.counter-number');
        const speed = 200; // lower is faster

        counters.forEach(counter => {
            const animate = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText.replace(/\D/g, '');
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment).toLocaleString('id-ID');
                    setTimeout(animate, 20);
                } else {
                    counter.innerText = target.toLocaleString('id-ID');
                }
            };
            animate();
        });

        // Modal script if needed (optional)
        document.querySelectorAll('[data-modal-target]').forEach(function (button) {
            button.addEventListener('click', function () {
                const targetModal = document.querySelector(this.getAttribute('data-modal-target'));
                targetModal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('[data-modal-close]').forEach(function (button) {
            button.addEventListener('click', function () {
                const targetModal = document.querySelector(this.getAttribute('data-modal-close'));
                targetModal.classList.add('hidden');
            });
        });

        window.addEventListener('click', function (event) {
            document.querySelectorAll('.modal').forEach(function (modal) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
</body>

<?php $this->endSection(); ?>