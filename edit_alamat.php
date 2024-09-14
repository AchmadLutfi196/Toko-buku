<?php
session_start();
require_once "config.php";

// Pastikan pengguna sudah login
if (!isset($_SESSION['id'])) {
    die("Anda harus login untuk mengedit alamat.");
}

// Pastikan ID alamat diberikan
if (!isset($_GET['id'])) {
    die("ID alamat tidak ditemukan.");
}

$address_id = $_GET['id'];
$user_id = $_SESSION['id'];

// Debugging output
echo "Debug: address_id = $address_id, user_id = $user_id<br>";


// Ambil data alamat dari database
$sql = "SELECT * FROM addresses WHERE id = ? AND user_id = ?";
$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "ii", $address_id, $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $address = $row['address'];
    $city = $row['city'];
    $postcode = $row['postcode'];
    $phone = $row['phone'];
} else {
    die("Alamat tidak ditemukan atau Anda tidak memiliki akses untuk mengedit alamat ini.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];

    // Query untuk memperbarui alamat
    $sql = "UPDATE addresses SET name = ?, address = ?, city = ?, postcode = ?, phone = ? WHERE id = ? AND user_id = ?";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssi", $name, $address, $city, $postcode, $phone, $address_id, $user_id);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: alamat.php");
            exit;
        } else {
            echo "Error: Gagal memperbarui alamat. " . mysqli_stmt_error($stmt);
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
    <title>Edit Alamat</title>
    <link rel="stylesheet" href="css/alamat.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center">Edit Alamat</h2>
                <form action="edit_alamat.php?id=<?php echo $address_id; ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="city">Kota</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlspecialchars($city); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="postcode">Kode Pos</label>
                        <input type="text" class="form-control" id="postcode" name="postcode" value="<?php echo htmlspecialchars($postcode); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">No. Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>
