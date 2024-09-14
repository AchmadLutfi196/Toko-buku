<?php
include "../config.php"; // Sesuaikan path jika diperlukan

// Fetch categories from the database
$categories = [];
$query_categories = "SELECT id_kategori, nama_kategori FROM categories";
$result_categories = $koneksi->query($query_categories);

if ($result_categories->num_rows > 0) {
    while ($row = $result_categories->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Check if product ID is provided in the URL query string
if (isset($_GET['id'])) {
    $id_produk = intval($_GET['id']); // Convert ID to integer to prevent SQL injection

    // Fetch product details based on ID
    $query = "SELECT * FROM products WHERE id_produk = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Product details
        $nama_produk = htmlspecialchars($row['nama_produk']);
        $harga_produk = $row['harga_produk'];
        $deskripsi_produk = htmlspecialchars($row['deskripsi_produk']);
        $nama_pengarang = htmlspecialchars($row['nama_pengarang']);
        $detail_buku = htmlspecialchars($row['detail_buku']);
        $stok_produk = $row['stok_produk'];
        $foto_produk = htmlspecialchars($row['foto_produk']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1 class="h3 mb-4 text-gray-800">Edit Produk</h1>

    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
        <div class="card shadow">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kategori:</label>
                    <div class="col-sm-9">
                        <select name="id_kategori" class="form-control" required>
                            <option selected disabled>Pilih Kategori</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id_kategori']; ?>" <?php if ($category['id_kategori'] == $row['id_kategori']) echo 'selected'; ?>>
                                    <?php echo htmlspecialchars($category['nama_kategori']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Foto Produk:</label>
                    <div class="col-sm-9">
                        <img src="../assets/img/foto_produk/<?php echo $foto_produk; ?>" class="img-responsive mb-3" width="150" alt="">
                        <input type="file" name="foto_produk" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Produk:</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_produk" class="form-control" value="<?php echo $nama_produk; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Harga Produk:</label>
                    <div class="col-sm-9">
                        <input type="number" name="harga_produk" class="form-control" value="<?php echo $harga_produk; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Deskripsi Produk:</label>
                    <div class="col-sm-9">
                        <textarea name="deskripsi_produk" class="form-control" required><?php echo $deskripsi_produk; ?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Pengarang:</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_pengarang" class="form-control" value="<?php echo $nama_pengarang; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Detail Buku:</label>
                    <div class="col-sm-9">
                        <textarea name="detail_buku" class="form-control" required><?php echo $detail_buku; ?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Stok Produk:</label>
                    <div class="col-sm-9">
                        <input type="number" name="stok_produk" class="form-control" value="<?php echo $stok_produk; ?>" required>
                    </div>
                </div>
            </div>

            <div class="card-footer py-3">
                <div class="row">
                    <div class="col">
                        <a href="index.php?produk" class="btn btn-sm btn-danger">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                    <div class="col text-right">
                        <button type="submit" name="update" class="btn btn-sm btn-primary">
                            Simpan <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>
</html>

<?php

// Handle form submission to update product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Get updated form data
    $id_kategori = $_POST['id_kategori'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $nama_pengarang = $_POST['nama_pengarang'];
    $detail_buku = $_POST['detail_buku'];
    $stok_produk = $_POST['stok_produk'];

    // Handle file upload for new photo
    if (isset($_FILES['foto_produk']) && $_FILES['foto_produk']['error'] == UPLOAD_ERR_OK) {
        $foto_produk = basename($_FILES['foto_produk']['name']);
        $target_dir = "../assets/img/foto_produk/";
        $target_file = $target_dir . $foto_produk;

        // Check if file already exists
        if (file_exists($target_file)) {
            echo '<script>alert("Error: File already exists.");</script>';
        } else {
            // Move uploaded file to target directory
            if (move_uploaded_file($_FILES['foto_produk']['tmp_name'], $target_file)) {
                // Update product with new photo
                $query_update = "UPDATE products SET id_kategori=?, nama_produk=?, harga_produk=?, deskripsi_produk=?, nama_pengarang=?, detail_buku=?, stok_produk=?, foto_produk=? WHERE id_produk=?";
                $stmt_update = $koneksi->prepare($query_update);
                $stmt_update->bind_param("issssssii", $id_kategori, $nama_produk, $harga_produk, $deskripsi_produk, $nama_pengarang, $detail_buku, $stok_produk, $foto_produk, $id_produk);

                if ($stmt_update->execute()) {
                    echo '<script>alert("Produk berhasil diperbarui!"); window.location.href = "index.php?produk";</script>';
                } else {
                    echo "Error updating product: " . $stmt_update->error;
                }

                $stmt_update->close();
            } else {
                echo '<script>alert("Error uploading file.");</script>';
            }
        }
    } else {
        // Update product without changing photo
        $query_update = "UPDATE products SET id_kategori=?, nama_produk=?, harga_produk=?, deskripsi_produk=?, nama_pengarang=?, detail_buku=?, stok_produk=? WHERE id_produk=?";
        $stmt_update = $koneksi->prepare($query_update);
        $stmt_update->bind_param("isssssii", $id_kategori, $nama_produk, $harga_produk, $deskripsi_produk, $nama_pengarang, $detail_buku, $stok_produk, $id_produk);

        if ($stmt_update->execute()) {
            echo '<script>alert("Produk berhasil diperbarui!"); window.location.href = "index.php?produk";</script>';
        } else {
            echo "Error updating product: " . $stmt_update->error;
        }

        $stmt_update->close();
    }
}

// Close statement and database connection
$stmt->close();
$koneksi->close();
} else {
echo "Produk tidak ditemukan.";
}
} else {
echo "ID produk tidak ditemukan.";
}
?>
