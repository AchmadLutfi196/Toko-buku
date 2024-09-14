<?php

// Query untuk mengambil data kategori
$query = "SELECT * FROM categories";
$result = $koneksi->query($query);

if (!$result) {
    die("Error: Query gagal dieksekusi. " . $koneksi->error);
}
?>  
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<a class="dropdown-item" href="#">' . htmlspecialchars($row['nama_kategori']) . '</a>';
                    }
                } else {
                    echo '<a class="dropdown-item" href="#">Tidak ada kategori</a>';
                }
                ?>
                </div>
            </li>