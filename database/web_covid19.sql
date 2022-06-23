-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 05:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_covid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_tamu` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_tamu` varchar(100) NOT NULL,
  `dari` varchar(250) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `saran` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `pertanyaan` varchar(250) NOT NULL,
  `jawaban` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Belum dilihat, 0=Sudah dilihat',
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_faq`, `id_user`, `nama_tamu`, `pertanyaan`, `jawaban`, `status`, `tanggal`) VALUES
(7, 4, 'Andika Ade Nugraha', 'Apa yang sedang kamu lakukan saat ini?', 'Mengerjakan project', 0, '2021-11-26 06:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `penanggulangan`
--

CREATE TABLE `penanggulangan` (
  `id_penanggulangan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penanggulangan`
--

INSERT INTO `penanggulangan` (`id_penanggulangan`, `id_user`, `nama`, `deskripsi`, `keterangan`, `jenis`, `tanggal`) VALUES
(9, 4, 'Administrator', '<p>Di Malaysia, angka kasus COVID anak tahun 2021 (tahun berjalan) melonjak 25x lipat dari tahun 2020, dari 12.000 ke 310.000. Per tanggal 2 September 2021, ada 41 kematian COVID anak sementara tahun lalu hanya 6 kasus kematian COVID anak.</p>\r\n\r\n<p>', 'Pentingnya Vaksinasi Untuk Sekolah Tatap Muka', '2', '2021-12-02 04:32:20'),
(14, 4, 'Administrator', '<p>Kementerian Agama (Kemenag) mengeluarkan Surat Edaran Menteri Agama, SE. 15 Tahun 2021 tentang panduan pelaksanaan Hari Raya Idul Adha 10 Zulhijjah 1442 H/2021 M. Dalam Surat Edaran tersebut, Kemenag secara prinsip membatasi&nbsp;</p>\r\n\r\n<p>Kementerian Agama (Kemenag) mengeluarkan Surat Edaran Menteri Agama, SE. 15 Tahun 2021 tentang panduan pelaksanaan Hari Raya Idul Adha 10 Zulhijjah 1442 H/2021 M. Dalam Surat Edaran tersebut, Kemenag secara prinsip membatasi&nbsp;</p>\r\n\r\n<p>Kementerian Agama (Kemenag) mengeluarkan Surat Edaran Menteri Agama, SE. 15 Tahun 2021 tentang panduan pelaksanaan Hari Raya Idul Adha 10 Zulhijjah 1442 H/2021 M. Dalam Surat Edaran tersebut, Kemenag secara prinsip membatasi&nbsp;</p>\r\n', 'Panduan Menyambut Ibadah Idul Adha 2021 :', '2', '2021-12-02 04:35:00'),
(15, 4, 'Aviantara', 'Mari pertimbangkan melakukan hal-hal berikut agar apa yg terjadi di India tidak terjadi di Indonesia kita tercinta:\r\n\r\n1. Perusahaan, perkantoran, pabrik agar memaksimalkan WFH di kala kasus harian masih naik terus. Jika sebagian tetap harus WFO, per', '10 Cara Indonesia Tangguh Melawan COVID-19', '2', '2021-12-02 02:54:00'),
(16, 4, 'Aviantara', 'Penulis: dr. Kinanti Citra Weny\r\n\r\nProgram vaksinasi di Indonesia sudah berlangsung sejak 13 Januari 2021 dengan Presiden Joko Widodo sebagai penerima vaksin pertama. Penyelenggaraan program vaksin berlangsung dalam empat tahap dan diperkirakan akan ', 'Vaksin untuk Penyintas COVID-19, Perlu atau Tidak?', '1', '2021-12-02 02:54:22'),
(17, 4, 'Aviantara', 'Tim KawalCOVID-19 berbincang dengan dr. Sayuri Suwandi, SpPD dan dr. Dirga Sakti Rambe, SpPD, untuk menjawab pertanyaan seputar cara isolasi mandiri (isoman) yang benar. Berikut ringkasan dari dua sesi Instagram Live yang bisa dilihat di sini.', 'Cara Isolasi Mandiri yang Benar', '1', '2021-12-02 02:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `penyebaran`
--

CREATE TABLE `penyebaran` (
  `id_penyebaran` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `suspek` varchar(10) NOT NULL,
  `dirawat` varchar(10) NOT NULL,
  `sembuh` varchar(10) NOT NULL,
  `meninggal` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `konfirmasi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyebaran`
--

INSERT INTO `penyebaran` (`id_penyebaran`, `id_wilayah`, `suspek`, `dirawat`, `sembuh`, `meninggal`, `total`, `konfirmasi`) VALUES
(9, 2, '20', '20', '5', '2', '47', ''),
(11, 5, '2', '3', '4', '10', '19', ''),
(12, 4, '10', '15', '16', '2', '63', '20'),
(15, 6, '100', '20', '50', '30', '300', '100');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `level` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `penduduk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `rw`, `penduduk`) VALUES
(2, '10', '1000'),
(4, '11', '500'),
(5, '12', '200'),
(6, '09', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penanggulangan`
--
ALTER TABLE `penanggulangan`
  ADD PRIMARY KEY (`id_penanggulangan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penyebaran`
--
ALTER TABLE `penyebaran`
  ADD PRIMARY KEY (`id_penyebaran`),
  ADD KEY `id_wilayah` (`id_wilayah`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penanggulangan`
--
ALTER TABLE `penanggulangan`
  MODIFY `id_penanggulangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penyebaran`
--
ALTER TABLE `penyebaran`
  MODIFY `id_penyebaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
