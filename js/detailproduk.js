
// function increaseQuantity() {
//     var quantity = document.getElementById("quantity");
//     var total = document.getElementById("total");
//     var harga = <?php echo $produk['harga_produk']; ?>;

//     var currentQuantity = parseInt(quantity.value);
//     if (currentQuantity < 10) {
//         quantity.value = currentQuantity + 1;
//         total.innerHTML = new Intl.NumberFormat('id-ID').format((currentQuantity + 1) * harga);
//     }
// }

// function decreaseQuantity() {
//     var quantity = document.getElementById("quantity");
//     var total = document.getElementById("total");
//     var harga = <?php echo $produk['harga_produk']; ?>;

//     var currentQuantity = parseInt(quantity.value);
//     if (currentQuantity > 1) {
//         quantity.value = currentQuantity - 1;
//         total.innerHTML = new Intl.NumberFormat('id-ID').format((currentQuantity - 1) * harga);
//     }
// }


// function addToCart(id_produk) {
//     var jumlah = document.getElementById('quantity').value; // Ambil nilai jumlah dari input
//     console.log("Tambahkan produk dengan ID: " + id_produk + " dan jumlah: " + jumlah);

//     // Kirim request AJAX untuk menambahkan produk ke keranjang
//     var xhr = new XMLHttpRequest();
//     xhr.open('POST', 'proses_tambah_keranjang.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             // Respons dari server
//             console.log(xhr.responseText); // Cetak respons untuk debugging
//             // Tambahkan logika jika perlu
//         }
//     };
//     xhr.send('id_produk=' + id_produk + '&jumlah=' + jumlah); // Kirim data produk ke server
// }

