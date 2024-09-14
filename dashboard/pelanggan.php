<?php
// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include file konfigurasi database
include "../config.php"; // Sesuaikan path sesuai struktur proyek Anda

// Query untuk mengambil data pelanggan
$query = "SELECT * FROM pelanggan";
$result = $koneksi->query($query);

if (!$result) {
    die("Error: Query gagal dieksekusi. " . $koneksi->error);
}

$no = 1;
?>

<h1 class="h3 mb-4 text-gray-800">Data Pelanggan</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50">No</th> <!-- Lebar kolom No diubah menjadi 50 -->
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Loop untuk menampilkan setiap baris data pelanggan
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>"; // Kolom No menggunakan variabel $no
                            
                            // Gunakan kondisi untuk memeriksa null sebelum meneruskan ke htmlspecialchars
                            echo "<td>" . (isset($row['nama_pelanggan']) ? htmlspecialchars($row['nama_pelanggan']) : '') . "</td>";
                            echo "<td>" . (isset($row['email_pelanggan']) ? htmlspecialchars($row['email_pelanggan']) : '') . "</td>";
                            echo "<td>" . (isset($row['jenis_kelamin']) ? htmlspecialchars($row['jenis_kelamin']) : '') . "</td>";
                            echo "<td>" . (isset($row['tanggal_lahir']) ? htmlspecialchars($row['tanggal_lahir']) : '') . "</td>";
                            echo "<td>" . (isset($row['telepon_pelanggan']) ? htmlspecialchars($row['telepon_pelanggan']) : '') . "</td>";
                            echo "<td>" . (isset($row['alamat_pelanggan']) ? htmlspecialchars($row['alamat_pelanggan']) : '') . "</td>";
                            echo '<td class="text-center" width="150">';
                            echo '<a href="index.php?hapus_pelanggan&id=' . $row['id_pelanggan'] . '" class="btn btn-sm btn-danger">';
                            echo '<i class="fas fa-trash"></i> Hapus</a>';
                            echo '</td>';
                            echo '</tr>';
                            $no++;
                        }
                    } else {
                        echo '<tr><td colspan="8">Tidak ada data pelanggan</td></tr>'; // Kolom colspan diubah dari 6 ke 8
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
// Tutup koneksi database setelah selesai menggunakan
$koneksi->close();
?>
