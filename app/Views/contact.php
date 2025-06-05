<?= $this->extend('layout/headerUser') ?>

<?= $this->section('content') ?>

<style>
  .container {
    max-width: 480px;
    margin: 4rem auto;
    padding: 30px 25px;
    background: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 12px;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
    color: #000;
  }

  h2 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 25px;
    font-weight: bold;
    color: #000;
  }

  label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #222;
  }

  input[type="text"],
  input[type="email"],
  textarea,
  input[type="file"] {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 18px;
    border: 1px solid #999;
    border-radius: 6px;
    font-size: 1rem;
    color: #000;
    background: #fff;
    box-sizing: border-box;
    font-family: inherit;
  }

  textarea {
    min-height: 100px;
    resize: vertical;
  }

  input[type="text"]:focus,
  input[type="email"]:focus,
  textarea:focus,
  input[type="file"]:focus {
    outline: 2px solid #000;
    border-color: #000;
  }

  button {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 8px;
    background: #000;
    color: #fff;
    font-size: 1.1rem;
    font-weight: 700;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 1.3px;
    transition: background-color 0.3s ease;
  }

  button:hover {
    background: #444;
  }

  .flash-message {
    padding: 14px;
    border-radius: 8px;
    margin-bottom: 25px;
    font-weight: 600;
    text-align: center;
  }

  .success {
    background-color: #28a745;
    color: #fff;
  }

  .error {
    background-color: #dc3545;
    color: #fff;
  }

  /* Box container bawah */
  .bottom-boxes {
    display: flex;
    gap: 20px;
    margin-top: 30px;
    flex-wrap: wrap;
  }

  .box {
    background: #fff;
    border: 1px solid #ccc;
    padding: 20px 25px;
    border-radius: 12px;
    box-shadow: 0 0 8px rgba(0,0,0,0.05);
    color: #333;
    flex: 1 1 45%;
    min-width: 280px;
  }

  .box h3 {
    margin-top: 0;
    margin-bottom: 15px;
    font-size: 1.3rem;
    font-weight: 700;
    color: #000;
  }

  .box p, .box ul {
    font-size: 0.95rem;
    line-height: 1.5;
  }

  .box ul {
    padding-left: 20px;
  }

  .box ul li {
    margin-bottom: 8px;
  }

  @media (max-width: 650px) {
    .bottom-boxes {
      flex-direction: column;
    }
    .box {
      min-width: 100%;
    }
  }
</style>

<div class="container">
  <h2>Hubungi Kami</h2>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="flash-message success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="flash-message error"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <form method="post" action="<?= base_url('contact/sendEmail') ?>" enctype="multipart/form-data">
    <label for="name">Nama:</label>
    <input type="text" id="name" name="name" required />

    <label for="email">Email Anda:</label>
    <input type="email" id="email" name="email" required />

    <label for="subject">Subjek:</label>
    <input type="text" id="subject" name="subject" required />

    <label for="message">Pesan:</label>
    <textarea id="message" name="message" required></textarea>

    <label for="attachment">Upload File Bukti Pendukung (opsional):</label>
    <input type="file" id="attachment" name="attachment" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" />

    <button type="submit">Kirim Pesan</button>
  </form>

  <div class="bottom-boxes">
    <div class="box disclaimer">
      <h3>Disclaimer</h3>
      <p>Dengan mengirimkan pesan ini, Anda setuju bahwa data dan file yang dikirim dapat kami proses sesuai kebijakan privasi kami. Kami berkomitmen menjaga kerahasiaan data Anda.</p>
    </div>

    <div class="box tutorial">
      <h3>Tutorial Menggunakan Form Hubungi Kami</h3>
      <ul>
        <li>Isi semua kolom dengan data yang benar dan lengkap.</li>
        <li>Pastikan alamat email Anda aktif agar kami bisa membalas.</li>
        <li>Gunakan subjek yang jelas untuk mempermudah penanganan pesan Anda.</li>
        <li>Jelaskan pesan atau keluhan Anda secara singkat dan padat.</li>
        <li>Jika perlu, upload file bukti pendukung dalam format JPG, PNG, PDF, atau DOC.</li>
        <li>Setelah selesai, klik tombol "Kirim Pesan".</li>
      </ul>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
