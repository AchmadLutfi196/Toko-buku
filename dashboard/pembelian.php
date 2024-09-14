<h1 class="h3 mb-4 text-gray-800">Data Pembelian</h1>
<?php
// Query untuk mengambil data pembelian beserta nama produk dari tabel products
$query = "SELECT pembelian.id_pembelian, products.nama_produk, pembelian.tanggal, pembelian.total
          FROM pembelian
          INNER JOIN products ON pembelian.id_produk = products.id_produk";

$result = $koneksi->query($query);
$no = 1;
?>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $no . '</td>';
                            echo '<td>' . htmlspecialchars($row['nama_produk']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['tanggal']) . '</td>';
                            echo '<td>Rp ' . number_format($row['total'], 0, ',', '.') . '</td>';
                            echo '<td class="text-center" width="150">';
                            echo '<a href="index.php?detail_pembelian&id=' . $row['id_pembelian'] . '" class="btn btn-sm btn-primary">';
                            echo '<i class="fas fa-eye"></i> Detail Pembelian</a>';
                            echo '</td>';
                            echo '</tr>';
                            $no++;
                        }
                    } else {
                        echo '<tr><td colspan="5" class="text-center">Tidak ada data pembelian.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
