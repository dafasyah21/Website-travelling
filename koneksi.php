<?php

$servername = "localhost";
$username = "root";        
$password = "";            
$dbname = "web"; 

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mengatur karakter set ke utf8 untuk mendukung berbagai karakter
$koneksi->set_charset("utf8");
?>