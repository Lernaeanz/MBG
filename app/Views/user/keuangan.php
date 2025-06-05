<?php $this->extend('layout/headerUser'); ?>

<?php $this->section('content'); ?>

<section class="bg-gray-100 py-10">
  <div class="max-w-7xl mx-auto px-6">
    <!-- Header -->
    <h2 class="text-3xl font-bold text-[#1E2A32] mb-6">Laporan Keuangan Program MBG</h2>
    <p class="text-lg text-gray-600 mb-6">Silakan pilih filter data untuk menampilkan laporan keuangan yang sesuai.</p>

    <!-- Filter Form -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
      <div class="flex items-center gap-4 mb-6">
        <!-- Tahun -->
        <div class="flex-1">
          <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
          <select id="tahun" name="tahun" class="mt-2 p-3 w-full border border-gray-300 rounded-md">
            <option value="">Pilih Tahun</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
          </select>
        </div>

        <!-- Asal Dana -->
        <div class="flex-1">
          <label for="asal_dana" class="block text-sm font-medium text-gray-700">Asal Dana</label>
          <select id="asal_dana" name="asal_dana" class="mt-2 p-3 w-full border border-gray-300 rounded-md">
            <option value="">Pilih Asal Dana</option>
            <option value="Bantuan Pemerintah">Bantuan Pemerintah</option>
            <option value="Donasi">Donasi</option>
          </select>
        </div>

        <!-- Status Pembayaran -->
        <div class="flex-1">
          <label for="status_pembayaran" class="block text-sm font-medium text-gray-700">Status Pembayaran</label>
          <select id="status_pembayaran" name="status_pembayaran" class="mt-2 p-3 w-full border border-gray-300 rounded-md">
            <option value="">Pilih Status Pembayaran</option>
            <option value="Lunas">Lunas</option>
            <option value="Belum Lunas">Belum Lunas</option>
          </select>
        </div>

        <!-- Submit Button -->
        <div class="flex-1 mt-8">
          <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600">Submit</button>
        </div>
      </div>
    </div>

    <!-- Tabel Laporan -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
      <!-- Tabel Filter dan Download PDF -->
      <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-4">
          <input type="text" placeholder="Cari..." class="p-3 border border-gray-300 rounded-md w-64">
          <button class="bg-green-500 text-white p-3 rounded-md hover:bg-green-600">Download PDF</button>
        </div>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full table-auto">
          <thead class="bg-[#F4A300] text-white">
            <tr>
              <th class="px-4 py-2">Tanggal</th>
              <th class="px-4 py-2">Nama Sekolah</th>
              <th class="px-4 py-2">Vendor</th>
              <th class="px-4 py-2">Jumlah Porsi</th>
              <th class="px-4 py-2">Harga Per Porsi</th>
              <th class="px-4 py-2">Total Biaya</th>
              <th class="px-4 py-2">Asal Dana</th>
              <th class="px-4 py-2">Status Pembayaran</th>
            </tr>
          </thead>
          <tbody>
            <!-- Data Tabel -->
            <tr>
              <td class="px-4 py-2 text-center">2023-01-01</td>
              <td class="px-4 py-2 text-center">SD Negeri 1</td>
              <td class="px-4 py-2 text-center">Vendor A</td>
              <td class="px-4 py-2 text-center">100</td>
              <td class="px-4 py-2 text-center">Rp. 20,000</td>
              <td class="px-4 py-2 text-center">Rp. 2,000,000</td>
              <td class="px-4 py-2 text-center">Bantuan Pemerintah</td>
              <td class="px-4 py-2 text-center">Lunas</td>
            </tr>
            <tr>
              <td class="px-4 py-2 text-center">2023-02-01</td>
              <td class="px-4 py-2 text-center">SMP Negeri 2</td>
              <td class="px-4 py-2 text-center">Vendor B</td>
              <td class="px-4 py-2 text-center">150</td>
              <td class="px-4 py-2 text-center">Rp. 25,000</td>
              <td class="px-4 py-2 text-center">Rp. 3,750,000</td>
              <td class="px-4 py-2 text-center">Donasi</td>
              <td class="px-4 py-2 text-center">Belum Lunas</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<?php $this->endSection(); ?>
