<?php
// Pastikan koneksi database sudah diinisialisasi sebelumnya
include "../config.php"; // Sesuaikan dengan file koneksi database Anda

// Inisialisasi variabel untuk menyimpan data kategori yang akan di-edit
$id_kategori = $nama_kategori = "";

// Periksa apakah parameter id_kategori ada dalam URL
if (isset($_GET['id_kategori'])) {
    $id_kategori = $_GET['id_kategori'];

    // Query untuk mengambil data kategori berdasarkan id_kategori
    $query = "SELECT * FROM categories WHERE id_kategori = ?";
    $stmt = $koneksi->prepare($query);

    // Bind parameter dan eksekusi statement
    $stmt->bind_param("i", $id_kategori);
    $stmt->execute();

    // Ambil hasil query
    $result = $stmt->get_result();

    // Periksa apakah kategori ditemukan
    if ($result->num_rows > 0) {
        // Ambil data kategori
        $row = $result->fetch_assoc();
        $nama_kategori = $row['nama_kategori'];
    } else {
        // Redirect jika kategori tidak ditemukan
        echo '<script>alert("Kategori tidak ditemukan."); window.location.href = "index.php?kategori";</script>';
        exit();
    }

    // Tutup statement
    $stmt->close();
} else {
    // Redirect jika id_kategori tidak ditemukan dalam parameter URL
    echo '<script>alert("ID Kategori tidak ditemukan."); window.location.href = "index.php?kategori";</script>';
    exit();
}

// Proses form jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
    // Ambil data yang diedit dari form
    $nama_kategori_baru = $_POST['nama_kategori'];

    // Query untuk update data kategori
    $query_update = "UPDATE categories SET nama_kategori = ? WHERE id_kategori = ?";
    $stmt_update = $koneksi->prepare($query_update);

    // Bind parameter
    $stmt_update->bind_param("si", $nama_kategori_baru, $id_kategori);

    // Eksekusi statement update
    if ($stmt_update->execute()) {
        // Periksa apakah ada baris yang terpengaruh (affected rows)
        if ($stmt_update->affected_rows > 0) {
            echo '<script>alert("Data kategori berhasil diperbarui."); window.location.href = "index.php?kategori";</script>';
            exit(); // Penting untuk menghentikan eksekusi script setelah redirect
        } else {
            echo '<script>alert("Tidak ada perubahan pada data kategori."); window.location.href = "index.php?kategori";</script>';
            exit();
        }
    } else {
        echo "Error: " . $stmt_update->error; // Tampilkan pesan error jika query gagal dieksekusi
    }

    // Tutup statement update
    $stmt_update->close();
}

// Tutup koneksi database (bisa dimasukkan di file config.php jika lebih praktis)
$koneksi->close();
?>



<h1 class="h3 mb-4 text-gray-800">Edit Data Kategori</h1>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Kategori :</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_kategori" class="form-control" value="<?php echo htmlspecialchars($nama_kategori); ?>">
                    <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>">
                </div>
            </div>
        </div>
        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?kategori" class="btn btn-sm btn-danger">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="col text-right">
                    <button type="submit" name="simpan" class="btn btn-sm btn-primary">
                        Simpan <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
