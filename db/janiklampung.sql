-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 01:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `janiklampung`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` bigint(20) UNSIGNED NOT NULL,
  `agama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katolik'),
(4, 'Budha'),
(5, 'Hindu'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `beban`
--

CREATE TABLE `beban` (
  `id_beban` int(11) NOT NULL,
  `nama_beban` varchar(128) NOT NULL,
  `biaya_beban` float(16,2) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beban`
--

INSERT INTO `beban` (`id_beban`, `nama_beban`, `biaya_beban`, `tanggal`) VALUES
(1, 'Biaya Transportasi Bulan Juni', 20000.00, '2021-06-08'),
(2, 'Bayar Listrik Bulan Juni', 30000.00, '2021-06-08'),
(3, 'Biaya Listrik Bulan Juli', 50000.00, '2021-07-12'),
(4, 'beban biaya gas bulan juli', 30000.00, '2021-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_transfer`
--

CREATE TABLE `bukti_transfer` (
  `id_bukti_transfer` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `id_rekening_tujuan` int(11) NOT NULL,
  `rekening_pengirim` varchar(128) NOT NULL,
  `bank_pengirim` varchar(100) NOT NULL,
  `nama_pengirim` varchar(128) NOT NULL,
  `waktu_transfer` datetime NOT NULL,
  `nominal_transfer` float(14,2) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_transfer`
--

INSERT INTO `bukti_transfer` (`id_bukti_transfer`, `id_checkout`, `id_rekening_tujuan`, `rekening_pengirim`, `bank_pengirim`, `nama_pengirim`, `waktu_transfer`, `nominal_transfer`, `bukti_pembayaran`, `catatan`, `status`) VALUES
(1, 1, 1, '1234', 'BNI', 'Asep', '2022-04-15 05:54:00', 1800000.00, 'Selesai_Exam_Manjarkom_4.PNG', 'Coba', 'Belum dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_bayar` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `no_hp_penerima` varchar(50) NOT NULL,
  `alamat_penerima` varchar(255) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `total_harga` float(14,2) NOT NULL,
  `waktu_pemesanan` datetime NOT NULL,
  `id_metode_bayar` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `id_user`, `kode_bayar`, `nama_penerima`, `no_hp_penerima`, `alamat_penerima`, `id_kurir`, `total_harga`, `waktu_pemesanan`, `id_metode_bayar`, `status`) VALUES
(1, 4, '4988F13A8019DC1F9DA0D7B98DB24C1A', 'Asep', '082117503125', 'Jl. bandung', 1, 1800000.00, '2022-04-14 05:51:18', 1, 'Menunggu konfirmasi pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `footer` varchar(255) NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `header`, `title`, `content`, `footer`, `last_updated`) VALUES
(1, 'Illustration', '', '<p>Add some quality, svg illustrations to your project courtesy of <a\r\n                                            target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">unDraw</a>, a\r\n                                        constantly updated collection of beautiful svg images that you can use\r\n                                        completely free and without attribution!</p>\r\n                                    <a target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">Browse Illustrations on\r\n                                        unDraw &rarr;</a>', '', '2021-03-05 03:51:54'),
(2, 'Development Approach', '', '<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce\r\n                                        CSS bloat and poor page performance. Custom CSS classes are used to create\r\n                                        custom components and custom utility classes.</p>\r\n                                    <p class=\"mb-0\">Before working with this theme, you should become familiar with the\r\n                                        Bootstrap framework, especially the utility classes.</p>', '', '2021-03-05 03:49:49'),
(3, 'Illustration', '', '<p>Add some quality, svg illustrations to your project courtesy of <a\r\n                                            target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">unDraw</a>, a\r\n                                        constantly updated collection of beautiful svg images that you can use\r\n                                        completely free and without attribution!</p>\r\n                                    <a target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">Browse Illustrations on\r\n                                        unDraw &rarr;</a>', '', '2021-03-05 03:51:44'),
(4, 'Development Approach', '', '<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce\r\n                                        CSS bloat and poor page performance. Custom CSS classes are used to create\r\n                                        custom components and custom utility classes.</p>\r\n                                    <p class=\"mb-0\">Before working with this theme, you should become familiar with the\r\n                                        Bootstrap framework, especially the utility classes.</p>', '', '2021-03-05 03:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `footer` varchar(256) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `header`, `title`, `content`, `footer`, `icon`) VALUES
(1, 'About Application', 'Janik Lampung', '<b>JanikLampung</b> Toko barang lucu.\nAlamatnya Jl. Ciganitri No.69 B, Cipagalo, Kec. Bojongsoang, Bandung, Jawa Barat 40287', 'Leni Suryani', 'fas fa-paw');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Tas'),
(2, 'Sepatu'),
(3, 'Aksesoris'),
(4, 'Dress'),
(5, 'Baju'),
(6, 'Celana'),
(7, 'Rok'),
(8, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_notifikasi`
--

CREATE TABLE `kategori_notifikasi` (
  `id_kategori_notifikasi` int(11) NOT NULL,
  `kategori_notifikasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_notifikasi`
--

INSERT INTO `kategori_notifikasi` (`id_kategori_notifikasi`, `kategori_notifikasi`) VALUES
(1, 'Notifikasi'),
(2, 'Permintaan Teman'),
(3, 'Pembayaran'),
(4, 'Pesanan');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(11) NOT NULL,
  `kurir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `kurir`) VALUES
(1, 'JNE'),
(2, 'POS Indonesia'),
(3, 'SAP Express'),
(4, 'Sicepat'),
(5, 'J&T'),
(6, 'Standard Express');

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id_metode_bayar` int(11) NOT NULL,
  `metode_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_bayar`
--

INSERT INTO `metode_bayar` (`id_metode_bayar`, `metode_bayar`) VALUES
(1, 'Transfer'),
(2, 'Virtual Account'),
(3, 'OVO'),
(4, 'DANA');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori_notifikasi` int(11) NOT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `waktu_notifikasi` datetime NOT NULL,
  `subjek` varchar(128) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `is_read` int(11) NOT NULL,
  `id_creator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pasokan`
--

CREATE TABLE `pasokan` (
  `id_pasokan` int(11) NOT NULL,
  `pemasok` varchar(255) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_pempek` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total_harga` float(14,2) NOT NULL,
  `waktu_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_1`
--

CREATE TABLE `pertanyaan_1` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan_1`
--

INSERT INTO `pertanyaan_1` (`id`, `pertanyaan`) VALUES
(1, 'Apa nama mobil Favorit kamu?'),
(2, 'Siapa nama ibu kandung kamu?');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_2`
--

CREATE TABLE `pertanyaan_2` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan_2`
--

INSERT INTO `pertanyaan_2` (`id`, `pertanyaan`) VALUES
(1, 'Apa warna favorit kamu?'),
(2, 'Apa kutipan kata favorit kamu?');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_keamanan`
--

CREATE TABLE `pertanyaan_keamanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan_1` int(11) NOT NULL,
  `jawaban_1` varchar(255) NOT NULL,
  `id_pertanyaan_2` int(11) NOT NULL,
  `jawaban_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan_keamanan`
--

INSERT INTO `pertanyaan_keamanan` (`id`, `id_user`, `id_pertanyaan_1`, `jawaban_1`, `id_pertanyaan_2`, `jawaban_2`) VALUES
(1, 1, 1, 'Vios', 2, 'Menang');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kode_pesanan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total_harga` float(14,2) NOT NULL,
  `ongkir` float(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_checkout`, `id_produk`, `kode_pesanan`, `jumlah`, `sub_total_harga`, `ongkir`) VALUES
(1, 1, 1, '5D3C24BA007820143E3B276431EEF70E', 4, 1800000.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `harga_jual` float(16,2) NOT NULL,
  `harga_beli` float(16,2) NOT NULL,
  `diskon` decimal(5,2) NOT NULL,
  `harga` float(14,2) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `merk`, `id_kategori`, `stok`, `terjual`, `harga_jual`, `harga_beli`, `diskon`, `harga`, `satuan`, `deskripsi`, `gambar`) VALUES
(1, 'T-001', 'Tas Gucci', 'Gucci', 1, 96, 0, 0.00, 0.00, '0.00', 450000.00, 'Buah', 'Tas Gucci original', 'tas-gucci.jpg'),
(2, 'S-001', 'Sepatu Convers', 'Convers', 2, 120, 0, 0.00, 0.00, '0.00', 900000.00, 'Pasang', 'Sepatu Convers', 'sepatu-convers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `bank`, `no_rekening`, `atas_nama`, `email`) VALUES
(1, 'Mandiri', '1234567890', 'Leni Suryani', 'lenisuryani@gmail.com'),
(2, 'BNI', '0987654321', 'Leni Suryani', 'lenisuryani@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL,
  `review` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_bayar` varchar(255) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total_harga` float(14,2) NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `place_of_birth` varchar(128) NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone_number` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `gender`, `place_of_birth`, `birthday`, `phone_number`, `address`, `religion_id`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'lenisuryani', 'Leni Suryani', 'lenisuryani@gmail.com', 'Perempuan', 'Bandung', '2001-04-06', '081214222446', 'Jl. Bandung ', 1, 'default.png', '$2y$10$54Ajl0R.ArBF45hyXCsJZOnTdLzoegtv9nJbBRs3ICk1QBv1kS5yW', 1, 1, 1614472317),
(2, 'annisa', 'Annisa Yusmaniah', 'annisayusmaniah2001@gmail.com', 'Perempuan', 'Medan', '2001-03-22', '081263509885', 'Kota Medan', 1, 'default.png', '$2y$10$54Ajl0R.ArBF45hyXCsJZOnTdLzoegtv9nJbBRs3ICk1QBv1kS5yW', 1, 1, 1614472317),
(3, 'mhaitsam18', 'Muhammad Haitsam', 'mhaitsam18@gmail.com', 'Laki-laki', 'Madinah', '1999-02-18', '082117503125', 'Bandung', 1, 'default.png', '$2y$10$.ixo7mdt30yfQNM2rpo3pOMyYgYV4MzqdX0m.4LqjXaAEFv.mgqk6', 3, 1, 1609925711),
(4, 'sandhika', 'Sandhika Galih', 'sandika@gmail.com', 'Laki-laki', 'Bandung', '1991-11-11', '082117504322', 'Bandung', 1, 'default.png', '$2y$10$DLCp6ce7jyHem7q/eNcPbOeYeuU8dp3kwtgZ5lz3aVsDaIJsgjPHu', 2, 1, 1609657135),
(8, 'umar', 'umar', 'umar@gmail.com', 'Laki-laki', 'Depok', '2022-04-15', '082117503125', 'Jl. anggur', 1, 'default.svg', '$2y$10$fEe5HdvvgsGqfTtDJSQkQ.1NLCOeVTWVHw0hl.MhMlmigfZF7Srui', 2, 1, 1649893588);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 1, 6),
(8, 1, 7),
(11, 2, 8),
(21, 3, 2),
(23, 3, 8),
(24, 1, 8),
(26, 1, 14),
(27, 1, 15),
(29, 2, 15),
(30, 2, 10),
(31, 3, 15),
(32, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `active`) VALUES
(1, 'Admin', 1),
(2, 'User', 1),
(3, 'Menu', 1),
(4, 'Produk', 1),
(6, 'Transaksi', 1),
(10, 'Member', 1),
(14, 'DataMaster', 1),
(15, 'Lainnya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member'),
(3, 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/', 'bi bi-grid-fill', 0),
(2, 2, 'Dashboard', 'user/', 'bi bi-person-fill', 1),
(3, 2, 'Edit Profile', 'user/edit', 'bi bi-person-lines-fill', 1),
(4, 3, 'Menu Management', 'menu/', 'bi bi-list', 1),
(5, 3, 'Submenu Management', 'menu/subMenu', 'bi bi-menu-app-fill', 1),
(6, 1, 'Role Management', 'admin/role', 'bi bi-person-check-fill', 1),
(7, 2, 'Change Password', 'user/changePassword', 'bi bi-key-fill', 1),
(8, 1, 'Data User', 'admin/dataUser/', 'bi bi-people-fill', 0),
(9, 4, 'Beranda', 'produk/', 'bi bi-house-door-fill', 0),
(10, 14, 'Data Master', 'DataMaster/', 'bi bi-folder', 1),
(11, 6, 'Pemesanan', 'Transaksi/', 'bi bi-cart-fill', 1),
(12, 6, 'Pemesanan Online', 'Transaksi/online', 'bi bi-bag-fill', 1),
(13, 6, 'Pemesanan Offline', 'Transaksi/offline', 'bi bi-basket-fill', 1),
(14, 6, 'Pembayaran Online', 'Transaksi/pembayaranOnline/', 'bi bi-credit-card-fill', 1),
(15, 10, 'Janik Lampung', 'Member/janikLampung', 'bi bi-house-door-fill', 1),
(16, 4, 'Data Produk', 'Produk/produk', 'bi bi-shop', 1),
(17, 10, 'Keranjang', 'Member/keranjang', 'bi bi-cart4', 1),
(18, 4, 'Produk Terjual', 'produk/terjual', 'bi bi-cart-check-fill', 1),
(19, 14, 'Data Agama', 'DataMaster/agama/', 'bi bi-book', 1),
(20, 14, 'Data Dashboard', 'DataMaster/dashboard/', 'bi bi-speedometer2', 1),
(21, 14, 'Data Konten', 'DataMaster/konten', 'bi bi-body-text', 1),
(22, 15, 'Tentang Aplikasi', 'Lainnya/tentang', 'bi bi-window', 1),
(23, 15, 'Pengaturan', 'Lainnya/pengaturan', 'bi bi-gear-fill', 1),
(24, 15, 'Hubungi Kami', 'Lainnya/hubungi', 'bi bi-person-rolodex', 1),
(25, 15, 'Bantuan', 'Lainnya/bantuan', 'bi bi-info-circle-fill', 1),
(26, 15, 'FAQ', 'Lainnya/faq', 'bi bi-question-circle-fill', 1),
(27, 14, 'Data Kategori', 'DataMaster/kategori', 'bi bi-tags-fill', 1),
(28, 14, 'Data Kurir', 'DataMaster/kurir', 'bi bi-truck', 1),
(29, 10, 'Pesanan Saya', 'Member/pesanan', 'bi bi-bag-heart-fill', 1),
(30, 14, 'Data Metode Bayar', 'DataMaster/metodeBayar', 'bi bi-credit-card-2-front-fill', 1),
(31, 14, 'Data Rekening', 'DataMaster/rekening', 'bi bi-credit-card', 1),
(32, 10, 'Pembayaran', 'Member/pembayaran', 'bi bi-credit-card-2-back-fill', 1),
(33, 10, 'Riwayat Pembayaran', 'Member/riwayatPembayaran/', 'bi bi-clock-history', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(4, 'haitsam03@gmail.com', 'iscmRCWne+lTCfqz/25n5R8VUX5MUkaN02Bhum3gVsU=', 1609930420),
(5, 'haitsam03@gmail.com', 'n5QKD1D9vUL9QiROw9MO4pgD/fbbdFGYrGd8znIJWe4=', 1609932048),
(6, 'haitsam03@gmail.com', 'wPG+3htmGqTKAArzVlpS/b0eoqor9TKqG16H5cDvMqA=', 1609932054),
(7, 'aa@aa.a', 'oIK0LUztcU02aYAE6HG86eh7Fq5/TcK17wF7B/To+/k=', 1609941391),
(8, 'wahyuhidayat@gmail.com', 'h5OYZb29deEXYS/1Bc69GOaWseVwGEhhSXVKert9Oog=', 1610019862),
(9, 'pramuko@gmail.com', 'ijlFNaUwBrUcqEbANwlEml1FluVkgWAOvEPf3VtE9H4=', 1610019892),
(10, 'elyrosely@gmail.com', 'zLt8OC5aT9LrQaCipRl09/n95aUTUUjwCiVtKM150uA=', 1610019940),
(11, 'inne@gmail.com', '6kl2FFh6027PAQ51K03uIlFz8f3+e59snpxLo3jAOBE=', 1610019985),
(12, 'wawa@gmail.com', '/g7m4I60ysY6Ljs6xsHhye5zWPyA0eR/4qwv7r7czlo=', 1610020015),
(13, 'fasaldo1999@gmail.com', 'fOSWX9UdFnoi7ejSOIkhye7te1tVdT+cXmd1hh0YZCQ=', 1610023446),
(15, 'muhammadbarja@gmail.com', 'VpatS/tgTK/bfTZLlDDoVX9aaD6Kb3YoeS2/ozJOhXI=', 1610280453),
(16, 'januarizqi5@gmail.com', '8QKHOpK1ROQrW679QbREt1fb2wdgcsffl5PLahNGPws=', 1610507816),
(17, 'suryatiningsih@gmail.com', 'IvVR3KjJpnh+lnQgeWOmpht3w235j9Vax2GkkDCzUBE=', 1610509684),
(18, 'ersanum@gmail.com', 'Tst2ygGt8n2wUa+RsqvtHguZMn1KPTaiNE63D4wwehQ=', 1610529882),
(19, 'haitsamhaitsam18@yahoo.com', '06vONmPAIi0hj/xgLH72Ck6FSDDyqs96P9pxA5bOU54=', 1610556667),
(20, 'shibghotul7@gmail.com', 'zLT3U4RCMM6pc1pVBCI3SodKzlAVJmG13PbfY8ijFnU=', 1610556792),
(21, 'haitsam03@gmail.com', 'oVyGSYjGv4lTvFvUKawPJ96cj42FYlkQW8QcyPDghSQ=', 1611588824),
(22, 'akibdahlan20@gmail.com', 'Q5sF4roomYzNnHkIS0zKCHKteza6KwrK5GYaHqlJr8w=', 1614472096),
(23, 'akibdahlan21@gmail.com', 'M23yBdkPPwctLera1YG1Eccpx5PFhn1vNyKEeEqVpT0=', 1614472317),
(24, 'hariadiarfah21263@gmail.com', 'TqbWx3Vf3Z/kDFKSrDmJkBOb7q2ps/51az1qHxWSnW0=', 1626429149),
(26, 'annisayusmaniah2001@gmail.com', 'HERMzOgp9QFhAQjXuW/UBvpxJxzR4g/Mlq1/bhbpvCI=', 1626430676),
(28, 'sstrngrr2001@gmail.com', 'rAoYoQRGelEDyk/iDQjzdLMmt6vooxHKa/cvuHEDnwU=', 1626440828),
(29, 'chairanimiskah@gmail.com', 'wB9PFxOaMhwhgxI85esrVc49YsQywDungnQz/fRSroU=', 1628927224),
(30, 'umar@gmail.com', 'NczUWm85jMIxmCsRMTc4p/434OhbqvoRuLpvpALdd+g=', 1649893588);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `beban`
--
ALTER TABLE `beban`
  ADD PRIMARY KEY (`id_beban`);

--
-- Indexes for table `bukti_transfer`
--
ALTER TABLE `bukti_transfer`
  ADD PRIMARY KEY (`id_bukti_transfer`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`),
  ADD UNIQUE KEY `kode_bayar` (`kode_bayar`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_notifikasi`
--
ALTER TABLE `kategori_notifikasi`
  ADD PRIMARY KEY (`id_kategori_notifikasi`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id_metode_bayar`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `pasokan`
--
ALTER TABLE `pasokan`
  ADD PRIMARY KEY (`id_pasokan`);

--
-- Indexes for table `pertanyaan_1`
--
ALTER TABLE `pertanyaan_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan_2`
--
ALTER TABLE `pertanyaan_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan_keamanan`
--
ALTER TABLE `pertanyaan_keamanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD UNIQUE KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `beban`
--
ALTER TABLE `beban`
  MODIFY `id_beban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bukti_transfer`
--
ALTER TABLE `bukti_transfer`
  MODIFY `id_bukti_transfer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori_notifikasi`
--
ALTER TABLE `kategori_notifikasi`
  MODIFY `id_kategori_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id_metode_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasokan`
--
ALTER TABLE `pasokan`
  MODIFY `id_pasokan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaan_1`
--
ALTER TABLE `pertanyaan_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pertanyaan_2`
--
ALTER TABLE `pertanyaan_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pertanyaan_keamanan`
--
ALTER TABLE `pertanyaan_keamanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
