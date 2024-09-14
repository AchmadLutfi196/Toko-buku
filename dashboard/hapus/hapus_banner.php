<?php
// Ensure the database connection is established
if (!isset($koneksi)) {
    die("Database connection not established.");
}

// Check if the id_banner is set and retrieve the banner data
if (isset($_GET['id_banner'])) {
    $id_banner = intval($_GET['id_banner']);
    $result = $koneksi->query("SELECT * FROM banner WHERE id_banner = $id_banner");
    if ($result->num_rows > 0) {
        $value = $result->fetch_assoc();
    } else {
        echo "<script>alert('Banner not found');</script>";
        echo "<script>location='index.php?banner';</script>";
        exit();
    }
} else {
    echo "<script>alert('No banner ID provided');</script>";
    echo "<script>location='index.php?banner';</script>";
    exit();
}
?>

<h1 class="h3 mb-4 text-gray-800">Hapus Banner</h1>

<div class="card shadow">
    <div class="card-body">
        <p>Apakah Anda yakin ingin menghapus banner ini?</p>
        <img src="../assets/img/foto_banner/<?php echo htmlspecialchars($value['foto_banner']); ?>" class="img-responsive mb-3" width="350" alt="Banner">
    </div>
    <div class="card-footer py-3">
        <div class="row">
            <div class="col">
                <a href="index.php?banner" class="btn btn-sm btn-danger">
                    <i class="fas fa-arrow-left"></i> Batal
                </a>
            </div>
            <div class="col text-right">
                <form method="post">
                    <input type="hidden" name="id_banner" value="<?php echo $id_banner; ?>">
                    <button name="hapus" class="btn btn-sm btn-danger">
                        Hapus <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['hapus'])) {
    $id_banner = intval($_POST['id_banner']);
    $foto_banner = $value['foto_banner'];

    // Delete the banner record from the database
    $stmt = $koneksi->prepare("DELETE FROM banner WHERE id_banner = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id_banner);
        if ($stmt->execute()) {
            // Delete the image file from the server
            $target_file = "../assets/img/foto_banner/" . $foto_banner;
            if (file_exists($target_file)) {
                unlink($target_file);
            }

            echo "<script>alert('Banner telah dihapus');</script>";
        } else {
            echo "<script>alert('Error: Gagal menghapus banner');</script>";
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "<script>alert('Error: Gagal menyiapkan pernyataan SQL');</script>";
        echo "Error: " . $koneksi->error;
    }

    // Redirect to the banner page
    echo "<script>location='index.php?banner';</script>";
}
?>
