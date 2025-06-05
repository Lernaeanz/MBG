<?php $this->extend('layout/headerUser'); ?>
<?php $this->section('content'); ?>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<style>
  nav, footer {
  position: relative;
  z-index: 10;
}

  #particles-js {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    z-index: 0;
    background: #1e293b;
  }

  .container {
    position: relative;
    max-width: 1100px;
    margin: 40px auto 80px;
    background: #ffffffee;
    border-radius: 12px;
    padding: 30px 40px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    z-index: 10;
  }

  h2 {
    margin-bottom: 6px;
    color: #1e293b;
    position: relative;
    font-weight: 700;
  }
  h2::after {
    content: "";
    display: block;
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, #f97316, #fb923c);
    border-radius: 2px;
    margin-top: 6px;
  }

  .subtitle {
    margin-top: 4px;
    margin-bottom: 30px;
    font-weight: 600;
    color: #475569;
    font-style: italic;
  }

  form.filter {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    align-items: center;
    margin-bottom: 25px;
    background: #f8fafc;
    padding: 15px 25px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgb(0 0 0 / 0.1);
    color: #334155;
  }

  form.filter select, form.filter button, form.filter a {
    padding: 10px 15px;
    font-size: 14px;
    border-radius: 6px;
    border: 1px solid #cbd5e1;
    outline: none;
    transition: all 0.3s ease;
  }

  form.filter select {
    background: white;
    color: #334155;
    min-width: 160px;
    cursor: pointer;
  }

  form.filter select:hover, form.filter select:focus {
    border-color: #5b6def;
    box-shadow: 0 0 6px #5b6def;
  }

  form.filter button {
    background: #5b6def;
    color: white;
    border: none;
    cursor: pointer;
    min-width: 90px;
  }
  form.filter button:hover {
    background: #3e4fcc;
  }

  form.filter a {
    background: #22c55e;
    color: white;
    text-decoration: none;
    margin-left: auto;
    min-width: 130px;
    text-align: center;
  }
  form.filter a:hover {
    background: #16a34a;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
    color: #334155;
  }
  thead tr {
    border-bottom: 2px solid #fb923c;
  }
  thead th {
    padding: 10px 15px;
    font-weight: 700;
    text-align: left;
  }
  tbody tr {
    border-bottom: 1px solid #e2e8f0;
    transition: background-color 0.3s ease;
  }
  tbody tr:hover {
    background-color: #f1f5f9;
  }
  tbody td {
    padding: 10px 15px;
    vertical-align: middle;
  }
  tbody td:last-child a {
    margin-right: 12px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
  }
  tbody td:last-child a.edit {
    color: #5b6def;
  }
  tbody td:last-child a.delete {
    color: #e34c4c;
  }
  tbody td:last-child a:hover {
    text-decoration: underline;
  }

  /* Tambahan kolom hash blok */
  .hash-block {
    font-family: monospace;
    font-size: 12px;
    color: #888;
  }

  @media (max-width: 900px) {
    .container {
      padding: 20px 25px;
      margin: 20px 15px 60px;
    }
    form.filter {
      flex-direction: column;
      align-items: stretch;
    }
    form.filter a {
      margin-left: 0;
    }
  }
</style>
</head>
<body>

<div id="particles-js"></div>

<div class="container">
    <h2>Laporan Keuangan Program MBG</h2>
    <div class="subtitle">Data ini bersifat transparansi untuk laporan keuangan program MBG secara terbuka.</div>

    <form method="get" action="<?= base_url('keuangan') ?>" class="filter">
        <select name="tahun">
            <option value="">Pilih Tahun</option>
            <?php
            $years = [];
            foreach ($duitmbg as $row) {
                $year = date('Y', strtotime($row['tanggal']));
                if (!in_array($year, $years)) $years[] = $year;
            }
            sort($years);
            foreach ($years as $year) : ?>
                <option value="<?= $year ?>" <?= (isset($filter['tahun']) && $filter['tahun'] == $year) ? 'selected' : '' ?>><?= $year ?></option>
            <?php endforeach; ?>
        </select>

        <select name="asal_dana">
            <option value="">Asal Dana</option>
            <option value="Bantuan Pemerintah" <?= (isset($filter['asal_dana']) && $filter['asal_dana'] == 'Bantuan Pemerintah') ? 'selected' : '' ?>>Bantuan Pemerintah</option>
            <option value="Donasi" <?= (isset($filter['asal_dana']) && $filter['asal_dana'] == 'Donasi') ? 'selected' : '' ?>>Donasi</option>
        </select>

        <select name="status_pembayaran">
            <option value="">Status Pembayaran</option>
            <option value="Lunas" <?= (isset($filter['status_pembayaran']) && $filter['status_pembayaran'] == 'Lunas') ? 'selected' : '' ?>>Lunas</option>
            <option value="Belum Lunas" <?= (isset($filter['status_pembayaran']) && $filter['status_pembayaran'] == 'Belum Lunas') ? 'selected' : '' ?>>Belum Lunas</option>
        </select>

        <button type="submit">Submit</button>
        <?php if (isset($role) && $role === 'sekolah'): ?>
          <a href="<?= base_url('keuangan/create') ?>">Tambah Data</a>
        <?php endif; ?>
    </form>

    <table>
        <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Sekolah</th>
            <th>Vendor</th>
            <th>Jumlah Porsi</th>
            <th>Harga Per Porsi</th>
            <th>Total Biaya</th>
            <th>Asal Dana</th>
            <th>Status Pembayaran</th>
            <th>Hash Blok (Blockchain)</th>
            <?php if (isset($role) && $role === 'vendor'): ?>
              <th>Aksi</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php if ($duitmbg): foreach ($duitmbg as $row): ?>
            <tr>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['nama_sekolah'] ?></td>
                <td><?= $row['vendor'] ?></td>
                <td><?= $row['jumlah_porsi'] ?></td>
                <td>Rp. <?= number_format($row['harga_per_porsi'], 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($row['total_biaya'], 0, ',', '.') ?></td>
                <td><?= $row['asal_dana'] ?></td>
                <td><?= $row['status_pembayaran'] ?></td>
                <td class="hash-block">
                    <?php
                        $block = $blockchainModel->where('transaksi_id', $row['id'])->first();
                        if ($block) {
                            echo substr($block['hash_curr'], 0, 15) . '...';
                        } else {
                            echo 'Belum dicatat';
                        }
                    ?>
                </td>
                <td>
                  <?php if (isset($role) && $role === 'vendor'): ?>
                    <a href="<?= base_url('keuangan/edit/'.$row['id']) ?>" class="edit">Edit</a>
                    <a href="<?= base_url('keuangan/delete/'.$row['id']) ?>" class="delete" onclick="return confirm('Hapus data?')">Delete</a>
                  <?php endif; ?>

                  <?php if (isset($role) && $role === 'vendor' && $row['status_pembayaran'] !== 'Lunas'): ?>
                  <?php endif; ?>
                </td>


            </tr>
        <?php endforeach; else: ?>
            <tr><td colspan="10" style="text-align:center; padding: 20px;">Data tidak ditemukan.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
  particlesJS('particles-js', {
    "particles": {
      "number": { "value": 55, "density": { "enable": true, "value_area": 800 } },
      "color": { "value": "#5b6def" },
      "shape": { "type": "circle" },
      "opacity": {
        "value": 0.4,
        "random": true,
        "anim": { "enable": true, "speed": 1, "opacity_min": 0.1, "sync": false }
      },
      "size": {
        "value": 6,
        "random": true,
        "anim": { "enable": true, "speed": 3, "size_min": 1, "sync": false }
      },
      "line_linked": {
        "enable": true,
        "distance": 130,
        "color": "#5b6def",
        "opacity": 0.25,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 1.5,
        "direction": "none",
        "random": true,
        "straight": false,
        "out_mode": "out",
        "bounce": false
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": { "enable": true, "mode": "grab" },
        "onclick": { "enable": true, "mode": "push" },
        "resize": true
      },
      "modes": {
        "grab": { "distance": 150, "line_linked": { "opacity": 0.4 } },
        "push": { "particles_nb": 4 }
      }
    },
    "retina_detect": true
  });
</script>

</body>

<?php $this->endSection(); ?>
