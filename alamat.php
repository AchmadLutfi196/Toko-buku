<?php
session_start();
require_once "config.php"; // Sertakan file konfigurasi koneksi ke database

// Pastikan pengguna sudah login
if (!isset($_SESSION['id'])) {
    die("Anda harus login untuk melihat alamat.");
}

$user_id = $_SESSION['id'];

// Query untuk mengambil data alamat
$sql = "SELECT * FROM addresses WHERE user_id = ?";
$stmt = mysqli_prepare($koneksi, $sql);

if ($stmt) {
    // Bind parameter ke statement SQL
    mysqli_stmt_bind_param($stmt, "i", $user_id);

    // Eksekusi statement
    mysqli_stmt_execute($stmt);

    // Ambil hasil query
    $result = mysqli_stmt_get_result($stmt);
    
    $addresses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_stmt_close($stmt);
} else {
    echo "Database error: could not prepare statement";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alamat</title>
    <link rel="stylesheet" href="css/alamat.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <!-- navbar -->
    <?php include 'navbar.php'?>
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
                <h2 class="text-center">Daftar Alamat</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-2">
                        <a href="tambah_alamat.php" class="btn btn-primary btn-sm"><i class="bi bi-house-add"></i> Tambah Alamat</a>
                        </div>
                        <?php if (!empty($addresses)) {
                            foreach ($addresses as $address) { ?>
                                <p class="text-danger font-weight-bold"><?php echo htmlspecialchars($address['name']); ?></p>
                                <p><?php echo htmlspecialchars($address['address']); ?></p>
                                <p><?php echo htmlspecialchars($address['city'] . ', ' . $address['postcode']); ?></p>
                                <p>No. Telepon: <?php echo htmlspecialchars($address['phone']); ?></p>
                                <div>
                                <a href="edit_alamat.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="hapus_alamat.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus alamat ini?');">Hapus</a>
                                </div>
                                <hr>
                            <?php }
                        } else { ?>
                            <p>Tidak ada alamat yang ditemukan.</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/biodata.js"></script>
</body>
</html>
<?php
// Tutup koneksi setelah semua operasi selesai
mysqli_close($koneksi);
?>
