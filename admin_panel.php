<?php
session_start();
include 'koneksi.php';

if (isset($_GET['hapus_info'])) {
    $id_hapus = $_GET['hapus_info'];
    $stmt = $koneksi->prepare("DELETE FROM info_terbaru WHERE id = ?");
    $stmt->bind_param("i", $id_hapus);
    if ($stmt->execute()) { $_SESSION['pesan'] = "Informasi berhasil dihapus."; } 
    else { $_SESSION['pesan'] = "Gagal menghapus informasi."; }
    header("Location: admin_panel.php?page=info");
    exit();
}

if (isset($_GET['hapus_hotel'])) {
    $id_hapus = $_GET['hapus_hotel'];
    $stmt = $koneksi->prepare("DELETE FROM rekomendasi_hotel WHERE id = ?");
    $stmt->bind_param("i", $id_hapus);
    if ($stmt->execute()) { $_SESSION['pesan'] = "Hotel berhasil dihapus."; } 
    else { $_SESSION['pesan'] = "Gagal menghapus hotel."; }
    header("Location: admin_panel.php?page=hotel");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $form_type = $_POST['form_type'] ?? '';

    if ($form_type === 'info_terbaru') {
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $gambar_url = $_POST['gambar_url'];
        $link_event_url = $_POST['link_event_url']; 
        $id = $_POST['id'];

        if (empty($id)) { 
            $stmt = $koneksi->prepare("INSERT INTO info_terbaru (judul, isi, gambar_url, link_event_url) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $judul, $isi, $gambar_url, $link_event_url);
            $_SESSION['pesan'] = "Informasi baru berhasil ditambahkan.";
        } else { 
            $stmt = $koneksi->prepare("UPDATE info_terbaru SET judul = ?, isi = ?, gambar_url = ?, link_event_url = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $judul, $isi, $gambar_url, $link_event_url, $id);
            $_SESSION['pesan'] = "Informasi berhasil diperbarui.";
        }
        
        if (!$stmt->execute()) {
            $_SESSION['pesan'] = "Terjadi kesalahan pada info: " . $stmt->error;
        }
        header("Location: admin_panel.php?page=info");
        exit();
    }

    if ($form_type === 'rekomendasi_hotel') {
        $nama_hotel = $_POST['nama_hotel'];
        $gambar_url = $_POST['gambar_url'];
        $link_booking = $_POST['link_booking'];
        $deskripsi = $_POST['deskripsi_singkat'];
        $is_featured = isset($_POST['is_featured']) ? 1 : 0;
        $id = $_POST['id'];

     
        if ($is_featured == 1) {
            $id_kecuali = empty($id) ? 0 : $id;
            $koneksi->query("UPDATE rekomendasi_hotel SET is_featured = 0 WHERE id != $id_kecuali");
        }
        
        if (empty($id)) { 
            $stmt = $koneksi->prepare("INSERT INTO rekomendasi_hotel (nama_hotel, gambar_url, link_booking, deskripsi_singkat, is_featured) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssi", $nama_hotel, $gambar_url, $link_booking, $deskripsi, $is_featured);
            $_SESSION['pesan'] = "Hotel baru berhasil ditambahkan.";
        } else { 
            $stmt = $koneksi->prepare("UPDATE rekomendasi_hotel SET nama_hotel=?, gambar_url=?, link_booking=?, deskripsi_singkat=?, is_featured=? WHERE id=?");
            $stmt->bind_param("ssssii", $nama_hotel, $gambar_url, $link_booking, $deskripsi, $is_featured, $id);
            $_SESSION['pesan'] = "Hotel berhasil diperbarui.";
        }

        if (!$stmt->execute()) {
            $_SESSION['pesan'] = "Terjadi kesalahan pada hotel: " . $stmt->error;
        }
        header("Location: admin_panel.php?page=hotel");
        exit();
    }
}


$page = $_GET['page'] ?? 'info'; 

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="admin.css"> </head>
<body>
    <nav class="admin-sidebar">
        <div class="sidebar-header">
            <h3>Admin Panel</h3>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="admin_panel.php?page=info" class="<?php echo ($page === 'info') ? 'active' : ''; ?>">
                    <i class="fas fa-calendar-alt"></i> 
                    <span>Kelola Info Terbaru</span>
                </a>
            </li>
            <li>
                <a href="admin_panel.php?page=hotel" class="<?php echo ($page === 'hotel') ? 'active' : ''; ?>">
                    <i class="fas fa-hotel"></i>
                    <span>Kelola Hotel</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    <main class="main-content">
        <header>
            <h1>Selamat Datang, Admin!</h1>
        </header>

        <div class="container">
            <?php
        
            if (isset($_SESSION['pesan'])) {
                echo "<div class='pesan' style='background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;'>" . $_SESSION['pesan'] . "</div>";
                unset($_SESSION['pesan']);
            }
            ?>

            <?php

            switch ($page):

            case 'hotel':
                $is_editing_hotel = isset($_GET['edit_hotel']);
                $hotel_edit = [ 'id' => '', 'nama_hotel' => '', 'gambar_url' => '', 'link_booking' => '', 'deskripsi_singkat' => '', 'is_featured' => 0 ];

                if ($is_editing_hotel) {
                    $id_edit = $_GET['edit_hotel'];
                    $stmt = $koneksi->prepare("SELECT * FROM rekomendasi_hotel WHERE id = ?");
                    $stmt->bind_param("i", $id_edit);
                    $stmt->execute();
                    $hotel_edit = $stmt->get_result()->fetch_assoc();
                }
            ?>
                <h1>Kelola Rekomendasi Hotel</h1>
                <div class="form-card">
                    <h2><?php echo $is_editing_hotel ? 'Edit Hotel' : 'Tambah Hotel Baru'; ?></h2>
                    <form action="admin_panel.php?page=hotel" method="POST">
                        <input type="hidden" name="form_type" value="rekomendasi_hotel">
                        <input type="hidden" name="id" value="<?php echo $hotel_edit['id']; ?>">
                        
                        <label>Nama Hotel:</label>
                        <input type="text" name="nama_hotel" value="<?php echo htmlspecialchars($hotel_edit['nama_hotel']); ?>" required>
                        
                        <label>URL Gambar:</label>
                        <input type="url" name="gambar_url" value="<?php echo htmlspecialchars($hotel_edit['gambar_url']); ?>" required>
                        
                        <label>Link Booking:</label>
                        <input type="url" name="link_booking" value="<?php echo htmlspecialchars($hotel_edit['link_booking']); ?>" required>

                        <label>Deskripsi Singkat:</label>
                        <textarea name="deskripsi_singkat" rows="4" required><?php echo htmlspecialchars($hotel_edit['deskripsi_singkat']); ?></textarea>
                        
                        <div class="checkbox-group" style="display:flex; align-items:center; margin-top:10px;">
                            <input type="checkbox" name="is_featured" value="1" <?php echo ($hotel_edit['is_featured'] == 1) ? 'checked' : ''; ?> style="width:auto; margin-right:10px;">
                            <label style="margin-bottom:0;">Jadikan Hotel Unggulan (Featured)</label>
                        </div>
                        
                        <button type="submit" style="margin-top:15px;"><?php echo $is_editing_hotel ? 'Update Hotel' : 'Simpan Hotel'; ?></button>
                    </form>
                </div>

                <div class="list-card">
                    <h2>Daftar Hotel Saat Ini</h2>
                    <table>
                        <thead><tr><th>Nama Hotel</th><th>Gambar</th><th>Featured</th><th>Tindakan</th></tr></thead>
                        <tbody>
                        <?php
                            $result_list = $koneksi->query("SELECT id, nama_hotel, gambar_url, is_featured FROM rekomendasi_hotel ORDER BY id DESC");
                            if ($result_list->num_rows > 0) {
                                while($row = $result_list->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['nama_hotel']) . "</td>";
                                    echo "<td><img src='" . htmlspecialchars($row['gambar_url']) . "' width='100' alt='gambar'></td>";
                                    echo "<td>" . ($row['is_featured'] ? 'Ya' : 'Tidak') . "</td>";
                                    echo "<td class='action-links'>";
                                    echo "<a href='admin_panel.php?page=hotel&edit_hotel=" . $row['id'] . "' class='edit'>Edit</a>";
                                    echo "<a href='admin_panel.php?page=hotel&hapus_hotel=" . $row['id'] . "' class='delete' onclick='return confirm(\"Yakin ingin menghapus hotel ini?\");'>Hapus</a>";
                                    echo "</td></tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' style='text-align: center;'>Belum ada hotel yang ditambahkan.</td></tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            <?php
                break;

            case 'info':
            default:
                $is_editing_info = isset($_GET['edit_info']);
                $info_edit = [ 'id' => '', 'judul' => '', 'isi' => '', 'gambar_url' => '', 'link_event_url' => '' ];
                
                if ($is_editing_info) {
                    $id_edit = $_GET['edit_info'];
                    $stmt = $koneksi->prepare("SELECT * FROM info_terbaru WHERE id = ?");
                    $stmt->bind_param("i", $id_edit);
                    $stmt->execute();
                    $info_edit = $stmt->get_result()->fetch_assoc();
                }
            ?>
                <h1>Kelola Informasi Terbaru</h1>
                <div class="form-card">
                    <h2><?php echo $is_editing_info ? 'Edit Informasi' : 'Tambah Informasi Baru'; ?></h2>
                    <form action="admin_panel.php?page=info" method="POST">
                        <input type="hidden" name="form_type" value="info_terbaru">
                        <input type="hidden" name="id" value="<?php echo $info_edit['id']; ?>">
                        
                        <label>Judul:</label>
                        <input type="text" name="judul" value="<?php echo htmlspecialchars($info_edit['judul']); ?>" required>
                        
                        <label>URL Gambar:</label>
                        <input type="url" name="gambar_url" value="<?php echo htmlspecialchars($info_edit['gambar_url']); ?>" required>
                        
                        <label>Link Event/Detail (Opsional):</label>
                        <input type="url" name="link_event_url" value="<?php echo htmlspecialchars($info_edit['link_event_url']); ?>">

                        <label>Isi Informasi:</label>
                        <textarea name="isi" rows="5" required><?php echo htmlspecialchars($info_edit['isi']); ?></textarea>
                        
                        <button type="submit" style="margin-top:15px;"><?php echo $is_editing_info ? 'Update Informasi' : 'Simpan Informasi'; ?></button>
                    </form>
                </div>

                <div class="list-card">
                    <h2>Daftar Informasi Saat Ini</h2>
                    <table>
                        <thead><tr><th>Judul</th><th>Potongan Isi</th><th>Tindakan</th></tr></thead>
                        <tbody>
                        <?php
                            $result_list = $koneksi->query("SELECT id, judul, isi FROM info_terbaru ORDER BY id DESC");
                            if ($result_list->num_rows > 0) {
                                while($row = $result_list->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
                                    echo "<td>" . htmlspecialchars(substr($row['isi'], 0, 80)) . "...</td>";
                                    echo "<td class='action-links'>";
                                    echo "<a href='admin_panel.php?page=info&edit_info=" . $row['id'] . "' class='edit'>Edit</a>";
                                    echo "<a href='admin_panel.php?page=info&hapus_info=" . $row['id'] . "' class='delete' onclick='return confirm(\"Yakin ingin menghapus informasi ini?\");'>Hapus</a>";
                                    echo "</td></tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3' style='text-align: center;'>Belum ada informasi yang ditambahkan.</td></tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            <?php
                break;
            endswitch;
            ?>
        </div>
    </main>
</body>
</html>