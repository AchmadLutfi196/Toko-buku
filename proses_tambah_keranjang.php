<?php
session_start();
require_once "config.php"; // Sertakan file konfigurasi koneksi ke database

// Cek apakah pengguna sudah login
$isLoggedIn = isset($_SESSION['username']);

if (!$isLoggedIn) {
    echo "Anda harus login untuk menambahkan produk ke keranjang.";
    exit;
}

// Ambil data dari AJAX request
if (isset($_POST['id_produk'], $_POST['jumlah'])) {
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    $id_user = $_SESSION['id']; // Ambil ID user dari session

    // Ambil stok produk dari database
    $stmt = $koneksi->prepare("SELECT stok_produk FROM products WHERE id_produk = ?");
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $result = $stmt->get_result();
    $produk = $result->fetch_assoc();

    if ($produk) {
        $stok_produk = $produk['stok_produk'];

        if ($jumlah > $stok_produk) {
            echo "Jumlah barang yang diminta melebihi stok yang tersedia.";
        } else {
            // Query untuk memasukkan produk ke dalam keranjang
            $stmt = $koneksi->prepare("INSERT INTO keranjang (id_user, id_produk, jumlah) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $id_user, $id_produk, $jumlah);
            $result = $stmt->execute();

            if ($result) {
                echo "Produk berhasil ditambahkan ke keranjang!";
            } else {
                echo "Gagal menambahkan produk ke keranjang.";
            }
        }
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "Parameter id_produk dan jumlah harus disertakan.";
}
?>
