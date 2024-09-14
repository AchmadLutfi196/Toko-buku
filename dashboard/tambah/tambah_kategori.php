<h1 class="h3 mb-4 text-gray-800">Tambah Data Kategori</h1>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Kategori :</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori">
                </div>
            </div>
        </div>
        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?kategori" class="btn btn-sm btn-danger">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="col text-right">
                    <button type="submit" name="simpan" class="btn btn-sm btn-primary">
                        Simpan <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
// Ensure error reporting is enabled for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include "../config.php"; // Adjust the path as per your project structure

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
    // Sanitize and validate input
    $nama_kategori = $_POST['nama_kategori'];

    // Prepare and execute SQL statement
    $stmt = $koneksi->prepare("INSERT INTO categories (nama_kategori) VALUES (?)");
    $stmt->bind_param("s", $nama_kategori);

    if ($stmt->execute()) {
        // Close statement and database connection
        $stmt->close();
        $koneksi->close();

        // Use JavaScript to redirect
        echo '<script>alert("Data Kategori berhasil disimpan"); window.location.href = "index.php?kategori";</script>';
        exit(); // Ensure script stops execution after redirection
    } else {
        echo "Error: " . $stmt->error; // Display error message if query fails
    }

    // Close statement and database connection
    $stmt->close();
    $koneksi->close();
}
?>

