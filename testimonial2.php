<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Testimonial</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="css/testimonial2.css"> -->
</head>
<body>

<!-- Navbar -->
<?php include 'navbar.php';?>

<!-- Testimonial Section -->
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-2">
            <h1 class="text-left font-weight-bold text-primary mt-5"><i class="bi bi-chevron-left"></i></h1>
        </div>
        <div class="col-md-8">
            <h1 class="text-center text-primary mt-5"><b id="testimonialTitle">TESTIMONIAL</b></h1>
        </div>
        <div class="col-md-2 text-right">
            <a href="#" class="btn btn-primary mt-5" data-toggle="modal" data-target="#testimonialModal" id="writeTestimonialButton">Tulis Testimonial</a>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testimonialModalLabel">Tulis Testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Masukkan testimonial Anda"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial Cards -->
<div class="container" id="testimonialContent">
    <div class="row" id="testimonialRow">
        <!-- Cards content will be dynamically updated by JavaScript -->
    </div>
</div>

<!-- Footer -->
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
<br>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/testimonial2.js"></script>
</body>
</html>