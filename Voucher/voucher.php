<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku Online</title>
    <link rel="stylesheet" href="voucher.css">
    <link rel="stylesheet" href="modal.css">
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="/Project/headerfooter.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
   <!-- navbar -->
    <?php include '../navbar.php' ?>

    <div class="back main-content">
        <a href="../home.php">
            <button class="btn btn-secondary">❮</button>
        </a>
    </div>

    <section class="popular-books" id="books">
        <div class="container">
            <h2>Voucher</h2>
            <div class="book-list">
                <div class="book">
                    <img src="../assets/img/Voucher/1.jpg" alt="Book 3">
                    <h5>Voucher Discount 5%</h5>
                    <button class="myBtn btn-light btn-outline-dark" type="button" data-modal="modal1">
                        Cek
                    </button>
                </div>
                <div class="book">
                    <img src="../assets/img/Voucher/2.jpg" alt="Book 3">
                    <h5>Voucher Discount 10%</h5>
                    <button class="myBtn btn-light btn-outline-dark" type="button" data-modal="modal2">
                        Cek
                    </button>
                </div>
                <div class="book">
                    <img src="../assets/img/Voucher/3.jpg" alt="Book 3">
                    <h5>Voucher Discount 20%</h5>
                    <button class="myBtn btn-light btn-outline-dark" type="button" data-modal="modal3">
                        Cek
                    </button>
                </div>
            </div>
            <div class="book-list">
                <div class="book">
                    <img src="../assets/img/Voucher/4.jpg" alt="Book 3">
                    <h5>Voucher Discount 30%</h5>
                    <button class="myBtn btn-light btn-outline-dark" type="button" data-modal="modal4">
                        Cek
                    </button>
                </div>
                <div class="book">
                    <img src="../assets/img/Voucher/5.jpg" alt="Book 3">
                    <h5>Voucher Discount 40%</h5>
                    <button class="myBtn btn-light btn-outline-dark" type="button" data-modal="modal5">
                        Cek
                    </button>
                </div>
                <div class="book">
                    <img src="../assets/img/Voucher/6.jpg" alt="Book 3">
                    <h5>Voucher Discount 45%</h5>
                    <button class="myBtn btn-light btn-outline-dark" type="button" data-modal="modal6">
                        Cek
                    </button>
                </div>
            </div>
        </div>

    <!-- Modal 1 -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="modal-body">
                <span class="close">&times;</span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"><img class="modal-img" src="/Project/Gambar/Voucher/1.jpg" alt="Voucher"></div>
                        <div class="promo col-md-6 ">
                            <h1>Voucher Discount 5%</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button class="btn-light btn-outline-dark" onclick="myalert()">Ambil</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div id="modal2" class="modal">
        <div class="modal-content">
            <div class="modal-body">
                <span class="close">&times;</span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"><img class="modal-img" src="/Project/Gambar/Voucher/2.jpg" alt="Voucher"></div>
                        <div class="promo col-md-6 ">
                            <h1>Voucher Discount 10%</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button class="btn-light btn-outline-dark" onclick="myalert()">Ambil</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Modal 3 -->
    <div id="modal3" class="modal">
        <div class="modal-content">
            <div class="modal-body">
                <span class="close">&times;</span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"><img class="modal-img" src="/Project/Gambar/Voucher/3.jpg" alt="Voucher"></div>
                        <div class="promo col-md-6 ">
                            <h1>Voucher Discount 20%</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button class="btn-light btn-outline-dark" onclick="myalert()">Ambil</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Modal 4 -->
    <div id="modal4" class="modal">
        <div class="modal-content">
            <div class="modal-body">
                <span class="close">&times;</span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"><img class="modal-img" src="/Project/Gambar/Voucher/4.jpg" alt="Voucher"></div>
                        <div class="promo col-md-6 ">
                            <h1>Voucher Discount 30%</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button class="btn-light btn-outline-dark" onclick="myalert()">Ambil</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Modal 5 -->
    <div id="modal5" class="modal">
        <div class="modal-content">
            <div class="modal-body">
                <span class="close">&times;</span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"><img class="modal-img" src="/Project/Gambar/Voucher/5.jpg" alt="Voucher"></div>
                        <div class="promo col-md-6 ">
                            <h1>Voucher Discount 40%</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button class="btn-light btn-outline-dark" onclick="myalert()">Ambil</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Modal 6 -->
    <div id="modal6" class="modal">
        <div class="modal-content">
            <div class="modal-body">
                <span class="close">&times;</span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"><img class="modal-img" src="/Project/Gambar/Voucher/6.jpg" alt="Voucher"></div>
                        <div class="promo col-md-6 ">
                            <h1>Voucher Discount 45%</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button class="btn-light btn-outline-dark" onclick="myalert()">Ambil</button>
                </a>
            </div>
        </div>
    </div>

    <div class="apply-voucher">
        <input type="text" id="voucherCode" placeholder="Enter voucher code">
        <button onclick="applyVoucher()">Apply Voucher</button>
    </div>
    <div class="total-price">
        <h5>Total Price: <span id="totalPrice">100.00</span></h5>
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
        </div>
    </footer>

        <script>
            // Get all buttons and modals
            var buttons = document.querySelectorAll(".myBtn");
            var modals = document.querySelectorAll(".modal");
            var spans = document.getElementsByClassName("close");
    
            // When the user clicks the button, open the corresponding modal
            buttons.forEach(button => {
                button.onclick = function() {
                    var modalId = this.getAttribute("data-modal");
                    var modal = document.getElementById(modalId);
                    modal.style.display = "block";
                };
            });
    
            // When the user clicks on <span> (x), close the modal
            Array.from(spans).forEach(span => {
                span.onclick = function() {
                    modals.forEach(modal => {
                        modal.style.display = "none";
                    });
                };
            });
    
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target.classList.contains("modal")) {
                    event.target.style.display = "none";
                }
            };

            function myalert() { 
            alert("Voucher Telah Diambil"); 
            } 
            // JavaScript to handle the voucher application
            function applyVoucher() {
                const voucherCode = document.getElementById("voucherCode").value;
                const totalPriceElement = document.getElementById("totalPrice");
                let totalPrice = parseFloat(totalPriceElement.textContent);
            
                const vouchers = {
                    "DISCOUNT5": 0.05,
                    "DISCOUNT10": 0.10,
                    "DISCOUNT20": 0.20,
                    "DISCOUNT30": 0.30,
                    "DISCOUNT40": 0.40,
                    "DISCOUNT45": 0.45
                };

                if (vouchers[voucherCode.toUpperCase()]) {
                    const discount = vouchers[voucherCode.toUpperCase()];
                    const discountedPrice = totalPrice - (totalPrice * discount);
                    totalPriceElement.textContent = discountedPrice.toFixed(2);
                    alert("Voucher applied successfully!");
                } else {
                    alert("Invalid voucher code. Please try again.");
                }
            }
        </script>
    
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
