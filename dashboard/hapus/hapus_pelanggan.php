<?php
// Ensure error reporting is enabled for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include "../config.php"; // Adjust the path as per your project structure

if (isset($_GET['id'])) {
    // Sanitize and validate input
    $id_pelanggan = intval($_GET['id']); // Ensure it's an integer

    // Prepare and execute SQL statement to delete the category
    $stmt = $koneksi->prepare("DELETE FROM pelanggan WHERE id_pelanggan = ?");
    $stmt->bind_param("i", $id_pelanggan);

    if ($stmt->execute()) {
        // Close statement and database connection
        $stmt->close();
        $koneksi->close();

        // Use JavaScript to redirect
        echo '<script>alert("Pelanggan berhasil dihapus"); window.location.href = "index.php?pelanggan";</script>';
        exit(); // Ensure script stops execution after redirection
    } else {
        echo "Error: " . $stmt->error; // Display error message if query fails
    }

    // Close statement and database connection
    $stmt->close();
    $koneksi->close();
} else {
    echo "ID pelanggan tidak ditemukan.";
}
?>
