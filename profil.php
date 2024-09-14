<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php'; // Sesuaikan dengan file konfigurasi database Anda

// Proses penyimpanan data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
    // Ambil data dari form
    $nama_pelanggan = $_POST['namaLengkap'];
    $email_pelanggan = $_POST['email'];
    $jenis_kelamin = $_POST['jenisKelamin'];
    $tanggal_lahir = $_POST['tanggalLahir'];
    $telepon_pelanggan = $_POST['nomorTelepon'];

    // Simpan data ke dalam session untuk ditampilkan kembali
    $_SESSION['nama_pelanggan'] = $nama_pelanggan;
    $_SESSION['email_pelanggan'] = $email_pelanggan;
    $_SESSION['jenis_kelamin'] = $jenis_kelamin;
    $_SESSION['tanggal_lahir'] = $tanggal_lahir;
    $_SESSION['telepon_pelanggan'] = $telepon_pelanggan;

    // Query untuk menyimpan data ke database menggunakan prepared statement
    $query = "INSERT INTO pelanggan (nama_pelanggan, email_pelanggan, jenis_kelamin, tanggal_lahir, telepon_pelanggan) 
              VALUES (?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $koneksi->prepare($query);
    if ($stmt === false) {
        echo "Error preparing statement: " . $koneksi->error;
    } else {
        // Bind parameters ke statement
        $stmt->bind_param("sssss", $nama_pelanggan, $email_pelanggan, $jenis_kelamin, $tanggal_lahir, $telepon_pelanggan);

        // Eksekusi statement
        if ($stmt->execute()) {
            // Redirect ke halaman ini sendiri setelah sukses menyimpan
            header("Location: biodata.php");
            exit(); // Hentikan eksekusi skrip setelah pengalihan
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup statement
        $stmt->close();
    }
}

// Ambil data dari session jika ada
$nama_pelanggan = isset($_SESSION['nama_pelanggan']) ? $_SESSION['nama_pelanggan'] : '';
$email_pelanggan = isset($_SESSION['email_pelanggan']) ? $_SESSION['email_pelanggan'] : '';
$jenis_kelamin = isset($_SESSION['jenis_kelamin']) ? $_SESSION['jenis_kelamin'] : '';
$tanggal_lahir = isset($_SESSION['tanggal_lahir']) ? $_SESSION['tanggal_lahir'] : '';
$telepon_pelanggan = isset($_SESSION['telepon_pelanggan']) ? $_SESSION['telepon_pelanggan'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>biodata</title>
    <link rel="stylesheet" href="css/biodata.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
        <!-- navbar -->
        <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
        <div class="col-md-4">
                <div class="my-account-menu">
                    <h2>My Account</h2>
                    <table class="table">
                        <tbody>
                            <tr id="biodata"><td><a href="biodata.php">Biodata</a></td></tr>
                            <tr id="alamat"><td><a href="alamat.php">Daftar Alamat</a></td></tr>
                            <tr id="pesanan"><td><a href="pesanan.php">Pesanan Saya</a></td></tr>
                            <tr id="wishlist"><td><a href="wishlist.php">Wishlist</a></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Biodata Pelanggan</div>

                    <div class="card-body">
                        <form method="POST" action="biodata.php">
                            <div class="form-group">
                                <label for="namaLengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" value="<?php echo htmlspecialchars($nama_pelanggan); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email_pelanggan); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div>
                                    <input type="radio" id="laki-laki" name="jenisKelamin" value="laki-laki" <?php echo ($jenis_kelamin == 'laki-laki') ? 'checked' : ''; ?>>
                                    <label for="laki-laki">Laki-laki</label>
                                    <input type="radio" id="perempuan" name="jenisKelamin" value="perempuan" <?php echo ($jenis_kelamin == 'perempuan') ? 'checked' : ''; ?>>
                                    <label for="perempuan">Perempuan</label>
                                    <input type="radio" id="rahasia" name="jenisKelamin" value="rahasia" <?php echo ($jenis_kelamin == 'rahasia') ? 'checked' : ''; ?>>
                                    <label for="rahasia">Rahasia</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggalLahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" value="<?php echo $tanggal_lahir; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nomorTelepon">Nomor Telepon</label>
                                <input type="tel" class="form-control" id="nomorTelepon" name="nomorTelepon" value="<?php echo $telepon_pelanggan; ?>" required>
                            </div>
                            <div class="text-right">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
