<?php

// Fetch categories from the database
$query = "SELECT * FROM categories";
$result = $koneksi->query($query);

// Initialize a counter for numbering rows
$counter = 1;
?>

<h1 class="h3 mb-4 text-gray-800">Data Kategori</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="index.php?tambah_kategori" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are categories in the database
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $counter . '</td>';
                            echo '<td>' . htmlspecialchars($row['nama_kategori']) . '</td>';
                            echo '<td class="text-center" width="150">';
                            echo '<a href="index.php?edit_kategori&id=' . $row['id_kategori'] . '" class="btn btn-sm btn-primary">';
                            echo '<i class="fas fa-edit"></i> Edit</a>';
                            echo '<a href="index.php?hapus_kategori&id=' . $row['id_kategori'] . '" class="btn btn-sm btn-danger">';
                            echo '<i class="fas fa-trash"></i> Hapus</a>';
                            echo '</td>';
                            echo '</tr>';
                            $counter++;
                        }
                    } else {
                        echo '<tr><td colspan="3">Tidak ada data kategori</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
