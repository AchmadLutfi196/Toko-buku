<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" href="hubkami.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/Project/headerfooter.css">
    <link rel="stylesheet" href="../home.css">
</head>
<body>
    <!-- navbar -->
    <php include 'navbar.php'; ?>
        <!-- end navbar -->
    
    <div class="back main-content">
        <a href="../home.php">
            <button class="btn btn-secondary">❮</button>
        </a>
    </div>
    
    <div class="container contact-form">
        <div class="row contact-section">
            <div class="col-md-6">
                <h2>Hubungi Kami</h2>
                <p>Sampaikan Pertanyaan atau Masukkan anda untuk kami melalui formulir di bawah ini.</p>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subjek</label>
                        <input type="text" class="form-control" id="subject">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="message" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" class="form-check-input" id="not-a-robot">
                        <label class="form-check-label" for="not-a-robot">I'm not a robot</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
            <div class="divider"></div>
            <div class="col-md-6">
                <h3>Atau Anda bisa menghubungi kami melalui :</h3>
                <div class="contact-info">
                    <img src="/Project/Gambar/chat.webp" width="50" height="50" alt="">
                    <div>
                        <p><strong>Live Chat</strong><br>
                            Melayani Anda pada 12:00 - 00:00 <br>
                            <a href="https://www.instagram.com/bg.vctrpaok/">hubungi kami via live chat</a>
                        </p>
                    </div>
                </div>
                <div class="contact-info">
                    <img src="/Project/Gambar/mail.png" width="50" height="50" alt="">
                    <div>
                        <p><strong>Email</strong><br>
                            Melayani Anda pada 12:00 - 00:00 <br>
                            <a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSGKZVfSBCJVVLpVJzRCGsfjDPfSVqRTzVvwHVkGjhJKRPcwrVPbzhzlhBTKcwkNWTJpqCJF">hubungi kami via email</a>
                        </p>
                    </div>
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>