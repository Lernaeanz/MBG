<?php $this->extend('layout/headerUser'); ?>
<?php $this->section('content'); ?>

<section class="bg-gray-100 py-10 px-6">
    <h1 class="text-2xl font-bold mb-4">SELAMAT DATANG ADMIN</h1>

    <!-- MAP -->
    <div id="map" class="w-full h-[150px] mb-10 rounded-lg shadow"></div>

    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left border border-gray-300 bg-white">
            <thead class="bg-gray-200 text-gray-700 font-bold">
                <tr>
                    <th class="p-3 border">Nama Instansi</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Level</th>
                    <th class="p-3 border">Latitude</th>
                    <th class="p-3 border">Longitude</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userList as $user): ?>
                    <tr class="border-t hover:bg-gray-100">
                        <td class="p-3 border"><?= esc($user['nama_instansi']) ?></td>
                        <td class="p-3 border"><?= esc($user['email']) ?></td>
                        <td class="p-3 border"><?= esc($user['level']) ?></td>
                        <td class="p-3 border"><?= esc($user['latitude']) ?></td>
                        <td class="p-3 border"><?= esc($user['longitude']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- LEAFLET -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const map = L.map('map').setView([-7.952, 112.614], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        const userList = <?= json_encode($userList) ?>;

        userList.forEach(user => {
            if (user.latitude && user.longitude) {
                L.marker([user.latitude, user.longitude])
                    .addTo(map)
                    .bindPopup(`<b>${user.nama_instansi}</b><br>${user.email}`);
            }
        });
    });
</script>

<?php $this->endSection(); ?>
