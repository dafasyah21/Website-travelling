<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel</title>
    <link rel="stylesheet" href="menu.css">
    <script src="script.js"></script>
</head>
<body>
    <?php include 'layout/header.php'; ?>

    <section class="bg">
       <h2>Destinasi</h2>
       <p>Cari tempat rekreasimu yang nyaman dan sesuai dengan kemauan.</p>
    </section>

    <section class="hero">
        <h2>Jelajahi Sumatera Utara: Pesona Danau, Rimba, dan Rasa</h2>
        <p>Sumatera Utara adalah paket lengkap petualangan. Dari birunya Danau Toba yang ikonik hingga hijaunya rimba Bukit Lawang yang menjadi rumah bagi orangutan. Mulailah perjalanan Anda dari Medan, kota yang tak pernah tidur dengan surga kulinernya, lalu lanjutkan untuk menemukan ketenangan di dataran tinggi Berastagi. Baik Anda pencari adrenalin, penikmat budaya, atau pemburu kuliner, Sumatera Utara punya semua yang Anda cari.</p>
    </section>

    <?php include 'rekomendasi_hotel_section.php'; ?>

    <section class="tab-container">
        <h3>MULAI JELAJAHI</h3>
        <div class="tab-buttons">
            <button class="tab-button active" onclick="showContent('alam')">Wisata Alam</button>
            <button class="tab-button" onclick="showContent('budaya')">Warisan dan Wahana</button>
        </div>

        <div class="tab-content">
            <div id="alam" class="content show">
                <div class="card"><a href="sipiso.php">
                    <img src="image/sipiso2.jpg">
                    <div class="card-konten">
                        <h2>AIR TERJUN SIPISO-PISO</h2>
                        <p>Salah satu tempat wisata di Sumatera Utara oleh Pemerintah Kabupaten Karo. Kata Piso berasal dari kata pisau karena derasnya air terjun ini bagaikan pisau yang tajam.</p></a>
                    </div>
                </div>
                <div class="card"><a href="samosir.php">
                    <img src="image/samosir2.jpg">
                    <div class="card-konten">
                        <h2>PULAU SAMOSIR</h2>
                        <p>Pulau Samosir adalah sebuah pulau vulkanik yang terletak di tengah Danau Toba, Sumatera Utara. Dikenal dengan keindahan alamnya yang menakjubkan.</p></a>
                    </div>
                </div>
                <div class="card"><a href="holbung.php">
                    <img src="image/holbung2.jpg">
                    <div class="card-konten">
                        <h2>BUKIT HOLBUNG</h2>
                        <p>Bukit ini dikenal dengan pemandangan alamnya yang menakjubkan, sering disebut sebagai "Bukit Teletubbies".</p></a>
                    </div>
                </div>
                <div class="card"><a href="laukawar.php">
                    <img src="image/laukawar2.jpg">
                    <div class="card-konten">
                        <h2>DANAU LAU KAWAR</h2>
                        <p>Danau Lau Kawar menawarkan suasana yang asri dengan pepohonan hijau di sekelilingnya, serta pemandangan yang menawan.</p></a>
                    </div>
                </div>
                <div class="card"><a href="tangkahan.php">
                    <img src="image/tangkahan.jpg">
                    <div class="card-konten">
                        <h2>TANGKAHAN</h2>
                        <p> Wisatawan dapat menikmati berbagai aktivitas seperti melihat gajah, memandikan gajah, jungle trekking, river tubing, dan menikmati air terjun. .</p></a>
                    </div>
                </div>
                <div class="card"><a href="danaulinting.php">
                    <img src="image/linting.jpg">
                    <div class="card-konten">
                        <h2>DANAU LINTING</h2>
                        <p>Danau ini dikenal dengan airnya yang berwarna hijau kebiruan dan kandungan belerangnya yang bermanfaat bagi kesehatan kulit</p></a>
                    </div>
                </div>
                <div class="card"><a href="cemara.php">
                    <img src="image/cemara.jpg">
                    <div class="card-konten">
                        <h2>PANTAI CEMARA KEMBAR</h2>
                        <p>Pantai ini terkenal dengan pemandangan sunrise yang indah dan suasana yang teduh karena banyak pohon cemara.</p></a>
                    </div>
                </div>
                <div class="card"><a href="situmurun.php">
                    <img src="image/situmurun.jpg">
                    <div class="card-konten">
                        <h2>AIR TERJUN SITUMURUN</h2>
                        <p>Air Terjun Situmurun adalah air terjun yang langsung mengalir di Danau Toba, Air Terjun Situmurun disebut juga Air Terjun Binangalom yang berarti sungai dan penyejuk</p></a>
                    </div>
                </div>
                <div class="card"><a href="toba.php">
                    <img src="image/danautoba2.jpg">
                    <div class="card-konten">
                        <h2>DANAU TOBA</h2>
                        <p>Danau vulkanik terbesar di dunia dengan pemandangan yang memukau.</p></a>
                    </div>
                </div>
                <div class="card"><a href="berastagi.php">
                    <img src="image/brastagi.jpg">
                    <div class="card-konten">
                        <h2>BERASTAGI</h2>
                        <p>Dataran tinggi yang sejuk dengan pemandangan Gunung Sibayak dan Sinabung.</p></a>
                    </div>
                </div>
            </div>

            <div id="budaya" class="content">
                <div class="card"><a href="maimun.php">
                    <img src="image/maimun.jpg"> <div class="card-konten">
                        <h2>ISTANA MAIMUN</h2>
                        <p>Istana Kesultanan Deli di Medan yang merupakan ikon kota dengan arsitektur unik yang memadukan gaya Melayu, Islam, dan Eropa.</p></a>
                    </div>
                </div>
                 <div class="card"><a href="hutasiallagan.php">
                    <img src="image/siallagan.jpg"> <div class="card-konten">
                        <h2>HUTA SIALLAGAN</h2>
                        <p>Desa kuno di Samosir yang dikenal sebagai "kampung batu" dengan kursi-kursi batu tempat pengadilan dan eksekusi pada zaman dahulu.</p></a>
                    </div>
                </div>
                <div class="card"><a href="mansion.php">
                    <img src="image/tjongafie2.png"> <div class="card-konten">
                        <h2>TJONG A-FIE MANSION</h2>
                        <p>rumah dua lantai di Jalan Ahmad Yani di Kesawan, Medan, Sumatra Utara, yang dibangun oleh Tjong A Fie (1860–1921), pedagang Hakka yang memiliki banyak tanah perkebunan di Medan.</p></a>
                    </div>
                </div>
                <div class="card"><a href="museum.php">
                    <img src="image/museum.webp"> <div class="card-konten">
                        <h2>RAHMAT INTERNATIONAL WILDLIFE MUSEUM AND GALLERY</h2>
                        <p>Rahmat International Wildlife Museum & Gallery tidak hanya menampilkan koleksi binatang, tetapi juga menekankan pada pentingnya konservasi alam.</p></a>
                    </div>
                </div>
                <div class="card"><a href="MASJIDRAYA.php">
                    <img src="image/masjidhd.jpg"> <div class="card-konten">
                        <h2>MASJID RAYA AL-MASHUN</h2>
                        <p>Sebuah masjid bersejarah yang terletak di Medan, Sumatera Utara. Dibangun pada tahun 1906 dan selesai pada tahun 1909.</p></a>
                    </div>
                </div>
                <div class="card"><a href="mikie.php">
                    <img src="image/mikie2.jpg"> <div class="card-konten">
                        <h2>MIKIE FUNLAND</h2>
                        <p> Taman hiburan keluarga yang terletak di Berastagi, Sumatera Utara. Taman ini menawarkan berbagai wahana seru untuk segala usia.</p></a>
                    </div>
                </div>
                <div class="card"><a href="hill.php">
                    <img src="image/hill.webp"> <div class="card-konten">
                        <h2>HILLPARK SIBOLANGIT</h2>
                        <p>Hillpark menawarkan berbagai wahana permainan yang dibagi menjadi tiga zona utama: The Lost City, Toon Town, dan The Heritage.</p></a>
                    </div>
                </div>
                <div class="card"><a href="hairos.php">
                    <img src="image/hairos.webp"> <div class="card-konten">
                        <h2>HAIROS WATERPARK</h2>
                        <p>Tempat wisata air yang populer di Medan, Sumatera Utara, menawarkan berbagai wahana air dan fasilitas rekreasi lainnya.</p></a>
                    </div>
                </div>
                <div class="card"><a href="budayaland.php">
                    <img src="image/budayaland.jpg"> <div class="card-konten">
                        <h2>BUDAYA LAND</h2>
                        <p>Tempat wisata air yang populer di Medan, Sumatera Utara, menawarkan berbagai wahana air dan fasilitas rekreasi lainnya.</p></a>
                    </div>
                </div>
                <div class="card"><a href="lonsum.php">
                    <img src="image/gedunglondon.png"> <div class="card-konten">
                        <h2>GEDUNG LONDON SUMATERA</h2>
                        <p>Gedung London Sumatera, atau biasa disebut Gedung Lonsum, adalah bangunan bersejarah di Medan yang dibangun pada tahun 1906 oleh perusahaan perkebunan Inggris, Harrisons & Crosfield</p></a>
                    </div>
                </div>
                <div class="card"><a href="museumsumut.php">
                    <img src="image/unnamed.jpg"> <div class="card-konten">
                        <h2>MUSEUM NEGERI SUMATERA UTARA</h2>
                        <p>Museum Negeri Sumatera Utara di Medan menyuguhkan kekayaan warisan budaya yang beragam dari wilayah Kota Medan, termasuk artefak arkeologi, benda etnografi, seni rupa, maupun sejarah alam.</p></a>
                    </div>
                </div>
                <div class="card"><a href="huta-siallagan.php">
                    <img src="image/bolon.jpeg"> <div class="card-konten">
                        <h2>RUMAH BOLON</h2>
                        <p>Rumah Adat Bolon adalah rumah adat suku Batak, khususnya Batak Toba, yang berasal dari Sumatera Utara</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function showContent(contentId) {
        var allContent = document.querySelectorAll('.tab-content .content');
        allContent.forEach(function(content) {
        content.classList.remove('show');
        });

        var allButtons = document.querySelectorAll('.tab-buttons .tab-button');
        allButtons.forEach(function(button) {
        button.classList.remove('active');
        });
        var selectedContent = document.getElementById(contentId);
        if (selectedContent) {
        selectedContent.classList.add('show');
        }
        var activeButton = document.querySelector(`.tab-button[onclick="showContent('${contentId}')"]`);
        if (activeButton) {
        activeButton.classList.add('active');
        }
        }

        document.addEventListener('DOMContentLoaded', function() {

        });

    </script>

    <?php include 'layout/footer.php'; ?>
</body>
</html>