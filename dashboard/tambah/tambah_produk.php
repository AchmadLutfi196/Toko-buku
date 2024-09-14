<?php
include "../config.php"; // Adjust the path as necessary

// Fetch categories from the database
$categories = [];
$query_categories = "SELECT id_kategori, nama_kategori FROM categories";
$result_categories = $koneksi->query($query_categories);

if ($result_categories->num_rows > 0) {
    while ($row = $result_categories->fetch_assoc()) {
        $categories[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h1 class="h3 mb-4 text-gray-800">Tambah Produk</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="card shadow">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kategori:</label>
                    <div class="col-sm-9">
                        <select name="id_kategori" class="form-control" required>
                            <option selected disabled>Pilih Kategori</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id_kategori']; ?>">
                                    <?php echo htmlspecialchars($category['nama_kategori']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Foto Produk:</label>
                    <div class="col-sm-9">
                        <input type="file" name="foto_produk" class="form-control" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Produk:</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Harga Produk:</label>
                    <div class="col-sm-9">
                        <input type="number" name="harga_produk" class="form-control" placeholder="Harga Produk" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Deskripsi Produk:</label>
                    <div class="col-sm-9">
                        <textarea name="deskripsi_produk" class="form-control" placeholder="Deskripsi Produk" required></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Pengarang:</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_pengarang" class="form-control" placeholder="Nama Pengarang" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Detail Buku:</label>
                    <div class="col-sm-9">
                        <textarea name="detail_buku" class="form-control" placeholder="Detail Buku" required></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Stok Produk:</label>
                    <div class="col-sm-9">
                        <input type="number" name="stok_produk" class="form-control" placeholder="Stok Produk" required>
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
                        <button name="simpan" class="btn btn-sm btn-primary">
                            Simpan <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
        // Get form data
        $id_kategori = $_POST['id_kategori'];
        $nama_produk = $_POST['nama_produk'];
        $harga_produk = $_POST['harga_produk'];
        $deskripsi_produk = $_POST['deskripsi_produk'];
        $nama_pengarang = $_POST['nama_pengarang'];
        $detail_buku = $_POST['detail_buku'];
        $stok_produk = $_POST['stok_produk'];

        // Handle file upload
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
                    // Prepare and execute insert statement
                    $stmt = $koneksi->prepare("INSERT INTO products (id_kategori, foto_produk, nama_produk, harga_produk, deskripsi_produk, nama_pengarang, detail_buku, stok_produk) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    if ($stmt === false) {
                        die("Error preparing statement: " . $koneksi->error);
                    }

                    $stmt->bind_param("issssssi", $id_kategori, $foto_produk, $nama_produk, $harga_produk, $deskripsi_produk, $nama_pengarang, $detail_buku, $stok_produk);

                    if ($stmt->execute()) {
                        echo '<script>alert("Produk berhasil ditambahkan!"); window.location.href = "index.php?produk";</script>';
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo '<script>alert("Error uploading file.");</script>';
                }
            }
        } else {
            echo '<script>alert("No file uploaded or file upload error.");</script>';
        }
    }
    ?>
</body>
</html>
