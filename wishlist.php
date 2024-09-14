<?php
include 'config.php'; // Include your database configuration file

// Query to retrieve wishlist items for all users
$query = "SELECT w.id_wishlist, p.id_produk, p.foto_produk, p.nama_produk, p.nama_pengarang, p.harga_produk
          FROM wishlist w
          INNER JOIN products p ON w.id_produk = p.id_produk";

$result = $koneksi->query($query);

// Check if there are wishlist items
if ($result && $result->num_rows > 0) {
    $wishlist_items = $result->fetch_all(MYSQLI_ASSOC); // Fetch all wishlist items
} else {
    $wishlist_items = []; // Initialize as empty array if no wishlist items found
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="stylesheet" href="css/wishlist.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="my-account-menu">
                    <h2>My Account</h2>
                    <ul class="list-group">
                        <li class="list-group-item border-0" id="biodata"><a href="biodata.php">Biodata</a></li>
                        <li class="list-group-item border-0" id="alamat"><a href="alamat.php">Daftar Alamat</a></li>
                        <li class="list-group-item border-0" id="pesanan"><a href="pesanan.php">Pesanan Saya</a></li>
                        <li class="list-group-item border-0" id="wishlist"><a href="wishlist.php">Wishlist</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="text-center">Wishlist</h2>
                <div class="row">
                    <?php foreach ($wishlist_items as $item): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <a href="detailProduk.php?id=<?php echo $item['id_produk']; ?>">
                                    <img src="../assets/img/foto_produk/<?php echo htmlspecialchars($item['foto_produk']); ?>" class="card-img-top img-fluid" alt="<?php echo htmlspecialchars($item['nama_produk']); ?>">
                                </a>
                                <div class="card-body">
                                    <h6 class="text-secondary card-title"><?php echo htmlspecialchars($item['nama_pengarang']); ?></h6>
                                    <p class="card-title"><?php echo htmlspecialchars($item['nama_produk']); ?></p>
                                    <p class="card-text">Rp <?php echo number_format($item['harga_produk'], 0, ',', '.'); ?></p>
                                    <form action="hapus_wishlist.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="id_wishlist" value="<?php echo $item['id_wishlist']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
