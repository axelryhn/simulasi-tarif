-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 06:52 PM
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
-- Database: `sdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_inbox`
--

CREATE TABLE `tb_inbox` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_inbox`
--

INSERT INTO `tb_inbox` (`id`, `nama`, `keterangan`, `status`, `id_user`) VALUES
(1, 'Anita', 'halo', 'Selesai', 1),
(2, 'Axel reyhan', 'Saya minta surat terbaru yang terakhir desember ini', 'Non Prioritas', 2),
(3, 'Risna', 'asssaa', 'Non Prioritas', 2),
(27, 'Axel reyhan', 'tess', 'Proses', 2),
(28, 'Anita', 'tes', 'Saran Masuk Prioritas', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_regulasi`
--

CREATE TABLE `tb_regulasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `kering` int(128) NOT NULL,
  `cair` int(128) NOT NULL,
  `keterangan` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_regulasi`
--

INSERT INTO `tb_regulasi` (`id`, `nama`, `kering`, `cair`, `keterangan`, `id_user`) VALUES
(1, 'Kontainer', 2500000, 1500000, '(Kering: Rp.2.500.000/kontainer)(Cair: Rp.1.500.000/kontainer)', 1),
(2, 'Ukuran', 5000000, 4000000, '(Kering: Rp.5.000.000/Ton)(Cair: Rp.4.000.000/Ton)', 1),
(5, 'penginapan', 5000000, 4000000, '(Kering: Rp.5.000.000/Malam)(Cair: Rp.4.000.000/malam)', 1),
(6, 'gas', 5000000, 4000000, '(Kering: Rp.5.000.000/Malam)(Cair: Rp.4.000.000/malam)  ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_report`
--

CREATE TABLE `tb_report` (
  `id` int(11) NOT NULL,
  `jenis` varchar(256) NOT NULL,
  `timestamp` date NOT NULL,
  `value` varchar(256) NOT NULL,
  `aktivitas` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_report`
--

INSERT INTO `tb_report` (`id`, `jenis`, `timestamp`, `value`, `aktivitas`, `id_user`) VALUES
(1, 'kering', '2022-07-17', '7506000', '[{\"nama\":\"Kontainer\",\"value\":\"1\"},{\"nama\":\"Ukuran\",\"value\":\"1\"}]', 2),
(2, 'cair', '2022-07-17', '11006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"2\"}]', 2),
(3, 'kering', '2022-07-17', '20006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"3\"}]', 2),
(4, 'kering', '2022-07-17', '20006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"3\"}]', 2),
(5, 'kering', '2022-07-17', '20006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"3\"}]', 2),
(7, 'kering', '2022-07-17', '20006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"3\"}]', 2),
(10, 'kering', '2022-07-17', '7506000', '[{\"nama\":\"Kontainer\",\"value\":\"1\"},{\"nama\":\"Ukuran\",\"value\":\"1\"}]', 2),
(13, 'kering', '2022-07-19', '30006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"3\"},{\"nama\":\"penginapan\",\"value\":\"2\"}]', 2),
(14, 'kering', '2022-07-20', '135006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"2\"},{\"nama\":\"penginapan\",\"value\":\"22\"},{\"nama\":\"gas\",\"value\":\"2\"}]', 2),
(15, 'kering', '2022-07-20', '50006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"2\"},{\"nama\":\"penginapan\",\"value\":\"3\"},{\"nama\":\"gas\",\"value\":\"4\"}]', 2),
(17, 'cair', '2022-07-21', '23006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"2\"},{\"nama\":\"penginapan\",\"value\":\"2\"},{\"nama\":\"gas\",\"value\":\"1\"}]', 2),
(18, 'kering', '2022-07-21', '35006000', '[{\"nama\":\"Kontainer\",\"value\":\"2\"},{\"nama\":\"Ukuran\",\"value\":\"2\"},{\"nama\":\"penginapan\",\"value\":\"2\"},{\"nama\":\"gas\",\"value\":\"2\"}]', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `role` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nip` int(128) NOT NULL,
  `avatar` varchar(256) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `nama`, `password`, `nip`, `avatar`, `id_role`) VALUES
(1, 'admin', 'Admin', '202cb962ac59075b964b07152d234b70', 123, '929007b2ccc69b629cd777113ad2f378.JPG', 1),
(2, 'axelreyhan', 'Axel reyhan', '202cb962ac59075b964b07152d234b70', 123456, '929007b2ccc69b629cd777113ad2f378.JPG', 2),
(10, 'anita', 'Anita', '202cb962ac59075b964b07152d234b70', 1234567, 'bad803bc46054b2ff20d9336139c29d4.jpg', 2),
(11, '12345678', 'axelll', '25d55ad283aa400af464c76d713c07ad', 12345678, 'avatar.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_regulasi`
--
ALTER TABLE `tb_regulasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_regulasi`
--
ALTER TABLE `tb_regulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_report`
--
ALTER TABLE `tb_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  ADD CONSTRAINT `tb_inbox_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_regulasi`
--
ALTER TABLE `tb_regulasi`
  ADD CONSTRAINT `tb_regulasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD CONSTRAINT `tb_report_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
