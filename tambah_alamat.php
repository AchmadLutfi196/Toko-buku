<?php
session_start();
require_once "config.php";

// Pastikan pengguna sudah login
if (!isset($_SESSION['id'])) {
    die("Anda harus login untuk menambah alamat.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];

    // Query untuk menambah alamat baru
    $sql = "INSERT INTO addresses (user_id, name, address, city, postcode, phone) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        // Bind parameter ke statement SQL
        mysqli_stmt_bind_param($stmt, "isssss", $user_id, $name, $address, $city, $postcode, $phone);

        // Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect ke halaman daftar alamat setelah berhasil menambah alamat
            header("Location: alamat.php");
            exit;
        } else {
            echo "Error: Gagal menambah alamat. " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Database error: could not prepare statement";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alamat</title>
    <link rel="stylesheet" href="css/alamat.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center">Tambah Alamat</h2>
                <form action="tambah_alamat.php" method="POST">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="city">Kota</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="postcode">Kode Pos</label>
                        <input type="text" class="form-control" id="postcode" name="postcode" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">No. Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Alamat</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
// Tutup koneksi setelah semua operasi selesai
mysqli_close($koneksi);
?>
