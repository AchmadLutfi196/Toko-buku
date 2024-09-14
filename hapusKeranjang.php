<?php
session_start();
require_once 'config.php';

// Check if id_pelanggan is available in session
if (isset($_SESSION['id'])) {
    $id_pelanggan = $_SESSION['id'];

    // Check if id_keranjang is provided in the query string
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id_keranjang = $_GET['id'];

        // Query to delete item from keranjang
        $query = "DELETE FROM keranjang WHERE id = ? AND id_user = ?";
        
        // Prepare the query
        $stmt = $koneksi->prepare($query);
        if (!$stmt) {
            die('Query preparation failed: ' . $koneksi->error);
        }

        // Bind parameters and execute query
        $stmt->bind_param("ii", $id_keranjang, $id_pelanggan);
        if ($stmt->execute()) {
            // Redirect back to keranjang.php after successful deletion
            header("Location: keranjang.php");
            exit();
        } else {
            echo "Error deleting item from keranjang: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "ID keranjang tidak valid.";
    }
} else {
    echo "ID pelanggan tidak ditemukan dalam sesi.";
}

// Close database connection
$koneksi->close();
?>
