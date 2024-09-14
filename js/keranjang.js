
// function removeFromCart(rowId) {
//     // Hapus item dari localStorage berdasarkan rowId
//     var cart = JSON.parse(localStorage.getItem('cart')) || [];
//     var updatedCart = cart.filter(item => item.id !== rowId);
//     localStorage.setItem('cart', JSON.stringify(updatedCart));
//     // Tampilkan ulang keranjang belanja
//     displayCart();
// }
// function displayCart() {
//     var cart = JSON.parse(localStorage.getItem('cart')) || [];
//     var cartItemsDiv = document.getElementById('cartItems');
//     var cartTotal = 0;
//     cartItemsDiv.innerHTML = ''; // Reset isi div
//     cart.forEach(function(item, index) {
//         var itemRow = document.createElement('tr');
//         itemRow.innerHTML = `
//             <th scope="row">${index + 1}</th>
//             <td>${item.title}</td>
//             <td>Rp. ${item.price.toLocaleString('id-ID')}</td>
//             <td>${item.quantity}</td>
//             <td>Rp. ${(item.quantity * item.price).toLocaleString('id-ID')}</td>
//             <td><button onclick="removeFromCart(${item.id})" class="btn btn-danger">Hapus</button></td>
//         `;
//         cartItemsDiv.appendChild(itemRow);
//         cartTotal += item.quantity * item.price;
//     });
//     document.getElementById('cartTotal').innerText = `Rp. ${cartTotal.toLocaleString('id-ID')}`;
// }
// window.onload = function() {
//     displayCart();
// }

//     function addToCart(id_produk) {
//         var jumlah = document.getElementById('quantity').value; // Ambil nilai jumlah dari input
        
//         // Kirim request AJAX untuk menambahkan produk ke keranjang
//         var xhr = new XMLHttpRequest();
//         xhr.open('POST', 'proses_tambah_keranjang.php', true);
//         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//         xhr.onreadystatechange = function() {
//             if (xhr.readyState == 4 && xhr.status == 200) {
//                 // Respons dari server
//                 console.log(xhr.responseText); // Cetak respons untuk debugging
//                 // Tambahkan logika jika perlu
//             }
//         };
//         xhr.send('id_produk=' + id_produk + '&jumlah=' + jumlah); // Kirim data produk ke server
//     }

