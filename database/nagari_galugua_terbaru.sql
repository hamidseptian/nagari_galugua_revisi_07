-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 03:30 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nagari_galugua`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_jenis_bantuan` varchar(5) NOT NULL,
  `id_penduduk` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_jenis_bantuan`, `id_penduduk`) VALUES
(1, '1', '2'),
(2, '1', '12'),
(3, '1', '14'),
(4, '1', '15'),
(5, '1', '10'),
(6, '1', '11'),
(7, '1', '18'),
(8, '1', '16'),
(9, '1', '17'),
(10, '1', '19'),
(11, '2', '26'),
(12, '3', '2'),
(13, '3', '11'),
(14, '3', '12'),
(15, '3', '10'),
(16, '3', '15'),
(17, '3', '14'),
(18, '3', '22'),
(19, '3', '16'),
(20, '3', '20'),
(21, '3', '17'),
(22, '1', '13'),
(23, '1', '20'),
(24, '4', '30'),
(25, '4', '11'),
(26, '4', '13'),
(27, '', ''),
(28, '4', '12'),
(29, '4', '10'),
(30, '4', '17'),
(31, '4', '15'),
(32, '4', '14'),
(33, '4', '19'),
(34, '4', '18');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `tanggal`, `isi_berita`, `gambar`) VALUES
(21, 'Tes', '2021-06-19', '<p>Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government. But, after a fortnight, the online casino industry came up with a solution and new online casinos started taking root. These began to operate under a different business umbrella, and by doing that, rendered the transfer of money to and from them legal. A major part of this was enlisting electronic banking systems that would accept this new clarification and start doing business with me. Listed in this article are the electronic banking systems that accept players from the United States that wish to play in online casinos.</p>\r\n', '20210619095521padi.jpg'),
(22, 'adasda', '2021-06-19', '<p>Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government. But, after a fortnight, the online casino industry came up with a solution and new online casinos started taking root. These began to operate under a different business umbrella, and by doing that, rendered the transfer of money to and from them legal. A major part of this was enlisting electronic banking systems that would accept this new clarification and start doing business with me. Listed in this article are the electronic banking systems that accept players from the United States that wish to play in online casinos.</p>\r\n', '20210619100042Capture.PNG'),
(23, 'Pemerintah Pangkas Bibit Ayam Pedaging, CPIN & JPFA dkk Berkokok?', '2021-06-19', '<p>Bisnis.com, JAKARTA &ndash; Kebijakan Kementerian Pertanian untuk pemusnahan telur tertunas ayam pedaging menjadi secercah harapan bagi emiten unggas. Kementerian Pertanian kembali mengeluarkan kebijakan pemusnahan telur tertunas atau hatching eggs ayam pedaging demi mencegah terjadinya kelebihan pasokan yang memicu anjloknya harga di tingkat petani. Surat Edaran (SE) Perbibitan dan Produksi Ternak yang diterbitkan tanggal 3 Juni 2021 mengacu pada Peraturan Menteri Pertanian Nomor 32/Permentan/PK.230/09/2017 tentang Penyediaan, Peredaran dan Pengawasan Ayam Ras dan Telur Konsumsi. &ldquo;SE ini diterbitkan untuk mengatur keseimbangan ketersediaan dan kebutuhan DOC FS [day old chicken final stock] ayam ras pedaging,&rdquo; kata Direktur Jenderal Peternakan dan Kesehatan Hewan Kementerian Pertanian Nasrullah. Nasrullah menilai bahwa SE ini akan berjalan positif demi mencapai stabilisasi pasokan unggas. Dia mengatakan potensi produksi DOC FS setidaknya mencapai 278,24 juta ekor sedangkan kebutuhan DOC FS pada Mei 2021 dan Juni 2021 hanya berada di angka 225,99 juta ekor sehingga surplus berada di angka 52,5 juta ekor.<br />\r\n<br />\r\n<br />\r\nDownload aplikasi Bisnis.com terbaru untuk akses lebih cepat dan nyaman di sini:<br />\r\nAndroid: <a href=\"http://bit.ly/AppsBisniscomPS\">http://bit.ly/AppsBisniscomPS</a><br />\r\niOS: <a href=\"http://bit.ly/AppsBisniscomIOS\">http://bit.ly/AppsBisniscomIOS</a></p>\r\n', '20210619101530padi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bantuan`
--

CREATE TABLE `jenis_bantuan` (
  `id_jenis_bantuan` int(11) NOT NULL,
  `nama_jenis_bantuan` varchar(25) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `penerimaan` text NOT NULL,
  `kuota` int(4) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_bantuan`
--

INSERT INTO `jenis_bantuan` (`id_jenis_bantuan`, `nama_jenis_bantuan`, `kategori`, `penerimaan`, `kuota`, `status`) VALUES
(1, 'PKH lama', 'Uang Tunai', 'uang tunai 600000', 5, 'Penetapan'),
(2, 'Covid', 'Uang Tunai', '1000000', 3, 'Di Publikasi'),
(3, 'Beras Miskin', 'Sembako', '1 karung', 5, 'Di Publikasi'),
(4, 'PKH', 'Uang Tunai', '600000', 9, 'Di Publikasi');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `id_jenis_bantuan` varchar(5) NOT NULL,
  `kode_kriteria` varchar(25) NOT NULL,
  `nama_kriteria` varchar(25) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `bobot` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `id_jenis_bantuan`, `kode_kriteria`, `nama_kriteria`, `kategori`, `bobot`) VALUES
(23, '4', 'C4', 'Penghasilan', 'Benefit', 15),
(20, '4', 'C1', 'Usia Anak', 'Benefit', 10),
(4, '2', 'C1', 'pendapatan', 'Benefit', 10),
(5, '2', 'c2', 'tanggungan', 'Benefit', 20),
(7, '3', 'C1', 'Jumlah Penghasilan', 'Benefit', 40),
(8, '3', 'C2', 'Jumlah Tanggungan', 'Cost', 30),
(9, '3', 'C3', 'Kondisi Rumah', 'Benefit', 25),
(10, '3', 'C4', 'Kepemilikan Rumah', 'Benefit', 15),
(24, '4', 'C5', 'Ibu Hamil', 'Cost', 10),
(21, '4', 'C2', 'Pendidikan', 'Benefit', 25),
(22, '4', 'C3', 'Jumlah Tanggungan', 'Cost', 15),
(25, '4', 'C6', 'Tempat tinggal', 'Benefit', 25);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `nama_toko` varchar(25) NOT NULL,
  `pemilik_toko` varchar(25) NOT NULL,
  `alamat_toko` varchar(25) NOT NULL,
  `nohp_toko` varchar(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `foto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_toko`, `pemilik_toko`, `alamat_toko`, `nohp_toko`, `username`, `password`, `status`, `foto`) VALUES
(3, 'Toko A', 'Unknown', 'Maransi ', '081212121212', '123', '456', 'Pendaftaran', ''),
(4, 'Kadai amak', 'amak', 'stmik', '081212121212', 'qq', 'qq', 'Pendaftaran', '');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_nilai_alternatif` int(11) NOT NULL,
  `id_penduduk` varchar(5) NOT NULL,
  `id_jenis_bantuan` varchar(5) NOT NULL,
  `id_kriteria` varchar(5) NOT NULL,
  `nilai` int(15) NOT NULL,
  `id_pilihan` varchar(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_nilai_alternatif`, `id_penduduk`, `id_jenis_bantuan`, `id_kriteria`, `nilai`, `id_pilihan`, `keterangan`) VALUES
(1, '2', '1', '1', 2500000, '', ''),
(2, '2', '1', '2', 3, '', ''),
(3, '2', '1', '3', 2400000, '', ''),
(4, '12', '1', '1', 2000000, '', ''),
(5, '12', '1', '2', 2, '', ''),
(6, '12', '1', '3', 2100000, '', ''),
(7, '14', '1', '1', 4000000, '', ''),
(8, '14', '1', '2', 5, '', ''),
(9, '14', '1', '3', 1400000, '', ''),
(10, '15', '1', '1', 3500000, '', ''),
(11, '15', '1', '2', 3, '', ''),
(12, '15', '1', '3', 2000000, '', ''),
(13, '10', '1', '1', 1500000, '', ''),
(14, '10', '1', '2', 2, '', ''),
(15, '10', '1', '3', 1700000, '', ''),
(16, '11', '1', '1', 2800000, '', ''),
(17, '11', '1', '2', 7, '', ''),
(18, '11', '1', '3', 800000, '', ''),
(19, '18', '1', '1', 5000000, '', ''),
(20, '18', '1', '2', 4, '', ''),
(21, '18', '1', '3', 2500000, '', ''),
(22, '16', '1', '1', 2000000, '', ''),
(23, '16', '1', '2', 2, '', ''),
(24, '16', '1', '3', 2000000, '', ''),
(25, '17', '1', '1', 3000000, '', ''),
(26, '17', '1', '2', 5, '', ''),
(27, '17', '1', '3', 3500000, '', ''),
(28, '19', '1', '1', 3000000, '', ''),
(29, '19', '1', '2', 8, '', ''),
(30, '19', '1', '3', 2000000, '', ''),
(31, '26', '2', '4', 500000, '', ''),
(32, '26', '2', '5', 2, '', ''),
(33, '12', '1', '12', 1, '', ''),
(34, '12', '1', '13', 1, '', ''),
(35, '2', '1', '12', 1, '', ''),
(36, '2', '1', '13', 1, '', ''),
(37, '2', '3', '7', 3000000, '', ''),
(38, '2', '3', '8', 3, '', ''),
(39, '2', '3', '9', 3, '', ''),
(40, '2', '3', '10', 2, '', ''),
(41, '2', '3', '11', 34, '', ''),
(42, '11', '3', '7', 2100000, '', ''),
(43, '11', '3', '8', 3, '', ''),
(44, '11', '3', '9', 3, '', ''),
(45, '11', '3', '10', 2, '', ''),
(46, '11', '3', '11', 30, '', ''),
(47, '12', '3', '7', 2000000, '', ''),
(48, '12', '3', '8', 3, '', ''),
(49, '12', '3', '9', 3, '', ''),
(50, '12', '3', '10', 2, '', ''),
(51, '12', '3', '11', 40, '', ''),
(52, '10', '3', '7', 1500000, '', ''),
(53, '10', '3', '8', 3, '', ''),
(54, '10', '3', '9', 4, '', ''),
(55, '10', '3', '10', 2, '', ''),
(56, '10', '3', '11', 30, '', ''),
(57, '15', '3', '7', 5000000, '', ''),
(58, '15', '3', '8', 3, '', ''),
(59, '15', '3', '9', 2, '', ''),
(60, '15', '3', '10', 1, '', ''),
(61, '15', '3', '11', 20, '', ''),
(62, '14', '3', '7', 3000000, '', ''),
(63, '14', '3', '8', 4, '', ''),
(64, '14', '3', '9', 3, '', ''),
(65, '14', '3', '10', 2, '', ''),
(66, '14', '3', '11', 45, '', ''),
(67, '22', '3', '7', 2400000, '', ''),
(68, '22', '3', '8', 2, '', ''),
(69, '22', '3', '9', 3, '', ''),
(70, '22', '3', '10', 2, '', ''),
(71, '22', '3', '11', 30, '', ''),
(72, '16', '3', '7', 1000000, '', ''),
(73, '16', '3', '8', 3, '', ''),
(74, '16', '3', '9', 2, '', ''),
(75, '16', '3', '10', 2, '', ''),
(76, '16', '3', '11', 25, '', ''),
(77, '20', '3', '7', 4000000, '', ''),
(78, '20', '3', '8', 4, '', ''),
(79, '20', '3', '9', 1, '', ''),
(80, '20', '3', '10', 2, '', ''),
(81, '20', '3', '11', 40, '', ''),
(82, '17', '3', '7', 2500000, '', ''),
(83, '17', '3', '8', 5, '', ''),
(84, '17', '3', '9', 3, '', ''),
(85, '17', '3', '10', 1, '', ''),
(86, '17', '3', '11', 40, '', ''),
(87, '13', '1', '1', 1650000, '', ''),
(88, '13', '1', '2', 4, '', ''),
(89, '13', '1', '3', 1200000, '', ''),
(90, '13', '1', '12', 1, '', ''),
(91, '13', '1', '13', 1, '', ''),
(92, '20', '1', '1', 1, '', ''),
(93, '20', '1', '2', 2, '', ''),
(94, '20', '1', '3', 1, '', ''),
(95, '20', '1', '12', 1, '', ''),
(96, '20', '1', '13', 1, '', ''),
(97, '30', '4', '23', 3, '24', '900 ribu - 1.2 juta'),
(98, '30', '4', '20', 1, '17', '>15 tahun'),
(99, '30', '4', '24', 3, '11', 'Tidak ada'),
(100, '30', '4', '21', 2, '18', 'Pra sekolah'),
(101, '30', '4', '22', 3, '27', '1-3 anak'),
(102, '30', '4', '25', 2, '13', 'Milik Sendiri'),
(103, '11', '4', '23', 3, '24', '900 ribu - 1.2 juta'),
(104, '11', '4', '20', 2, '15', '4-6 tahun'),
(105, '11', '4', '24', 5, '9', 'Ada'),
(106, '11', '4', '21', 3, '19', 'SD Sederajat'),
(107, '11', '4', '22', 3, '27', '1-3 anak'),
(108, '11', '4', '25', 2, '13', 'Milik Sendiri'),
(109, '13', '4', '23', 2, '25', '1,2 - 2 juta'),
(110, '13', '4', '20', 2, '15', '4-6 tahun'),
(111, '13', '4', '24', 3, '11', 'Tidak ada'),
(112, '13', '4', '21', 2, '18', 'Pra sekolah'),
(113, '13', '4', '22', 3, '27', '1-3 anak'),
(114, '13', '4', '25', 4, '12', 'Kontrak'),
(115, '12', '4', '23', 1, '26', '>2juta / bulan'),
(116, '12', '4', '20', 1, '17', '>15 tahun'),
(117, '12', '4', '24', 3, '11', 'Tidak ada'),
(118, '12', '4', '21', 3, '19', 'SD Sederajat'),
(119, '12', '4', '22', 3, '27', '1-3 anak'),
(120, '12', '4', '25', 4, '12', 'Kontrak'),
(121, '10', '4', '23', 2, '25', '1,2 - 2 juta'),
(122, '10', '4', '20', 2, '15', '4-6 tahun'),
(123, '10', '4', '24', 3, '11', 'Tidak ada'),
(124, '10', '4', '21', 3, '19', 'SD Sederajat'),
(125, '10', '4', '22', 3, '27', '1-3 anak'),
(126, '10', '4', '25', 2, '13', 'Milik Sendiri'),
(127, '17', '4', '23', 3, '24', '900 ribu - 1.2 juta'),
(128, '17', '4', '20', 2, '15', '4-6 tahun'),
(129, '17', '4', '24', 3, '11', 'Tidak ada'),
(130, '17', '4', '21', 3, '19', 'SD Sederajat'),
(131, '17', '4', '22', 5, '28', '>4 anak'),
(132, '17', '4', '25', 2, '13', 'Milik Sendiri'),
(133, '15', '4', '23', 3, '24', '900 ribu - 1.2 juta'),
(134, '15', '4', '20', 2, '15', '4-6 tahun'),
(135, '15', '4', '24', 3, '11', 'Tidak ada'),
(136, '15', '4', '21', 4, '20', 'SMP Sederajat'),
(137, '15', '4', '22', 3, '27', '1-3 anak'),
(138, '15', '4', '25', 2, '13', 'Milik Sendiri'),
(139, '14', '4', '23', 2, '25', '1,2 - 2 juta'),
(140, '14', '4', '20', 5, '16', '7-15 tahun'),
(141, '14', '4', '24', 3, '11', 'Tidak ada'),
(142, '14', '4', '21', 4, '20', 'SMP Sederajat'),
(143, '14', '4', '22', 5, '28', '>4 anak'),
(144, '14', '4', '25', 4, '12', 'Kontrak'),
(145, '19', '4', '23', 1, '26', '>2juta / bulan'),
(146, '19', '4', '20', 5, '16', '7-15 tahun'),
(147, '19', '4', '24', 5, '9', 'Ada'),
(148, '19', '4', '21', 2, '18', 'Pra sekolah'),
(149, '19', '4', '22', 3, '27', '1-3 anak'),
(150, '19', '4', '25', 2, '13', 'Milik Sendiri'),
(151, '18', '4', '23', 2, '25', '1,2 - 2 juta'),
(152, '18', '4', '20', 1, '14', '1-3 tahun'),
(153, '18', '4', '24', 5, '9', 'Ada'),
(154, '18', '4', '21', 2, '18', 'Pra sekolah'),
(155, '18', '4', '22', 3, '27', '1-3 anak'),
(156, '18', '4', '25', 4, '12', 'Kontrak');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tmpl` varchar(25) NOT NULL,
  `tgll` varchar(25) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kelurahan` varchar(25) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status_perkawinan` varchar(15) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `kewarganegaraan` varchar(15) NOT NULL,
  `berlaku_hingga` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `nik`, `nama`, `tmpl`, `tgll`, `jk`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `berlaku_hingga`, `password`, `foto`) VALUES
(2, '1371111009940013300', 'Hamid Septian', 'padang', '1995-09-18', 'P', 'maransi', '001', '005', 'Air P', 'Koto ', 'Hindu', 'Belum Kawin', 'Programmer', 'WNA', '2021-04-23', '', ''),
(10, '42342454', 'Afrina Mardesci', 'PADANG', '1978-03-04', 'P', 'Disana', '001', '001', 'Disana', 'Disana', 'islam', 'nikah', 'ojol', 'indo', '2020-09-09', '', ''),
(11, '42342455', 'Akhlisa Febi Triyani', 'PADANG', '1986-03-12', 'P', 'disini', '002', '002', 'disini', 'disini', 'islam', 'nikah', 'ojol', 'indo', '2020-09-10', '', ''),
(12, '42342456', 'Ali Nurdin. A', 'PARIAMAN', '1960-09-29', 'L', 'disitu', '003', '003', 'disitu', 'disitu', 'islam', 'nikah', 'ojol', 'indo', '2020-09-11', '', ''),
(13, '42342457', 'Basril', 'Lembak Pasang', '1988-03-12', 'L', 'dst', '004', '004', 'dst', 'dst', 'islam', 'nikah', 'ojol', 'indo', '2020-09-12', '', ''),
(14, '42342458', 'Cici Sulastri', 'BUKITTINGGI', '1981-12-16', 'P', 'Disana', '005', '005', 'Disana', 'Disana', 'islam', 'nikah', 'ojol', 'indo', '2020-09-13', '', ''),
(15, '42342459', 'Danil Putra', 'PADUSUNAN', '1985-03-29', 'L', 'disini', '006', '006', 'disini', 'disini', 'islam', 'nikah', 'ojol', 'indo', '2020-09-14', '', ''),
(16, '42342460', 'David', 'PADANG', '1976-06-23', 'L', 'disitu', '007', '007', 'disitu', 'disitu', 'islam', 'nikah', 'ojol', 'indo', '2020-09-15', '', ''),
(17, '42342461', 'Dedi Hendri', 'APAR', '1974-03-17', 'L', 'dst', '008', '008', 'dst', 'dst', 'islam', 'nikah', 'ojol', 'indo', '2020-09-16', '', ''),
(18, '42342462', 'Deni Adrivia', 'PARIAMAN', '1984-04-28', 'P', 'Disana', '009', '009', 'Disana', 'Disana', 'islam', 'nikah', 'ojol', 'indo', '2020-09-17', '', ''),
(19, '42342463', 'Desi Novianti', 'PAKASAI', '1978-11-12', 'P', 'disini', '010', '010', 'disini', 'disini', 'islam', 'nikah', 'ojol', 'indo', '2020-09-18', '', ''),
(20, '42342464', 'Desriwati', 'MUARA SIKABALUAN', '1982-02-07', 'P', 'disitu', '011', '011', 'disitu', 'disitu', 'islam', 'nikah', 'ojol', 'indo', '2020-09-19', '', ''),
(21, '42342465', 'Deswarni', 'PARIAMAN', '1972-12-31', 'P', 'dst', '012', '012', 'dst', 'dst', 'islam', 'nikah', 'ojol', 'indo', '2020-09-20', '', ''),
(22, '42342466', 'Devi Karmilawati', 'PARIAMAN', '1984-12-16', 'P', 'Disana', '013', '013', 'Disana', 'Disana', 'islam', 'nikah', 'ojol', 'indo', '2020-09-21', '', ''),
(23, '42342467', 'Dewi Sukma', 'PAKANDANGAN', '1978-05-30', 'P', 'disini', '014', '014', 'disini', 'disini', 'islam', 'nikah', 'ojol', 'indo', '2020-09-22', '', ''),
(24, '42342468', 'Dicky Agus', 'JAKARTA', '1976-09-20', 'L', 'disitu', '015', '015', 'disitu', 'disitu', 'islam', 'nikah', 'ojol', 'indo', '2020-09-23', '', ''),
(25, '42342469', 'Efrihasnul Abrar', 'PARIAMAN', '1991-09-03', 'L', 'dst', '016', '016', 'dst', 'dst', 'islam', 'nikah', 'ojol', 'indo', '2020-09-24', '', ''),
(26, '42342470', 'Elfi Hendrayeti', 'KAMPUNG BARU', '1971-06-01', 'P', 'Disana', '017', '017', 'Disana', 'Disana', 'islam', 'nikah', 'ojol', 'indo', '2020-09-25', '123', 'Penduduk-210622063109padi.jpg'),
(27, '42342471', 'Idval Zikra', 'PADUSUNAN', '1988-05-25', 'L', 'disini', '018', '018', 'disini', 'disini', 'islam', 'nikah', 'ojol', 'indo', '2020-09-26', '', ''),
(28, '42342472', 'Indah Susanti', 'BUKITTINGGI', '1980-02-11', 'P', 'disitu', '019', '019', 'disitu', 'disitu', 'islam', 'nikah', 'ojol', 'indo', '2020-09-27', '', ''),
(29, '42342473', 'Irja', 'SIMPANG KURAI TAJI', '1972-05-25', 'L', 'dst', '020', '020', 'dst', 'dst', 'islam', 'nikah', 'ojol', 'indo', '2020-09-28', '', ''),
(30, '42342474', 'Iskandar Rahman', 'KAMPUNG TANGAH', '1987-02-02', 'L', 'Disana', '021', '021', 'Disana', 'Disana', 'islam', 'nikah', 'ojol', 'indo', '2020-09-29', '', ''),
(31, '42342475', 'Jasnelvi Helvira', 'PAYAKUMBUH', '1976-07-23', 'P', 'disini', '022', '022', 'disini', 'disini', 'islam', 'nikah', 'ojol', 'indo', '2020-09-30', '', ''),
(32, '42342476', 'Junaidi', 'PAGUH DALAM', '1962-07-22', 'L', 'disitu', '023', '023', 'disitu', 'disitu', 'islam', 'nikah', 'ojol', 'indo', '2020-10-01', '', ''),
(33, '42342477', 'Khairiyah', 'KAMPUNG BARU', '1966-04-10', 'P', 'dst', '024', '024', 'dst', 'dst', 'islam', 'nikah', 'ojol', 'indo', '2020-10-02', '', ''),
(34, '42342478', 'Lisa Handriyani', 'PARIAMAN', '1992-10-27', 'P', 'Disana', '025', '025', 'Disana', 'Disana', 'islam', 'nikah', 'ojol', 'indo', '2020-10-03', '', ''),
(35, '42342479', 'Mardiyah', 'BATANG KABUNG', '1962-10-04', 'P', 'disini', '026', '026', 'disini', 'disini', 'islam', 'nikah', 'ojol', 'indo', '2020-10-04', '', ''),
(36, '42342480', 'Mega Sukma Dewi', 'PARIAMAN', '1988-06-20', 'P', 'disitu', '027', '027', 'disitu', 'disitu', 'islam', 'nikah', 'ojol', 'indo', '2020-10-05', '', ''),
(37, '42342481', 'Munawardi', 'KP. BARU', '1983-01-04', 'L', 'dst', '028', '028', 'dst', 'dst', 'islam', 'nikah', 'ojol', 'indo', '2020-10-06', '', ''),
(38, '42342482', 'Nasrul', 'KAMPUNG TANJUNG CAMPAGO', '1967-11-10', 'L', 'Disana', '029', '029', 'Disana', 'Disana', 'islam', 'nikah', 'ojol', 'indo', '2020-10-07', '', ''),
(39, '42342483', 'Nurni', 'KAJAI', '1969-11-07', 'P', 'disini', '030', '030', 'disini', 'disini', 'islam', 'nikah', 'ojol', 'indo', '2020-10-08', '', ''),
(40, '42342484', 'Nuryetti', 'PADANG', '1961-07-04', 'P', 'disitu', '031', '031', 'disitu', 'disitu', 'islam', 'nikah', 'ojol', 'indo', '2020-10-09', '', ''),
(41, '42342485', 'Onil Eka Putra', 'PADANG', '1985-01-16', 'L', 'dst', '032', '032', 'dst', 'dst', 'islam', 'nikah', 'ojol', 'indo', '2020-10-10', '', ''),
(42, '42342486', 'Osmiati', 'TANJUNG JATI', '1984-11-20', 'P', 'Disana', '033', '033', 'Disana', 'Disana', 'islam', 'nikah', 'ojol', 'indo', '2020-10-11', '', ''),
(43, '42342487', 'Perdinan Tanjung', 'SIMATORKIS', '1983-09-01', 'L', 'disini', '034', '034', 'disini', 'disini', 'islam', 'nikah', 'ojol', 'indo', '2020-10-12', '', ''),
(44, '42342488', 'Reni Sapitri', 'GASAN KECIL', '1983-10-14', 'P', 'disitu', '035', '035', 'disitu', 'disitu', 'islam', 'nikah', 'ojol', 'indo', '2020-10-13', '', ''),
(45, '42342489', 'Reno Sari', 'CIMPARUH', '1989-10-13', 'P', 'dst', '036', '036', 'dst', 'dst', 'islam', 'nikah', 'ojol', 'indo', '2020-10-14', '', ''),
(46, '42342490', 'Rita Yurtania', 'BUKITTINGGI', '1984-03-07', 'P', 'Disana', '037', '037', 'Disana', 'Disana', 'islam', 'nikah', 'ojol', 'indo', '2020-10-15', '', ''),
(47, '42342491', 'Satni Ridwan', 'KP. BARU', '1988-11-05', 'L', 'disini', '038', '038', 'disini', 'disini', 'islam', 'nikah', 'ojol', 'indo', '2020-10-16', '', ''),
(48, '42342492', 'Seprah Madeni', 'Jambu', '1976-09-07', 'P', 'disitu', '039', '039', 'disitu', 'disitu', 'islam', 'nikah', 'ojol', 'indo', '2020-10-17', '', ''),
(49, '42342493', 'Susi Mustika', 'KAMPUNG BARU', '1978-10-07', 'P', 'dst', '040', '040', 'dst', 'dst', 'islam', 'nikah', 'ojol', 'indo', '2020-10-18', '', ''),
(50, '42342494', 'Syadri', 'LOHONG', '1966-12-31', 'L', 'Disana', '041', '041', 'Disana', 'Disana', 'islam', 'nikah', 'ojol', 'indo', '2020-10-19', '', ''),
(51, '42342495', 'Syukril Hamdi Umar', 'GADUR', '1984-01-21', 'L', 'disini', '042', '042', 'disini', 'disini', 'islam', 'nikah', 'ojol', 'indo', '2020-10-20', '', ''),
(52, '42342496', 'Tesi Junita', 'PADANG', '1982-06-03', 'P', 'disitu', '043', '043', 'disitu', 'disitu', 'islam', 'nikah', 'ojol', 'indo', '2020-10-21', '', ''),
(53, '42342497', 'Widya Kurniatul Awalia', 'PADANG', '1987-07-16', 'P', 'dst', '044', '044', 'dst', 'dst', 'islam', 'nikah', 'ojol', 'indo', '2020-10-22', '', ''),
(54, '42342498', 'Yudhi Rosmen', 'PEKAN BARU', '1979-10-15', 'L', 'Disana', '045', '045', 'Disana', 'Disana', 'islam', 'nikah', 'ojol', 'indo', '2020-10-23', '', ''),
(55, '42342499', 'Zulkifli', 'KP. KANDANG', '1965-08-07', 'L', 'disini', '046', '046', 'disini', 'disini', 'islam', 'nikah', 'ojol', 'indo', '2020-10-24', '', ''),
(56, '333', 'Hamid', 'padanfg', '1991-12-09', 'L', 'padang', '12', '32', '2434', '3434', 'Islam', 'Kawin', 'IT', 'WNI', '2021-06-15', '', ''),
(57, '12345', 'Udin penyok', 'padang', '2021-06-24', 'P', 'A', '1', '2', '3', '4', 'Islam', 'Kawin', 'it', 'WNI', '2021-06-22', '12345', ''),
(58, '123456', 'Udin penyok', 'padang', '2021-06-24', 'P', 'A', '1', '2', '3', '4', 'Islam', 'Kawin', 'it', 'WNI', '', '123456', ''),
(59, '123456', 'Udin penyok', 'padang', '2021-06-24', 'P', 'A', '1', '2', '3', '4', 'Islam', 'Kawin', 'it', 'WNI', '', '1111', ''),
(60, '123456', 'Udin penyok', 'padang', '2021-06-24', 'P', 'A', '1', '2', '3', '4', 'Islam', 'Kawin', 'it', 'WNI', '', '123456', ''),
(61, '123456', 'Udin penyok', 'padang', '2021-06-24', 'P', 'A', '1', '2', '3', '4', 'Islam', 'Kawin', 'it', 'WNI', '', '1234', ''),
(62, '123456', 'Udin penyok', 'padang', '2021-06-24', 'P', 'A', '1', '2', '3', '4', 'Islam', 'Kawin', 'it', 'WNI', '', '3', ''),
(63, '5555', 'Deby', 'padang', '2021-06-09', 'L', 'padang', '01', '01', 'pb', 'pb', 'Islam', 'Kawin', 'IT', 'WNI', '', '123', ''),
(64, '12', 'debi', 'glg', '2021-07-05', 'L', '2', '2', '3', '33', '3', 'Islam', 'Belum Kawin', 'e', 'WNI', '', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(3) NOT NULL,
  `id_mitra` varchar(5) NOT NULL,
  `produk` varchar(25) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `harga_satuan` int(15) NOT NULL,
  `qty` int(5) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_mitra`, `produk`, `satuan`, `harga_satuan`, `qty`, `tanggal_transaksi`) VALUES
(41, '2', '11', 'Kilo', 400000, 3, '0000-00-00'),
(42, '2', 'Makanan', 'Kilo', 400000, 6, '2021-06-25'),
(43, '2', 'Makanan', 'Kilo', 400000, 3, '2021-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat_nagari`
--

CREATE TABLE `perangkat_nagari` (
  `id_pn` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `lokasi_tugas` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perangkat_nagari`
--

INSERT INTO `perangkat_nagari` (`id_pn`, `nama`, `alamat`, `nohp`, `lokasi_tugas`, `jabatan`) VALUES
(2, 'Debi Kifah Anggela', 'Solok', '081248234', 'Begini', 'bagitu'),
(3, 'dasfsa', 'fasfasf', 'safsfsaf', 'sfssdfsdf', 'sdfsdfsd'),
(4, 'Debby Khiffah Angela', 'Maransi City', '0812', 'ojol', 'it');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_nilai_alternatif`
--

CREATE TABLE `pilihan_nilai_alternatif` (
  `id_pilihan` int(11) NOT NULL,
  `id_kriteria` varchar(5) NOT NULL,
  `nama_pilihan` varchar(25) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pilihan_nilai_alternatif`
--

INSERT INTO `pilihan_nilai_alternatif` (`id_pilihan`, `id_kriteria`, `nama_pilihan`, `nilai`) VALUES
(3, '3', '213', 32),
(4, '12', '324', 232),
(5, '1', 'Ada', 5),
(6, '13', '3543', 43),
(8, '1', 'Tidak ada', 2),
(9, '24', 'Ada', 5),
(11, '24', 'Tidak ada', 3),
(12, '25', 'Kontrak', 4),
(13, '25', 'Milik Sendiri', 2),
(14, '20', '1-3 tahun', 1),
(15, '20', '4-6 tahun', 2),
(16, '20', '7-15 tahun', 5),
(17, '20', '>15 tahun', 1),
(18, '21', 'Pra sekolah', 2),
(19, '21', 'SD Sederajat', 3),
(20, '21', 'SMP Sederajat', 4),
(21, '21', 'SMA Sederajat', 1),
(22, '23', '300-600 ribu / bulan', 5),
(23, '23', '601-900 ribu / bulan', 4),
(24, '23', '900 ribu - 1.2 juta', 3),
(25, '23', '1,2 - 2 juta', 2),
(26, '23', '>2juta / bulan', 1),
(27, '22', '1-3 anak', 3),
(28, '22', '>4 anak', 5);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(3) NOT NULL,
  `id_mitra` varchar(5) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `harga` int(10) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_mitra`, `nama_produk`, `satuan`, `harga`, `gambar`) VALUES
(14, '4', 'Gorengnan', 'Kilo', 1000, '210621053638padi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `judul`, `isi`) VALUES
(2, 'Kochenk', '<p><strong>Kucing</strong> disebut juga <strong>kucing domestik</strong><a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-MSW3fc-4\">[4]</a><a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-ITIS_F.c.-5\">[5]</a> atau <strong>kucing rumah</strong> (<a href=\"https://id.wikipedia.org/wiki/Nama_ilmiah\">nama ilmiah</a>: <em>Felis silvestris catus</em> atau <em>Felis catus</em>) adalah sejenis <a href=\"https://id.wikipedia.org/wiki/Mamalia\">mamalia</a> <a href=\"https://id.wikipedia.org/wiki/Karnivora\">karnivora</a> dari <a href=\"https://id.wikipedia.org/wiki/Familia\">keluarga</a> <a href=\"https://id.wikipedia.org/wiki/Felidae\">Felidae</a>. Kata &quot;kucing&quot; biasanya merujuk kepada &quot;kucing&quot; yang telah dijinakkan,<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-6\">[6]</a> tetapi bisa juga merujuk kepada &quot;<a href=\"https://id.wikipedia.org/wiki/Kucing_besar\">kucing besar</a>&quot; seperti <a href=\"https://id.wikipedia.org/wiki/Singa\">singa</a> dan <a href=\"https://id.wikipedia.org/wiki/Harimau\">harimau</a>.</p>\r\n\r\n<p>Kucing telah berbaur dengan kehidupan <a href=\"https://id.wikipedia.org/wiki/Manusia\">manusia</a> paling tidak sejak 6.000 tahun SM, dari <a href=\"https://id.wikipedia.org/wiki/Kerangka\">kerangka</a> kucing di <a href=\"https://id.wikipedia.org/wiki/Siprus\">Pulau Siprus</a>.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-7\">[7]</a> Orang <a href=\"https://id.wikipedia.org/wiki/Mesir_Kuno\">Mesir Kuno</a> dari 3.500 SM telah menggunakan kucing untuk menjauhkan <a href=\"https://id.wikipedia.org/wiki/Tikus\">tikus</a> atau <a href=\"https://id.wikipedia.org/wiki/Hewan_pengerat\">hewan pengerat</a> lain dari <a href=\"https://id.wikipedia.org/wiki/Lumbung\">lumbung</a> yang menyimpan hasil panen.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-9500_years-8\">[8]</a></p>\r\n\r\n<p>Saat ini, kucing adalah salah satu <a href=\"https://id.wikipedia.org/wiki/Hewan_peliharaan\">hewan peliharaan</a> terpopuler di dunia.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-SciAm-9\">[9]</a> Kucing yang garis keturunannya tercatat secara resmi sebagai kucing <a href=\"https://id.wikipedia.org/wiki/Trah\">trah</a> atau galur murni (<em>pure breed</em>), seperti <a href=\"https://id.wikipedia.org/wiki/Kucing_persia\">persia</a>, <a href=\"https://id.wikipedia.org/wiki/Kucing_siam\">siam</a>, <a href=\"https://id.wikipedia.org/wiki/Kucing_manx\">manx</a>, dan <a href=\"https://id.wikipedia.org/wiki/Kucing_sphinx\">sphinx</a>. Kucing seperti ini biasanya dibiakkan di tempat pemeliharaan hewan resmi. Jumlah kucing ras hanyalah 1% dari seluruh kucing di dunia, sisanya adalah kucing dengan keturunan campuran seperti kucing liar atau kucing kampung.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Taksonomi dan evolusi</h2>\r\n\r\n<p><a href=\"https://id.wikipedia.org/wiki/Berkas:AfricanWildCat.jpg\"><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/AfricanWildCat.jpg/220px-AfricanWildCat.jpg\" style=\"height:165px; width:220px\" /></a></p>\r\n\r\n<p>Kucing liar Afrika, <em>Felis silvestris lybica</em>, adalah nenek moyang kucing domestik.</p>\r\n\r\n<p>Felidae adalah familia mamalia yang berevolusi dengan cepat yang berbagi nenek moyang yang sama hanya 10&ndash;15&nbsp;juta tahun yang lalu<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Johnson_1997-10\">[10]</a> dan mencakup <a href=\"https://id.wikipedia.org/wiki/Singa\">singa</a>, <a href=\"https://id.wikipedia.org/wiki/Harimau\">harimau</a>, <a href=\"https://id.wikipedia.org/wiki/Cougar\">cougar</a> dan banyak lainnya. Dalam familia ini, kucing domestik (<em>Felis catus</em>) merupakan bagian dari <a href=\"https://id.wikipedia.org/wiki/Genus\">genus</a> <em><a href=\"https://id.wikipedia.org/wiki/Felis\">Felis</a></em>, yang merupakan kelompok kucing kecil yang berisi sekitar tujuh spesies (tergantung pada skema klasifikasi).<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-MSW3fc-4\">[4]</a><a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-ITIS_F.-11\">[11]</a> Anggota dari genus ini ditemukan di seluruh dunia dan termasuk <a href=\"https://id.wikipedia.org/wiki/Kucing_hutan\">kucing hutan</a> (<em>Felis chaus</em>) dari tenggara Asia, <a href=\"https://id.wikipedia.org/wiki/Kucing_liar_Eropa\">kucing liar Eropa</a> (<em>F. silvestris silvestris</em>), <a href=\"https://id.wikipedia.org/wiki/Kucing_liar_Afrika\">kucing liar Afrika</a> (<em>F. s. lybica</em>), <a href=\"https://id.wikipedia.org/wiki/Kucing_gunung_Cina\">kucing gunung Cina</a> (<em>F. bieti</em>), dan <a href=\"https://id.wikipedia.org/wiki/Kucing_pasir\">kucing pasir</a> Arab (<em>F. margarita</em>), antara lain.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Stefoff-12\">[12]</a></p>\r\n\r\n<p>Kucing domestik pertama kali diklasifikasikan sebagai <em>Felis catus</em> oleh <a href=\"https://id.wikipedia.org/wiki/Carolus_Linnaeus\">Carolus Linnaeus</a> dalam <a href=\"https://id.wikipedia.org/w/index.php?title=Edisi_ke-10_Systema_Naturae&amp;action=edit&amp;redlink=1\">edisi ke-10 <em>Systema Naturae</em></a>-nya yang diterbitkan pada tahun 1758.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-MSW3fc-4\">[4]</a><a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-hasilan_otomatis1-13\">[13]</a> Karena <a href=\"https://id.wikipedia.org/wiki/Filogenetika\">filogenetika</a> modern, kucing domestik biasanya dianggap sebagai subspesies dari kucing liar, <em>F. silvestris</em>.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-MSW3fc-4\">[4]</a><a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Driscoll-1\">[1]</a><a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-MSW3fs-14\">[14]</a> Hal ini mengakibatkan penggunaan istilah yang bercampur, karena kucing domestik dapat disebut dengan nama subspesiesnya, <em>Felis silvestris catus</em>.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-MSW3fc-4\">[4]</a><a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Driscoll-1\">[1]</a><a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-MSW3fs-14\">[14]</a> Kucing liar juga telah disebut sebagai berbagai subspesies <em>F. catus</em>,<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-MSW3fs-14\">[14]</a> tetapi pada tahun 2003, <a href=\"https://id.wikipedia.org/w/index.php?title=International_Commission_on_Zoological_Nomenclature&amp;action=edit&amp;redlink=1\">International Commission on Zoological Nomenclature</a> menetapkan nama untuk kucing liar sebagai <em>F. silvestris</em>.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-ICZN-15\">[15]</a> Nama yang paling umum digunakan untuk kucing domestik tetap <em>F. catus</em>, mengikuti <a href=\"https://id.wikipedia.org/wiki/Konvensi_(norma)\">konvensi</a> untuk hewan peliharaan menggunakan <a href=\"https://id.wikipedia.org/wiki/Sinonim_(taksonomi)\">sinonim</a> pertama (senior) yang diusulkan.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-ICZN-15\">[15]</a> Kadang-kadang, kucing domestik disebut sebagai <em>Felis domesticus</em><a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-MacDonald-16\">[16]</a> atau <em>Felis domestica</em>,<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-MSW3fc-4\">[4]</a> seperti yang diusulkan oleh naturalis Jerman <a href=\"https://id.wikipedia.org/w/index.php?title=Johann_Christian_Polycarp_Erxleben&amp;action=edit&amp;redlink=1\">J. C. P. Erxleben</a> pada tahun 1777 tetapi ini bukan nama-nama taksonomi valid dan jarang digunakan dalam literatur ilmiah,<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-MacDonald-16\">[16]</a> karena binomial Linnaeus diutamakan.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Vella-17\">[17]</a> Sebuah populasi kucing liar hitam <a href=\"https://id.wikipedia.org/wiki/Transkaukasus\">Transkaukasia</a> pernah diklasifikasikan sebagai <em>Felis daemon</em><small> (<a href=\"https://id.wikipedia.org/w/index.php?title=Konstantin_Alekseevich_Satunin&amp;action=edit&amp;redlink=1\">Satunin</a> 1904)</small> tetapi sekarang populasi ini dianggap menjadi bagian dari kucing domestik.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-18\">[18]</a></p>\r\n\r\n<p>Semua kucing dalam genus ini berbagi nenek moyang yang sama yang mungkin hidup sekitar 6&ndash;7&nbsp;juta tahun yang lalu di Asia.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Johnson-19\">[19]</a> Hubungan yang tepat dalam Felidae dekat tetapi masih belum pasti,<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Mattern-20\">[20]</a><a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Masuda_1996-21\">[21]</a> misalnya kucing gunung Cina kadang-kadang diklasifikasikan (dengan nama <em>Felis silvestris bieti</em>) sebagai <a href=\"https://id.wikipedia.org/wiki/Upaspesies\">upaspesies</a> kucing liar, seperti varietas Afrika Utara <em>F. s. lybica</em>.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Driscoll-1\">[1]</a><a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Mattern-20\">[20]</a></p>\r\n\r\n<p>Dibandingkan dengan anjing, kucing tidak mengalami perubahan besar selama proses domestikasi, karena bentuk dan perilaku kucing domestik tidak secara radikal berbeda dari kucing liar dan kucing domestik sangat mampu bertahan di alam liar.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Lipinski-22\">[22]</a><a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-CameronBeaumont-23\">[23]</a> Kucing rumah yang sepenuhnya dijinakkan sering kawin silang dengan populasi <em>F. catus</em> <a href=\"https://id.wikipedia.org/wiki/Liar\">liar</a>.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Bradshaw1999-24\">[24]</a> Evolusi terbatas selama domestikasi ini berarti bahwa hibridisasi dapat <a href=\"https://id.wikipedia.org/w/index.php?title=Hibrida_Felidae&amp;action=edit&amp;redlink=1\">terjadi dengan banyak Felidae lainnya</a>, terutama <a href=\"https://id.wikipedia.org/w/index.php?title=Kucing_leopard&amp;action=edit&amp;redlink=1\">kucing leopard</a> Asia.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Oliveira-25\">[25]</a> Beberapa perilaku alami dan karakteristik kucing liar mungkin telah <a href=\"https://id.wikipedia.org/w/index.php?title=Preadaptasi&amp;action=edit&amp;redlink=1\">memengaruhi</a> mereka untuk didomestikasi sebagai hewan peliharaan.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-CameronBeaumont-23\">[23]</a> Karakter ini termasuk ukuran kecil, sifat sosial, bahasa tubuh yang jelas, suka bermain dan kecerdasan relatif tinggi.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Fogle-26\">[26]</a>:12&ndash;17 Beberapa spesies Felidae kecil mungkin memiliki kecenderungan bawaan terhadap kejinakan.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-CameronBeaumont-23\">[23]</a></p>\r\n\r\n<p>Kucing memiliki baik hubungan <a href=\"https://id.wikipedia.org/wiki/Mutualisme\">mutualistik</a> atau <a href=\"https://id.wikipedia.org/wiki/Komensalisme\">komensal</a> dengan manusia. Dua teori utama diberikan tentang bagaimana kucing didomestikasi. Dalam satu teori, orang sengaja menjinakkan kucing dalam proses <a href=\"https://id.wikipedia.org/wiki/Seleksi_buatan\">seleksi buatan</a> karena mereka adalah predator dari hama.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-OConnor-27\">[27]</a> Ini telah dikritik sebagai tidak masuk akal, karena hadiah untuk usaha seperti itu mungkin terlalu sedikit; kucing umumnya tidak melaksanakan perintah dan meskipun mereka makan hewan pengerat, spesies lain seperti <em><a href=\"https://id.wikipedia.org/wiki/Ferret\">ferret</a></em> atau <a href=\"https://id.wikipedia.org/wiki/Terrier\">terrier</a> mungkin lebih baik dalam mengendalikan hama-hama ini.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Driscoll-1\">[1]</a> Ide alternatif adalah bahwa kucing hanya ditoleransi oleh orang-orang dan secara bertahap menyimpang dari kerabat liar mereka melalui <a href=\"https://id.wikipedia.org/wiki/Seleksi_alam\">seleksi alam</a>, karena mereka menyesuaikan dengan berburu hama yang ditemukan di sekitar manusia di kota dan desa.<a href=\"https://id.wikipedia.org/wiki/Kucing#cite_note-Driscoll-1\">[1]</a></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id_struktur` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id_struktur`, `file`) VALUES
(1, '210621055103padi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `id_pn` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(25) NOT NULL,
  `foto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_pn`, `username`, `password`, `level`, `foto`) VALUES
(8, '2', '11', '11', 'Admin', 'Admin-210816052510padi.jpg'),
(9, '3', '33', '33', 'Pimpinan', ''),
(10, '4', 'ee', 'ee', 'Admin', 'Admin-210816053007kochenk.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  ADD PRIMARY KEY (`id_jenis_bantuan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_nilai_alternatif`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `perangkat_nagari`
--
ALTER TABLE `perangkat_nagari`
  ADD PRIMARY KEY (`id_pn`);

--
-- Indexes for table `pilihan_nilai_alternatif`
--
ALTER TABLE `pilihan_nilai_alternatif`
  ADD PRIMARY KEY (`id_pilihan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id_struktur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  MODIFY `id_jenis_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `perangkat_nagari`
--
ALTER TABLE `perangkat_nagari`
  MODIFY `id_pn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pilihan_nilai_alternatif`
--
ALTER TABLE `pilihan_nilai_alternatif`
  MODIFY `id_pilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id_struktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
