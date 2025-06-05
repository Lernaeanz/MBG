<?php $this->extend('layout/templateAdmin'); ?>
<?php $this->section('content'); ?>

<section class="bg-gray-100 py-10 px-6">
    <h1 class="text-2xl font-bold mb-4">SELAMAT DATANG ADMIN</h1>

    <!-- MAP -->
    <div id="map" class="w-full mb-10 rounded-lg shadow" style="height: 150px;"></div>

    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left border border-gray-300 bg-white">
            <thead class="bg-gray-200 text-gray-700 font-bold">
                <tr>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Level</th>
                    <th class="p-3 border">Latitude</th>
                    <th class="p-3 border">Longitude</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userList as $user): ?>
                    <tr class="border-t hover:bg-gray-100">
                        <td class="p-3 border"><?= esc($user->nama) ?></td>
                        <td class="p-3 border"><?= esc($user->role) ?></td>
                        <td class="p-3 border"><?= esc($user->latitude) ?></td>
                        <td class="p-3 border"><?= esc($user->longitude) ?></td>
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
    var map = L.map('map').setView([-7.95, 112.61], 13); // koordinat default kota Malang sebagai contoh

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    <?php foreach ($userList as $user): ?>
        <?php if ($user->latitude && $user->longitude): ?>
            L.marker([<?= esc($user->latitude) ?>, <?= esc($user->longitude) ?>])
                .addTo(map)
                .bindPopup("<?= esc($user->nama) ?> (<?= esc($user->role) ?>)");
        <?php endif; ?>
    <?php endforeach; ?>
</script>

<?php $this->endSection(); ?>
