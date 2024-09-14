<?php
include "../config.php"; // Sesuaikan dengan lokasi file config.php

// Inisialisasi variabel kosong untuk nilai default
$namaLengkap = "";
$email = "";
$jenisKelamin = "";
$tanggalLahir = "";
$nomorTelepon = "";

// Cek jika form disubmit dengan method POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
    // Ambil nilai dari form
    $namaLengkap = $koneksi->real_escape_string($_POST['namaLengkap']);
    $email = $koneksi->real_escape_string($_POST['email']);
    $jenisKelamin = $koneksi->real_escape_string($_POST['jenisKelamin']);
    $tanggalLahir = $koneksi->real_escape_string($_POST['tanggalLahir']);
    $nomorTelepon = $koneksi->real_escape_string($_POST['nomorTelepon']);

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO pelanggan (nama_pelanggan, email_pelanggan, jenis_kelamin, tanggal_lahir, telepon_pelanggan) 
              VALUES ('$namaLengkap', '$email', '$jenisKelamin', '$tanggalLahir', '$nomorTelepon')";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        echo '<script>alert("Data berhasil disimpan"); window.location.href = "biodata.php";</script>';
        exit(); // Hentikan eksekusi skrip setelah pengalihan
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }

    // Tutup koneksi database
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Biodata</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="h3 mb-4 text-gray-800">Tambah Biodata</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="namaLengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" value="<?php echo htmlspecialchars($namaLengkap); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jenisKelamin">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenisKelamin" id="laki-laki" value="laki-laki" <?php echo ($jenisKelamin == 'laki-laki') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="laki-laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenisKelamin" id="perempuan" value="perempuan" <?php echo ($jenisKelamin == 'perempuan') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenisKelamin" id="rahasia" value="rahasia" <?php echo ($jenisKelamin == 'rahasia') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="rahasia">Rahasia</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggalLahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" value="<?php echo htmlspecialchars($tanggalLahir); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nomorTelepon">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="nomorTelepon" name="nomorTelepon" value="<?php echo htmlspecialchars($nomorTelepon); ?>" required>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
