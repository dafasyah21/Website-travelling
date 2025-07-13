<?php
session_start();
include 'koneksi.php';

$id_edit = null;
$judul_edit = '';
$isi_edit = '';
$gambar_url_edit = '';
$link_event_url_edit = ''; 
$is_editing = false;


if (isset($_GET['hapus'])) {
    $id_hapus = $_GET['hapus'];
    $stmt = $koneksi->prepare("DELETE FROM info_terbaru WHERE id = ?");
    $stmt->bind_param("i", $id_hapus);
    if ($stmt->execute()) { $_SESSION['pesan'] = "Informasi berhasil dihapus."; } 
    else { $_SESSION['pesan'] = "Gagal menghapus informasi."; }
    header("Location: admin_info.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        $_SESSION['pesan'] = "Terjadi kesalahan: " . $stmt->error;
    }

    header("Location: admin_info.php");
    exit();
}

if (isset($_GET['edit'])) {
    $is_editing = true;
    $id_edit = $_GET['edit'];
    $stmt = $koneksi->prepare("SELECT judul, isi, gambar_url, link_event_url FROM info_terbaru WHERE id = ?");
    $stmt->bind_param("i", $id_edit);
    $stmt->execute();
    $result = $stmt->get_result();
    $data_edit = $result->fetch_assoc();
    $judul_edit = $data_edit['judul'];
    $isi_edit = $data_edit['isi'];
    $gambar_url_edit = $data_edit['gambar_url'];
    $link_event_url_edit = $data_edit['link_event_url']; 
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Kelola Informasi Terbaru</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <nav class="admin-sidebar">
        <div class="sidebar-header">
            <h3>Admin Panel</h3>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="#event" class="active">
                    <i class="fas fa-calendar-alt"></i> 
                    <span>Kelola Event</span>
                </a>
            </li>
            <li>
                <a href="#afiliasi">
                    <i class="fas fa-handshake"></i>
                    <span>Kelola Afiliasi</span>
                </a>
            </li>
            <li>
                <a href="#lainnya">
                    <i class="fas fa-cogs"></i>
                    <span>Lainnya</span>
                </a>
            </li>
             <li>
                <a href="#logout">
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
    </main>


    <div class="container" id="event">
        <h1>Kelola Informasi Terbaru</h1>

        <?php
        if (isset($_SESSION['pesan'])) {
            echo "<div class='pesan' style='background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;'>" . $_SESSION['pesan'] . "</div>";
            unset($_SESSION['pesan']);
        }
        ?>

        <div class="form-card">
            <h2><?php echo $is_editing ? 'Edit Informasi' : 'Tambah Informasi Baru'; ?></h2>
            <form action="admin_info.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id_edit; ?>">
                
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($judul_edit); ?>" required>
                
                <label for="gambar_url">URL Gambar:</label>
                <input type="url" id="gambar_url" name="gambar_url" value="<?php echo htmlspecialchars($gambar_url_edit); ?>"  required>
                
                <label for="link_event_url">Link Event/Detail (Opsional):</label>
                <input type="url" id="link_event_url" name="link_event_url" value="<?php echo htmlspecialchars($link_event_url_edit); ?>" >

                <label for="isi">Isi Informasi:</label>
                <textarea id="isi" name="isi" rows="5" required><?php echo htmlspecialchars($isi_edit); ?></textarea>
                
                <button type="submit"><?php echo $is_editing ? 'Update Informasi' : 'Simpan Informasi'; ?></button>
            </form>
        </div>
        
        <div class="list-card">
    <h2>Daftar Informasi Saat Ini</h2>
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Potongan Isi</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_list = "SELECT id, judul, isi FROM info_terbaru ORDER BY tanggal_update DESC";
            $result_list = $koneksi->query($sql_list);

            if ($result_list->num_rows > 0) {
                while($row_list = $result_list->fetch_assoc()) {
                    echo "<tr>";
                
                    echo "<td>" . htmlspecialchars($row_list['judul']) . "</td>";    
                    
                    echo "<td>" . htmlspecialchars(substr($row_list['isi'], 0, 80)) . "...</td>"; 
                  
                    echo "<td class='action-links'>";
                    echo "<a href='admin_info.php?edit=" . $row_list['id'] . "' class='edit'>Edit</a>";
                    echo "<a href='admin_info.php?hapus=" . $row_list['id'] . "' class='delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus informasi ini?\");'>Hapus</a>";
                    echo "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' style='text-align: center;'>Belum ada informasi yang ditambahkan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    </div>
</body>
</html>