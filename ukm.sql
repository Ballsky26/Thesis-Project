-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2022 pada 06.07
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` enum('Pengumuman','Berita') NOT NULL,
  `tanggal_terbit` int(11) NOT NULL,
  `isi_berita` longtext NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `kategori`, `tanggal_terbit`, `isi_berita`, `gambar`) VALUES
(17, 'Harshfood Sukses dengan bisnis Olahan Ikannya ', 'Berita', 1652890958, 'Awal mula terjun pada bisnis makanan olahan dari ikan ini beliau mengaku merasa sangat kesulitan dalam membuat logo dan nama usaha yang tepat. Sehingga akhirnya beliau menemukan sebuah brand yang cocok yaitu Berlian Laut. Usaha beliau ini dibantu oleh Dinas Perikanan Lamongan. Bapak Sutiyono menjelaskan bahwa asal mula beliau memilih nama berlian karena maknanya sangat dalam. Anda tidak akan tahu seberapa berharganya berlian jika dapat mengolahnya dengan benar. Begitu pula dengan dengan olahan dari ikan laut. Ketika Anda tidak mampu mengolahnya dalam bentuk olahan lain maka produk ikan laut tersebut tidak akan memiliki harga yang tinggi. Maka hal itulah yang memantapkan ibu Shofia untuk memilih mengolah ikan laut menjadi olahan yang bernilai ekonomis lebih tinggi.  Pada awal mula bisnis olahan dari ikan ini beliau rintis Sutiyono masih sibuk melakukan berbagai macam uji coba resep membuat produk abon. Beliau mengaku bahwa dalam membuat abon ikan ini benar – benar dari nol sehingga berulang kali menghasilkan produk yang gagal. Beliau juga sempat belajar dari seorang kenalannya yang merupakan koki kapal pesiar yang ahli dalam membuat abon ikan. Dari sahabatnya itulah Sutiyono akhirnya mampu menemukan komposisi yang tepat dan pas dalam memproduksi abonnya, yakni abon ikan tuna. Selain ikan tuna, ternyata masih banyak jenis ikan air laut lainnya yang bisa Anda olah untuk dijadikan sebuah peluang usaha.\r\nPada awal memproduksi abon tuna beliau mengaku belum mempunyai peralatan yang memadai. Modal awal yang beliau keluarkan untuk uji coba resep abon berkisar antara 200 – 300 ribu rupiah. Saat itu Bapak Sutiyono masih menggunakan alat peniris abon manual sehingga abon yang dihasilkan tidak benar – benar kering dan hal itu sangat berpengaruh terhadap keawetan abon buatannya. Namun saat ini beliau akhirnya mampu membeli mesin produksi yang mendukung proses pembuatan abonnya.\r\nSetelah sukses dengan produk olahan dari ikan yang berupa abon, Bapak Sutiyono mencoba untuk mengembangkan produknya dengan membuat kerupuk ikan. Pada awalnya beliau bekerja sama dengan tetangganya yang merupakan seorang produsen kerupuk. Kerupuk yang dihasilkan diluar dugaan ternyata laku keras dan penjualannya semakin meningkat. Namun di tengah perjalanan tetangga Bapak Sutiyono memilih untuk berhenti membantu beliau dikarenakan merasa sudah lelah dan menyerahkan sepenuhnya produksi olahan dari ikan tersebut kepada Bapak Sutiyono.\r\nBersama dengan beliau dan dibantu dengan satu orang karyawan, akhirnya Bapak Sutiyono meneruskan pembuatan kerupuk ikannya sendiri. Menurut beliau, produk kerupuknya akan laku keras pada saat musim kemarau tiba dan pada saat musim penghujan penjualan kerupuk olahan dari ikan miliknya tersebut akan sedikit mengalami penurunan penjualan. Dalam membuat kerupuk ikan, Bapak Sutiyono mengaku mampu menghasilkan sekitar kurang lebih 30 kg dalam sehari\r\nStrategi Pemasaran Ala Bapak Sutiyono\r\nMenurut beliau, strategi pemasaran dalam berbisnis sangat berpengaruh sekali pada penjualan sebuah produk. Shofia mengakui bahwa pemasaran yang dilakukan secara online sangat membantu beliau dalam memperkenalkan produknya ke para konsumen. Pada tahun 2013 produk olahan dari ikan yang beliau buat laku sangat kencang dan orang – orang mulai mencari produk dari Berlian Laut untuk dikonsumsi. Saat ini produk Berlian Laut telah berhasil menembus pasar nasional. Produk tersebut telah dipasarkan ke berbagai daerah seperti Sulawesi, Kalimantan, Lampung, Jawa Barat dan bagian lain di Indonesia\r\nSebelum menggunakan pemasaran secara online omzet usaha olahan dari ikan miliknya menghasilkan keuntungan berada pada kisaran 1 juta – 2 juta perbulannya. Kini omzet tersebut meningkat menjadi 5 kali lipatnya yaitu sekitar 7 – 10 juta setiap bulannya. Hal ini bisa beliau capai karena menggunakan pemasaran secara online dimana dengan cara tersebut pangsa pasar yang bisa dicapai bisa menjangkau seluruh Indonesia\r\n', 'Tidak_berjudul.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `waktu` enum('08.00-08.45','08.45-09.30','09.30-09.45','09.45-10.30','10.30-11.15') NOT NULL,
  `pemateri` varchar(255) NOT NULL,
  `profil_pemateri` varchar(255) NOT NULL,
  `status` enum('Buka','Tutup') NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `materi_pelatihan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama_kegiatan`, `tanggal_mulai`, `waktu`, `pemateri`, `profil_pemateri`, `status`, `tempat`, `materi_pelatihan`) VALUES
(1, 'Pelatihan Pembuatan Ikan Asap                                                                                                                                                                                                                                  ', '2022-08-20', '09.30-09.45', 'Dr. Bambang Gatot Ariyono                                  ', 'DR_+Bambang+Gatot+Ariyono3.jpg', 'Buka', 'Gedung Tenant', 'PELATIHAN_WIRAUSAHA_BAGI_PELAKU_USAHA_KECIL_DAN_ME2.pdf'),
(2, 'Pelatihan Produk Makanan                                                                                                                                                                                                                                       ', '2022-08-21', '10.30-11.15', 'Hari Edi Soekirno, SE, MA', '104710381_3629149647113485_7762981809606409503_n1.jpg', 'Buka', 'Gedung Tenant', '1-_Motivasi_usaha_TKM1.pdf'),
(3, 'Pelatihan Pengemasan Produk                                                                                                                                                                                                                                    ', '2022-08-22', '09.30-09.45', 'Halim Hasibuan', 'image-21.jpg', 'Buka', 'Gedung Tenant', 'Modul-Panduan-Pelatihan-Tata-Cara-Penyusunan-Rencana-Bisnis_2.pdf'),
(4, 'Pelatihan Pengurusan Produk                                                                                                                                                                                                                                    ', '2022-08-23', '09.45-10.30', 'Ir. Agus Siswanto', 'bang-read1-akan-menyelenggarakan-pelatihan-online-khusus-bagi-para_201231100107-3541.jpg', 'Buka', 'Gedung Tenant', '1-_Motivasi_usaha_TKM2.pdf'),
(5, 'Pelatihan Olahan Ikan Mentah                                                                                                                                                                                                                                   ', '2022-08-24', '10.30-11.15', 'Esa Budi Aji', 'BJB-GRATIS31.jpg', 'Buka', 'Gedung Tenant', '1-_Motivasi_usaha_TKM3.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `tagline_produk` varchar(255) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_telpon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `foto_produk2` varchar(255) NOT NULL,
  `foto_produk3` varchar(255) NOT NULL,
  `foto_produk4` varchar(255) NOT NULL,
  `foto_produk5` varchar(255) NOT NULL,
  `profil_usaha` longtext NOT NULL,
  `tentang_usaha` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`id`, `nama_produk`, `tagline_produk`, `deskripsi_produk`, `nik`, `nama_pemilik`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `nomor_telpon`, `email`, `password`, `is_active`, `role_id`, `foto_profil`, `foto_ktp`, `foto_produk`, `foto_produk2`, `foto_produk3`, `foto_produk4`, `foto_produk5`, `profil_usaha`, `tentang_usaha`) VALUES
(20, 'Budidaya Ikan Hias', 'Cuppang Dan Guppy', 'Pokja Ikan Hias Pekalongan Produk Cuppang Dan Guppy Di Kota Pekalongan. Menyediakan Aquarium Hias', '3378902564326145', 'Aji Putranto', 'Laki-Laki', '1980-04-05', 'Setono Rt/Rw. 03/07 Kel. Dekoro Pekalongan Timur  ', '085229219709', 'Zainpuzzle123@gmail.com', '$2y$10$NrG69I6B1Vlei8IBvEOBteifEp.80Yd0JttPg.np33iO1EfWauyKi', 1, 3, '42393387-9c5c-4be4-97b8-49260708719e.jpeg', 'Scan_KTP-el_-_MARTHEN_GOMBO_(Depan).jpg', 'ikan7.png', 'ikan2.png', 'ikan9.png', 'ikan51.png', 'ikan8.png', 'Salah satu komunitas pecinta dan budidaya ikan hias dan guppy di Kota Pekalongan.                                 Memiliki daya tarik yang istimewa dari berbagai segi keindahan aneka ragam ikan hias dengan harga yang realtif murah. Ditangani oleh pekerja yang berwawasan lebih mengenal ikan hias dan                                 berpengalaman yang mengerti tentang keinginan konsumen. Didukung dengan peralatan yang lengkap dan berbagai aksesoris untuk mempercantik aquarium.', 'Awal Merintis Usaha -	Harga jual ikan hias yang terbilang tinggi membuat bisnis ini banyak di bidik orang apalagi di tengah kondisi pandemi seperti sekarang, tidak sedikit dari kita yang mulai sibuk mencari-cari hobi baru untuk mengisi waktu. Awal Budidaya -	Pada awal budidaya ikan hias pemilik hanya membutuhkan satu unit akuarium untuk memulai budidaya ikan hias. Promosi Awal -	Pemilik mengupload gambar ikan hias yang akan jual sebaik mungkin untuk diupload ke berbagai akun media sosial. Progress Sampai Sekarang -	Perkembangan produksi dari tahun ketahun juga telah menjadikan produk ini dikenal oleh konsumen dan pelanggannya. Dengan berbagai keuntungan yang bisa didapat dari hobi mengoleksi ikan hias ini tentu saja memanfaatkannya sebagai peluang usaha baru di musim pandemi seperti ini adalah keputusan yang cerdas.'),
(21, 'Si Panen', 'Udang Vanamei', 'Udang Yang Berkualitas Dengan Hasil Yang Memuaskan', '3367812563478920', 'Mohammad Azmi', 'Laki-Laki', '1965-02-01', 'Perum Limas Krapyak Pekalongan Utara', '081809684727', 'Salam@sipanen.com', '$2y$10$qQfklrzn6PuunPu4Znjh4OTgQ6hU6zkZRB6wN2P7OlToD4n3cV7We', 1, 3, 'fe8644c762c90d7b7ff16ed49786cd96.jpg', 'watermark.png', 'udang3.jpeg', 'udang5.jpg', 'udang6.jpg', 'udang11.jpg', 'udang4.jpg', 'PT Sipanen Digital Indonesia (Sipanen) sebagai portal cwodinvestimg terintegrasi Indonesia yang men mengelola secara langsung dana investasi dari para pengguna terdaftar disitus ini. Sipanen berperan menyelenggarakan situs investasi berbasis bagi hasil www.sipanen.com.', 'Awal Merintis Usaha\r\nSejak 2009 lalu, Azmi fokus memelihara udang jenis vaname.\r\nBudidaya Awal\r\nPemilik memanfaatkan teknologi kincir air berkepadatan rendah untuk membantu proses tumbuh kembang udang. Kincir air itu dia modifikasi untuk kemudian dipasang untuk meningkatkan kadar oksigen dalam tambak. Melalui sentuhan tangannya, ia renovasi kincir sehingga berfungsi lebih maksimal dan bisa tahan lama beberapa tahun. Katanya, yang penting perawatan agar mesin tidak terkena air juga dilakukan pengecekan rutin.\r\nPemasaran awalnya hanya didaerah Kota Pekalongan.\r\nProgress Sampai Sekarang\r\nDalam merawat udang, suka duka itu sudah biasa. Gagal panen juga pernah dia alami. Itu semua menjadi tantangan yang harus dihadapi oleh Agus. Dengan tekat kuat dia tetap menekuni budidaya udang ini hingga berhasil. Awalnya, dengan peralatan semi intensif itu, Azmi mulai menata usahanya sebagai mata pencaharian utama. Dengan bibit awal sebanyak 500 ribu udang vaname, dirinya hanya bisa panen 500 kwintal saat belum menggunakan kincir air.'),
(22, 'Frozen Food', 'Kudapan berbahan baku lumatan ikan/surimi', 'Frozen food produksi Hars Food adalah kudapan yang berbahan baku ikan/surimi yang di proses secara hygienis serta memiliki ijin edar MD dari BPOM RI. ', '3345678124567823', 'Sutiyono', 'Laki-Laki', '1967-02-03', 'Jl. Kruing Raya 132 Slamaran Kota Pekalongan', '085385680623', 'Harsfood@gmail.com', '$2y$10$V3TKgBz6NysgAUb/ICoptO9P04kDxPVEVYK3WUy2H8QVM1L8JqkV.', 1, 3, 'harsfood31.png', 'watermark1.png', 'harsfood10.png', 'harsfood6.png', 'harsfood7.png', 'harsfood9.png', 'harsfood18.png', 'Frozen food produksi Hars Food adalah kudapan yang berbahan baku ikan/surimi yang di proses secara hygienis serta memiliki ijin edarcMD dari BPOM RI. Produk ini sangat baik untuk penambahan gizi keluarga. Bisa pula untuk lauk makan memiliki cita rasa gurih dan lezat. Sudah tersedia di Transmart Pekalongan, Go-Food, Go-Bizz maupun Marketplace.', 'Awal Merintis Usaha\r\nBisnis frozen food memungkinkan untuk dilakukan dengan skala rumahan\r\nProduksi Awal\r\nAwal produksi pemilik tidak banyak mengolah bahan olahan mengingat pasar yang dimiliki belum terlalu luas.\r\nPemasaran Awal\r\nPemasaran awalnya hanya didaerah Kota Pekalongan, Tepatnya dibeberapa swalayan dan kios terdekat.\r\nProgress Sampai Sekarang\r\nPerkembangan produksi dari tahun ketahun juga telah menjadikan produk ini dikenal oleh konsumen dan pelanggannya. Hal ini pula yang mengharuskan adanya suatu nama (brand) atas produk yang dihasilkan. Bahkan sudah tersedia di GoBiz dari Gojek misalnya, fitur ini berguna untuk pemesanan secara online yang sudah terintegrasi dengan GoFood. Tidak hanya mempermudah pebisnis, tetapi juga konsumen yang hendak memesan makanan beku dari Anda. Apalagi aplikasi GoBiz ini juga sifatnya mobile dan mudah digunakan.\r\nSampai'),
(23, 'Ida Idola Dan Hatimu Resto', 'Semaksimal Mungkin Memenuhi Permintaan Pembeli', 'Ikan Segar Adalah Yang Utama Karena Untuk Memenuhi Kebutuhan Gizi Juga Sangat Berguna Bagi Tubuh Kita Terutama Untuk Dan Lain Sebagainya.', '3535231235522345', 'Nur Hidayahtul Khosyi’ah', 'Perempuan', '1987-05-09', 'Panjang Wetan Gg. 1 No. 5b Pekalongan Utara', '087711929311', 'Idaidola72@gmail.com', '$2y$10$RtFvW8iPSnukFRKya9aGLOwm5wzZz5hoFEopu8vunk6bNkFeOxZKq', 1, 3, 'pemilik.png', 'watermark2.png', 'ida_idola71.png', 'ida_idola6.png', 'ida_idola8.png', 'ida_idola9.png', 'ida_idola10.png', 'Ikan Segar Adalah Yang Utama Karena Untuk Memenuhi Kebutuhan Gizi Juga Sangat Berguna Bagi Tubuh Kita Terutama Untuk Dha Dan Lain Sebagainya.', 'Awal Merintis Usaha\r\nPuspita Food berdiri mulai tahun 2015\r\nProduksi Awal\r\nAwal produksi pemilik tidak banyak mengolah bahan olahan mengingat pasar yang dimiliki belum terlalu luas.\r\nPemasaran Awal\r\nPemasaran awalnya hanya didaerah Kota Pekalongan, Tepatnya dibeberapa swalayan dan kios terdekat.\r\nProgress Sampai Sekarang\r\nPerkembangan produksi dari tahun ketahun juga telah menjadikan produk ini dikenal oleh konsumen dan pelanggannya. Hal ini pula yang mengharuskan adanya suatu nama (brand) atas produk yang dihasilkan.'),
(24, 'Krupuk Tengiri', 'Renyah Dan Gurih', 'Cemilan Yang Cocok Untuk Teman Santai Dan Juga Cocok Untuk Tambahan Lawuh Disaat Makan Sebagai Kriuk Krupuknya. Rasa Renyah Dan Gurih ', '3375671825641789', 'Mohammad Iskandar', 'Laki-Laki', '1969-02-07', 'Jl. Jlamprang Klego Gg. 1 No. 17a Pekalongan Timur', '08156944800', 'Iskandarputrajaya510@gmail.com', '$2y$10$hKfFgW838ShueZsK2ZwXBOjRjP0mSsHQfXW3dbxyJ9Y7pMgLW4s4y', 1, 3, 'kerupuk1.png', 'watermark3.png', 'kerupuk2.png', '', '', '', '', 'Cemilan Yang Cocok Untuk Teman Santai Dan Juga Cocok Untuk Tambahan Lawuh Disaat Makan Sebagai Kriuk Krupuknya. Rasa Renyah Dan Gurih Sehingga Tidak Eneg Di Mulut, Ingin Lagi Dan Lagi... Gak Mau Berhenti Nyemilnya Serta Tanpa Bahan Pengawet', 'Pengolahan Awal\r\nPengolahan industri Kerupuk Ikan Tenggiri di Kecamatan Karimun ini masih bersifat tradisional dimana alat-alat yang digunakan masih menggunakan tenaga manusia (manual).\r\nPengemasan\r\nPerbandingan kemasan dari produk kerupuk Ikan Tenggiri dengan kerupuk atom olahan ikan adalah, jika kerupuk Ikan Tenggiri kemasan berwarna plastik bening dan terdapat sablon merek.\r\nPemasaran\r\nDalam memasarkan Kerupuk Ikan Tenggiri, pemilik usaha industri Kerupuk tenggiri memberikan variasi ukuran kemasan guna mengikuti selera kebutuhan konsumen. Pada umumnya pemilik usaha kerupuk ini memasarkan produk olahan mereka melalui pedagang grosir, karena proses pemasaran tidak begitu rumit dan menyita banyak waktu, serta volume permintaan barang yang akan dijual cukup besar jika dipasarkan ke pedagang grosir.\r\nProgress Sampai Sekarang\r\nPerkembangan produksi dari tahun ketahun juga telah menjadikan produk ini dikenal oleh konsumen dan pelanggannya. Hal ini pula yang mengharuskan adanya suatu nama (brand) atas produk yang dihasilkan.'),
(25, 'Rumput Laut', 'Pemenuhan Permintaan Hasil Rumput Laut', 'Rumput laut berkualitas dan bagus ada di sini', '3123453678890567', 'Kamal Hadi', 'Laki-Laki', '1970-12-04', 'Jl. Selat Karimata Rt/Rw. 03/04 Bandengan Pekalongan Utara', '085738137862', 'Kamalrumput@gmail.com', '$2y$10$njOoQOb/R9ij0NIS4NK/DuRxmetnlzBdRqemlKandaU0fcxz2lSXO', 1, 3, 'bibit.jpg', 'watermark4.png', 'pengeringan.jpg', 'panen1.jpg', '', 'bibit1.jpg', 'metode-kja-optimalkan-hasil-rumput-laut.jpg', 'Rumput laut yang banyak dimanfaatkan adalah dari jenis ganggang merah (Rhodophyceae) karena mengandung agar - agar, keraginan, porpiran, furcelaran maupun pigmen fikobilin (terdiri dari fikoeretrin dan fikosianin) yang merupakan cadangan makanan yang mengandung banyak karbohidrat. Tetapi ada juga yang memanfaatkan jenis ganggang coklat (Phaeophyceae). Ganggang coklat ini banyak mengandung pigmen klorofil a dan c, beta karoten, violasantin dan fukosantin, pirenoid, dan lembaran fotosintesa (filakoid). Selain itu ganggang coklat juga mengandung cadangan makanan berupa laminarin, selulose, dan algin. Selain bahan - bahan tadi, ganggang merah dan coklat banyak mengandung jodium.', 'Penanaman Bibit\r\nBibit yang akan ditanam adalah talus yang masih muda dan berasal dari ujung talus tersebut. Saat yang baik untuk penebaran maupun penanaman benih adalah pada saat cuaca teduh (tidak mendung) dan yang paling baik adalah pagi hari atau sore hari menjelang malam.\r\nPerawatan selama Pemeliharaan\r\nSeminggu setelah penanaman, bibit yang ditanam harus diperiksa dan dipelihara dengan baik melalui pengawasan yang teratur dan kontinu (adanya penyakit ice-ice, ikatan bibit lepas, bibit rusak, adanya hama tritip, dan lain sebagainya). Pengawasan ini dimaksudkan sebagai upaya untuk melakukan penggantian bibit atau membersihkan dari kotoran atau hama yang mungkin muncul. Bila kondisi perairan kurang baik, seperti ombak yang keras, angin, serta suasana perairan yang banyak dipengaruhi kondisi musim (hujan/kemarau), perlu pengawasan 2-3 hari sekali.\r\nPemanenan\r\nPemanenan dapat dilakukan bila rumput laut telah mencapai bobot tertentu, yakni sekitar empat kali bobot awal (waktu pemeliharaan 1,5-4 bulan). Cepat tidaknya pemanenan bergantung metode dan perawatan yang dilakukan setelah bibit ditanam.\r\nPengeringan Hasil Panen\r\nPenanganan pascapanen, termasuk pengeringan yang tepat sangat perlu, mengingat pengaruh langsungnya terhadap mutu dan harga penjualan di pasar.'),
(26, 'Cold Storage', 'Membuat Produk Ikan Segar Menjadi Lebih Awet', 'Jasa Penyimpanan Ikan Segar/Kering, Jasa Prosesing Ikan Siap Export Dan Jasa Termoking Ikan', '3389092678354671', 'Kisyono', 'Laki-Laki', '1990-06-06', 'Jl. Pantaisari Panjang Wetan Pekalongan Utara', '08156567587', 'Kop.smb@gmail.com', '$2y$10$F4frccWrqDk2a7i3vE36QeV1/YjcvgApAtziP25rbpJCH9z3OP2b6', 1, 3, 'kisyono5.png', 'watermark5.png', 'kisyono2.png', 'kisyono7.png', 'kisyono8.png', 'kisyono3.png', 'kisyono.png', 'Cold storage saat ini tersedia 30 ton dan 100 ton dikelola Technopark Pekalongan. Kegiatannya antara lain menyimpan bahan baku ikan makerel yang didatangkan dalam bentuk beku sebelum di kirim ke pabrik pengalengan ikan. Selain itu digunakan untuk menyimpan ikan kelebihan hasil pelelangan di TPI sebagai ikan beku serta ikan filet. Cold storage memiliki peran penting dalam rantai nilai dingin perikanan.', 'Cold Storage adalah salah satu alat penunjang yang berfungsi sebagai tempat penyimpanan hasil tangkapan nelayan guna menjaga kwalitas hasil tangkapan. Cold Storage dilihat dari fungsi dan kegunaannya mempunyai peranan penting untuk menjaga kwalitas hasil tangkapan nelayan sebelum akhirnya didistribusikan ke konsumen, sehingga peranan Cold Storage juga dapat menjaga harga jual tangkapan nelayan tidak mengalami penurunan disaat hasil tangkapan sedang menurun. Manfaat penggunaan cold storage pada ikan adalah untuk menghindari kontaminasi dari bakteri, mempertahankan ikan agar tetap terjaga kualitasnya. Mengurangi kadar air dan juga mempertahankan kadar nutrisi tetap terjaga. Fungsi ini harus diketahui untuk penyimpanan bahan baku tertentu karena jika tidak diletakkan pada tempat yang sesuai akan menghilangkan kualitas dari bahan baku itu sendiri. Sebenarnya fungsi dari 4 jenis dari cold storage itu sama, yaitu untuk menyimpan produk dengan baik dengan waktu tertentu atau dengan jangan waktu yang lebih lama untuk dijadikan stock. Untuk menyimpan dan distribusi produk dari dalam penyimpanan cold storage ini harus SOP sendiri dari perusahaan itu sendiri dan sesuai dengan kegiatan bisnis perusahaan tersebut. Perusahaan yang biasanya menggunakan cold storage adalah perusahaan yang bergerak dalam bidang industri es, ikan dan seafood, daging, buah, sayur, dan makanan segar lainnya. Cold storage terbuat dari bahan stainless steel anti karat dan bahan penahan dinginnya terbuat dari polyuerethane dengan bentuk plat yang disusun sehingga menjadi ruangan pendingin yang besar. Suhu pada ruangan cold storage pun dapat diatur sesuai kebutuhan yang diperlukan, pengaturan suhu pada cold storage dapat memperpanjang umur komoditas ikan (extended shelf life).'),
(27, 'Ramysa', 'Olahan Ikan Bandeng Berkualitas', 'Ada 3 macam, bandeng presto,otak otak bandeng, pepes bandeng presto, abon ikan, otak otak bakar, kerupuk amplang', '3321456789012356', 'Yuni Markanto', 'Perempuan', '1964-01-01', 'Jl. Wr supratman no. 4 kel. Kandang panjang, pekalongan utara', '08179554080', 'Yunimarkanto@gmail.com', '$2y$10$Y.CnsOuPAMbd1chc60fIcuNskmEbFYGQfDr7vceZsjmmZpqHTU1cO', 1, 3, 'pemilik.jpeg', 'watermark6.png', 'bandeng_pepes.jpeg', 'Otak_bakar.jpeg', 'sambal_ikan_ku.jpg', 'amplang.jpeg', 'ikan_abon.jpeg', 'Peluang Usaha Olahan Ikan Menjanjikan - Karena dikelilingi lautan уаng luas, tіdаk mengherankan јіkа Indonesia memiliki pasokan makanan laut уаng berlimpah seperti ikan. Ditambah lаgі adanya perkembangan teknologi ѕаngаt membantu para pelaku bisnis tеrutаmа dalam proses produksi dan membuatnya menjadi lebih efesien.\r\n\r\nPeluang usaha bisnis olahan ikan mаѕіh ѕаngаt luas. Tіdаk ada salahnya јіkа Andа mencoba peruntungan pada usaha olahan ikan. Yаng terpenting аdаlаh keseriusan Andа untuk menciptakan produk уаng memiliki kualitas unggul. Itulah bеbеrара aneka olahan ikan уаng bіѕа menjadi ide untuk Andа dalam berbisnis. Agar memenangkan persaingan dalam usaha olahan ikan, Andа harus mampu bersaing dаrі sisi harga, kualitas, produk, serta pelayanan.', 'Awal Merintis Usaha\r\nPuspita Food berdiri mulai tahun 2015\r\nProduksi Awal\r\nAwal produksi pemilik tidak banyak mengolah bahan olahan mengingat pasar yang dimiliki belum terlalu luas.\r\nPemasaran Awal\r\nPemasaran awalnya hanya didaerah Kota Pekalongan, Tepatnya dibeberapa swalayan dan kios terdekat.\r\nProgress Sampai Sekarang\r\nPerkembangan produksi dari tahun ketahun juga telah menjadikan produk ini dikenal oleh konsumen dan pelanggannya. Hal ini pula yang mengharuskan adanya suatu nama (brand) atas produk yang dihasilkan.'),
(28, 'Olahan Ikan Puspita', 'Olahan Ikan Bermanfaat dan Enak', 'Bakso Ikan, Tahu Bakso Ikan, Siomay Ikan, Kepiting Asam Manis', '3331224242525252', 'Ratnaningsih', 'Perempuan', '1976-06-07', 'Jl. Wr Supratman 104b Panjang Wetan Kota Pekalongan', '085842211819', 'Yus.wanto2807@gmail.com', '$2y$10$AZ6gwTtjrPxnLN/F21DPQ.f9VMpUb7hNagVmMw09qqOuZNd8/5wgq', 1, 3, 'profil.jpeg', 'watermark7.png', 'orakarik.jpeg', 'olahan_ikan.jpeg', 'bakso_ikan.jpeg', 'olahan_ikan3.jpeg', 'sambal.jpeg', 'Usaha Puspita Food yang dijalankan oleh ibu Ratnaningsih adalah usaha rumah tangga (home industry) yang bergerak di bidang pengolahan aneka olahan ikan. Dapat dikatakan sebagai usaha rumah tangga karena dijalankan dirumah sendiri dan menggunakan keluarga sendiri sebagai tenaga kerja.sampai saat ini modal diupayakan dan diperoleh dari usahanya sendiri. Ia tidak menginginkan upaya penambahan modal dari pihak ketiga seperti pinjaman dari perbankan, pinjaman dari lembaga keuangan, maupun dari persahaan non bank lainnya.', 'Awal Merintis Usaha\r\nPuspita Food berdiri mulai tahun 2015\r\nProduksi Awal\r\nAwal produksi pemilik tidak banyak mengolah bahan olahan mengingat pasar yang dimiliki belum terlalu luas.\r\nPemasaran Awal\r\nPemasaran awalnya hanya didaerah Kota Pekalongan, Tepatnya dibeberapa swalayan dan kios terdekat.\r\nProgress Sampai Sekarang\r\nPerkembangan produksi dari tahun ketahun juga telah menjadikan produk ini dikenal oleh konsumen dan pelanggannya. Hal ini pula yang mengharuskan adanya suatu nama (brand) atas produk yang dihasilkan.'),
(29, 'Ikan Kering Hidayah Sukses', 'Ikan Kering Alami Non Kimia', 'Ikan kering Hidayah Sukses merupakan olahan ikan kering alami tanpa Obat dan Pengawet. Di produksi dengan bahan baku Berkualitas. Serta di kerjakan oleh pekerja yang Kompeten dan Berpengalaman. Penyebaran pasaran di kalangan pasar-pasar di INDONESIA. Deng', '3123232613232424', 'Rizky Febriansyah', 'Laki-Laki', '1970-02-08', 'Gudang H.Sutoyo Jl. Makadam no.7 Kelurahan Panjang Wetan, Pekalongan Utara, Kota Pekalongan.', '081995190222', 'Rezfeb@gmail.com', '$2y$10$4RlGk.tCtWelJZAExRvNA.vYWElRxSouYxDuK/BG2QSvWDSgdfTGS', 1, 3, 'ikan_kering6.png', 'watermark8.png', 'ikan_kering12.png', 'ikan_kering.png', 'ikan_kering21.png', 'ikan_kering4.png', 'ikan_kering7.png', 'Ikan kering Hidayah Sukses merupakan olahan ikan kering alami tanpa Obat dan Pengawet. Di produksi dengan bahan baku Berkualitas. Serta di kerjakan oleh pekerja yang Kompeten dan Berpengalaman. Penyebaran pasaran di kalangan pasar-pasar di Indonesia. Dengan harga yang terjangkau, produk ini sangatlah bisa buat dikonsumsi semua kalangan.', 'Awal Merintis Usaha\r\nBermodalkan pengetahuan yang didapatkan saat bekerja di tempat pengelolaan ikan di pekalongan Rizky Febriansyah pertama kali membuka usaha ikan kering di pekalongan utara.\r\nProduksi Awal\r\nAwal produksi pemilik tidak banyak mengolah bahan olahan mengingat pasar yang dimiliki belum terlalu luas.\r\nPemasaran Awal\r\nIkan kering yang diproduksinya hanya dititipkan ke saudara atau teman-temannya dengan harapan ada yang membelinya.\r\nProgress Sampai Sekarang\r\nPerkembangan produksi dari tahun ketahun juga telah menjadikan produk ini dikenal oleh konsumen dan pelanggannya. Hal ini pula yang mengharuskan adanya suatu nama (brand) atas produk yang dihasilkan. Melihat peluang mengekspor ikan kering lebih besar, karena permintaan termasuk tinggi, bahkan ada pelanggan yang membeli langsung. Terkait itu, ia mencoba memproduksi ikan kering khusus impor meski tak melupakan produksi untuk pasar lokal.'),
(30, 'Pakan Ikan Lestari', 'Pakan Ikan Ramah Lingkungan', 'Pakan Ikan Lestari merupakan pakan ikan apung untuk berbagai jenis ikan dengan memanfaatkan dan menggunakan bahan pakan dari limbah.', '3344546325232576', 'Ir. Trisno Rahardjo', 'Laki-Laki', '1983-07-03', 'Jl. Damar Vi No. 165 Kel. Krapyak Kec. Pekalongan Utara Kota Pekalongan', '085727428633', 'Trisnorahardjo165@gmail.com', '$2y$10$iIZPSAvKU1ipzVpxhEiy5eI1aWGGaDjXndw6XjnxWza8Aeoh5uOom', 1, 3, 'trisno.png', 'watermark9.png', 'trisno3.png', '', 'trisno10.png', '', 'trisno5.jpg', 'Pakan Ikan Lestari merupakan pakan ikan apung untuk berbagai jenis ikan dengan memanfaatkan peluang yang ada dengan menggunakan bahan pakan dari limbah industri pertanian yang relatif murah dan masih memenuhi kandungan gizinya. Meningkatkan pendapatan petani ikan melalui harga pakan yang murah, Bahan baku lokal yang tersedia secara kontinyu dan tenaga kerja produksi yang cukup berpengalaman', 'Awal Merintis Usaha\r\nPeningkatan akan usaha pembudidayaan ikan ini membuat usaha lain seperti pelaku usaha pakan ikan juga memiliki keuntungan besar.\r\nProduksi Awal\r\nAwal produksi pemilik tidak banyak mengolah bahan olahan mengingat pasar yang dimiliki belum terlalu luas.\r\nPemasaran Awal\r\nPemasaran awalnya hanya didaerah Kota Pekalongan.\r\nProgress Sampai Sekarang\r\nPerkembangan produksi dari tahun ketahun juga telah menjadikan produk ini dikenal oleh konsumen dan pelanggannya. Hal ini pula yang mengharuskan adanya suatu nama (brand) atas produk yang dihasilkan.'),
(31, 'Produk Ikan Karima', 'Sambal Ikan Karima', 'Menyediakan Sambal Ikan Cumi, Cakalan Udang Dll', '324567353525768', 'Tri Wahyuningsih', 'Perempuan', '1980-06-07', 'Jl. Wr Supratman Gang Yu Rt 06 Rw 13', '081548037659', 'Wahyuningsiht32@gmail.com', '$2y$10$LPqafF5B4we/GYZAmznTAulbq4ZmJogo0ptkhX3ixhzRPAnoPrUZ.', 1, 3, 'pemilik1.jpeg', 'watermark10.png', 'sambal3.jpeg', 'kerupuk_karima.jpeg', 'kerupuk_karima3.jpeg', 'images.jpg', 'maxresdefault.jpg', 'Pengolahan kerupuk ikan karima selama ini masih menggunakan cara tradisional dan Home Industry dengan memanfaatkan tenaga kerja, mulai dari pengolahan bahan dasar sampai dengan pemotongan kerupuk, sehingga hasil yang didapatkan menjadi kurang seragam. Selain itu, komposisi bahan dasar untuk pembuatan kerupuk sangat tergantung pada ketersediaan jenis tepung tapioka tertentu.', 'Awal Merintis Usaha\r\nPuspita Food berdiri mulai tahun 2010\r\nProduksi Awal\r\nAwal produksi pemilik tidak banyak mengolah bahan olahan mengingat pasar yang dimiliki belum terlalu luas.\r\nPemasaran Awal\r\nPemasaran awalnya hanya didaerah Kota Pekalongan, Tepatnya dibeberapa swalayan dan kios terdekat.\r\nProgress Sampai Sekarang\r\nPerkembangan produksi dari tahun ketahun juga telah menjadikan produk ini dikenal oleh konsumen dan pelanggannya. Hal ini pula yang mengharuskan adanya suatu nama (brand) atas produk yang dihasilkan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `tagline_produk` varchar(255) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_telpon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Diproses','Ditolak','Diterima') NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `tanggal_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama_produk`, `tagline_produk`, `deskripsi_produk`, `nik`, `nama_pemilik`, `jenis_kelamin`, `alamat`, `nomor_telpon`, `email`, `password`, `status`, `role_id`, `is_active`, `tanggal_lahir`, `tempat_lahir`, `foto_profil`, `foto_ktp`, `foto_produk`, `tanggal_daftar`) VALUES
(53, '', '', '', '12312313131', 'Ballsky1', 'Laki-Laki', '', '', 'syaiful26iqbal@gmail.com', '$2y$10$AJwym4rXRNiQ0ZCWCc8q6O.bwYD4ZnQGQOeCZoam6/GamLZhesZSi', 'Diterima', 4, 1, '0000-00-00', '', 'pendaftar.jpg', '', '', 1661008957);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_telpon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `isi_pesan` varchar(255) NOT NULL,
  `tanggal_kirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `nomor_telpon`, `alamat`, `isi_pesan`, `tanggal_kirim`) VALUES
(1, 'Syaiful Iqbal1', 'user@gmail.com', '12', 'Jl. Gajah', 'adasdddddddd', 1653552283),
(3, 'Syaiful Iqbal', 'Syaifuliqbal@gmail.com', '12', 'Perum Limas Krapyak Pekalongan Utara', 'adasdd', 1653631732);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_pelatihan`
--

CREATE TABLE `peserta_pelatihan` (
  `id_peserta` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `pemilik_id` int(11) NOT NULL,
  `status` enum('Proses','Acc','Tolak') NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta_pelatihan`
--

INSERT INTO `peserta_pelatihan` (`id_peserta`, `jadwal_id`, `pemilik_id`, `status`, `tanggal_daftar`) VALUES
(45, 1, 20, 'Acc', '2022-06-09'),
(46, 2, 20, 'Acc', '2022-06-16'),
(48, 3, 20, 'Proses', '2022-08-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `nomor_telpon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id`, `nama`, `email`, `password`, `foto`, `role_id`, `date_created`, `bio`, `posisi`, `is_active`, `nik`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `nomor_telpon`) VALUES
(1, 'Syaiful Iqbal', 'admin@gmail.com', '$2y$10$MiAvqJZ1BdgaPxKmCAnKmO2FzXSrjTGLnUwzjtAo/50tOUI0kMaG2', 'PhotoRoom-20220622_1553321.png', 1, 1648568620, 'Hi I’m just new in codeigniter. My website works locally, but when I uploaded it, I got this error:\r\n\r\nAn Error Was Encountered Unable to load the requested file: home\\home_view.php\r\n\r\nHere is my controller:', 'Admin', 1, '36424235552636211', 'Jl. Gajah Barat No 27 Tirto Pekalongan Barat', '2000-06-26', 'Pekalongan', '087736006938'),
(2, 'Ketua Technopark Perikanan', 'ketua@gmail.com', '$2y$10$mlgXqyVQMZ5H.ARgVSbjf..BKSYnfIDkDUUTSVMtEBJIBGa4yM0Se', 'WhatsApp_Image_2021-10-14_at_11_23_38.jpeg', 5, 1648568620, 'Actually I have the class Pages and function. I built the function with one argument to call the any files from the director application/view/pages', 'Ketua', 1, '33424235552636236', 'Panjang Wetan Gg. 1 No. 5b Pekalongan Utara', '1970-04-15', 'Pekalongan', '085641780665');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(4, 3, 3),
(5, 4, 4),
(6, 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(3, 'Pemilik'),
(4, 'Pendaftar'),
(5, 'Ketua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(3, 'Pemilik'),
(4, 'Pendaftar'),
(5, 'Ketua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/dashboard', 'fas fa-home', 1),
(2, 2, 'My Profile', 'user', 'fas fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit_profile', 'fas fa-user-edit\r\n', 1),
(11, 1, 'Data Tenant', 'admin/pemilik_tenant', 'fas fa-users', 1),
(12, 1, 'Pendaftar Tenant', 'admin/pendaftar_tenant', 'fas fa-user-plus', 1),
(13, 1, 'Pendaftar Pelatihan', 'admin/pendaftar_pelatihan', 'fas fa-user-clock', 1),
(14, 1, 'Agenda Pelatihan', 'admin/pelatihan', 'fas fa-calendar-alt', 1),
(15, 1, 'Pesan', 'admin/pesan', 'fas fa-envelope', 1),
(16, 3, 'Dashboard Pemilik', 'pemilik/dashboard', 'fas fa-home', 1),
(17, 1, 'Berita', 'admin/berita', 'fas fa-newspaper', 1),
(18, 4, 'Dashboard Pendaftar', 'pendaftar/dashboard', 'fas fa-home', 1),
(20, 4, 'Edit Profile', 'pendaftar/edit_profile', 'fas fa-user-edit', 1),
(21, 3, 'Edit Profile', 'pemilik/edit_profile', 'fas fa-user-edit', 1),
(22, 5, 'Dashboard', 'ketua/dashboard', 'fas fa-home', 1),
(23, 5, 'Data Staff', 'ketua/data_staff', 'fas fa-user-friends', 1),
(24, 3, 'Agenda Pelatihan', 'pemilik/agenda_pelatihan', 'fas fa-calendar-alt', 1),
(25, 2, 'Agenda Pelatihan', 'user/agenda_pelatihan', 'fas fa-calendar-alt\r\n', 1),
(26, 3, 'Daftar Pelatihan', 'pemilik/daftar_pelatihan', 'fas fa-user-plus', 1),
(113, 5, 'Data Tenant', 'ketua/pemilik_tenant', 'fas fa-users', 1),
(114, 5, 'Pendaftar Tenant', 'ketua/pendaftar_tenant', 'fas fa-user-plus', 1),
(115, 5, 'Pendaftar Pelatihan', 'ketua/pendaftar_pelatihan', 'fas fa-user-clock', 1),
(116, 5, 'Agenda Pelatihan', 'ketua/pelatihan', 'fas fa-calendar-alt', 1),
(117, 5, 'Pesan', 'ketua/pesan', 'fas fa-envelope', 1),
(118, 5, 'Berita', 'ketua/berita', 'fas fa-newspaper', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(13, 'pekalongantechnopark@gmail.com', 'TkxQutIedNDmn5+cWPdM9lMPV9rCMTToA5/+rVKVeIo=', 1649576509),
(24, 'pekalongantechnopark@gmail.com', 'DZQYyFProUBOuYhVjR4Dbsb5m9u3r4C7u/IlU59uRPg=', 1652494770),
(26, 'nataliasaputri22@gmail.com', 'Msbh6+1DxLHx9h4y4KCVkSPe8p+yQAFea1P+jgZefjk=', 1652495099),
(27, 'nataliasaputri22@gmail.com', 'EN4GlDh+Zj2u+dbHoTeIpXoweVBO/+ksoWCSwfBX2UE=', 1652495314),
(28, 'nataliasaputri22@gmail.com', 'jqZxk8oMj2Gqg/zR35SvvxJJJ5ELhmt+LNcBQN3cYSQ=', 1652495347),
(29, 'Nataliasaputri22@gmail.com', '0OR0Q+WSugoNrpyUDXhcCTlb8f42rKEsZ7Ar81svMMg=', 1652495602),
(30, 'Nataliasaputri22@gmail.com', 'C9yfqsvzSU6oQgZ3I6Wb8LdBGXoyNMNzUjA9an1s020=', 1652495623),
(33, 'omeksaputra24@gmail.com', 'Q/0v8MjgH/N3v3Y6CzGLt1HovUun5odXm1kduboL21A=', 1652495910),
(37, 'user@gmail.com', 'Te7uqslMc4PVQIGp+sNcJyt3FguEQo2tvyKOd7fNPlU=', 1652711482),
(42, 'Daniswara428@gmail.com', 'e4cp6xkjxH9HYlIjG6Kh4ijH72tMmCRLCaZRa0VfhqI=', 1654412510),
(56, 'syaifuliqbal26062000@gmail.com', 'S2j0WR9Kt+LIEvzOI8UNcTmxGaX3ie3lc8oR0ANYzPY=', 1655303499),
(59, 'syaiful26iqbal@gmail.com', '6FtCLKHBNbJcf1Bnluu3JzSltAvTHQiXIC5nQ+8P8EI=', 1661008957);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `jadwal_id` (`jadwal_id`),
  ADD KEY `pemilik_id` (`pemilik_id`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  ADD CONSTRAINT `peserta_pelatihan_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_pelatihan_ibfk_2` FOREIGN KEY (`pemilik_id`) REFERENCES `pemilik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
