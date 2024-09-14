<?php
session_start();
require_once 'config.php';

// Check if id_pelanggan is available in session
if (isset($_SESSION['id'])) {
    $id_pelanggan = $_SESSION['id'];

    // Query to fetch data from keranjang joined with products
    $query = "SELECT keranjang.id, products.nama_produk, products.harga_produk, keranjang.jumlah, (products.harga_produk * keranjang.jumlah) as total, products.foto_produk 
              FROM keranjang 
              JOIN products ON keranjang.id_produk = products.id_produk
              WHERE keranjang.id_user = ?";
    
    // Prepare the query
    $stmt = $koneksi->prepare($query);
    if (!$stmt) {
        die('Query preparation failed: ' . $koneksi->error);
    }

    // Bind parameter and execute query
    $stmt->bind_param("i", $id_pelanggan);
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    $keranjang = [];
    $subtotal = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $keranjang[] = $row;
            $subtotal += $row['total'];
        }
    } else {
        echo "Keranjang Anda kosong.";
    }

    // Close statement
    $stmt->close();
} else {
    echo "ID pelanggan tidak ditemukan dalam sesi.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - BukuKu.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>

<!-- Navbar -->
<?php include 'navbar.php'; ?>

<!-- Keranjang -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Keranjang Belanja</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="checkout.php" method="POST">
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pilih</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($keranjang)): ?>
                            <?php foreach ($keranjang as $index => $item): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><input type="checkbox" name="selected_products[]" value="<?= $item['id'] ?>" data-total="<?= $item['total'] ?>"></td>
                                    <td><img src="assets/img/foto_produk/<?= htmlspecialchars($item['foto_produk']) ?>" alt="<?= htmlspecialchars($item['nama_produk']) ?>" width="50"></td>
                                    <td><?= htmlspecialchars($item['nama_produk']) ?></td>
                                    <td>Rp <?= number_format($item['harga_produk'], 0, ',', '.') ?></td>
                                    <td><?= htmlspecialchars($item['jumlah']) ?></td>
                                    <td>Rp <?= number_format($item['total'], 0, ',', '.') ?></td>
                                    <td>
                                        <a href="hapusKeranjang.php?id=<?= $item['id'] ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="6" class="text-right"><strong>Subtotal:</strong></td>
                                <td colspan="2" class="text-right"><strong>Rp <span id="subtotal"><?= number_format($subtotal, 0, ',', '.') ?></span></strong></td>
                            </tr>
                            <tr>
                                <td colspan="8" class="text-right">
                                    <button type="submit" class="btn btn-primary">Checkout</button>
                                </td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Keranjang Anda kosong.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Update subtotal when checkboxes are checked/unchecked
    document.querySelectorAll('input[name="selected_products[]"]').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            let subtotal = 0;
            document.querySelectorAll('input[name="selected_products[]"]:checked').forEach(checkedBox => {
                subtotal += parseFloat(checkedBox.getAttribute('data-total'));
            });
            document.getElementById('subtotal').innerText = subtotal.toLocaleString('id-ID', {style: 'currency', currency: 'IDR'}).replace('IDR', 'Rp');
        });
    });
</script>
</body>
</html>
