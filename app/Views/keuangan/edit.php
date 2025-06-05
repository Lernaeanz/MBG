<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Edit Data Keuangan</title>

<style>
  body {
    margin: 0; padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #1e293b;
    color: #f8fafc;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
  }

  .form-container {
    background: #ffffffee;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    width: 100%;
    max-width: 500px;
  }

  h2 {
    color: #1e293b;
    margin-bottom: 20px;
    text-align: center;
    font-weight: 700;
    position: relative;
  }
  h2::after {
    content: "";
    display: block;
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #f97316, #fb923c);
    border-radius: 2px;
    margin: 10px auto 0;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 18px;
  }

  label {
    display: flex;
    flex-direction: column;
    font-weight: 600;
    color: #334155;
    font-size: 14px;
  }

  input[type="text"],
  input[type="number"],
  input[type="date"],
  select {
    margin-top: 6px;
    padding: 10px 12px;
    font-size: 14px;
    border-radius: 8px;
    border: 1.5px solid #cbd5e1;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    outline: none;
  }

  input[type="text"]:focus,
  input[type="number"]:focus,
  input[type="date"]:focus,
  select:focus {
    border-color: #5b6def;
    box-shadow: 0 0 8px #5b6defaa;
  }

  button {
    padding: 12px;
    background: linear-gradient(90deg, #5b6def, #3e4fcc);
    border: none;
    border-radius: 8px;
    color: white;
    font-weight: 700;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
  }
  button:hover {
    background: linear-gradient(90deg, #3e4fcc, #5b6def);
    transform: scale(1.05);
  }

  .back-link {
    display: block;
    margin-top: 20px;
    text-align: center;
    color: #5b6def;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  .back-link:hover {
    color: #3e4fcc;
    text-decoration: underline;
  }

  @media (max-width: 480px) {
    .form-container {
      padding: 20px 25px;
    }
  }
</style>
</head>
<body>

<div class="form-container">
  <h2>Edit Data Keuangan</h2>
  <form method="post" action="<?= base_url('keuangan/edit/'.$item['id']) ?>">
    <label>
      Tanggal:
      <input type="date" name="tanggal" value="<?= esc($item['tanggal']) ?>" required />
    </label>

    <label>
      Nama Sekolah:
      <input type="text" name="nama_sekolah" value="<?= esc($item['nama_sekolah']) ?>" required />
    </label>

    <label>
      Vendor:
      <input type="text" name="vendor" value="<?= esc($item['vendor']) ?>" required />
    </label>

    <label>
      Jumlah Porsi:
      <input type="number" name="jumlah_porsi" min="1" value="<?= esc($item['jumlah_porsi']) ?>" required />
    </label>

    <label>
      Harga Per Porsi (Rp):
      <input type="number" name="harga_per_porsi" step="0.01" min="0" value="<?= esc($item['harga_per_porsi']) ?>" required />
    </label>

    <label>
      Asal Dana:
      <select name="asal_dana" required>
        <option value="Bantuan Pemerintah" <?= $item['asal_dana'] == 'Bantuan Pemerintah' ? 'selected' : '' ?>>Bantuan Pemerintah</option>
        <option value="Donasi" <?= $item['asal_dana'] == 'Donasi' ? 'selected' : '' ?>>Donasi</option>
      </select>
    </label>

    <label>
      Status Pembayaran:
      <select name="status_pembayaran" required>
        <option value="Lunas" <?= $item['status_pembayaran'] == 'Lunas' ? 'selected' : '' ?>>Lunas</option>
        <option value="Belum Lunas" <?= $item['status_pembayaran'] == 'Belum Lunas' ? 'selected' : '' ?>>Belum Lunas</option>
      </select>
    </label>

    <button type="submit">Update</button>
  </form>
  <a href="<?= base_url('keuangan') ?>" class="back-link">← Kembali ke daftar</a>
</div>

</body>
</html>
