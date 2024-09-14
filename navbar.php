<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php';
$isLoggedIn = isset($_SESSION['username']);

// Query untuk mengambil semua kategori
$query = "SELECT * FROM categories";
$result = $koneksi->query($query);

if (!$result) {
    die("Error: Query gagal dieksekusi. " . $koneksi->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom bg-custom" id="Home">
    <a class="navbar-brand font-weight-bold" href="home.php">BukuKu.com</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<a class="dropdown-item" href="pencarian.php?id_kategori=' . urlencode($row['id_kategori']) . '">' . htmlspecialchars($row['nama_kategori']) . '</a>';
                    }
                } else {
                    echo '<a class="dropdown-item" href="#">Tidak ada kategori</a>';
                }
                ?>
                </div>
            </li>
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0" action="pencarian.php" method="GET">
                    <div class="input-group">
                        <input class="form-control mr-sm-2 search-input rounded-pill" type="search" name="keyword" placeholder="Cari Produk, Judul Buku, Penulis" aria-label="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-primary rounded-pill" value="Search" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </li>
            <li class="nav-item">
                <a href="keranjang.php"><i class="bi bi-cart"></i></a>
            </li>
            <!-- Pemeriksaan apakah pengguna sudah login -->
            <?php if ($isLoggedIn): ?>
                <li class="nav-item">
                    <a href="biodata.php"><i class="bi bi-person-circle"></i></a>
                </li>
                <li class="nav-item">
                    <a id="logoutBtn" href="logout.php" class="btn btn-outline-primary my-2 my-sm-0 rounded-pill btn-custom">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a href="login.php"><i class="bi bi-person-circle"></i></a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
</body>
</html>
