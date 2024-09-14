<h1 class="h3 mb-4 text-gray-800">Edit Data Banner</h1>

<?php
// Ensure the database connection is established
if (!isset($koneksi)) {
    die("Database connection not established.");
}

// Retrieve the banner data based on the provided id_banner
if (isset($_GET['id_banner'])) {
    $id_banner = intval($_GET['id_banner']);
    $result = $koneksi->query("SELECT * FROM banner WHERE id_banner = $id_banner");
    if ($result->num_rows > 0) {
        $value = $result->fetch_assoc();
    } else {
        echo "<script>alert('Banner not found');</script>";
        echo "<script>location='index.php?banner';</script>";
    }
} else {
    echo "<script>alert('No banner ID provided');</script>";
    echo "<script>location='index.php?banner';</script>";
}
?>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Foto Banner :</label>
                <div class="col-sm-9">
                    <img src="../assets/img/foto_banner/<?php echo htmlspecialchars($value['foto_banner']); ?>" class="img-responsive mb-3" width="350" alt="Banner">
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Link Banner :</label>
                <div class="col-sm-9">
                    <input type="text" name="link_banner" class="form-control" value="<?php echo htmlspecialchars($value['link_banner']); ?>" placeholder="https://example.com">
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

if (isset($_POST['simpan'])) {
    $id_banner = intval($_GET['id_banner']);
    $namafoto = $value['foto_banner']; // Default to current photo
    $link_banner = $koneksi->real_escape_string($_POST['link_banner']); // Get the link from the form

    // Check if a new file is uploaded
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $namafoto = basename($_FILES['foto']['name']);
        $lokasifoto = $_FILES['foto']['tmp_name'];

        // Define the target directory
        $target_dir = "../assets/img/foto_banner/";
        $target_file = $target_dir . $namafoto;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($lokasifoto, $target_file)) {
            // Sanitize the file name to prevent SQL injection
            $namafoto = $koneksi->real_escape_string($namafoto);
        } else {
            echo "<script>alert('Error: Failed to move uploaded file');</script>";
            $namafoto = $value['foto_banner']; // Revert to old photo on failure
        }
    }

    // Prepare the SQL statement to update the banner in the database
    $stmt = $koneksi->prepare("UPDATE banner SET foto_banner = ?, link_banner = ? WHERE id_banner = ?");
    if ($stmt) {
        $stmt->bind_param("ssi", $namafoto, $link_banner, $id_banner);
        if ($stmt->execute()) {
            echo "<script>alert('Data Banner Telah Diperbarui');</script>";
        } else {
            echo "<script>alert('Error: Data Banner Gagal Diperbarui');</script>";
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "<script>alert('Error: Failed to prepare SQL statement');</script>";
        echo "Error: " . $koneksi->error;
    }

    // Redirect to the banner page
    echo "<script>location='index.php?banner';</script>";
}
?>
