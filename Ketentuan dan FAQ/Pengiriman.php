<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/Project/headerfooter.css">
    <link rel="stylesheet" href="styleisi.css">
    <link rel="stylesheet" href="../home.css">

    <title>Pengiriman</title>
</head>

<body>
      <!-- navbar -->
      <?php include '../navbar.php'; ?>

    <!-- end navbar -->
         
    <div class="back main-content">
        <a href="faqawal.php">
            <button class="btn btn-secondary">❮</button>
        </a>
    </div>
    
    <p>Frequently Asked Questions</p>
    <h1>Kebijakan Pengiriman di Bukuku.com</h1>

    <div class="accordion">
        <div class="accordion-item">
            <div class="accordion-header">
                Kenapa pesananku belum datang?
                <span class="icon">&#9656;</span>
            </div>
            <div class="accordion-content">
                <p>Perlu waktu beberapa hari agar pesananmu terkirim. Tapi, kamu bisa melacak pesananmu sudah sampai mana di laman Pesanan Saya. Kamu juga bisa menemukan perkiraan kapan pesananmu akan tiba. <br><br>
                    Jika pesananmu terlambat tiba atau tak kunjung tiba, langsung saja hubungi Customer Support kami.</p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-header">
                Sudah sampai mana pesananku?
                <span class="icon">&#9656;</span>
            </div>
            <div class="accordion-content">
                <p>Kamu bisa melacak pesananmu dengan meng-klik Orderanmu di akunmu.</p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-header">
                Kenapa pesananku dibatalkan?
                <span class="icon">&#9656;</span>
            </div>
            <div class="accordion-content">
                <p>Wah, pesananmu dibatalkan? Ada beberapa kemungkinan kenapa ini bisa terjadi:</p>
                <ol>
                    <li>Kamu tidak melunasi pembayaran pesananmu dalam waktu 24 jam.</li>
                    <li>Khusus CoD atau Cash on Delivery, kami menelponmu sebelum buku dikirim, dan kamu bilang kamu mau membatalkan pesananmu.</li>
                    <li>Pesananmu tak dapat dikirim. Setelah menghubungi kamu untuk mengkonfirmasi, kami membatalkan pesanan secara otomatis, dan akan melakukan refund atas pembayaran yang sudah kamu lakukan.</li>
                </ol>
                <p>Khusus untuk kondisi (1) dan (2), kamu bisa memesan lagi dengan mengunjungi laman “Pesanan Saya”. Di bawah pesanan yang kamu mau, kamu bisa meng-klik tombol Pesan Lagi. Setelah itu, kamu akan segera dibawa ke laman konfirmasi pemesanan, seperti sebelumnya XD</p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-header">
                Apa maksud dari "Pesanan Disiapkan"?
                <span class="icon">&#9656;</span>
            </div>
            <div class="accordion-content">
                <p>Pesanan Disiapkan berarti pesananmu sedang disiapkan untuk dikirim. Proses ini perlu waktu sekitar 1 hari - walau biasanya tidak selama itu juga.
                    <br><br>
                    Tapi, ada pengecualian. Kalau kamu memesan buku pre-order Spesial - biasanya, buku yang ditandatangani atau buku yang disertai hadiah tertentu - maka pesananmu akan dikirim 14 hari sebelum tanggal penerbitan buku tersebut.</p>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="searchForm">
                        <div class="mb-3">
                            <label for="searchInput" class="form-label">Enter your search :</label>
                            <input type="text" class="form-control" id="searchInput" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-expand-lg footer-custom bg-custom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#Home">Home</a></li>
                        <li class="list-inline-item"><a href="#Rekomendasi Buku">Buku Rekomendasi</a></li>
                        <li class="list-inline-item"><a href="#Buku Terbaru">Buku Terbaru</a></li>
                        <li class="list-inline-item"><a href="#">Tentang Kami</a></li>
                        <li class="list-inline-item"><a href="#">Kebijakan & Privasi</a></li>
                        <li class="list-inline-item"><a href="#">Hubungi Kami</a></li>
                        <li class="list-inline-item"><a href="#">Bantuan</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="font-weight-bold">Metode Pembayaran</h5>
                    <img src="https://i.ibb.co.com/WDKRtNn/metode-Pembayaran.png" alt="Metode Pembayaran" width="500px" height="200px">
                </div>
                <div class="col-md-6">
                    <h5 class="font-weight-bold">Metode Pengiriman</h5>
                    <img src="https://i.ibb.co.com/v3w2sGR/Kurir.png" alt="kurir" width="350px" height="250px">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>&copy; 2024 Bukuku.com Company. All Rights Reserved.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <!-- Sosial media ikon (contoh) -->
                    <a href="#" class="mr-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="mr-2"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.querySelectorAll('.accordion-header').forEach(item => {
            item.addEventListener('click', () => {
                const content = item.nextElementSibling;
                const icon = item.querySelector('.icon');
                item.classList.toggle('active');
                if (content.style.display === "block") {
                    content.style.display = "none";
                    icon.innerHTML = '&#9656;'; // right arrow
                } else {
                    content.style.display = "block";
                    icon.innerHTML = '&#9662;'; // down arrow
                }
            });
        });

        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const query = document.getElementById('searchInput').value.toLowerCase();
            const contentElements = document.querySelectorAll('.accordion-content p, .accordion-content ol, .accordion-content ul');

            // Remove previous highlights
            document.querySelectorAll('.highlight').forEach(element => {
                element.classList.remove('highlight');
            });

            contentElements.forEach(element => {
                const text = element.innerHTML.toLowerCase();
                if (text.includes(query)) {
                    // Highlight matching text
                    const regex = new RegExp(query, 'gi');
                    element.innerHTML = element.innerHTML.replace(regex, match => `<span class="highlight">${match}</span>`);
                }
            });

            // Close the modal after searching
            const modal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
            modal.hide();
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
