<?php
include "../config.php"; // Adjust the path as necessary

if (isset($_GET['id'])) {
    $id_produk = intval($_GET['id']); // Ensure ID is integer

    // Check if there are any related records in pembelian table
    $check_query = "SELECT COUNT(*) AS total FROM pembelian WHERE id_produk = ?";
    $stmt_check = $koneksi->prepare($check_query);
    $stmt_check->bind_param("i", $id_produk);
    $stmt_check->execute();
    $result = $stmt_check->get_result();
    $row = $result->fetch_assoc();

    if ($row['total'] > 0) {
        // There are related records, inform the user or handle as per your application logic
        echo '<script>alert("Produk tidak dapat dihapus karena masih terdapat pembelian yang terkait."); window.location.href = "index.php?produk";</script>';
        exit();
    } else {
        // No related pembelian records, proceed with deletion
        $stmt = $koneksi->prepare("DELETE FROM products WHERE id_produk = ?");
        if ($stmt === false) {
            die("Error preparing statement: " . $koneksi->error);
        }

        $stmt->bind_param("i", $id_produk);
        if ($stmt->execute()) {
            echo '<script>alert("Produk berhasil dihapus!"); window.location.href = "index.php?produk";</script>';
            exit();
        } else {
            echo "Error deleting product: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    echo "ID produk tidak ditemukan.";
}

$koneksi->close();
?>
