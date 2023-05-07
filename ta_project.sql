-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 08:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(4, 'admin', 'admin', '$2y$10$ZiLdaU9iPPPKAn5Kad1IkereJdcdmtd12I7dFbxVtYkx..LY/VKsu'),
(6, 'Muhammad Rezky', 'admin', '$2y$10$phZ801IIsdO82kgni58M8OpebModwqqVwbFMOjvPAlfaZacmOKX6i');

-- --------------------------------------------------------

--
-- Table structure for table `apaaja`
--

CREATE TABLE `apaaja` (
  `id_apa` int(100) NOT NULL,
  `nama_apa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apaaja`
--

INSERT INTO `apaaja` (`id_apa`, `nama_apa`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'c'),
(4, 'd'),
(6, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `ikut_ujian`
--

CREATE TABLE `ikut_ujian` (
  `id_tes` int(11) NOT NULL,
  `id_ujian` int(11) DEFAULT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `list_soal` longtext DEFAULT NULL,
  `list_jawaban` longtext DEFAULT NULL,
  `jml_benar` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ikut_ujian`
--

INSERT INTO `ikut_ujian` (`id_tes`, `id_ujian`, `id_peserta`, `list_soal`, `list_jawaban`, `jml_benar`, `nilai`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(147, 11, 38, '13.,21.,11.,23.,28.,29.,26.,22.,12.,25.,27.,24.', '13.,21.,11.,23.,28.,29.,26.,22.,12.,25.,27.,24.', 0, 0, '2022-09-13 16:21:39', '2022-09-13 17:21:39', 'Y'),
(149, 11, 23, '26.,22.,12.,13.,29.,25.,27.,24.,11.,28.,21.,23.', '26:C,22:,12:,13:,29:,25:,27:,24:,11:,28:,21:,23:', 0, 0, '2022-09-28 09:59:07', '2022-09-28 10:59:07', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`, `nama_jurusan`) VALUES
(5, 12, 'Teknik komputer'),
(6, 11, 'Teknik Sipil'),
(7, 13, 'Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `kegiatan`, `nama_kegiatan`) VALUES
(13, 2022, 'Ujian Masuk Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_register` varchar(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `askol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nama`, `no_register`, `jurusan`, `password`, `askol`) VALUES
(23, 'Eka', 'PMB-21001', 5, '1', 'SMK N 1 Payakumbuh'),
(25, 'Rezky', 'PMB-21003', 6, '1', 'SMK N 1 Payakumbuh'),
(35, 'Eko', 'PMB-21002', 7, '1', 'SMK N 2 Payakumbuh'),
(36, 'Sabil', 'PMB-21005', 7, 'PMB-21005', 'SMK N 2 Payakumbuh'),
(37, 'Alex', 'PMB-21004', 6, 'PMB-21004', 'SMK N 1 Payakumbuh'),
(38, 'jhono', 'PMB-21006', 5, 'admin', 'SMK N 2 Payakumbuh'),
(39, 'Nando', 'PMB-21007', 6, '1', 'SMK N 3 Payakumbuh'),
(40, 'Riki', 'PMB-21008', 7, 'PMB-21008', 'SMK N 3 Payakumbuh'),
(41, 'Shopie', 'PMB-21009', 7, 'PMB-21009', 'SMK N 3 Payakumbuh'),
(42, 'rease', 'PMB-210010', 7, '1', 'SMK N 3 Payakumbuh'),
(43, 'Jhoni', 'PMB-210011', 7, 'PMB-210011', 'SMK N 3 Payakumbuh'),
(44, 'nyoba', 'PMB-210022', 7, 'PMB-210022', 'SMK N 1 Payakumbuh'),
(64, 'Rezi Suci Rahmadani', 'PMB-STTP24', 5, 'PMB-STTP24', 'SMK N 4 Payakumbuh'),
(65, 'Selfia Bonita Sari', 'PMB-STTP22', 7, 'PMB-STTP22', 'SMK N 4 Payakumbuh');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `kegiatan` int(11) DEFAULT NULL,
  `soal` text DEFAULT NULL,
  `media` varchar(50) DEFAULT NULL,
  `opsi_a` text DEFAULT NULL,
  `opsi_b` text DEFAULT NULL,
  `opsi_c` text DEFAULT NULL,
  `opsi_d` text DEFAULT NULL,
  `opsi_e` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `kegiatan`, `soal`, `media`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `jawaban`) VALUES
(11, 13, '<p>Berdasarkan tipe senyawanya, pernyataan berikut yang benar tentang alum dan dietilseng<br />\r\nadalah...</p>\r\n', NULL, 'Pada tekanan yang sama, alum mendidih pada suhu lebih tinggi daripada titik didih dietilseng', 'Kelarutan alum dalam air lebih rendah daripada kelarutan dietilseng', 'Bilangan koordinasi Zn pada dietilseng sama dengan bilangan koordinasi Al pada alum', 'Molekul dietilseng lebih polar daripada molekul alum', 'Pada suhu yang sama tekanan uap dietilseng lebih rendah daripada tekanan uap alum', 'A'),
(12, 13, '<p>Konsentrasi ion [Al(H2O)5(OH)]2+ dalam larutan alum 0,1 M dalam air pada pH = 3<br />\r\nadalah...</p>\r\n', NULL, '0,1 M', '1,0 x 10-3 M', '2,0 x 10-3 M', '5,0 x 10-3 M', '1,7 x 10-3 M', 'A'),
(13, 13, '<p>Pada permukaan kertas, sebanyak 6,17 g uap dietilseng (Mr = 123,4) habis bereaksi<br />\r\ndengan campuran uap air dan oksigen. Jika reaksi ini menghasilkan 1,76 g CO2 maka<br />\r\nmassa gas etana yang terbentuk adalah...</p>\r\n', NULL, '3,0 g', '2,4 g', '1,5 g', '0,6 g', '0,2 g', 'B'),
(21, 13, '<p>1 adalah berapa persen dari 125 ?</p>\r\n', NULL, '1,25%', '12,5%', '0,08%', '0,80%', '8%', 'D'),
(22, 13, '<p>14,035 : 0,07 =</p>\r\n', NULL, '2,05', '2,005', '20,5', '20,05', '200,5', 'E'),
(23, 13, '<p>26% x 17 =</p>\r\n', NULL, '4,42', '4,042', '44,2', '44,02', '0,442', 'A'),
(24, 13, '<p>Dulu bangsa Indonesia dikenal sebagai bangsa yang memiliki karakter yang menjunjung<br />\r\ntinggi nilai-nilai Pancasila, budaya, dan agama yang dianutnya. Kesantunan bangsa<br />\r\nIndonesia terkenal sampai ke mancanegara sehingga para wisatawan pun tertarik untuk<br />\r\ndatang menikmati indahnya alam Indoensia. Tetapi jika melihat kondisi bangsa saat ini, kita<br />\r\ndihadapkan pada satu keprihatinan dimana bangsa Indonesia saat ini tengah mengalami<br />\r\nkrisis moral dan krisis kepribadian.<br />\r\nBangsa Indonesia diakui atau tidak saat ini tengah sakit. Aksi anarkisme, kekerasan, dan<br />\r\npelanggaran hukum hampir setiap hari mewarnai media massa. Sebagian anak bangsa saat<br />\r\nini menjelma seolah-olah menjadi kaum barbar yang menganiaya dan membunuh bangsa<br />\r\nsendiri, merusak fasilitas umum, dan tidak toleran. Korupsi semakin menjadi-jadi. Korupsi<br />\r\nseolah telah menjadi kanker akut yang menggerogoti bangsa ini. Korupsi terjadi dari level<br />\r\nkelas teri seperti kepengurusan KTP sampai kepada level kelas kakap seperti korupsi<br />\r\nBantuan Likuiditas Bank Indonesia (BLBI) dan kasus Bank Century. Atas hal tersebut,<br />\r\nberbagai lembaga survei korupsi internasional seperti Transparansi Internasional Indonesia<br />\r\n(TII) menempatkan Indonesia senagai negara terkorup baik di Asia bahkan di dunia.</p>\r\n\r\n<p><strong><em>Dikutip dari: Buku Revolusi Mental Berbasis Pendidikan Karakter</em></strong></p>\r\n\r\n<p>Pokok pikiran utama yang terdapat pada paragraf pertama dalam teks tersebut adalah...</p>\r\n', NULL, 'Bangsa Indonesia merupakan bangsa yang berkarakter dari nilai-nilai pancasila, budaya dan agama yang dianutnya', 'Bangsa Indonesia saat ini sedang dilanda keprihatinan yaitu krisis moral dan kepribadian.', 'Bangsa Indonesia mengalami perubahan karakter dan kepribadian dari dulu hingga saat ini.', 'Banyaknya kasus buruk yang terjadi di negeri ini, menunjukkan bahwa bangsa Indonesia sedang sakit.', 'Indonesia merupakan negara yang masih banyak diminati oleh wisatawan mancanegara karena alamnya yang indah.', 'B'),
(25, 13, '<p>Dulu bangsa Indonesia dikenal sebagai bangsa yang memiliki karakter yang menjunjung<br />\r\ntinggi nilai-nilai Pancasila, budaya, dan agama yang dianutnya. Kesantunan bangsa<br />\r\nIndonesia terkenal sampai ke mancanegara sehingga para wisatawan pun tertarik untuk<br />\r\ndatang menikmati indahnya alam Indoensia. Tetapi jika melihat kondisi bangsa saat ini, kita<br />\r\ndihadapkan pada satu keprihatinan dimana bangsa Indonesia saat ini tengah mengalami<br />\r\nkrisis moral dan krisis kepribadian.<br />\r\nBangsa Indonesia diakui atau tidak saat ini tengah sakit. Aksi anarkisme, kekerasan, dan<br />\r\npelanggaran hukum hampir setiap hari mewarnai media massa. Sebagian anak bangsa saat<br />\r\nini menjelma seolah-olah menjadi kaum barbar yang menganiaya dan membunuh bangsa<br />\r\nsendiri, merusak fasilitas umum, dan tidak toleran. Korupsi semakin menjadi-jadi. Korupsi<br />\r\nseolah telah menjadi kanker akut yang menggerogoti bangsa ini. Korupsi terjadi dari level<br />\r\nkelas teri seperti kepengurusan KTP sampai kepada level kelas kakap seperti korupsi<br />\r\nBantuan Likuiditas Bank Indonesia (BLBI) dan kasus Bank Century. Atas hal tersebut,<br />\r\nberbagai lembaga survei korupsi internasional seperti Transparansi Internasional Indonesia<br />\r\n(TII) menempatkan Indonesia senagai negara terkorup baik di Asia bahkan di dunia.</p>\r\n\r\n<p><strong><em>Dikutip dari: Buku Revolusi Mental Berbasis Pendidikan Karakter</em></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pokok pikiran utama yang terdapat pada paragraf terakhir dalam bacaan tersebut adalah...</p>\r\n', NULL, 'Aksi anarkis, kekerasan dan pelanggaran hukum hampir setiap hari mewarnai bangsa Indonesia.', 'Indonesia bisa disebut sebagai negara terkorup karena banyaknya kasus korupsi yang terjadi akhir-akhir ini.', 'Bangsa Indonesia saat ini diakui atau tidak diakui sedang sakit.', 'Kasus korupsi BLBI dan Bank Century menjadikan bangsa Indonesia termasuk dalam kategori negara terkorup seAsia.', 'Bangsa Indonesia yang semula merupakan bangsa yang baik kini justru berubah menjadi bangsa yang barbar.', 'C'),
(26, 13, '<p>Dulu bangsa Indonesia dikenal sebagai bangsa yang memiliki karakter yang menjunjung<br />\r\ntinggi nilai-nilai Pancasila, budaya, dan agama yang dianutnya. Kesantunan bangsa<br />\r\nIndonesia terkenal sampai ke mancanegara sehingga para wisatawan pun tertarik untuk<br />\r\ndatang menikmati indahnya alam Indoensia. Tetapi jika melihat kondisi bangsa saat ini, kita<br />\r\ndihadapkan pada satu keprihatinan dimana bangsa Indonesia saat ini tengah mengalami<br />\r\nkrisis moral dan krisis kepribadian.<br />\r\nBangsa Indonesia diakui atau tidak saat ini tengah sakit. Aksi anarkisme, kekerasan, dan<br />\r\npelanggaran hukum hampir setiap hari mewarnai media massa. Sebagian anak bangsa saat<br />\r\nini menjelma seolah-olah menjadi kaum barbar yang menganiaya dan membunuh bangsa<br />\r\nsendiri, merusak fasilitas umum, dan tidak toleran. Korupsi semakin menjadi-jadi. Korupsi<br />\r\nseolah telah menjadi kanker akut yang menggerogoti bangsa ini. Korupsi terjadi dari level<br />\r\nkelas teri seperti kepengurusan KTP sampai kepada level kelas kakap seperti korupsi<br />\r\nBantuan Likuiditas Bank Indonesia (BLBI) dan kasus Bank Century. Atas hal tersebut,<br />\r\nberbagai lembaga survei korupsi internasional seperti Transparansi Internasional Indonesia<br />\r\n(TII) menempatkan Indonesia senagai negara terkorup baik di Asia bahkan di dunia.</p>\r\n\r\n<p><strong><em>Dikutip dari: Buku Revolusi Mental Berbasis Pendidikan Karakter</em></strong></p>\r\n\r\n<p><strong><em>Judul yang tepat untuk bacaan di atas adalah...</em></strong></p>\r\n', NULL, 'Kasus Korupsi Menggerogoti Bangsa Indonesia', 'Krisis Moral dan Karakter Melanda Bangsa Indonesia', 'Perubahan Karakter Bangsa Indonesia', 'Nilai-Nilai pancasila, budaya dan agama sebagai Karakter Bangsa Indonesia', 'Terkikisnya Karekter Asli Bangsa Indonesia', 'B'),
(27, 13, '<p>Carlos: &hellip;.?<br />\r\nSantiago: Yes, I have.<br />\r\nCarlos: When did you go there?<br />\r\nSantiago: Last year.</p>\r\n', NULL, 'Are you going there?', 'Did you go there?', 'Have you go there?', 'Have you ever gone to New York?', 'do you want to go there?', 'D'),
(28, 13, '<p>This is an expression of surprising....</p>\r\n', NULL, 'Thank you', 'I don’t believe that', 'I’m fine, thank you', 'I’d love you', 'I’m sorry to hear that', 'B'),
(29, 13, '<p>I&rsquo;m tired. I&rsquo;m (go) to bed now.</p>\r\n', NULL, 'gone', 'goes', 'go', 'going', 'go on', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(11) NOT NULL,
  `nama_ujian` varchar(100) NOT NULL DEFAULT '0',
  `id_kegiatan` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status_ujian` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `nama_ujian`, `id_kegiatan`, `waktu`, `tanggal`, `status_ujian`) VALUES
(11, 'Ujian Masuk Mahasiswa tahap 1 tahun 2022', 13, 60, '2022-05-30', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `apaaja`
--
ALTER TABLE `apaaja`
  ADD PRIMARY KEY (`id_apa`);

--
-- Indexes for table `ikut_ujian`
--
ALTER TABLE `ikut_ujian`
  ADD PRIMARY KEY (`id_tes`),
  ADD KEY `ikut_ujian_ibfk_1` (`id_ujian`),
  ADD KEY `ikut_ujian_ibfk_2` (`id_peserta`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD UNIQUE KEY `cek_nama` (`nama`),
  ADD KEY `peserta_ibfk_1` (`jurusan`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `soal_ibfk_1` (`kegiatan`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`),
  ADD KEY `ujian_ibfk_1` (`id_kegiatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `apaaja`
--
ALTER TABLE `apaaja`
  MODIFY `id_apa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ikut_ujian`
--
ALTER TABLE `ikut_ujian`
  MODIFY `id_tes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ikut_ujian`
--
ALTER TABLE `ikut_ujian`
  ADD CONSTRAINT `ikut_ujian_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ikut_ujian_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
