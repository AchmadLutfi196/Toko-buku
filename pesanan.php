<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pesanan saya</title>
    <link rel="stylesheet" href="css/pesanan.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
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
            <div class="content">
                <h2 class="text-center">Pesanan Saya</h2>
                <div class="order-card">
                    <div class="order-info">
                        <span>No. Pesanan</span>
                        <span>AL11MJZK98HI</span>
                    </div>
                    <div class="order-info">
                        <span>Total Pembayaran</span>
                        <span>Rp. 165.000</span>
                    </div>
                    <div class="order-info">
                        <span>Status</span>
                        <span>Dikirim sebagian</span>
                    </div>
                    <div class="order-info">
                        <span>Order Tracking</span>
                        <button class="track-order" onclick="location.href='HALAMAN PENGIRIMAN/pengiriman.php'">Lacak Pesanan</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>