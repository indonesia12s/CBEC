-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 05:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lkp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_program` int(11) DEFAULT NULL,
  `id_pengajar` int(11) NOT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `program_kursus` varchar(100) DEFAULT NULL,
  `ruang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_kelas`, `id_program`, `id_pengajar`, `hari`, `jam_mulai`, `jam_selesai`, `program_kursus`, `ruang`) VALUES
(12, 8, 5, 7, 'Senin', '09:00:00', '11:00:00', NULL, 'lab komputer'),
(14, 9, 6, 6, 'Senin', '13:00:00', '15:00:00', NULL, 'R 1.1'),
(15, 12, 11, 5, 'Selasa', '09:00:00', '11:00:00', NULL, 'R 1.2'),
(16, 9, 6, 6, 'Kamis', '12:30:00', '14:00:00', NULL, 'R 1.2');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `id_program` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `id_program`) VALUES
(8, 'Kelas Komputer ', NULL),
(9, 'Kelas Bahasa Inggris', NULL),
(10, 'Matematika', NULL),
(11, 'Kelas Piano ', NULL),
(12, 'Kelas Memasak', NULL),
(13, 'Kelas Menyanyi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `pengalaman` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id`, `nama`, `username`, `password`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `no_hp`, `email`, `pendidikan`, `pengalaman`, `foto`, `tanggal_input`) VALUES
(3, 'Ahmad Rizki Nugraha', 'rizki', '202cb962ac59075b964b07152d234b70', 'Purwokerto', '1990-05-11', 'L', 'Islam', 'Purwokerto', '82134567890', 'rizki@lkp.com', 'S1 Pendidikan Bahasa Inggris', '5 tahun mengajar bahasa Inggris di LKP\r\n', 'profile2.png', '2025-07-10 16:12:45'),
(4, 'Siti Nur Azizah', 'siti', '202cb962ac59075b964b07152d234b70', 'Purbalingga', '0097-02-19', 'P', 'Islam', 'Purbalingga\r\n', '81223456789', 'siti@lkp.com', 'S1 Pendidikan Anak Usia Dini', '8 tahun sebagai instruktur PAUD\r\n', 'profile3.png', '2025-07-10 16:14:17'),
(5, 'Budi Santosa', 'budi', '202cb962ac59075b964b07152d234b70', 'Banyumas', '1999-03-04', 'L', 'Islam', 'Banyumas\r\n', '85734561234', 'budi@lkp.com', 'S1 Bahasa Jepang', '10 tahun sebagai pengajar komputer dasar\r\n', '', '2025-07-10 16:15:53'),
(6, 'Indah Lestari', 'indah', '202cb962ac59075b964b07152d234b70', 'Banyumas', '1992-05-15', 'P', 'Islam', 'Banyumas\r\n', '82156789000', 'indah@lkp.com', 'S1 Bahasa Jepang', '6 tahun mengajar kursus bahasa Jepang\r\n', 'profile4.png', '2025-07-10 16:17:10'),
(7, 'Yuda Prasetyo', 'yuda', '202cb962ac59075b964b07152d234b70', 'Cilacap', '0197-06-22', 'L', 'Islam', 'Cilacap\r\n', '89656712345', 'yuda@lkp.com', 'S1 Desain Komunikasi Visual', '7 tahun pengalaman desain dan animasi\r\n', 'profile5.png', '2025-07-10 16:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Hadir','Izin','Sakit','Alpha') NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `id_jadwal`, `id_siswa`, `tanggal`, `status`, `keterangan`) VALUES
(9, 14, 4, '2025-07-10', 'Hadir', NULL),
(10, 14, 5, '2025-07-10', 'Hadir', NULL),
(11, 14, 6, '2025-07-10', 'Alpha', NULL),
(12, 14, 10, '2025-07-10', 'Hadir', NULL),
(13, 14, 13, '2025-07-10', 'Izin', NULL),
(14, 14, 12, '2025-07-10', 'Hadir', NULL),
(15, 14, 14, '2025-07-10', 'Sakit', NULL),
(16, 16, 4, '2025-07-10', 'Hadir', NULL),
(17, 16, 5, '2025-07-10', 'Hadir', NULL),
(18, 16, 6, '2025-07-10', 'Hadir', NULL),
(19, 16, 10, '2025-07-10', 'Hadir', NULL),
(20, 16, 13, '2025-07-10', 'Sakit', NULL),
(21, 16, 12, '2025-07-10', 'Izin', NULL),
(22, 16, 14, '2025-07-10', 'Hadir', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_kursus`
--

CREATE TABLE `program_kursus` (
  `id` int(11) NOT NULL,
  `nama_program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_kursus`
--

INSERT INTO `program_kursus` (`id`, `nama_program`) VALUES
(5, 'Komputer '),
(6, 'Bahasa Inggris'),
(7, 'B.Inggris dan Matematika'),
(8, 'Matematika kelas 10'),
(9, 'Memasak, Piano & Menyanyi'),
(10, 'Persiapan buat tes masuk SMP N 1 Kalimanah'),
(11, 'Memasak'),
(12, 'Matematika, bahasa Indonesia, bahasa Inggris'),
(13, 'Matematika & Bahasa inggris');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nisn`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp`, `email`, `pendidikan`, `foto`, `password`, `tanggal_input`) VALUES
(3, 'Khansa Aleshafiqa P.A', '11022012', '-', 'P', '-', '2012-11-02', 'Pengadegan RT 004 RW 012\r\n', '082322531996', 'aleshafiqa1@gmail.com', 'SD N 3 Pengadegan', '', '0192023a7bbd73250516f069df18b500', '2025-07-10 14:30:36'),
(4, 'AZKAL AUFA FAUZAN', '11272013', '-', 'L', '-', '2013-11-27', 'Perumahan Babakan Indah Estate No B9 rt 37 rw 9 Kalimanah\r\n', '081548848810', 'yantirokha39@gmail.com', 'SD IT Alam Purbalingga', '', '202cb962ac59075b964b07152d234b70', '2025-07-10 14:32:28'),
(5, 'SHIDQIA RAHMA AZZAHRA', '08272016', '-', 'P', '-', '2016-08-27', 'Perumahan Babakan Indah Estate No. B9 rt 37 rw 9 Kalimanah\r\n', '081548848810', 'yantirocha@gmail.com', 'SD IT Alam Purbalingga', '', '996692967280a4e078f770d1a1503f8d', '2025-07-10 14:34:36'),
(6, 'Langit Abimana', '07022017', '-', '', '-', '2016-07-02', 'Jl Wiramenggala No 53, Penambongan RT 1 RW 2, Kec. Purbalingga, Kab. Purbalingga\r\n', '085811925311', 'merdikowatihappy@gmail.com', 'SDN 1 Pubalingga Lor', '', '2bf1b6bcb3e876074bd45305d232ede4', '2025-07-10 14:36:22'),
(7, 'Rizqi ammar ramadhan', '09102009', '-', 'L', '-', '2009-09-10', 'Perum griya perwira asri blok T21, rt 3 rw 5 boja negara, purbalingga\r\n', '-', 'listyariku@gmail.com', 'Man purbalingga', '', 'd165c8554e87c67398a1b77a49a287b0', '2025-07-10 14:37:55'),
(8, 'Raudhah Kimora Athaya irwansyah ', '12122019', '-', '', '-', '2019-12-12', 'PURBALINGGA \r\n', '082232122005 ', 'kurniasari45nova@gmail.com', 'TK istiqomah sambas purbalingga ', '', '0192023a7bbd73250516f069df18b500', '2025-07-10 14:39:31'),
(9, 'Abenk Dzulfikar', '09112013', '-', '', '-', '2013-09-11', '-', '081287330373', 'nunungmayangsari26@gmail.com', 'SD N 1 GRECOL', '', '4bd1d75b1fc4af4d3e03d6a6f5ccbc3e', '2025-07-10 14:41:05'),
(10, 'Zafarani Inara Sakhi', '08072012', '-', 'P', '-', '2012-08-07', 'Serayu Larangan\r\n', '081393838093', 'teguhwahyudiono1985@gmail.com', 'SMP IHSANUL FIKRI', '', 'e1ed39489e32c9851eee49c16116aa1e', '2025-07-10 14:43:06'),
(12, 'Ayesha Safarrina Triono', '10042010', '-', '', '-', '2010-10-04', 'Purbalingga Lor RT 4 RW 3 gg kecepit atau Desa Munjul sanggrahan RT 3 RW 2 Kutasari\r\n', '081215751115', 'estitriono01@gmail.com', 'SMP Istiqomah Sambas Purbalingga', '', 'fea199bd71f0407da2ecb68be506f6e7', '2025-07-10 14:56:24'),
(13, 'Naufal Aditya Nur Rayyan', '02012016', '-', 'L', '-', '2016-02-01', 'Rabak, rt 03 RW 03 kecamatan kalimanah kabupaten Purbalingga\r\n', '085291619439', 'fadilahfauzan999@gmail.com', 'MIM RABAK', '', '5899d99f265558786362cbfc1e055c12', '2025-07-10 14:58:09'),
(14, 'FIDELA ADE HAPSARI', '10032012', '-', 'P', '-', '2012-10-03', 'Bakula  rt 01 rw 01\r\n', '085642383311', 'nike.adetyaningsih@gmail.com', 'SMPN 1 KEMANGKON', '', '8210bf33396fecf2ac46f10733415780', '2025-07-10 14:59:27'),
(15, 'Adzkia Hasna Khairunnisa', '04292015', '-', '', '', '2015-04-29', '\"Bojongsari rt 02 rw 01 kec Bojongsari kab purbalingga\r\n\"\r\n', '085227495159', 'uyati4871@gmail.com', 'MI Istoqamah sambas purbalingga', '', '9d77d08620449b1b6a8b8b43db26c474', '2025-07-10 15:00:51'),
(16, 'Azfar Ahmad Daniyal', '02142019', '-', '', '-', '2019-02-14', 'Bojongsari rt 02 rw 01 kec Bojongsari kab purbalingga\r\n', '085227495159', 'umy.satria84@gmail.com', 'MI Istiqamah Sambas Purbalingga', '', '0192023a7bbd73250516f069df18b500', '2025-07-10 15:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_kelas`
--

CREATE TABLE `siswa_kelas` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tahun_ajaran` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa_kelas`
--

INSERT INTO `siswa_kelas` (`id`, `id_siswa`, `id_kelas`, `tahun_ajaran`) VALUES
(5, 3, 8, '2024/2025'),
(6, 4, 9, '2024/2025'),
(7, 5, 9, '2024/2025'),
(8, 6, 9, '2024/2025'),
(9, 6, 10, '2024/2025'),
(10, 7, 10, '2024/2025'),
(11, 8, 12, '2024/2025'),
(12, 8, 11, '2024/2025'),
(13, 10, 9, '2024/2025'),
(15, 13, 9, '2024/2025'),
(16, 12, 9, '2024/2025'),
(17, 13, 10, '2024/2025'),
(18, 14, 9, '2024/2025');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengajar` (`id_pengajar`),
  ADD KEY `jadwal_ibfk_1` (`id_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `program_kursus`
--
ALTER TABLE `program_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `program_kursus`
--
ALTER TABLE `program_kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id`);

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`),
  ADD CONSTRAINT `presensi_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`);

--
-- Constraints for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD CONSTRAINT `siswa_kelas_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`),
  ADD CONSTRAINT `siswa_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
