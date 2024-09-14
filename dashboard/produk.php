<?php


// Fetch products from the database
$query = "SELECT * FROM products";
$result = $koneksi->query($query);
?>

<h1 class="h3 mb-4 text-gray-800">Data Produk</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="index.php?tambah_produk" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Produk
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                        <th>Nama Pengarang</th>
                        <th>Detail Buku</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Initialize a counter for numbering rows
                    $counter = 1;

                    // Check if there are products in the database
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $counter . '</td>';
                            echo '<td><img src="../assets/img/foto_produk/' . htmlspecialchars($row['foto_produk']) . '" class="img-responsive" width="100" height="150" alt=""></td>';
                            echo '<td>' . htmlspecialchars($row['nama_produk']) . '</td>';
                            echo '<td>RP ' . number_format($row['harga_produk'], 0, ',', '.') . '</td>';
                            echo '<td>' . htmlspecialchars($row['stok_produk']) . '</td>';
                            echo '<td>' . htmlspecialchars(substr($row['deskripsi_produk'], 0, 100)) . '...</td>';
                            echo '<td>' . htmlspecialchars($row['nama_pengarang']) . '</td>';
                            echo '<td>' . htmlspecialchars(substr($row['detail_buku'], 0, 100)) . '...</td>';
                            echo '<td class="text-center" width="150">';
                            echo '<a href="index.php?detail_produk&id=' . $row['id_produk'] . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Detail</a>';
                            echo '<a href="index.php?hapus_produk&id=' . $row['id_produk'] . '" class="btn btn-sm btn-danger">';
                            echo '<i class="fas fa-trash"></i> Hapus</a>';
                            echo '</td>';
                            echo '</tr>';
                            $counter++;
                        }
                    } else {
                        echo '<tr><td colspan="9">Tidak ada data produk</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
