<?php $this->extend('layout/headerUser'); ?>

<?php $this->section('content'); ?>

<section class="bg-gray-400 w-screen relative left-1/2 right-1/2 -mx-[50vw]">
<!-- Hero Section Full Width -->
<div class="w-screen relative z-10 left-1/2 right-1/2 -mx-[50vw] bg-cover bg-center" style="background-image: url('/img/bg_hero.png'); min-height: 500px; width:100%;">
  <!-- Inner Wrapper with Full Width Padding -->
  <div class="max-w-7xl mx-auto px-6  flex flex-col lg:flex-row items-center justify-between gap-10 h-full">
    <!-- Left Content -->
    <div class="flex-1 text-center lg:text-left space-y-4">
      <span class="bg-white text-lg text-[#1E2A32] font-semibold px-5 py-1 rounded-full inline-block w-fit">Trace<span>Food</span></span>
      <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight">
        Keamanan Makanan Indonesia dan Integritas, TraceFood Solusinya
      </h1>
      <p class="text-white max-w-xl text-base">
        TraceFood mendukung Program Makanan Bergizi Prabowo dengan menghadirkan transparansi mulai dari distribusi bahan pangan hingga donasi dan bantuan. Aman, tepat sasaran, dan dapat dipercaya.
      </p>
    </div>

    <!-- Right Image -->
    <div class="flex-1">
      <img src="/img/hero_tf.png" alt="Hero Image" class="w-[700px]">
    </div>
  </div>
</div>

  <!-- Cards -->
<div class="relative z-20 max-w-7xl -mt-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 px-6">
  <!-- Card 1 -->
  <div class="bg-white rounded-xl shadow-md p-4 w-full max-w-[150px] text-center hover:shadow-lg transition mx-auto">
    <img src="<?= base_url('/img/keuangan.png') ?>" alt="Keuangan" class="w-12 mx-auto mb-2">
    <h3 class="text-sm font-medium text-[#1E2A32] leading-tight"><a href="/keuangan">Lihat Laporan Keuangan</a></h3>
  </div>

  <!-- Card 2 -->
  <div class="bg-white rounded-xl shadow-md p-4 w-full max-w-[150px] text-center hover:shadow-lg transition mx-auto">
    <img src="<?= base_url('/img/sekolah.png') ?>" alt="Sekolah" class="w-12 mx-auto mb-2">
    <h3 class="text-sm font-medium text-[#1E2A32] leading-tight"><a href="/bantuan">Sekolah Penerima Bantuan</a></h3>
  </div>

  <!-- Card 3 -->
  <div class="bg-white rounded-xl shadow-md p-4 w-full max-w-[150px] text-center hover:shadow-lg transition mx-auto">
    <img src="<?= base_url('/img/efek.png') ?>" alt="Efek" class="w-12 mx-auto mb-2">
    <h3 class="text-sm font-medium text-[#1E2A32] leading-tight"><a href="/program">Lihat Efek Program</a></h3>
  </div>
</div>

  <!-- Kolaborasi -->
  <div class="max-w-7xl mx-auto mt-12 text-center px-6 py-4">
    <h2 class="text-lg font-semibold text-[#1E2A32] mb-4">Berkolaborasi dan Bersinergi Bersama</h2>
    <div class="flex justify-center flex-wrap gap-4">
      <div class="bg-white rounded-lg">
        <img src="<?= base_url('/img/pendidik.png') ?>" alt="Mitra 1" class="h-10">
      </div>
      <div class="bg-white rounded-lg">
      <img src="<?= base_url('/img/entah.png') ?>" alt="Mitra 2" class="h-10">
      </div>
      <div class="bg-white rounded-lg">
      <img src="<?= base_url('/img/taktau.png') ?>" alt="Mitra 3" class="h-10">
      </div>
      <div class="bg-white rounded-lg">
      <img src="<?= base_url('/img/ky.png') ?>" alt="Mitra 4" class="h-10">
      </div>
      <div class="bg-white rounded-lg">
      <img src="<?= base_url('/img/kemenkeu.png') ?>" alt="Mitra 5" class="h-10">
      
    </div>
  </div>
</section>

<section class="bg-white w-screen relative left-1/2 right-1/2 -mx-[50vw] px-6 py-4">
  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
    
    <!-- Kiri: Konten -->
    <div>
      <p class="text-sm text-black mb-2">
        ➜ TraceFood: Transparansi dan Keamanan Bantuan Makanan Terjamin!
      </p>
      <h2 class="text-4xl font-bold leading-tight text-[#1E2A32] mb-4">
        Kenapa Harus<br><span class="text-[#F4A300]">Pakai TraceFood?</span>
      </h2>
      <p class="text-gray-700 text-base max-w-xl mb-10">
        TraceFood memastikan transparansi penuh, mulai dari distribusi bahan pangan hingga aliran dana bantuan. Dengan sistem yang aman, tepat sasaran, dan dapat dipercaya, kamu bisa memantau setiap langkah secara real-time, menjamin efisiensi dan akuntabilitas yang tinggi.
      </p>

      <!-- Fitur -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Fitur 1 -->
        <div class="flex gap-3">
          <img src="<?= base_url('/img/icon_transparansi.png') ?>" class="w-10 h-10" alt="">
          <div>
            <h3 class="font-semibold text-[#1E2A32] text-sm">TraceFood</h3>
            <p class="text-sm text-gray-600">Platform yang dapat digunakan untuk melacak distribusi bahan pangan hingga memastikan bantuan makanan sampai tepat sasaran ke sekolah-sekolah.</p>
          </div>
        </div>

        <!-- Fitur 2 -->
        <div class="flex gap-3">
          <img src="<?= base_url('/img/icon_bantuan.png') ?>" class="w-10 h-10" alt="">
          <div>
            <h3 class="font-semibold text-[#1E2A32] text-sm">Manajemen Bantuan Pangan</h3>
            <p class="text-sm text-gray-600">Website pemerintah yang memungkinkan pelacakan aliran bantuan pangan dan memastikan distribusi yang tepat sasaran.</p>
          </div>
        </div>

        <!-- Fitur 3 -->
        <div class="flex gap-3">
          <img src="<?= base_url('/img/icon_laporan.png') ?>" class="w-10 h-10" alt="">
          <div>
            <h3 class="font-semibold text-[#1E2A32] text-sm">Laporan Keuangan & Pengelolaan Dana</h3>
            <p class="text-sm text-gray-600"> Website yang menyediakan informasi tentang aliran dana bantuan ke sekolah-sekolah yang menerima program bantuan pangan.</p>
          </div>
        </div>

        <!-- Fitur 4 -->
        <div class="flex gap-3">
          <img src="<?= base_url('/img/icon_blockchain.png') ?>" class="w-10 h-10" alt="">
          <div>
            <h3 class="font-semibold text-[#1E2A32] text-sm">Berbasis Teknologi Blockchain</h3>
            <p class="text-sm text-gray-600">Teknologi yang memastikan keamanan, transparansi, dan mengurangi korupsi dalam distribusi bantuan pangan.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Kanan: Ilustrasi -->
<div class="rounded-xl overflow-hidden w-[60%] mx-auto">
  <!-- Bagian Gambar (Kuning) -->
  <div class="bg-[#F4A300] flex justify-center items-center">
    <img src="<?= base_url('/img/logo_tf.png') ?>" alt="TraceFood" class="w-[400px]">
  </div>

  <!-- Bagian Penjelasan (Abu tua) -->
      <div class="bg-[#1E2A32] text-white p-6 text-center">
        <p class="text-sm leading-relaxed mb-4">
          TraceFood adalah platform yang memastikan transparansi dan akuntabilitas dalam distribusi makanan dan bantuan, dengan sistem yang aman, tepat sasaran, dan dapat dipercaya untuk pelacakan aliran dana dan bahan pangan secara real-time.
        </p>
        <button class="bg-white text-[#1E2A32] text-sm px-4 py-2 rounded-full font-semibold hover:bg-gray-100 transition">
          FAQ
        </button>
      </div>
    </div>
  </div>
</section>

<!-- Divider -->
<div class=" h-[10px] bg-black w-screen relative left-1/2 right-1/2 -mx-[50vw]"></div>


<section class="bg-white w-screen relative left-1/2 right-1/2 -mx-[50vw] px-6 py-4">
  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

    <!-- Konten Kiri -->
    <div>
      <p class="text-sm text-black mb-2 font-medium">MBG (Makan Bergizi Gratis)</p>
      <h2 class="text-4xl font-bold text-[#1E2A32] leading-snug mb-4">
        Statistik <span class="text-[#F4A300]">MBG</span><br>Saat Ini
      </h2>
      <p class="text-gray-700 text-base max-w-xl mb-10">
        Sesuai dengan pencatatan sistem TraceFood, berikut adalah rangkuman statistik terkini terkait pelaksanaan program Makan Bergizi Gratis (MBG). Data ini mencerminkan transparansi pengelolaan program, mencakup jumlah vendor aktif yang terlibat dalam pendistribusian makanan, jumlah sekolah yang telah menerima manfaat, serta total dana yang telah disalurkan hingga saat ini.
      </p>

      <!-- Statistik -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
        <!-- Sekolah -->
        <div class="flex flex-col items-center text-center">
          <img src="<?= base_url('/img/icon_sekolah.png') ?>" class="w-12 h-12 mb-2" alt="Ikon Sekolah">
          <h3 class="text-lg font-semibold text-[#1E2A32]">7 Sekolah</h3>
          <p class="text-sm text-gray-600">Program ini mencakup 7 sekolah negeri di wilayah yang telah terverifikasi.</p>
        </div>

        <!-- Vendor -->
        <div class="flex flex-col items-center text-center">
          <img src="<?= base_url('/img/icon_vendor.png') ?>" class="w-12 h-12 mb-2" alt="Ikon Vendor">
          <h3 class="text-lg font-semibold text-[#1E2A32]">5 Vendor</h3>
          <p class="text-sm text-gray-600">Program ini melibatkan 5 vendor resmi untuk distribusi makanan.</p>
        </div>

        <!-- Dana -->
        <div class="flex flex-col items-center text-center">
          <img src="<?= base_url('/img/icon_dana.png') ?>" class="w-12 h-12 mb-2" alt="Ikon Dana">
          <h3 class="text-lg font-semibold text-[#1E2A32]">Rp.50.000.000</h3>
          <p class="text-sm text-gray-600">Dana total yang telah disalurkan ke seluruh institusi dalam program Makan Bergizi Gratis (MBG).</p>
        </div>
      </div>

      <!-- Tombol -->
      <p class="text-gray-800 text-sm mb-4 font-medium">Jika ada masalah yang perlu dilaporkan, Anda bisa klik tombol pengaduan di bawah ini.</p>
      <button class="bg-[#F4A300] hover:bg-[#e09c00] transition text-white px-5 py-2 rounded-full font-semibold">
        Lapor Pengaduan
      </button>
    </div>

    <!-- Ilustrasi Kanan -->
    <div class="flex justify-center">
      <img src="<?= base_url('/img/mbg_ilustrasi.png') ?>" alt="Ilustrasi MBG" class="max-w-xs md:max-w-sm lg:max-w-md">
    </div>
  </div>
</section>



<?php $this->endSection(); ?>