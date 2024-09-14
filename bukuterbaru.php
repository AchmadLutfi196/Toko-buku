<?php

// Query to get the latest books based on the highest id_produk
$query = "SELECT * FROM products ORDER BY id_produk DESC LIMIT 6";
$result = $koneksi->query($query);

// Check if the query was successful
if (!$result) {
    die("Error: Query failed to execute. " . $koneksi->error);
}

$latestBooks = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $latestBooks[] = $row;
    }
}
?>



    <!-- Buku Terbaru Section -->
    <section id="Buku Terbaru" class="container my-5">
        <div class="background-box">
            <h4 class="text-left mb-4 font-weight-bold">Buku Terbaru</h4>
            <div class="row">
                <?php if (!empty($latestBooks)): ?>
                    <?php foreach ($latestBooks as $book): ?>
                        <div class="col-sm-6 col-md-4 col-lg-2 mb-2 p-2">
                            <div class="card">
                                <a href="detailProduk.php?id=<?= htmlspecialchars($book['id_produk']) ?>">
                                    <img src="../assets/img/foto_produk/<?= htmlspecialchars($book['foto_produk']) ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($book['nama_produk']) ?>" >
                                </a>
                                <div class="card-body">
                                    <a href="detailProduk.php?id=<?= htmlspecialchars($book['id_produk']) ?>" class="text-decoration-none">
                                        <h6 class="text-secondary card-title"><?= htmlspecialchars($book['nama_pengarang']) ?></h6>
                                        <p class="card-title"><?= htmlspecialchars($book['nama_produk']) ?></p>
                                    </a>
                                    <p class="card-text">Rp <?= number_format($book['harga_produk'], 0, ',', '.') ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="col-12">Tidak ada buku terbaru yang ditemukan.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

