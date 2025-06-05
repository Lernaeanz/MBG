<?php $this->extend('layout/headerUser'); ?>
<?php $this->section('content'); ?>

<style>
  body.faq-page {
    background: linear-gradient(135deg, #ffefba, #ffffff);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  h1 {
    text-align: center;
    margin: 40px 0 30px;
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    text-shadow: 1px 1px 2px #ddd;
  }

  .faq-container {
    max-width: 900px;
    margin: 0 auto 50px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    padding: 30px 40px;
  }

  .faq-item {
    border-bottom: 1px solid #ddd;
    padding: 20px 0;
    cursor: pointer;
    position: relative;
    transition: background-color 0.3s ease;
    user-select: none;
  }

  .faq-item:hover {
    background-color: #fff4e5;
  }

  .faq-question {
    font-weight: 700;
    font-size: 1.3rem;
    color: #e67e22;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-right: 35px;
  }

  .faq-question .toggle-icon {
    font-weight: 900;
    font-size: 1.8rem;
    color: #e67e22;
    user-select: none;
    transition: transform 0.3s ease;
    width: 28px;
    text-align: center;
  }

  .faq-question.active .toggle-icon {
    transform: rotate(180deg);
  }

  .faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s ease, padding 0.3s ease;
    color: #34495e;
    font-size: 1.05rem;
    line-height: 1.6;
    margin-top: 12px;
    padding-left: 10px;
  }

  .faq-answer.show {
    max-height: 1000px;
    padding-top: 12px;
    padding-bottom: 12px;
  }

  .faq-question .icon {
    margin-right: 12px;
    color: #e67e22;
    font-size: 1.6rem;
  }

  .tips-section {
    max-width: 900px;
    margin: 0 auto 60px;
    padding: 30px 40px;
    background: #f7b830;
    border-radius: 15px;
    color: white;
    box-shadow: 0 15px 30px rgba(231,126,34,0.5);
  }

  .tips-section h2 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 20px;
    text-align: center;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
  }

  .tips-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
  }

  .tips-list li {
    flex: 1 1 280px;
    background: rgba(255 255 255 / 0.15);
    border-radius: 12px;
    padding: 15px 20px;
    font-weight: 600;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  }

  .tips-list li i {
    font-size: 1.8rem;
    color: #fff;
  }

  .cta-section {
    background: #e67e22;
    padding: 60px 30px;
    text-align: center;
    color: #fff;
    border-radius: 15px;
    max-width: 900px;
    margin: 0 auto;
    box-shadow: 0 15px 30px rgba(230,126,34,0.5);
  }

  .cta-section h2 {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 20px;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
  }

  .cta-section p {
    font-size: 1.25rem;
    max-width: 600px;
    margin: 0 auto 30px;
    line-height: 1.5;
  }

  .cta-button {
    background: #fff;
    color: #e67e22;
    font-weight: 700;
    font-size: 1.1rem;
    padding: 15px 35px;
    border-radius: 50px;
    text-decoration: none;
    transition: background-color 0.3s ease;
    display: inline-block;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  }

  .cta-button:hover {
    background-color: #f4b640;
  }
</style>

<div class="faq-page">
  <h1>Frequently Asked Questions</h1>

  <section class="faq-container" aria-label="FAQ Section">
    <article class="faq-item" tabindex="0">
      <div class="faq-question">
        <i class="fa-solid fa-circle-question icon"></i>
        Bagaimana cara mendaftar sebagai mitra?
        <span class="toggle-icon">+</span>
      </div>
      <div class="faq-answer">
        Untuk mendaftar sebagai mitra, silakan kunjungi halaman pendaftaran mitra dan isi formulir lengkap. Tim kami akan memverifikasi.
      </div>
    </article>

    <article class="faq-item" tabindex="0">
      <div class="faq-question">
        <i class="fa-solid fa-circle-question icon"></i>
        Apakah data penerima bantuan aman?
        <span class="toggle-icon">+</span>
      </div>
      <div class="faq-answer">
        Data dijaga ketat dan hanya dapat diakses oleh pihak berwenang.
      </div>
    </article>

    <article class="faq-item" tabindex="0">
      <div class="faq-question">
        <i class="fa-solid fa-circle-question icon"></i>
        Apa saja persyaratan untuk menerima bantuan?
        <span class="toggle-icon">+</span>
      </div>
      <div class="faq-answer">
        Anda harus terdaftar dan memenuhi syarat verifikasi sistem.
      </div>
    </article>
  </section>

  <section class="tips-section">
    <h2>Tips & Informasi</h2>
    <ul class="tips-list">
      <li><i class="fa-solid fa-lightbulb"></i> Cek update Trace Food secara berkala.</li>
      <li><i class="fa-solid fa-shield-halved"></i> Jaga kerahasiaan data pribadi Anda.</li>
      <li><i class="fa-solid fa-users"></i> Gabung komunitas mitra.</li>
    </ul>
  </section>

  <section class="cta-section">
    <h2>Masih ada pertanyaan?</h2>
    <p>Jika pertanyaan Anda belum terjawab, hubungi tim kami melalui kontak resmi.</p>
    <a href="/contact" class="cta-button">Hubungi Kami</a>
  </section>
</div>

<script>
  document.querySelectorAll('.faq-question').forEach(function(question) {
    question.addEventListener('click', function () {
      this.classList.toggle('active');
      const answer = this.nextElementSibling;
      const icon = this.querySelector('.toggle-icon');
      answer.classList.toggle('show');
      icon.textContent = answer.classList.contains('show') ? '−' : '+';
    });
  });
</script>

<?php $this->endSection(); ?>
