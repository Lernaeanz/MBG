<?php $this->extend('layout/headerUser'); ?>

<?php $this->section('content'); ?>
  
  <style>
    body {
      font-family: sans-serif;
      margin-bottome: 0;
      background: #ffffff;
    }
    .hero {
  background: linear-gradient(rgba(255,0,0,0.4), rgba(255,0,0,0.4)), url('<?= base_url('img/gambarhalpenerima.png') ?>') no-repeat center center/cover;
  padding: 60px 20px;
  color: white;
  text-align: left;
}
    .hero h1 {
      font-size: 32px;
      font-weight: bold;
    }
    .hero button {
      background-color: #FFD000;
      color: black;
      padding: 10px 20px;
      border: none;
      font-weight: bold;
      border-radius: 8px;
      cursor: pointer;
    }
    .filters {
      background-color: #fff;
      display: flex;
      gap: 10px;
      padding: 20px;
      justify-content: center;
    }
    .filters select, .filters button {
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }
    .section-title {
      background-color: #e1261c;
      color: white;
      padding: 10px 20px;
      font-size: 20px;
      font-weight: bold;
    }
    .schools {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 16px;
      padding: 20px;
      background: #e1261c;
    }
    .school-card {
      background-color: white;
      border-radius: 10px;
      padding: 16px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .school-card h3 {
      margin: 0;
    }
    .status {
      display: inline-block;
      background: #00c57a;
      color: white;
      padding: 4px 10px;
      font-size: 12px;
      border-radius: 6px;
      margin-top: 8px;
    }
    .buttons {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
      padding: 20px;
      background: #f5f5f5;
    }
    .buttons a {
      display: block;
      background: #ffffff;
      padding: 16px;
      border-radius: 10px;
      text-align: center;
      font-weight: bold;
      color: #e1261c;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      text-decoration: none;
    }
  </style>
  <div class="hero">
    <h1>Bersama Prabowo, Gizi Anak Indonesia Terpenuhi</h1>
    <button>Cari Sekolah Penerima</button>
  </div>

  <div class="filters">
    <select>
      <option>Provinsi</option>
    </select>
    <select>
      <option>Kabupaten/Kota</option>
    </select>
    <select>
      <option>Jenjang Pendidikan</option>
    </select>
    <button style="background-color:#0050db; color:white">Terapkan Filter</button>
  </div>

  <div class="mb-8">
      <div class="section-title">Sekolah Penerima</div>
<div class="schools">
    <?php foreach ($penerima as $sekolah): ?>
  <div class="school-card" style="border-left: 8px solid <?= getBorderColor($sekolah['status_pembayaran']); ?>">
        <h3><?= $sekolah['nama_sekolah']; ?></h3>
        <p>Vendor: <?= $sekolah['vendor']; ?></p>
        <p>Jumlah Porsi: <?= $sekolah['jumlah_porsi']; ?></p>
        <p>Tanggal: <?= date('d M Y', strtotime($sekolah['tanggal'])); ?></p>
        <span class="status"><?= $sekolah['status_pembayaran']; ?></span>
    </div>
    <?php endforeach; ?>
</div>
  </div>


<?php
// Fungsi untuk menentukan warna border berdasarkan status
function getBorderColor($status)
{
    switch ($status) {
        case 'Aktif':
            return '#2451f5'; // Warna biru
        case 'Non-Aktif':
            return '#f7be00'; // Warna kuning
        default:
            return '#00b389'; // Warna hijau
    }
}
?>
  <?php $this->endSection(); ?>
