-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 06:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_user` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `namalengkap` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_user`, `username`, `nip`, `namalengkap`, `password`, `type`, `avatar`) VALUES
(8, 'admin', '123', 'Admin', '202cb962ac59075b964b07152d234b70', 'admin', 'a999e04e113e2f2f5c745677ced51f5b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` int(255) NOT NULL,
  `nama_bidang` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Enterprise'),
(2, 'Data Solutions');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cabang`
--

CREATE TABLE `tb_cabang` (
  `id` int(11) NOT NULL,
  `cabang` varchar(256) NOT NULL,
  `tahun` varchar(256) NOT NULL,
  `jumlah` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cabang`
--

INSERT INTO `tb_cabang` (`id`, `cabang`, `tahun`, `jumlah`) VALUES
(1, 'Pusat', '2021', '93'),
(2, 'Tanjung Priok', '2021', '56'),
(3, 'Teluk Bayur', '2021', '17'),
(4, 'Palembang', '2021', '34'),
(5, 'Jambi', '2021', '6'),
(6, 'Panjang', '2021', '27'),
(7, 'Bengkulu', '2021', '25'),
(8, 'Pangkal Balam', '2021', '14'),
(9, 'Pontianak', '2021', '9'),
(10, 'Banten', '2021', '37'),
(11, 'Cirebon', '2021', '22'),
(12, 'Sunda Kelapa', '2021', '16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datapegawai`
--

CREATE TABLE `tb_datapegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `umur` varchar(256) NOT NULL,
  `kelas` varchar(256) NOT NULL,
  `kategori` varchar(256) NOT NULL,
  `unit_kerja` varchar(256) NOT NULL,
  `jabatan` varchar(256) NOT NULL,
  `cabang` varchar(256) NOT NULL,
  `status_pegawai` varchar(256) NOT NULL,
  `dokumen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_datapegawai`
--

INSERT INTO `tb_datapegawai` (`id`, `nip`, `nama`, `umur`, `kelas`, `kategori`, `unit_kerja`, `jabatan`, `cabang`, `status_pegawai`, `dokumen`) VALUES
(1, '123456', 'Axel reyhan', '23', '7', 'Organik Pelindo', 'SDM', 'Senior Manager', 'Pusat', 'Aktif', 'English_Version_Resume_Andi_M_Axel_Reyhan_Yanandhy.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id` int(11) NOT NULL,
  `noreg` varchar(256) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `kategori` varchar(256) NOT NULL,
  `tahun` varchar(256) NOT NULL,
  `file` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`id`, `noreg`, `judul`, `kategori`, `tahun`, `file`) VALUES
(1, '123', 'Harry Potter', 'direktoritraining', '2021', 'cover_seminar2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ebook`
--

CREATE TABLE `tb_ebook` (
  `id` int(11) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `tahun` varchar(256) NOT NULL,
  `kategori` varchar(256) NOT NULL,
  `file` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ebook`
--

INSERT INTO `tb_ebook` (`id`, `judul`, `tahun`, `kategori`, `file`) VALUES
(5, 'Potter', '2021', 'Fiksi', 'cover_seminar1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inbox`
--

CREATE TABLE `tb_inbox` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `nip` varchar(256) NOT NULL,
  `unit_kerja` varchar(256) NOT NULL,
  `jabatan` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_inbox`
--

INSERT INTO `tb_inbox` (`id`, `nama`, `nip`, `unit_kerja`, `jabatan`, `keterangan`) VALUES
(1, 'axel', '123456', 'SDM', 'sm', 'gagaa'),
(2, 'axel pieters', '123456', 'SDM', 'sm', 'adadadad');

-- --------------------------------------------------------

--
-- Table structure for table `tb_izin`
--

CREATE TABLE `tb_izin` (
  `id_izin` int(255) NOT NULL,
  `id_namaizin` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `tglawal` date NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tglakhir` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_izin`
--

INSERT INTO `tb_izin` (`id_izin`, `id_namaizin`, `id`, `tglawal`, `tempat`, `tglakhir`, `status`) VALUES
(2, 2, 11, '2018-08-17', 'Jakarta', '2018-08-16', 'approved'),
(3, 2, 10, '2018-08-01', 'Jakarta', '2018-08-04', 'approved'),
(4, 5, 10, '2018-08-21', 'Depok', '2018-08-22', 'waiting'),
(5, 3, 11, '2018-10-05', 'Jakarta', '2018-12-01', 'rejected'),
(8, 14, 12, '2018-08-22', 'Bekasi', '2018-08-24', 'waiting'),
(9, 12, 10, '2018-08-16', 'Bekasi', '2018-08-20', 'approved'),
(10, 11, 11, '2018-09-21', 'Bandung', '2018-09-22', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(255) NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Deputi'),
(3, 'Sekretaris'),
(5, 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_namaizin`
--

CREATE TABLE `tb_namaizin` (
  `id_namaizin` int(255) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nama_izin` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_namaizin`
--

INSERT INTO `tb_namaizin` (`id_namaizin`, `type`, `nama_izin`) VALUES
(15, 'sekolah', 'izin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nip` int(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `unit_kerja` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status_pegawai` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nama`, `nip`, `tanggal_lahir`, `jenis_kelamin`, `unit_kerja`, `status_pegawai`, `password`, `id_user`, `avatar`) VALUES
(18, 'Axel reyhan', 123456, '2021-11-01', 'Laki-laki', 'SDM', 'Organik Pelindo', '202cb962ac59075b964b07152d234b70', 'axelreyhan', '929007b2ccc69b629cd777113ad2f378.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemetaan`
--

CREATE TABLE `tb_pemetaan` (
  `id` int(11) NOT NULL,
  `unit_kerja` varchar(256) NOT NULL,
  `tahun` int(128) NOT NULL,
  `bulan` varchar(256) NOT NULL,
  `rencana` varchar(256) NOT NULL,
  `realisasi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemetaan`
--

INSERT INTO `tb_pemetaan` (`id`, `unit_kerja`, `tahun`, `bulan`, `rencana`, `realisasi`) VALUES
(5, 'dadad', 2021, 'dada', '11', '12'),
(6, 'SDM', 2021, 'nov', '13', '14'),
(7, 'SDM', 1313, 'oct', '12', '12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produktivitas`
--

CREATE TABLE `tb_produktivitas` (
  `id` int(11) NOT NULL,
  `bulan` varchar(256) NOT NULL,
  `tahun` varchar(256) NOT NULL,
  `laba` varchar(256) NOT NULL,
  `jumlah_pegawai` varchar(256) NOT NULL,
  `total` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produktivitas`
--

INSERT INTO `tb_produktivitas` (`id`, `bulan`, `tahun`, `laba`, `jumlah_pegawai`, `total`) VALUES
(1, 'Januari', '2021', '21', '30', '31'),
(2, 'Februari', '2021', '21', '19', '30'),
(3, 'Maret', '2021', '21', '123', '21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id` int(11) NOT NULL,
  `nip` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `unit_kerja` varchar(256) NOT NULL,
  `dokumen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profile`
--

INSERT INTO `tb_profile` (`id`, `nip`, `nama`, `unit_kerja`, `dokumen`) VALUES
(2, '123456', 'Axel reyhan', 'SDM', '1638761968_CV_Axel_English_Version.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_realisasi`
--

CREATE TABLE `tb_realisasi` (
  `id` int(11) NOT NULL,
  `nama_diklat` varchar(256) NOT NULL,
  `jenis_pelatihan` varchar(256) NOT NULL,
  `tahun` varchar(256) NOT NULL,
  `jumlah_peserta` varchar(256) NOT NULL,
  `realisasi_anggaran` varchar(256) NOT NULL,
  `tempat` varchar(256) NOT NULL,
  `tanggal` varchar(256) NOT NULL,
  `nama_vendor` varchar(256) NOT NULL,
  `file` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_realisasi`
--

INSERT INTO `tb_realisasi` (`id`, `nama_diklat`, `jenis_pelatihan`, `tahun`, `jumlah_peserta`, `realisasi_anggaran`, `tempat`, `tanggal`, `nama_vendor`, `file`) VALUES
(1, 'tes', 'tes', '2021', '21', '1234', 'bekasi', '2021-11-11', 'eqeq', '1636995814_Identifikasi_Masalah_pptx.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rencana`
--

CREATE TABLE `tb_rencana` (
  `id` int(11) NOT NULL,
  `nama_diklat` varchar(256) NOT NULL,
  `jenis_pelatihan` varchar(256) NOT NULL,
  `tahun` varchar(256) NOT NULL,
  `jumlah_peserta` varchar(256) NOT NULL,
  `rencana_anggaran` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rencana`
--

INSERT INTO `tb_rencana` (`id`, `nama_diklat`, `jenis_pelatihan`, `tahun`, `jumlah_peserta`, `rencana_anggaran`) VALUES
(1, 'tes', 'tes', '2021', '13', '1311'),
(3, 'tes', 'tes', '2021', '13', '1311');

-- --------------------------------------------------------

--
-- Table structure for table `tb_statuspegawai`
--

CREATE TABLE `tb_statuspegawai` (
  `id` int(11) NOT NULL,
  `status` varchar(256) NOT NULL,
  `tahun` varchar(256) NOT NULL,
  `total` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_statuspegawai`
--

INSERT INTO `tb_statuspegawai` (`id`, `status`, `tahun`, `total`) VALUES
(1, 'Organik Pelindo', '2021', '21'),
(2, 'Organik PTP', '2021', '4'),
(3, 'TNO', '2021', '53'),
(4, 'PKWT', '2021', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_datapegawai`
--
ALTER TABLE `tb_datapegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ebook`
--
ALTER TABLE `tb_ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_izin`
--
ALTER TABLE `tb_izin`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_namaizin`
--
ALTER TABLE `tb_namaizin`
  ADD PRIMARY KEY (`id_namaizin`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pemetaan`
--
ALTER TABLE `tb_pemetaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produktivitas`
--
ALTER TABLE `tb_produktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_realisasi`
--
ALTER TABLE `tb_realisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rencana`
--
ALTER TABLE `tb_rencana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_statuspegawai`
--
ALTER TABLE `tb_statuspegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_datapegawai`
--
ALTER TABLE `tb_datapegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_ebook`
--
ALTER TABLE `tb_ebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_izin`
--
ALTER TABLE `tb_izin`
  MODIFY `id_izin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_namaizin`
--
ALTER TABLE `tb_namaizin`
  MODIFY `id_namaizin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_pemetaan`
--
ALTER TABLE `tb_pemetaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_produktivitas`
--
ALTER TABLE `tb_produktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_realisasi`
--
ALTER TABLE `tb_realisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_rencana`
--
ALTER TABLE `tb_rencana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_statuspegawai`
--
ALTER TABLE `tb_statuspegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
