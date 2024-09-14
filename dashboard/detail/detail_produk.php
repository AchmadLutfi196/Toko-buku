<?php
include "../config.php"; // Sesuaikan jalur jika diperlukan

// Check if product ID is provided in the URL query string
if (isset($_GET['id'])) {
    $id_produk = intval($_GET['id']); // Convert ID to integer to prevent SQL injection

    // Prepare and execute query to fetch product details
    $query = "SELECT * FROM products WHERE id_produk = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Product details
        $nama_produk = htmlspecialchars($row['nama_produk']);
        $harga_produk = number_format($row['harga_produk'], 0, ',', '.');
        $stok_produk = htmlspecialchars($row['stok_produk']);
        $deskripsi_produk = htmlspecialchars($row['deskripsi_produk']);
        $nama_pengarang = htmlspecialchars($row['nama_pengarang']);
        $detail_buku = htmlspecialchars($row['detail_buku']);
        $foto_produk = htmlspecialchars($row['foto_produk']);

        // Display product details in HTML format
        ?>

        <h1 class="h3 mb-4 text-gray-800">Detail Produk</h1>

        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="../assets/img/foto_produk/<?php echo $foto_produk; ?>" class="img-fluid" alt="<?php echo $nama_produk; ?>">
                    </div>
                    <div class="col-md-8">
                        <h4><?php echo $nama_produk; ?></h4>
                        <p><strong>Harga:</strong> RP <?php echo $harga_produk; ?></p>
                        <p><strong>Stok:</strong> <?php echo $stok_produk; ?></p>
                        <p><strong>Deskripsi:</strong><br><?php echo $deskripsi_produk; ?></p>
                        <p><strong>Nama Pengarang:</strong> <?php echo $nama_pengarang; ?></p>
                        <p><strong>Detail Buku:</strong><br><?php echo $detail_buku; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Edit -->
        <div class="mt-4">
    <a href="index.php?edit_produk&id=<?php echo $id_produk; ?>" class="btn btn-sm btn-primary">
        Edit Produk
    </a>
    <a href="index.php?produk" class="btn btn-sm btn-secondary ml-2">
        Kembali
    </a>
</div>


        <?php
    } else {
        echo "Produk tidak ditemukan.";
    }

    $stmt->close();
} else {
    echo "ID produk tidak ditemukan.";
}

$koneksi->close(); // Tutup koneksi database
?>
