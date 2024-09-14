<?php

require_once 'config.php';

// Query untuk mengambil buku secara acak
$query_rekomendasi = "SELECT * FROM products ORDER BY RAND() LIMIT 6";
$result_rekomendasi = $koneksi->query($query_rekomendasi);

// Periksa apakah query berhasil dieksekusi
if (!$result_rekomendasi) {
    die("Error: Query gagal dieksekusi. " . $koneksi->error);
}
?>
<!-- Rekomendasi Buku -->
<section id="Rekomendasi Buku" class="container my-5">
    <div class="background-box">
        <h4 class="text-left mb-4 font-weight-bold">Rekomendasi Buku</h4>
        <div class="row">
            <?php
            if ($result_rekomendasi->num_rows > 0) {
                while ($row = $result_rekomendasi->fetch_assoc()) {
                    echo '<div class="col-sm-6 col-md-4 col-lg-2 mb-2 p-2">
                        <div class="card">
                            <a href="detailProduk.php?id=' . $row['id_produk'] . '"><img src="../assets/img/foto_produk/' . htmlspecialchars($row['foto_produk']) . '" class="card-img-top img-fluid" alt="' . htmlspecialchars($row['nama_produk']) . '"></a>
                            <div class="card-body">
                                <h6 class="text-secondary card-title">' . htmlspecialchars($row['nama_pengarang']) . '</h6>
                                <p class="card-title">' . htmlspecialchars($row['nama_produk']) . '</p>
                                <p class="card-text">Rp ' . number_format($row['harga_produk'], 0, ',', '.') . '</p>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<p class="text-center">Tidak ada rekomendasi buku untuk ditampilkan.</p>';
            }
            ?>
        </div>
    </div>
</section>
