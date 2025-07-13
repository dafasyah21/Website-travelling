<div class="info-galeri-section">
    <h2>Informasi Terbaru</h2>
    <div class="info-galeri-container">
        <?php
        include 'koneksi.php';

       
        $sql = "SELECT judul, isi, gambar_url, link_event_url FROM info_terbaru ORDER BY tanggal_update DESC LIMIT 8";
        $result = $koneksi->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="info-card">
                    <img src="<?php echo htmlspecialchars($row['gambar_url']); ?>" alt="<?php echo htmlspecialchars($row['judul']); ?>">
                    <div class="info-card-content">
                        <h4><?php echo htmlspecialchars($row['judul']); ?></h4>
                        <p><?php echo htmlspecialchars(substr($row['isi'], 0, 50)); ?>...</p>

                        <?php
                 
                        if (!empty($row['link_event_url'])) {
                            echo '<a href="' . htmlspecialchars($row['link_event_url']) . '" class="info-card-button" target="_blank">Lihat Detail</a>';
                        }
                        ?>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>Tidak ada informasi terbaru saat ini.</p>";
        }
        $koneksi->close();
        ?>
    </div>
</div>