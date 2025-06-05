<?php $this->extend('layout/headerUser'); ?>

<?php $this->section('content'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #1ebaa7, #f8a643);
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 30px;
            max-width: 1000px;
            margin: auto;
        }
        h1 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 20px;
        }
        .stats {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        .card {
            background: #fdf6e3;
            color: #333;
            border-radius: 10px;
            flex: 1;
            min-width: 200px;
            margin: 10px;
            padding: 20px;
            text-align: center;
        }
        .form-section {
            background: #095d57;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        input {
            width: 48%;
            padding: 10px;
            margin: 5px 1%;
            border: none;
            border-radius: 5px;
        }
        button {
            background: #f8a643;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px 1%;
            border-radius: 5px;
            cursor: pointer;
        }
        .comments {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .comment {
            background: #00726a;
            color: #fff;
            border-radius: 10px;
            flex: 1;
            min-width: 200px;
            margin: 10px;
            padding: 20px;
        }
        .before-after {
            display: flex;
            justify-content: space-around;
            background: #fff;
            color: #000;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
        }
        .before-after div {
            width: 45%;
        }
        h3 {
            margin-bottom: 10px;
        }
        #errorMsg {
            color: #ffdddd;
            margin-top: 10px;
            display: none;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }
        .pagination a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }
        .pagination a.disabled {
            color: #666;
            pointer-events: none;
        }
    </style>
<body>
    <div class="container">
        <h1>Efek Program MBG terhadap Sekolah & Siswa</h1>
        <div class="stats">
            <div class="card">
                <h2>87%</h2>
                <p>Siswa lebih fokus belajar</p>
            </div>
            <div class="card">
                <h2>65%</h2>
                <p>Penurunan keluhan sakit ringan</p>
            </div>
            <div class="card">
                <h2>72%</h2>
                <p>Enakan belajar secara sehat</p>
            </div>
            <div class="card">
                <h2>95%</h2>
                <p>Ingin mendukung program</p>
            </div>
        </div>

        <div class="form-section">
            <h2>Komentar dari Masyarakat</h2>
            <form id="commentForm" action="/program/save_feedback" method="post" onsubmit="return validateComment()">
                <input type="text" name="nama" placeholder="Nama" required>
                <input type="text" name="instansi" placeholder="Instansi/Relasi" required>
                <input type="text" id="komentar" name="komentar" placeholder="Komentar" required>
                <button type="submit">Kirim</button>
            </form>
            <p id="errorMsg"></p>
        </div>

        <div class="comments">
            <?php if (!empty($feedback)): ?>
                <?php foreach ($feedback as $comment): ?>
                    <div class="comment">
                        <strong><?= esc($comment['nama']); ?></strong><br>
                        <?= esc($comment['instansi']); ?><br><br>
                        "<?= esc($comment['komentar']); ?>"
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada komentar.</p>
            <?php endif; ?>
        </div>

        <div class="pagination">
            <?php if ($currentPage > 1): ?>
                <a href="<?= base_url('program/' . ($currentPage - 1)) ?>">&laquo; Previous</a>
            <?php else: ?>
                <a class="disabled">&laquo; Previous</a>
            <?php endif; ?>

            Page <?= $currentPage ?> of <?= $totalPages ?>

            <?php if ($currentPage < $totalPages): ?>
                <a href="<?= base_url('program/' . ($currentPage + 1)) ?>">Next &raquo;</a>
            <?php else: ?>
                <a class="disabled">Next &raquo;</a>
            <?php endif; ?>
        </div>

        <div class="before-after">
            <div>
                <h3>Sebelum MBG</h3>
                <p>Siswa sering kurang fokus saat belajar</p>
            </div>
            <div>
                <h3>Sesudah MBG</h3>
                <p>Siswa belajar lebih tingk dan sehat</p>
            </div>
        </div>
    </div>

    <script>
        function validateComment() {
            const komentar = document.getElementById('komentar').value.trim();
            const words = komentar.split(/\s+/).filter(word => word.length > 0);
            const errorMsg = document.getElementById('errorMsg');
            if (words.length < 5) {
                errorMsg.style.display = 'block';
                errorMsg.textContent = 'Komentar harus minimal 100 kata. Saat ini komentar Anda hanya berisi ' + words.length + ' kata.';
                return false; // cegah submit
            }
            errorMsg.style.display = 'none';
            return true; // submit form
        }
    </script>
<?php $this->endSection(); ?>
