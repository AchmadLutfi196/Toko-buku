<?php

include 'config.php'; // Hubungkan file ini dengan config.php
// Periksa apakah parameter id telah dikirimkan
if (isset($_GET['id'])) {
    $id_produk = intval($_GET['id']); // Mengambil id produk dari URL dan memastikan berupa integer

    // Query untuk mengambil detail produk berdasarkan id
    $query = "SELECT * FROM products WHERE id_produk = $id_produk";
    $result = $koneksi->query($query);

    // Periksa apakah query berhasil dieksekusi dan ada hasilnya
    if ($result && $result->num_rows > 0) {
        $produk = $result->fetch_assoc(); // Mengambil data produk
    } else {
        die("Produk tidak ditemukan.");
    }
} else {
    die("ID produk tidak diberikan.");
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - BukuKu.com</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="home.css"> <!-- Pastikan file home.css tersedia dan terhubung dengan benar -->
     

</head>
<body>

    
    <!-- detil produk buku -->
    <div class="container mt-5">
        <div class="row">
        <div class="col-md-3">
            <img src="../assets/img/foto_produk/<?php echo htmlspecialchars($produk['foto_produk']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($produk['nama_produk']); ?>">
            <div class="mt-3">
                <button class="btn btn-primary btn-sm rounded-pill" onclick="addToWishlist(<?php echo $produk['id_produk']; ?>);"><i class="bi bi-heart"></i> Wishlist</button>
            </div>
        </div>

            <div class="col-md-5">
                <h6><?php echo htmlspecialchars($produk['nama_pengarang']); ?></h6>
                <h2><?php echo htmlspecialchars($produk['nama_produk']); ?></h2>
                <p class="text-custom font-weight-bold">Rp <?php echo number_format($produk['harga_produk'], 0, ',', '.'); ?></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="deskripsi-tab" data-toggle="tab" href="#deskripsi" role="tab" aria-controls="deskripsi" aria-selected="true">Deskripsi Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="false">Detail Buku</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
                        <h3 class="mt-3">Deskripsi Buku</h3>
                        <p><?php echo htmlspecialchars($produk['deskripsi_produk']); ?></p>
                    </div>
                    <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                        <h3 class="mt-3">Detail Buku</h3>
                        <p><?php echo htmlspecialchars($produk['detail_buku']); ?> <br>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <div class="card-body text-center">
                    <h6 class="text-muted">Ingin beli berapa?</h6>
                    <h6 class="font-weight-bold">Jumlah Barang</h6>
                    <div class="input-group justify-content-center mb-3">
                        <div class="input-group-prepend">
                            <a href="javascript:void(0);" onclick="increaseQuantity();"><i class="bi bi-plus-circle-fill"></i></a>
                        </div>
                        <input type="number" class="form-control text-center" id="quantity" value="1" min="1" readonly>
                        <div class="input-group-append">
                            <a href="javascript:void(0);" onclick="decreaseQuantity();"><i class="bi bi-dash-circle-fill"></i></a>
                        </div>
                    </div>
                    <p class="text-muted">Subtotal</p>
                    <p class="font-weight-bold text-custom">Rp <span id="total"><?php echo number_format($produk['harga_produk'], 0, ',', '.'); ?></span></p>
                    <div class="d-flex justify-content-between">
                        <div></div> 
                        <div class="text-center">
                            <button class="btn btn-outline-primary my-2 my-sm-0 rounded-pill btn-custom" onclick="addToCart(<?php echo $produk['id_produk']; ?>);">Keranjang</button>
                        </div>
                        <div></div>  
                    </div>
                    </div>
                </div>
            </div>
        
            
            </div>
        </div>
    </div>

    <script>
function increaseQuantity() {
    var quantity = document.getElementById("quantity");
    var total = document.getElementById("total");
    var harga = <?php echo $produk['harga_produk']; ?>;

    var currentQuantity = parseInt(quantity.value);
    if (currentQuantity < 10) {
        quantity.value = currentQuantity + 1;
        total.innerHTML = new Intl.NumberFormat('id-ID').format((currentQuantity + 1) * harga);
    }
}

function decreaseQuantity() {
    var quantity = document.getElementById("quantity");
    var total = document.getElementById("total");
    var harga = <?php echo $produk['harga_produk']; ?>;

    var currentQuantity = parseInt(quantity.value);
    if (currentQuantity > 1) {
        quantity.value = currentQuantity - 1;
        total.innerHTML = new Intl.NumberFormat('id-ID').format((currentQuantity - 1) * harga);
    }
}

function addToCart(id_produk) {
    var jumlah = document.getElementById('quantity').value; // Ambil nilai jumlah dari input
    console.log("Tambahkan produk dengan ID: " + id_produk + " dan jumlah: " + jumlah);

    // Kirim request AJAX untuk menambahkan produk ke keranjang
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'proses_tambah_keranjang.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Respons dari server
            console.log(xhr.responseText); // Cetak respons untuk debugging
            alert(xhr.responseText);
        }
    };
    xhr.send('id_produk=' + id_produk + '&jumlah=' + jumlah); // Kirim data produk ke server
}
function addToWishlist(id_produk) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'proses_tambah_wishlist.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Respons dari server
            console.log(xhr.responseText); // Cetak respons untuk debugging
            alert(xhr.responseText);
        }
    };
    xhr.send('id_produk=' + id_produk); // Kirim data produk ke server
}


</script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

