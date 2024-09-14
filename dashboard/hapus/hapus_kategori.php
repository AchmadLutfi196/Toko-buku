<?php
// Ensure error reporting is enabled for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include "../config.php"; // Adjust the path as per your project structure

if (isset($_GET['id'])) {
    // Sanitize and validate input
    $id_kategori = intval($_GET['id']); // Ensure it's an integer

    // Prepare and execute SQL statement to delete the category
    $stmt = $koneksi->prepare("DELETE FROM categories WHERE id_kategori = ?");
    $stmt->bind_param("i", $id_kategori);

    if ($stmt->execute()) {
        // Close statement and database connection
        $stmt->close();
        $koneksi->close();

        // Use JavaScript to redirect
        echo '<script>alert("Kategori berhasil dihapus"); window.location.href = "index.php?kategori";</script>';
        exit(); // Ensure script stops execution after redirection
    } else {
        echo "Error: " . $stmt->error; // Display error message if query fails
    }

    // Close statement and database connection
    $stmt->close();
    $koneksi->close();
} else {
    echo "ID kategori tidak ditemukan.";
}
?>
