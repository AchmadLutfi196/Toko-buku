<?php
session_start();
require_once "config.php";

// Pastikan pengguna sudah login
if (!isset($_SESSION['id'])) {
    die("Anda harus login untuk menghapus wishlist.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_wishlist = $_POST['id_wishlist'];

    // Query untuk menghapus item dari wishlist
    $sql = "DELETE FROM wishlist WHERE id_wishlist = ?";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        // Bind parameter ke statement SQL
        mysqli_stmt_bind_param($stmt, "i", $id_wishlist);

        // Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect kembali ke halaman wishlist setelah berhasil menghapus item
            header("Location: wishlist.php");
            exit;
        } else {
            echo "Error: Gagal menghapus item dari wishlist. " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Database error: could not prepare statement";
    }
}

// Tutup koneksi setelah semua operasi selesai
mysqli_close($koneksi);
?>
