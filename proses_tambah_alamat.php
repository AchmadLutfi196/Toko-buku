<?php
// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include your database configuration file
require_once 'config.php';

// Check if id_pelanggan exists in the session
if (isset($_SESSION['id_pelanggan'])) {
    // Retrieve id_pelanggan from session
    $id_pelanggan = $_SESSION['id_pelanggan'];

    // Process form submission if POST request is made
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
        // Validate and sanitize input data (you should add proper validation)
        $alamat_pelanggan = $_POST['alamat_pelanggan'];
        $rumah = $_POST['rumah'];
        $nomor_rumah = $_POST['nomor_rumah'];
        $gang = $_POST['gang'];
        $kelurahan = $_POST['kelurahan'];
        $kode_pos = $_POST['kode_pos'];

        // Prepare INSERT statement
        $query = "INSERT INTO alamat (id_pelanggan, alamat_pelanggan, rumah, nomor_rumah, gang, kelurahan, kode_pos) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $koneksi->prepare($query);
        if ($stmt === false) {
            echo "Error preparing statement: " . $koneksi->error;
        } else {
            // Bind parameters to the statement
            $stmt->bind_param("issssss", $id_pelanggan, $alamat_pelanggan, $rumah, $nomor_rumah, $gang, $kelurahan, $kode_pos);

            // Execute the statement
            if ($stmt->execute()) {
                // Redirect to alamat.php after successful insertion
                header("Location: alamat.php");
                exit(); // Stop further execution after redirection
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }
    }
} else {
    echo "Error: id_pelanggan is null or not set";
}

// Close the database connection
$koneksi->close();
?>
