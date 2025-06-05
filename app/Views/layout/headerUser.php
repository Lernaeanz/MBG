<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>css/style.css" rel="stylesheet" />
    <script>
        <?php if (session()->getFlashdata('error')) : ?>
            window.addEventListener('DOMContentLoaded', () => {
                document.getElementById('myModal1').classList.remove('hidden');
            });
        <?php endif; ?>
    </script>
</head>

<body class=" antialiased font-normal leading-default bg-[#F6F6F6] text-black">
    <!-- navbar -->
<nav class="relative bg-[#1E2A32] px-6 py-3 flex items-center justify-between h-[80px] w-screen">
  <!-- Trapesium Full Height -->
  <div class="absolute left-0 top-0 h-full w-[200px] bg-yellow-500 clip-trapezium" style="clip-path: polygon(0 0, 70% 0, 100% 100%, 0 100%)"></div>

  <div class="flex items-center relative z-10 ml-6">
   <a href="/"><img src="<?= base_url('/img/logo_tf.png') ?>" alt="Tracefood" class="h-[80px]"> </a> 
  </div>

  <!-- Menu -->
  <ul class="hidden md:flex gap-6 text-white text-sm relative z-10 ml-[-150px]">
    <li><a href="/" class="hover:text-yellow-400">Beranda</a></li>
    <li><a href="profile_trace_food" class="hover:text-yellow-400">Profile Tracefood</a></li>
    <li><a href="/faq" class="hover:text-yellow-400">FAQ</a></li>
    <li><a href="https://mitra.bgn.go.id/login" class="hover:text-yellow-400">Join Mitra</a></li>
  </ul>

  <?php if (session()->get('logged_in')): ?>
  <a href="<?= base_url('logout') ?>" class="relative z-10 bg-danger text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-red-600 transition">
    Keluar
  </a>
<?php else: ?>
  <a href="<?= base_url('login') ?>" class="relative z-10 bg-yellow-500 text-black px-4 py-2 rounded-full text-sm font-semibold hover:bg-yellow-400 transition">
    Masuk
  </a>
<?php endif; ?>

</nav>
    <!-- main -->
    <main class="">
        <?php $this->renderSection('content'); ?>
    </main>

    <footer class="bg-[#1E2A32] text-white pt-10 relative z-10">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-10">
      
      <div>
        <h5 class="text-lg font-semibold mb-4">Get Started</h5>
        <ul class="space-y-2 text-sm text-gray-300">
          <li><a href="/" class="hover:text-yellow-400">Home</a></li>
          <li><a href="/register" class="hover:text-yellow-400">Sign Up</a></li>
          <li><a href="#" class="hover:text-yellow-400">Downloads</a></li>
        </ul>
      </div>
      
      <div>
        <h5 class="text-lg font-semibold mb-4">About Us</h5>
        <ul class="space-y-2 text-sm text-gray-300">
          <li><a href="#" class="hover:text-yellow-400">Company Info</a></li>
          <li><a href="#" class="hover:text-yellow-400">Contact Us</a></li>
          <li><a href="#" class="hover:text-yellow-400">Reviews</a></li>
        </ul>
      </div>
      
      <div>
        <h5 class="text-lg font-semibold mb-4">Support</h5>
        <ul class="space-y-2 text-sm text-gray-300">
          <li><a href="#" class="hover:text-yellow-400">FAQ</a></li>
          <li><a href="#" class="hover:text-yellow-400">Help Desk</a></li>
          <li><a href="#" class="hover:text-yellow-400">Forums</a></li>
        </ul>
      </div>
      
      <div>
        <h5 class="text-lg font-semibold mb-4">Legal</h5>
        <ul class="space-y-2 text-sm text-gray-300">
          <li><a href="#" class="hover:text-yellow-400">Terms of Service</a></li>
          <li><a href="#" class="hover:text-yellow-400">Terms of Use</a></li>
          <li><a href="#" class="hover:text-yellow-400">Privacy Policy</a></li>
        </ul>
      </div>

    </div>
  </div>

  <!-- MAP -->
  <div id="map" class="w-full h-[300px]"></div>

  <div class="bg-[#111827] text-white py-4 mt-2">
    <div class="flex justify-center items-center space-x-6 mb-2">
      <a href="#" class="hover:text-yellow-400"><i class="bi bi-twitter text-xl"></i></a>
      <a href="#" class="hover:text-yellow-400"><i class="bi bi-facebook text-xl"></i></a>
      <a href="#" class="hover:text-yellow-400"><i class="bi bi-google text-xl"></i></a>
    </div>
    <p class="text-center text-sm text-gray-400">&copy; 2025 TraceFood. All rights reserved.</p>
  </div>
</footer>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const map = L.map('map').setView([-7.96, 112.63], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    fetch("<?= base_url('api/user-coordinates') ?>")
      .then(response => response.json())
      .then(users => {
        users.forEach(user => {
          if (user.latitude && user.longitude) {
            const marker = L.marker([user.latitude, user.longitude]).addTo(map);
            marker.bindPopup(`<strong>${user.nama}</strong><br>Role: ${user.role}`);
          }
        });
      });

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;

        const userMarker = L.marker([lat, lon], {
          icon: L.icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/512/149/149071.png',
            iconSize: [30, 30]
          })
        }).addTo(map);

        userMarker.bindPopup("Lokasi Anda Sekarang").openPopup();
      });
    }
  });
</script>

    <script>
        // JavaScript to handle modal functionality
        document.querySelectorAll('[data-modal-target]').forEach(function(button) {
            button.addEventListener('click', function() {
                const targetModal = document.querySelector(this.getAttribute('data-modal-target'));
                targetModal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('[data-modal-close]').forEach(function(button) {
            button.addEventListener('click', function() {
                const targetModal = document.querySelector(this.getAttribute('data-modal-close'));
                targetModal.classList.add('hidden');
            });
        });

        window.addEventListener('click', function(event) {
            document.querySelectorAll('.modal').forEach(function(modal) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>