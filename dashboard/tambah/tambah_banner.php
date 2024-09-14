<h1 class="h3 mb-4 text-gray-800">Tambah Data Banner</h1>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Foto Banner :</label>
                <div class="col-sm-9">
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Link Banner :</label>
                <div class="col-sm-9">
                    <input type="url" name="link" class="form-control" placeholder="https://example.com">
                </div>
            </div>
        </div>
        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?banner" class="btn btn-sm btn-danger">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="col text-right">
                    <button name="simpan" class="btn btn-sm btn-primary">
                        Simpan <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php

// Enable error reporting for debugging (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure the database connection is established
if (!isset($koneksi)) {
    die("Database connection not established.");
}

if (isset($_POST['simpan'])) {
    // Check if a file was uploaded without errors
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        // Get the file name and temporary file location
        $namafoto = basename($_FILES['foto']['name']);
        $lokasifoto = $_FILES['foto']['tmp_name'];

        // Define the target directory
        $target_dir = "../assets/img/foto_banner/";
        $target_file = $target_dir . $namafoto;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($lokasifoto, $target_file)) {
            // Sanitize the file name to prevent SQL injection
            $namafoto = $koneksi->real_escape_string($namafoto);

            // Get and sanitize the link input
            $link = isset($_POST['link']) ? $koneksi->real_escape_string($_POST['link']) : '';

            // Prepare the SQL statement to insert the file name and link into the database
            $stmt = $koneksi->prepare("INSERT INTO banner (foto_banner, link_banner) VALUES (?, ?)");
            if ($stmt) {
                // Bind the parameters and execute the statement
                $stmt->bind_param("ss", $namafoto, $link);
                if ($stmt->execute()) {
                    echo "<script>alert('Data Banner Telah Tersimpan');</script>";
                } else {
                    echo "<script>alert('Error: Data Banner Gagal Tersimpan');</script>";
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "<script>alert('Error: Failed to prepare SQL statement');</script>";
                echo "Error: " . $koneksi->error;
            }
        } else {
            echo "<script>alert('Error: Failed to move uploaded file');</script>";
        }
    } else {
        echo "<script>alert('Error: No file uploaded or upload error');</script>";
        if (isset($_FILES['foto']['error'])) {
            echo "File upload error code: " . $_FILES['foto']['error'];
        }
    }

    // Redirect to the banner page
    echo "<script>location='index.php?banner';</script>";
}
?>
