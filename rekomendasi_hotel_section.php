<?php
require 'koneksi.php';

$query_featured = "SELECT * FROM rekomendasi_hotel WHERE is_featured = 1 LIMIT 1";
$result_featured = $koneksi->query($query_featured);
$featured_hotel = $result_featured->fetch_assoc();


$query_list = "SELECT * FROM rekomendasi_hotel WHERE is_featured = 0 ORDER BY id DESC";
$result_list = $koneksi->query($query_list);
$hotel_list = [];
if ($result_list && $result_list->num_rows > 0) {
    while ($row = $result_list->fetch_assoc()) {
        $hotel_list[] = $row;
    }
}
?>

<section class="hotel-section-container" style="background-image: url('<?php echo $featured_hotel ? htmlspecialchars($featured_hotel['gambar_url']) : ''; ?>');">>
    <?php if ($featured_hotel): ?>
    <div class="featured-hotel">
        <h4>Rekomendasi Hotel</h4>
        <h2><?php echo htmlspecialchars($featured_hotel['nama_hotel']); ?></h2>
        <p><?php echo htmlspecialchars($featured_hotel['deskripsi_singkat']); ?></p>
        <a href="<?php echo htmlspecialchars($featured_hotel['link_booking']); ?>" target="_blank" class="jelajahi-btn">Jelajahi Sekarang</a>
    </div>
    <?php else: ?>
 
    <?php endif; ?>

    <div class="hotel-list-wrapper">
        <h2>Temukan penginapan populer </h2>
        <div class="hotel-list">
            <?php foreach ($hotel_list as $hotel): ?>
            <a href="<?php echo htmlspecialchars($hotel['link_booking']); ?>" target="_blank" style="text-decoration: none;">
                <div class="hotel-card">
                    <img src="<?php echo htmlspecialchars($hotel['gambar_url']); ?>" alt="<?php echo htmlspecialchars($hotel['nama_hotel']); ?>">
                    <div class="card-overlay">
                        <h3 class="card-title"><?php echo htmlspecialchars($hotel['nama_hotel']); ?></h3>
                        <p class="card-category">Hotel & Rekreasi</p>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>