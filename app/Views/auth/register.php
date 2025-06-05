<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card col-md-6 p-4 shadow">
            <h4 class="text-center mb-4">Form Registrasi</h4>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('register') ?>">
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required value="<?= set_value('nama') ?>">
                </div>
                <div class="mb-3">
                    <label>NIK KTP</label>
                    <input type="text" name="nik_ktp" class="form-control" required value="<?= set_value('nik_ktp') ?>">
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required value="<?= set_value('username') ?>">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirm" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="vendor" <?= set_value('role') == 'vendor' ? 'selected' : '' ?>>Vendor</option>
                        <option value="sekolah" <?= set_value('role') == 'sekolah' ? 'selected' : '' ?>>Sekolah</option>
                    </select>
                </div>

                <!-- Hidden untuk simpan lokasi -->
                <input type="hidden" name="latitude" id="latitude" value="<?= set_value('latitude') ?>">
                <input type="hidden" name="longitude" id="longitude" value="<?= set_value('longitude') ?>">

                <button class="btn btn-primary w-100">Daftar</button>
                <p class="mt-3 text-center">Sudah punya akun? <a href="<?= base_url('login') ?>">Login</a></p>
            </form>
        </div>
    </div>
</div>

<!-- Leaflet JS & Geolocation Script -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;

            // Masukkan ke hidden input
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;

            // Tampilkan map
            const map = L.map('map').setView([lat, lon], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
            L.marker([lat, lon]).addTo(map).bindPopup("Lokasi Anda").openPopup();

            // Ambil nama alamat (reverse geocoding)
            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`)
                .then(res => res.json())
                .then(data => {
                    if (data && data.display_name) {
                        document.getElementById('alamat_link').value = data.display_name;
                    }
                });
        }, function () {
            alert("Gagal mengambil lokasi. Aktifkan GPS kamu cuy!");
        });
    } else {
        alert("Browser tidak mendukung geolocation.");
    }
});
</script>
</body>
</html>
