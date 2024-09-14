<?php
session_start();
require_once 'config.php';

$selected_products = [];
$subtotal = 0;
$user_id = $_SESSION['id'] ?? null;
$alamat_pengiriman = [];

// Fetch selected products if available
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_products'])) {
    $product_ids = $_POST['selected_products'];

    if (!empty($product_ids)) {
        // Prepare query to fetch product details based on selected IDs
        $ids_placeholder = implode(',', array_fill(0, count($product_ids), '?'));
        $query = "SELECT keranjang.id, products.nama_produk, products.harga_produk, keranjang.jumlah, (products.harga_produk * keranjang.jumlah) as total, products.foto_produk 
                  FROM keranjang 
                  JOIN products ON keranjang.id_produk = products.id_produk
                  WHERE keranjang.id IN ($ids_placeholder)";

        // Prepare and execute the query
        $stmt = $koneksi->prepare($query);
        if ($stmt) {
            $stmt->bind_param(str_repeat('i', count($product_ids)), ...$product_ids);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $selected_products[] = $row;
                }
                // Calculate subtotal
                $subtotal = array_sum(array_column($selected_products, 'total'));
            } else {
                echo "Tidak ada produk yang ditemukan.";
            }
            $stmt->close();
        } else {
            echo "Query preparation failed: " . $koneksi->error;
        }
    } else {
        echo "Tidak ada produk yang dipilih untuk checkout.";
    }
} else {
    echo "Invalid request method or no selected products.";
}

// Fetch address details based on user_id
if (!empty($user_id)) {
    $queryAlamat = "SELECT * FROM addresses WHERE user_id = ?";
    $stmtAlamat = $koneksi->prepare($queryAlamat);
    if ($stmtAlamat) {
        $stmtAlamat->bind_param('i', $user_id);
        $stmtAlamat->execute();
        $resultAlamat = $stmtAlamat->get_result();
        
        if ($resultAlamat->num_rows > 0) {
            $alamat_pengiriman = $resultAlamat->fetch_assoc();
        } else {
            echo "Alamat pengiriman tidak ditemukan.";
        }
        $stmtAlamat->close();
    } else {
        echo "Query preparation failed: " . $koneksi->error;
    }
}

// If all data is ready, proceed with saving the purchase into the database
if (!empty($selected_products) && !empty($alamat_pengiriman)) {
    // Prepare query to insert purchase into pembelian table
    $queryInsertPembelian = "INSERT INTO pembelian (id_produk, tanggal, total, nama_produk) VALUES (?, NOW(), ?, ?)";
    $stmtInsertPembelian = $koneksi->prepare($queryInsertPembelian);

    if ($stmtInsertPembelian) {
        // Loop through each purchased product and insert into pembelian table
        foreach ($selected_products as $product) {
            $id_produk = $product['id']; // Adjust according to the id_produk column in your products table
            $total = $product['total'];
            $nama_produk = $product['nama_produk'];

            // Bind parameters and execute statement for each product
            $stmtInsertPembelian->bind_param('ids', $id_produk, $total, $nama_produk);
            $stmtInsertPembelian->execute();
        }

        // Close statement
        $stmtInsertPembelian->close();

        // Redirect to pesanan.php after successful purchase
        echo "Pembelian berhasil! Silakan cek <a href='pesanan.php'>pesanan Anda</a>.";
    } else {
        // If there is an error in prepare statement
        echo "Query preparation failed: " . $koneksi->error;
    }
} else {
    // If there are incomplete data
    echo "Data tidak lengkap untuk melakukan pembelian.";
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    
<!-- Navbar -->
<?php include 'navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="section address-section">
                <h2><b>Alamat Tujuan Pengiriman</b></h2>
                <!-- Display fetched address details here -->
                <?php if (!empty($alamat_pengiriman)): ?>
                    <p><?= htmlspecialchars($alamat_pengiriman['name']) ?> | <?= htmlspecialchars($alamat_pengiriman['phone']) ?></p>
                    <p><?= htmlspecialchars($alamat_pengiriman['address']) ?></p>
                    <p><?= htmlspecialchars($alamat_pengiriman['city']) ?> <?= htmlspecialchars($alamat_pengiriman['postcode']) ?></p>
                <?php else: ?>
                    <p>Alamat pengiriman belum diatur.</p>
                <?php endif; ?>
            </div>
            <div class="section order-section">
                <h2><b>Pesanan</b></h2>
                <?php foreach ($selected_products as $product): ?>
                    <div class="order-item">
                        <img src="assets/img/foto_produk/<?= htmlspecialchars($product['foto_produk']) ?>" alt="<?= htmlspecialchars($product['nama_produk']) ?>" width="100">
                        <div class="order-details">
                            <p><?= htmlspecialchars($product['nama_produk']) ?></p>
                            <p>Soft cover - <?= htmlspecialchars($product['jumlah']) ?> barang</p>
                            <p>Rp <?= number_format($product['harga_produk'], 0, ',', '.') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="shipping-method">
                    <h2>Metode Pengiriman</h2>
                    <input type="radio" id="jne" name="shipping" value="70000" onclick="updateShippingCost(70000)">
                    <label for="jne">JNE (Rp. 70,000)</label><br>
                    <input type="radio" id="jnt" name="shipping" value="75000" onclick="updateShippingCost(75000)">
                    <label for="jnt">JNT (Rp. 75,000)</label><br>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="section payment-method-section">
                <h2>Metode Pembayaran</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal">
                    Pilih Metode Pembayaran
                </button>
                <?php include 'pembayaran.php'; ?>
            </div>
            <div class="section summary-section">
                <h2>Rincian Belanja</h2>
                <label for="voucher">Voucher</label>
                <input type="text" id="voucher" value="apimenyala"><br>
                <button onclick="applyVoucher()">Lihat Voucher</button>
                <div class="summary-details">
                    <p>Total Harga: Rp. <?= number_format($subtotal, 0, ',', '.') ?></p>
                    <p>Total Biaya Pengiriman: Rp. <span id="shipping-cost">0</span></p>
                    <p>Total Pembayaran: Rp. <span id="total-payment"><?= number_format($subtotal, 0, ',', '.') ?></span></p>
                </div>
                <button class="btn btn-success" onclick="processPayment()">BAYAR</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<script>
    function updateShippingCost(cost) {
        document.getElementById('shipping-cost').innerText = cost.toLocaleString('id-ID');
        updateTotalPayment();
    }

    function updateTotalPayment() {
        const subtotal = <?= $subtotal ?>;
        const shippingCost = parseInt(document.getElementById('shipping-cost').innerText.replace(/\./g, ''));
        const totalPayment = subtotal + shippingCost;
        document.getElementById('total-payment').innerText = totalPayment.toLocaleString('id-ID');
    }

    function applyVoucher() {
        // Implement voucher application logic
        alert('Voucher diterapkan!');
    }

    function processPayment() {
        // Implement payment processing logic
        $.ajax({
            type: "POST",
            url: "process_payment.php",
            data: {
                selected_products: <?= json_encode($selected_products) ?>,
                total_payment: <?= $subtotal ?>
            },
            success: function(response) {
                alert(response);
                // Handle success, e.g., redirect to thank you page
                window.location.href = "pesanan.php";
            },
            error: function(xhr, status, error) {
                alert("Error: " + error);
            }
        });
    }
</script>
</body>
</html>
