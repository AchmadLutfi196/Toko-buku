<?php
session_start();
require_once "config.php"; // Sertakan file konfigurasi koneksi ke database

// Pastikan pengguna sudah login
if (!isset($_SESSION['id'])) {
    die("Anda harus login untuk menambah wishlist.");
}

// Ambil data dari form
$id_produk = $_POST['id_produk']; // Pastikan name di form sesuai
$id_pelanggan = $_SESSION['id'];

// Validasi data
if (empty($id_produk)) {
    die("Produk tidak boleh kosong.");
}

// Query untuk menambah wishlist
$sql = "INSERT INTO wishlist (id_pelanggan, id_produk) VALUES (?, ?)";
$stmt = mysqli_prepare($koneksi, $sql);

if ($stmt) {
    // Bind parameter ke statement SQL
    mysqli_stmt_bind_param($stmt, "ii", $id_pelanggan, $id_produk);

    // Eksekusi statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Produk berhasil ditambahkan ke wishlist.";
    } else {
        echo "Gagal menambah produk ke wishlist: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Database error: could not prepare statement";
}

mysqli_close($koneksi);
?>
