<?php $this->extend('layout/headerAdmin'); ?>

<?php $this->section('content'); ?>

<section class="bg-gray-400 w-screen relative left-1/2 right-1/2 -mx-[50vw]">
  <!-- Hero Section -->
  <div class="w-screen relative z-10 left-1/2 right-1/2 -mx-[50vw] bg-cover bg-center" style="background-image: url('/img/bg_hero.png'); min-height: 500px; width:100%;">
    <div class="max-w-7xl mx-auto px-6 flex flex-col lg:flex-row items-center justify-between gap-10 h-full">
      <div class="flex-1 text-center lg:text-left space-y-4">
        <span class="bg-white text-lg text-[#1E2A32] font-semibold px-5 py-1 rounded-full inline-block w-fit">Trace<span>Food</span></span>
        <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight">
          Keamanan Makanan Indonesia dan Integritas, TraceFood Solusinya
        </h1>
        <p class="text-white max-w-xl text-base">
          TraceFood mendukung Program Makanan Bergizi Prabowo dengan menghadirkan transparansi mulai dari distribusi bahan pangan hingga donasi dan bantuan. Aman, tepat sasaran, dan dapat dipercaya.
        </p>
      </div>

      <div class="flex-1">
        <img src="/img/hero_tf.png" alt="Hero Image" class="w-[700px]">
      </div>
    </div>
  </div>

  <!-- Cards -->
  <div class="relative z-20 max-w-7xl -mt-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 px-6 mb-12">
    <div class="bg-white rounded-xl shadow-md p-4 w-full max-w-[150px] text-center hover:shadow-lg transition mx-auto">
      <img src="<?= base_url('/img/keuangan.png') ?>" alt="Keuangan" class="w-12 mx-auto mb-2">
      <h3 class="text-sm font-medium text-[#1E2A32] leading-tight"><a href="/keuangan">Lihat Laporan Keuangan</a></h3>
    </div>
    <div class="bg-white rounded-xl shadow-md p-4 w-full max-w-[150px] text-center hover:shadow-lg transition mx-auto">
      <img src="<?= base_url('/img/sekolah.png') ?>" alt="Sekolah" class="w-12 mx-auto mb-2">
      <h3 class="text-sm font-medium text-[#1E2A32] leading-tight"><a href="/bantuan">Sekolah Penerima Bantuan</a></h3>
    </div>
    <div class="bg-white rounded-xl shadow-md p-4 w-full max-w-[150px] text-center hover:shadow-lg transition mx-auto">
      <img src="<?= base_url('/img/efek.png') ?>" alt="Efek" class="w-12 mx-auto mb-2">
      <h3 class="text-sm font-medium text-[#1E2A32] leading-tight"><a href="/program">Lihat Efek Program</a></h3>
    </div>
  </div>
</section>

<!-- Section CRUD Sekolah -->
<section class="bg-white max-w-7xl mx-auto px-6 py-8 rounded-lg shadow-md mb-20">
  <h2 class="text-3xl font-bold mb-6 text-[#1E2A32]">Manajemen Sekolah</h2>

  <a href="/admin/sekolah/create" class="inline-block mb-4 bg-[#F4A300] hover:bg-[#e09c00] text-white font-semibold py-2 px-4 rounded-full transition">+ Tambah Sekolah Baru</a>

  <?php if(session()->getFlashdata('success')): ?>
    <div class="mb-4 p-3 bg-green-200 text-green-800 rounded"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <table class="min-w-full border border-gray-200 rounded overflow-hidden">
    <thead class="bg-[#1E2A32] text-white">
      <tr>
        <th class="py-3 px-6 text-left">ID</th>
        <th class="py-3 px-6 text-left">Nama Sekolah</th>
        <th class="py-3 px-6 text-left">Alamat</th>
        <th class="py-3 px-6 text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($sekolahs) && is_array($sekolahs)): ?>
        <?php foreach($sekolahs as $sekolah): ?>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 px-6"><?= esc($sekolah['id']) ?></td>
            <td class="py-3 px-6"><?= esc($sekolah['nama']) ?></td>
            <td class="py-3 px-6"><?= esc($sekolah['alamat']) ?></td>
            <td class="py-3 px-6 text-center space-x-3">
              <a href="/admin/sekolah/edit/<?= $sekolah['id'] ?>" class="text-blue-600 hover:underline">Edit</a>
              <form action="/admin/sekolah/delete/<?= $sekolah['id'] ?>" method="POST" class="inline" onsubmit="return confirm('Hapus sekolah ini?');">
                <?= csrf_field() ?>
                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="4" class="text-center py-6 text-gray-500">Belum ada data sekolah.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</section>

<?php $this->endSection(); ?>
