<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<?php include 'layout/header.php'; ?>

    <section class="hero">
        <h2>JELAJAHI KEINDAHAN ALAM <br> DI TEMPAT TERSEMBUNYI</h2>
        <p>Jadikan perjalananmu menjadi berkesan.</p>
        <a href="destinasi.php" class="btn">Jelajahi Sekarang</a>
    </section>


  <section class="about-section">
  <div class="about-container">
    <div class="about-text">
      <h3>Permata di Khatulistiwa</h3>
      <h2>Lebih Dekat dengan Sumatera Utara</h2>
      <p>
        Sumatera Utara adalah provinsi yang kaya akan keajaiban alam, warisan budaya yang mendalam, dan kelezatan kuliner yang tak terlupakan. Dari danau vulkanik terbesar di dunia hingga hutan tropis yang lebat, setiap sudutnya menawarkan petualangan yang unik.
      </p>
      <p>
        Rasakan keramahan suku Batak, saksikan tradisi lompat batu di Nias, dan cicipi cita rasa rempah yang khas dalam setiap hidangan. Jelajahi Sumut dan temukan alasan mengapa provinsi ini begitu istimewa.
      </p>
      <a href="kontak.html" class="btn-primary">Hubungi Kami</a>
    </div>

    <div class="about-gallery">
      <div class="gallery-image">
        <img src="image/rumahbatak.jpg" alt="Rumah Adat Batak">
      </div>
      <div class="gallery-image">
        <img src="image/kopi.jpg" alt="Kopi Sidikalang">
      </div>
      <div class="gallery-image">
        <img src="image/sipiso.jpg" alt="Air Terjun Sipiso-piso">
      </div>
      <div class="gallery-image">
        <img src="image/tortor.jpg" alt="Tari Tortor">
      </div>
    </div>
  </div>
</section>

 <section class="destinasi-section">
        <div class="destinasi-title">
            <h2>Destinasi Populer di Sumatera Utara</h2>
            <p>Temukan keindahan tersembunyi yang menanti untuk anda jelajahi.</p>
        </div>

        <div class="galeri">
            <div class="card"><a href="toba.php">
                <img src="image/danautoba2.jpg">
                <div class="card-konten">
                <h3>Danau Toba</h3>
                <p>Danau vulkanik terbesar di dunia dengan pemandangan yang memukau.</p>
                </div></a>
            </div>

            <div class="card"><a href="berastagi.php">
                <img src="image/brastagi.jpg">
                <div class="card-konten">
                <h3>Berastagi</h3>
                <p>Dataran tinggi yang sejuk dengan pemandangan Gunung Sibayak dan Sinabung.</p>
                </div></a>
            </div>

            <div class="card"><a href="sipiso.php">
                <img src="image/sipiso.jpg">
                <div class="card-konten">
                <h3>Air Terjun Sipiso-piso</h3>
                <p>Air terjun yang berada di antara perbukitan diatas permukaan danau toba.</p>
                </div></a>
            </div>

            <div class="card"><a href="maimun.php">
                <img src="image/IstanaM.jpg">
                <div class="card-konten">
                <h3>Istana Maimun</h3>
                <p>Danau vulkanik terbesar di dunia dengan pemandangan yang memukau.</p>
                </div></a>
            </div>
        </div>
    </section>

    <section class="galeri">
        <div class="galeri-container">
            <div class="galeri-image">
                <img src="image/sipiso.jpg" alt="gunung sibayak">
            </div>

            <div class="galeri-konten">
                <h2>JELAJAHI KOTA <br> dan DESA KAMI</h2>
                <p>Tahukah Anda ada ratusan kota dan desa yang menanti untuk dijelajahi di Sumatera Utara? Kami mengajak Anda untuk singgah dan melihat tempat-tempat yang menawan, indah, dan seringkali unik ini. Sejarah, seni, kuliner lokal, dan pesona alam berpadu. Anda mungkin akan terkejut dengan apa yang Anda temukan!</p>
                <a href="" class="btn-primary">TEMUKAN TEMPAT</a>
            </div>
        </div>
    </section>

    <section class="galeri">
        <div class="galeri-container">
            <div class="galeri-konten">
                <h2>Saksikan Keajaiban Sunrise di Atas Kawah Sibayak </h2>
                <p>Menjulang gagah setinggi 2.212 mdpl di atas kota sejuk Berastagi, Gunung Sibayak adalah sebuah mahkota vulkanik yang menawarkan salah satu petualangan pendakian paling aksesibel di Sumatera Utara. Dikenal sebagai gunung yang sangat ramah bagi pendaki pemula, jalur pendakiannya yang relatif singkat akan membawa Anda melintasi vegetasi unik khas pegunungan tropis.</p>
                <a href="" class="btn-primary">TEMUKAN TEMPAT</a>
            </div>

            <div class="galeri-image">
                <img src="image/sibayak.jpg" alt="gunung sibayak">
            </div>
        </div>
    </section>
    
    <?php include 'layout/event.php'; ?>
   <?php include 'layout/footer.php'; ?>
    
</body>
</html>