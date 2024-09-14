<?php
session_start();
require_once "config.php";

// Pastikan pengguna sudah login
if (!isset($_SESSION['id'])) {
    die("Anda harus login untuk menghapus alamat.");
}

// Pastikan ID alamat diberikan
if (!isset($_GET['id'])) {
    die("ID alamat tidak ditemukan.");
}

$address_id = $_GET['id'];
$user_id = $_SESSION['id'];

// Query untuk menghapus alamat
$sql = "DELETE FROM addresses WHERE id = ? AND user_id = ?";
$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "ii", $address_id, $user_id);

if (mysqli_stmt_execute($stmt)) {
    // Periksa apakah baris terpengaruh
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Redirect ke halaman daftar alamat setelah berhasil menghapus alamat
        header("Location: alamat.php");
        exit;
    } else {
        echo "Error: Alamat tidak ditemukan atau Anda tidak memiliki izin untuk menghapus alamat ini.";
    }
} else {
    echo "Error: Gagal menghapus alamat. " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>
