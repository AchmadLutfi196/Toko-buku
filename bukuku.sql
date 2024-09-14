-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2024 pada 15.38
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukuku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `name`, `address`, `city`, `postcode`, `phone`) VALUES
(1, 6, 'Achmad lutfi', 'jl hos cokro', 'Bangkalan', '98727', '0923452');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `foto_banner` varchar(255) NOT NULL,
  `link_banner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id_banner`, `foto_banner`, `link_banner`) VALUES
(4, 'banner-1.png', 'http://localhost:8000/detailProduk.php?id=20'),
(6, 'Screenshot 2024-06-29 101532.png', 'http://localhost:8000/event/event.php'),
(7, '5.jpg', 'http://localhost:8000/voucher/voucher.php');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Fiksi'),
(4, 'Ekonomi'),
(6, 'Non Fiksi'),
(7, 'Hukum'),
(9, 'Pengembangan Diri'),
(10, 'Sosial'),
(11, 'Agama'),
(12, 'SAINS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_produk`, `id_user`, `jumlah`) VALUES
(8, 6, 6, 1),
(9, 8, 6, 2),
(11, 8, 100, 1),
(12, 13, 100, 4),
(13, 12, 101, 1),
(14, 17, 6, 1),
(16, 18, 6, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `telepon_pelanggan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `jenis_kelamin`, `tanggal_lahir`, `telepon_pelanggan`) VALUES
(1, 'elvita', 'elvita@gmail.com', NULL, NULL, '08123456789'),
(2, 'Budi Santoso', 'budi@gmail.com', NULL, NULL, '08129876543'),
(3, 'Ayu Lestari', 'ayu@gmail.com', NULL, NULL, '08133445566'),
(6, '', '', NULL, NULL, ''),
(9, 'admin', 'admin@gmail.com', NULL, NULL, ''),
(13, 'Elvita Dwi', 'elvita@gmail.com', 'perempuan', '2024-06-28', ''),
(32, 'Elvita Dwi', 'linerangers89@gmail.com', 'perempuan', '2024-06-28', '0987654321'),
(33, 'wahyu', 'linerangers89@gmail.com', 'laki-laki', '2024-06-30', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `nama_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_produk`, `tanggal`, `total`, `nama_produk`) VALUES
(37, 14, '2024-06-29', 40000.00, 'Ekonomi Makro'),
(39, 8, '2024-06-29', 95000.00, 'Laut Bercerita'),
(40, 8, '2024-06-29', 95000.00, 'Laut Bercerita'),
(42, 16, '2024-06-29', 67000.00, 'The Power Habits of Rasulullah'),
(43, 16, '2024-06-30', 67000.00, 'The Power Habits of Rasulullah'),
(44, 16, '2024-06-30', 67000.00, 'The Power Habits of Rasulullah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` decimal(10,2) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `nama_pengarang` varchar(255) NOT NULL,
  `detail_buku` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id_produk`, `id_kategori`, `foto_produk`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `stok_produk`, `nama_pengarang`, `detail_buku`) VALUES
(6, 2, 'p-1.png', 'Laut Bercerita', 95000.00, 'Buku ini terdiri atas dua bagian. Bagian pertama mengambil sudut pandang seorang mahasiswa aktivis bernama Laut, menceritakan bagaimana Laut dan kawan-kawannya menyusun rencana, berpindah-pindah dalam pelarian, hingga tertangkap oleh pasukan rahasia. Sedangkan bagian kedua dikisahkan oleh Asmara, adik Laut. Bagian kedua mewakili perasaan keluarga korban penghilangan paksa, bagaimana pencarian mereka terhadap kerabat mereka yang tak pernah kembali.\r\nBuku ini ditulis sebagai bentuk tribute bagi para aktivis yang diculik, yang kembali, dan yang tak kembali dan keluarga yang terus menerus sampai sekarang mencari-cari jawaban.', 23, 'Leila S. Chudori', 'Buku ini terdiri atas dua bagian. Bagian pertama mengambil sudut pandang seorang mahasiswa aktivis bernama Laut, menceritakan bagaimana Laut dan kawan-kawannya menyusun rencana, berpindah-pindah dalam pelarian, hingga tertangkap oleh pasukan rahasia. Sedangkan bagian kedua dikisahkan oleh Asmara, adik Laut. Bagian kedua mewakili perasaan keluarga korban penghilangan paksa, bagaimana pencarian mereka terhadap kerabat mereka yang tak pernah kembali.\r\nBuku ini ditulis sebagai bentuk tribute bagi para aktivis yang diculik, yang kembali, dan yang tak kembali dan keluarga yang terus menerus sampai sekarang mencari-cari jawaban.'),
(7, 2, 'Home_Sweet_Loan_cov.jpg', 'Home Sweet Loan', 93500.00, 'Novel Home Sweet Loan ditulis oleh Almira Bastari, seorang penulis muda yang namanya sudah populer di Indonesia. Novel Home Sweet Loan baru saja diterbitkan oleh Gramedia Pustaka Utama pada tahun 2022.\r\n\r\nNovel Home Sweet Loan mengangkat genre yang sama dengan karya Almira sebelumnya yang berjudul “Ganjil Genap”, yaitu metropop. Namun, novel Home Sweet Loan ini akan menyajikan cerita yang ditulis menjadi lebih serius.\r\n\r\nLayaknya novel-novel karya Almira sebelumnya, Home Sweet Loan menggunakan latar cerita di Kota Jakarta. Namun, cerita kali ini lebih menyoroti kaum menengah dengan mengisahkan perjuangan dari sudut pandang mereka.\r\n\r\nSinopsis\r\n\r\nEmpat orang yang berteman sejak SMA bekerja di perusahaan yang sama meski beda nasib. Di usia 31 tahun, mereka berburu rumah idaman yang minimal nyerempet Jakarta. Kaluna, pegawai Bagian Umum, yang gajinya tak pernah menyentuh dua digit. Gadis ini bekerja sampingan sebagai model bibir, bermimpi membeli rumah demi keluar dari situasi tiga kepala keluarga yang bertumpuk di bawah satu atap. Di tengah perjuangannya menabung, Kaluna dirongrong oleh kekasihnya untuk pesta pernikahan mewah.\r\n\r\nSelain itu, ada juga masalah hutang keluarganya. Masalah-masalah ini menjadikan Kaluna merasa menjadi rakyat jelata saja tidak cukup membuat kepalanya mumet luar biasa. Tanisha, ibu satu anak yang menjalani Long Distance Marriage, mencari rumah murah dekat MRT yang juga bisa menampung mertuanya.\r\n\r\nKamamiya, yang berambisi menjadi selebgram, mencari apartemen cantik untuk diunggah ke media sosial demi memenuhi gengsinya agar bisa menikah dengan pria kaya. Danan, anak tunggal tanpa beban yang akhirnya berpikir untuk berhenti hura-hura, dan membeli aset agar bisa pensiun dengan tenang. Apakah keempat sahabat ini berhasil menemukan rumah yang mampu mereka cicil? Dan apakah Kaluna bisa membentuk keluarga yang ia impikan?', 2, 'Almira Bastari', 'Jumlah Halaman\r\n312\r\n\r\nPenerbit\r\nGramedia Pustaka Utama\r\n\r\nTanggal Terbit\r\n15 Feb 2022\r\n\r\nBerat\r\n0.21 kg\r\n\r\nISBN\r\n9786020658049\r\n\r\nLebar\r\n13.5 cm\r\n\r\nBahasa\r\nIndonesia\r\n\r\nPanjang\r\n20cm'),
(8, 2, '9786020523316_Melangkah_UV_Spot_R4-1.jpg', 'Melangkah', 35000.00, 'Novel karya J. S Khairen yang berjudul Melangkah bertemakan tentang petualangan di Indonesia. Tidak hanya itu, cerita dalam novel ini juga mengutamakan kisah pahlawan. Berbeda dari karya-karya yang sebelumnya, di novel ini Khairen memberi sedikit imajinasi yang ia tanamkan. Terdapat 36 episode dan 5 babak.\r\n\r\nSinopsis buku\r\n\r\nListrik padam di seluruh Jawa dan Bali secara misterius. Ancaman nyata kekuatan baru yang hendak menaklukkan Nusantara.\r\n\r\nSaat yang sama, empat sahabat mendarat di Sumba, hanya untuk mendapati nasib ratusan juta manusia ada di tangan mereka! Empat mahasiswa ekonomi ini, harus bertarung melawan pasukan berkuda yang bisa melontarkan listrik! Semua dipersulit oleh seorang buronan tingkat tinggi bertopeng pahlawan yang punya rencana mengerikan.\r\n\r\nTernyata pesan arwah nenek moyang itu benar-benar terwujud. “Akan datang kegelapan yang berderap, bersama ribuan kuda raksasa di kala malam. Mereka bangun setelah sekian lama, untuk menghancurkan Nusantara. Seorang lelaki dan seorang perempuan ditakdirkan membaurkan air di lautan dan api di pegunungan. Menyatukan tanah yang menghujam, dan udara yang terhampar.”\r\n\r\nKisah tentang persahabatan, tentang jurang ego anak dan orangtua, tentang menyeimbangkan logika dan perasaan. Juga tentang melangkah menuju masa depan. Bahwa, apa pun yang menjadi luka masa lalu, biarlah mengering bersama waktu.', 2, 'J.S. Khairen', 'Jumlah Halaman\r\n368.0\r\n\r\nPenerbit\r\nGramedia Widiasarana Indonesia\r\n\r\nTanggal Terbit\r\n22 Mar 2020\r\n\r\nBerat\r\n0.25 kg\r\n\r\nISBN\r\n9786020523316\r\n\r\nLebar\r\n13.5 cm\r\n\r\nBahasa\r\nIndonesia\r\n\r\nPanjang\r\n20.0cm'),
(12, 9, 'Atomic_Habits_C-FRONT_HC_-_Mockup.png', 'Atomic Habits', 90000.00, 'Atomic Habits: Perubahan Kecil yang Memberikan Hasil Luar Biasa adalah buku kategori self improvement karya James Clear. Pada umumnya, perubahan-perubahan kecil seringkali terkesan tak bermakna karena tidak langsung membawa perubahan nyata pada hidup suatu manusia. Jika diumpamakan sekeping koin tidak bisa menjadikan kaya, suatu perubahan positif seperti meditasi selama satu menit atau membaca buku satu halaman setiap hari mustahil menghasilkan perbedaan yang bisa terdeteksi. Namun hal tersebut tidak sejalan dengan pemikiran James Clear, ia merupakan seorang pakar dunia yang terkenal dengan \'habits\' atau kebiasaan. Ia tahu bahwa tiap perbaikan kecil bagaikan menambahkan pasir ke sisi positif timbangan dan akan menghasilkan perubahan nyata yang berasal dari efek gabungan ratusan bahkan ribuan keputusan kecil. Ia menamakan perubahan kecil yang membawa pengaruh yang luar biasa dengan nama atomic habits.', 3, 'James Clear', 'Jumlah Halaman\r\n352.0\r\n\r\nPenerbit\r\nGramedia Pustaka Utama\r\n\r\nTanggal Terbit\r\n17 Jan 2023\r\n\r\nBerat\r\n0.525 kg\r\n\r\nISBN\r\n9786020667188\r\n\r\nLebar\r\n15.0 cm\r\n\r\nBahasa\r\nIndonesia\r\n\r\nPanjang\r\n23.0cm'),
(13, 2, 'ezgu4ahp2qhei2tbvgttvo.jpg', 'Hidangan di Atas Awan', 89000.00, 'Leo ketahuan menipu ayahnya! Selama beberapa tahun, biaya kuliah arsitektur di Australia dari ayahnya malah dipakai untuk belajar di akademi kuliner. Sejak itu hubungan mereka rusak. Mereka berhenti saling bicara, sementara sang ibu menjadi penengah yang turut dipersalahkan.\r\n\r\nLeo lalu pulang ke Indonesia, membawa mimpi dan rasa percaya diri bahwa ia sanggup meraih kesuksesan. Ia pun membangun Argo, restoran pertama, harga diri, dan cinta matinya. Menu-menu diracik, tenaga-tenaga ahli dipekerjakan, program-program promosi disiapkan.\r\n\r\nNamun, Argo tidak menarik pengunjung. Bangku-bangku kian hari kian sepi, pegawai mundur satu per satu, hingga akhirnya Argo bangkrut dan tutup. Dengan berat hati, Leo mengakui kekalahan. Ia mengurung diri di sudut apartemen kecilnya, mempertanyakan ego dan arogansinya. Ternyata membangun bisnis sukses seperti yang ayahnya lakukan tidaklah semudah membalik telapak tangan. Kini Leo dihadapkan pada dua pilihan; bangkit atau tenggelam dalam kekalahan.', 4, 'Silvia Iskandar', 'Jumlah Halaman\r\n256\r\n\r\nPenerbit\r\nGramedia Pustaka Utama\r\n\r\nTanggal Terbit\r\n19 Jun 2024\r\n\r\nBerat\r\n0.18 kg\r\n\r\nISBN\r\n9786020677668\r\n\r\nLebar\r\n13.5 cm\r\n\r\nBahasa\r\nIndonesia\r\n\r\nPanjang\r\n20cm'),
(14, 10, 'kkdcqg8pgmyjkbmglmyfsl.jpg', 'Kekuatan Manipulasi', 50000.00, 'Melalui buku ini, penulis mengajak pembaca untuk memahami lebih dalam tentang teknik manipulasi yang digunakan oleh para penguasa, intel, politikus, dan pebisnis dalam memengaruhi orang lain. Dalam dunia yang dipenuhi dengan berbagai macam strategi manipulatif, penting bagi kita untuk memahami bahwa kekuatan manipulasi bukanlah sekadar alat untuk mencapai tujuan, tetapi juga memiliki dampak yang mendalam terhadap individu dan masyarakat secara keseluruhan.\r\n\r\nDalam eksplorasi ini, kita akan memahami bahwa karisma, kecerdasan, dan daya tarik seseorang tidak selalu murni bawaan lahir, tetapi seringkali merupakan hasil dari penerapan teknik-teknik manipulasi tertentu. Penulis membongkar rahasia di balik penampilan yang berkelas dan ide yang memikat, serta memberikan wawasan tentang bagaimana bahasa dan komunikasi memiliki kekuatan yang tak terduga dalam memengaruhi pikiran dan emosi orang lain. \"Kekuatan Manipulasi\" adalah panduan menyeluruh yang akan membuka mata kita terhadap realitas yang tersembunyi di balik wajah manipulasi modern.', 20, 'Siti Dianah', 'Jumlah Halaman\r\n208\r\n\r\nPenerbit\r\nAnak Hebat Indonesia\r\n\r\nTanggal Terbit\r\n6 Jun 2024\r\n\r\nBerat\r\n0.17 kg\r\n\r\nISBN\r\n9786231648136\r\n\r\nLebar\r\n14 cm\r\n\r\nBahasa\r\nIndonesia\r\n\r\nPanjang\r\n20cm'),
(15, 7, 'ciommurg8emgwtyvxjvbzv.jpg', 'Penelitian Hukum Normatif', 89000.00, 'Buku ini memuat materi materi yang menjadi dasar penelitian hukum normatif dan juga memuat substansi, pedoman dan contoh penelitian hukum normatif. Buku ini juga memuat pedoman penelitian dan penulisan hukum normatif yang belum dibahas dalam buku-buku penelitian hukum normatif lainnya. Pada hakikatnya memang praktik penelitian dan penulisan hukum normatif itu sendiri senantiasa berubah dari masa ke masa sehingga diperlukan juga referensi hukum yang mengikuti praktik dan perkembangan yang ada.\r\n\r\nBuku Penelitian Hukum Normatif ini juga membahas aneka pendekatan, metode dan ilmu bantu termasuk model penulisan studi kasus. Demikian juga buku ini juga mengajak para pembaca untuk memahami penelitian hukum normatif secara terapan dengan berbagai macam contoh draft dan pedoman yang dipergunakan dalam praktik penelitian hukum normatif baik secara dasar hingga tingkat lanjut.', 12, 'Dr. Rio Christiawan, S.H., M.Hum., M.Kn. dan Dr. Tuti Widyaningrum S.H., M.H.', 'Jumlah Halaman\r\n98\r\n\r\nPenerbit\r\nRajawali Pers\r\n\r\nTanggal Terbit\r\n19 Mar 2024\r\n\r\nBerat\r\n0.11 kg\r\n\r\nISBN\r\n9786230808326\r\n\r\nLebar\r\n15 cm\r\n\r\nBahasa\r\nIndonesia\r\n\r\nPanjang\r\n23cm'),
(16, 7, 'j8tu3hamu5d7ngscijnrup.jpg', 'Monograf Pembaruan Hukum', 105000.00, 'Monograf Pembaruan Hukum: Narasi Epistemik Perwujudan Tatanan Hukum Nasional yang Responsif\r\n\r\nIndonesia mengalami banyak fase kehidupan, terutama fase bernegara dan masyarakat Indonesia semakin berharap dapat mewujudkan tujuan negara dan cita hukum nasional yaitu keadilan sosial bagi seluruh rakyat Indonesia. Di samping itu, masyarakat juga menuntut adanya sistem dan tatanan hukum yang mengedepankan asas equality before the law sebagai cerminan konklusivitas dari Pancasila sebagai sumber dari segala tertib hukum yang harus diwujudkan.\r\n\r\nBuku ini berisi tulisan-tulisan mengenai dinamika hukum di Indonesia, terutama dikaitkan dengan upaya pembaruan hukum dan perwujudan tata hukum nasional yang responsif terhadap perkembangan zaman dan kebutuhan berhukum yang ada di masyarakat.\r\n\r\n', 3, 'Prof. Dr. Faisal Santiago, S.H., M.M.', 'Jumlah Halaman\r\n262\r\n\r\nPenerbit\r\nPrenada\r\n\r\nTanggal Terbit\r\n13 Mei 2023\r\n\r\nBerat\r\n0.265 kg\r\n\r\nISBN\r\n9786023831586\r\n\r\nLebar\r\n15 cm\r\n\r\nBahasa\r\nIndonesia\r\n\r\nPanjang\r\n22cm'),
(17, 4, '76yhqhxwpjevxhgzfy7vf4.jpg', 'Ekonomi Makro', 40000.00, 'llmu ekonomi dibagi menjadi dua yaitu ekonomi mikro dan ekonomi makro. Kelahiran ekonomi makro dilatarbelakangi depresi besar dunia yang melanda negara-negara maju dan meluas ke seluruh dunia pada tahun 1930 an. Dalam ekonomi makro terdapat tiga permasalahan pokok yang dibahas yaitu inflasi, pertumbuhan output dan pengangguran. Inflasi merupakan gejala kenaikan harga yang berlangsung secara serentak, bila terjadi pada tingkat yang rendah tidak akan membahayakan kondisi perekonomian, tetapi bila terjadi pada tingkat yang tinggi akan sangat merugikan perekonomian karena daya beli masyarakat akan menurun secara tajam. Hal ini berarti terjadi penurunan tingkat kesejahteraan masyarakat terutama yang berpenghasilan kecil dan relatif tetap Sejak manusia mengenal hidup bergaul tumbuhlah suatu kajian yang harus diselesaikan bersama-sama, yakni bagaimana setiap manusia memenuhi kebutuhan hidup mereka masing-masing? Karena kebutuhan seseorang tidak mungkin dapat dipenuhi oleh dirinya sendiri. Makin luas pergaulan mereka maka bertambah kuatlah ketergantungan satu sama lain untuk memenuhi kebutuhannya. Peribahasa pada zaman yunani purbakala mengatakan bahwa manusia adalah \"\'makhluk yang sukar bergaul\" (zoon politicon).', 12, 'Erna Chotidjah Suhatmi, SE.,M.AK, Ecclisia Sulistyowati, SE.,MM', 'Jumlah Halaman\r\n172\r\n\r\nPenerbit\r\nPustaka Baru Press\r\n\r\nTanggal Terbit\r\n20 Des 2023\r\n\r\nBerat\r\n0.19 kg\r\n\r\nISBN\r\n9786023768356\r\n\r\nLebar\r\n15 cm'),
(18, 11, 'gqnnku7mhno5a323drj3aq.jpg', 'The Power Habits of Rasulullah', 67000.00, 'Rasulullah merupakan sosok yang sangat mulia, dan tidak diragukan lagi bahwa kebiasaannya dapat menjadi contoh bagi kita dalam menjalani kehidupan sehari-hari. Dengan membaca buku ini, Anda akan mengetahui setiap detail kebiasaan Rasulullah yang berdampak positif bagi kehidupan kita.\r\n\r\nDalam buku ini, Anda akan menemukan kebiasaan ibadah Rasulullah yang sangat tekun dan konsisten, seperti sholat malam, puasa sunnah, dan membaca Al-Quran setiap hari. Bukan hanya itu, kebiasaan umum Rasulullah seperti berpakaian sederhana, bermusyawarah, dan sabar dalam menghadapi ujian hidup juga akan Anda temukan dalam buku ini.\r\n\r\nTidak ketinggalan, buku ini juga akan membahas kebiasaan makan dan minum Rasulullah yang sangat sehat dan terbukti memberikan manfaat bagi kesehatan tubuh. Rasulullah juga dikenal sebagai sosok yang sangat peduli dengan tindakan sosial, sehingga buku ini juga akan mengungkapkan kebiasaan beliau dalam membantu dan memperhatikan sesama.\r\n\r\n', 9, 'Umi Dilla', 'Jumlah Halaman\r\n208\r\n\r\nPenerbit\r\nYash Media\r\n\r\nTanggal Terbit\r\n17 Jun 2024\r\n\r\nBerat\r\n0.15 kg\r\n\r\nISBN\r\n9786230994876\r\n\r\nLebar\r\n13 cm\r\n\r\nBahasa\r\nIndonesia\r\n\r\nPanjang\r\n19cm'),
(19, 7, 'pcyiba8xdysoehxapo6vug.jpg', 'Pengantar Hukum Indonesia', 125000.00, 'Pengantar Hukum Indonesia merupakan salah satu Matakuliah Dasar Keahlian Hukum yang merupakan matakuliah wajib nasional yang harus ditempuh bagi mahasiswa yang menempuh program studi ilmu hukum di Fakultas Hukum di seluruh universitas di Indonesia.\r\n\r\nBuku Pengantar Hukum Indonesia ini memberikan dasar pengenalan dan pemahaman kepada mahasiswa hukum khususnya tentang hukum positif di Indonesia. Karenanya dalam matakuliah ini akan dijelaskan terlebih dahulu tentang sejarah tata hukum Indonesia dan sistem hukum Indonesia, serta upaya-upaya untuk mewujudkan tata hukum nasional. Selain itu, juga dibahas bidang-bidang hukum yang ada, di antaranya hukum perdata, hukum pidana, hukum tata negara, hukum administrasi serta beberapa materi dari masing-masing bidang hukum tersebut yang pokok dan relevan, dengan tetap mengindahkan sistem hukum dan tata hukum, terlebih pada pembaruan hukum yang sedang berproses saat ini.', 4, 'Dr. Ellyne Dwi Poespasari, Dr. Soelistyowati, S.H., M.H. , Oemar Moechthar, S.H., M.Kn.', 'Jumlah Halaman\r\n360\r\n\r\nPenerbit\r\nPrenadamedia Group\r\n\r\nTanggal Terbit\r\n16 Jun 2024\r\n\r\nBerat\r\n0.365 kg\r\n\r\nISBN\r\n9786233844109\r\n\r\nLebar\r\n15.5 cm\r\n\r\nBahasa\r\nIndonesia\r\n\r\nPanjang\r\n23cm'),
(20, 10, 'sczji28iijpdilpozvhakc.jpg', 'Catatan Kaki dari Gaza', 140000.00, 'Suatu tragedi pada tahun 1956 di Jalur Gaza membuat Joe Sacco, wartawan-kartunis, terjun langsung ke wilayah paling sengit di Bumi itu. Selagi ia menyelidiki peristiwa berdarah tersebut, terjadi penggusuran besar-besaran pada rumah warga, serangan Israel yang membunuh penduduk sipil. Dalam suatu riset, Sacco bahkan nyaris terserempet peluru Israel.\r\n\r\nDalam pencarian atas kebenaran, Joe Sacco pun melanglang dari satu tragedi ke tragedi lain, menyampaikan pesan para gerilyawan, dan mencatat tangis para ibu yang kehilangan rumah, suami, dan anak-anak yang dibunuh prajurit Israel secara brutal.\r\n\r\nCatatan Kaki dari Gaza adalah karya paling ambisius Joe Sacco. Jurnalisme visual khas Joe Sacco menggambarkan tragedi kemanusiaan di atas tanah yang dipertahankan dengan darah dan air mata syuhada. Buku ini menjadi dokumentasi yang penting atas peristiwa pembunuhan rakyat sipil di Jalur Gaza yang kerap menjadi sekadar satu catatan kaki dalam sejarah. Sejarah pembantaian rakyat sipil yang selalu berulang di tanah Palestina.\r\n\r\n“Sacco berbakat besar. Reporter yang jeli… sekaligus seniman mumpuni dengan gambar-gambar kaya nuansa yang meniti jalur di antara gaya kartun dan naturalisme.” —Charles Shaar Murray, Independent\r\n\r\n“Prestasi terbesar Sacco adalah menggambarkan penindasan memilukan dan horor dalam bentuk yang menenangkan sekaligus meresahkan.” —David Thompson, Observer\r\n\r\n“Salah seorang kartunis paling orisinal dalam dua dasawarsa terakhir.” —Duncan Campbell, Guardian\r\n\r\nProfil Penulis:\r\nJOE SACCO, salah seorang kartunis paling terkemuka dunia, dikenal luas sebagai kreator komik reportase perang. Salah satu bukunya adalah Palestine, yang meraih American Book Award, dan Safe Area Goražde, yang memenangi Eisner Award, menjadi salah satu New York Times Notable Book dan komik terbaik tahun 2000 menurut majalah Time. Buku-bukunya telah diterjemahkan ke dalam empat belas bahasa dan reportase komiknya telah terbit di Details, New York Times Magazine, Harper’s, dan Guardian. Dia tinggal di Portland, Oregon\r\n', 4, 'Joe Sacco', 'Jumlah Halaman\r\n432\r\n\r\nPenerbit\r\nGramedia Pustaka Utama\r\n\r\nTanggal Terbit\r\n2 Jun 2024\r\n\r\nBerat\r\n0.5 kg\r\n\r\nISBN\r\n9786020308500\r\n\r\nLebar\r\n19.7 cm\r\n\r\nBahasa\r\nIndonesia\r\n\r\nPanjang\r\n26.4cm'),
(21, 6, 'ID_HCO2015MTH09WSDNDG_B.jpg', 'Why Science Does Not Disprove God', 79000.00, 'The renowned science writer, mathematician, and bestselling author of masterfully refutes the overreaching claims of the New Atheists, providing millions of educated believers with a clear, engaging explanation of what science really says, how there\'s still much space for the Divine in the universe, and why faith in both God and empirical science are not mutually exclusive\r\n\r\nIn recent years a highly publicized coterie of scientists and thinkers, including Richard Dawkins, the late Christopher Hitchens, and Lawrence Krauss, have vehemently contended that breakthroughs in modern science have disproven the existence of God, asserting we must accept that the creation of the universe came out of nothing, that religion is evil, that evolution fully explains the dazzling complexity of life, and more. However, in this much-needed book, veteran science journalist Amir Aczel profoundly disagrees and convincingly demonstrates that science has not, as yet, provided any definitive proof refuting the existence of God.\r\n\r\nBased on interviews with eleven Nobel Prize winners and many other prominent physicists, biologists, anthropologists, and psychologists, as well as leading theologians and spiritual leaders, is a fascinating tour through the history of science and a brilliant and incisive analysis of the religious implications of our ever-increasing understanding of life and the universe. Throughout, Aczel reminds us that science, at its best, is about the dispassionate pursuit of truth not a weapon in cultural debates. Respectful of both science and faith and argued from the perspective of no single religious tradition Aczel\'s book is an essential corrective that should be read by all.', 3, 'Amir Aczel', 'Jumlah Halaman\r\n0\r\n\r\nPenerbit\r\nHarper Collins\r\n\r\nTanggal Terbit\r\n16 Sep 2015\r\n\r\nBerat\r\n0.0 kg\r\n\r\nISBN\r\nSCOOPG84780\r\n\r\nLebar\r\n0.0 cm\r\n\r\nBahasa\r\neng\r\n\r\nPanjang\r\n0.0cm'),
(22, 12, '9786022497301_Ensiklopedia-Sains-Usborne.jpg', 'Ensiklopedia Sains', 2345.00, 'p', 2, 'Silvia Iskandar', 'lorem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `is_admin`) VALUES
(5, 'lutfi.mdn', '$2y$10$rfMgZHOsyKEp7TTt2FTVZO7fqJcDwKULnm/yThgrUR.0W7YCRI1Qa', 'linerangers89@gmail.com', 0),
(6, 'elvita', '$2y$10$7mm2FAf091gG7mfGEo7EBegepHotXrZndDBo2BQOtHSA4C3HgxzA6', 'linerangers89@gmail.com', 0),
(99, 'admin', '$2y$10$rfMgZHOsyKEp7TTt2FTVZO7fqJcDwKULnm/yThgrUR.0W7YCRI1Qa', 'admin@gmail.com', 1),
(100, 'user', '$2y$10$9/Ydk24g2QCDctwk1DtSL.KQpQjmxL7./J9WYeSNI6QqS5yq8JIwy', 'linerangers89@gmail.com', 0),
(101, 'wahyu', '$2y$10$nqCk47g08LCKdUtoifkXQeQNenwWSE2tD8ZaFDdyKYp357GLDBWc6', 'wahyu@gmail.com', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_pelanggan`, `id_produk`, `user_id`) VALUES
(1, 1, 6, 1),
(2, 1, 12, 1),
(7, 6, 8, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `products` (`id_produk`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `products` (`id_produk`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `products` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `categories` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `products` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
