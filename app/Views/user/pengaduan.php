<?php $this->extend('layout/headerUser'); ?>

<?php $this->section('content'); ?>

<section class="bg-cover bg-center h-full" style="background-image: url('/img/bg_pengaduan.png');">
    <!-- Kontainer utama untuk form -->
    <div class="flex items-center justify-center h-full">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg mx-4 mt-6 mb-6">
            <h2 class="text-3xl font-semibold text-center mb-8">Layanan Pengaduan Online Rakyat Terkait MBG</h2>
            <p class="text-center text-gray-600 mb-6">Sampaikan laporan Anda langsung kepada instansi pemerintah terkait.</p>
            
            <!-- Form Pengaduan -->
            <form action="/path/to/submit" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="judul_laporan" class="block text-sm font-medium text-gray-700">Judul Laporan</label>
                    <input type="text" name="judul_laporan" id="judul_laporan" class="mt-2 p-3 w-full border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="isi_laporan" class="block text-sm font-medium text-gray-700">Isi Laporan</label>
                    <textarea name="isi_laporan" id="isi_laporan" rows="4" class="mt-2 p-3 w-full border border-gray-300 rounded-md" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="tanggal_kejadian" class="block text-sm font-medium text-gray-700">Tanggal Kejadian</label>
                    <input type="date" name="tanggal_kejadian" id="tanggal_kejadian" class="mt-2 p-3 w-full border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="lokasi_kejadian" class="block text-sm font-medium text-gray-700">Lokasi Kejadian</label>
                    <input type="text" name="lokasi_kejadian" id="lokasi_kejadian" class="mt-2 p-3 w-full border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="bukti_pendukung" class="block text-sm font-medium text-gray-700">Upload Bukti Pendukung</label>
                    <input type="file" name="bukti_pendukung" id="bukti_pendukung" class="mt-2 p-3 w-full border border-gray-300 rounded-md" required>
                </div>

                <button type="submit" class="w-full mt-6 p-3 bg-blue-500 text-white rounded-md hover:bg-blue-600">Lapor</button>
            </form>
        </div>
    </div>
</section>

<?php $this->endSection(); ?>
