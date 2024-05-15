-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 04:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

create database quiza;
use quiza;

--
-- Database: `quiza`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `master` tinyint(1) NOT NULL DEFAULT 1,
  `nip` varchar(18) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`master`, `nip`, `nama_guru`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, '123456789123456789', 'Sri Nurul Ijazah', 'sri@gmail.com', '$2y$10$5R4oxocA5S3PgYm8OAYmie8z.ejrjDHgKEEmgZc.41y95NHkmp8mC', '2023-11-12 17:44:35', '2024-05-14 14:14:36'),
(1, '1270003023', 'Felix Berg', 'flx@gmail.com', '$2y$10$5R4oxocA5S3PgYm8OAYmie8z.ejrjDHgKEEmgZc.41y95NHkmp8mC', '2023-11-26 15:39:51', '2024-05-14 14:14:51'),
(1, '1271110504', 'Wenny Wawan', 'wny@gmail.com', '$2y$10$5R4oxocA5S3PgYm8OAYmie8z.ejrjDHgKEEmgZc.41y95NHkmp8mC', '2023-11-26 15:39:51', '2024-05-14 14:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_quiz`
--

CREATE TABLE `hasil_quiz` (
  `id` int(50) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kd_quiz` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hasil_quiz`
--

INSERT INTO `hasil_quiz` (`id`, `nis`, `nilai`, `created_at`, `kd_quiz`) VALUES
(20, '52131', 3, '2023-11-26 16:04:44', 'questionipa78'),
(21, '52131', 3, '2023-11-26 16:25:24', 'questionipa78'),
(22, '52136', 3, '2023-11-26 16:34:03', 'QUIZZ SDLC'),
(23, '521', 1, '2023-11-26 16:49:16', 'QUIZZ SDLC'),
(24, '521', 3, '2023-11-26 16:51:50', 'QUIZZ SDLC'),
(25, '52136', 3, '2023-11-26 16:52:43', 'QUIZZ SDLC'),
(26, '52136', 4, '2023-11-26 16:53:53', 'QUIZZ SDLC'),
(27, '52136', 7, '2023-11-26 17:00:58', 'QUIZZ SDLC'),
(28, '52136', 7, '2023-11-26 17:00:59', 'Jaringan Komputer'),
(29, '52136', 1, '2023-11-26 17:12:59', 'QUIZZ SDLC'),
(30, '123445', 9, '2023-11-26 17:49:04', 'Jaringan Komputer'),
(31, '52131', 1, '2023-11-26 20:02:36', 'jarkom'),
(32, '52131', 7, '2023-11-26 20:04:58', 'jarkom'),
(33, '52131510202', 7, '2023-11-27 03:38:50', 'QUIZZSDLC'),
(34, '98', 3, '2023-11-27 03:38:51', 'QUIZZSDLC'),
(35, '52136', 2, '2023-11-27 03:44:12', 'quizrplxii'),
(36, '213262728', 2, '2023-11-27 03:46:18', 'quizrplxii'),
(902, '521', 1, '2023-11-26 16:49:16', 'QUIZZ SDLC'),
(903, '521', 10, '2023-11-27 06:09:47', 'QUIZZSDLC'),
(904, '123445', 6, '2023-11-27 15:44:16', 'Jaringan Komputer'),
(905, '52141', 1, '2023-11-29 07:01:21', 'QUIZZSDLC'),
(906, '74258', 2, '2023-12-01 09:26:34', 'quizrplxii'),
(907, '12345678', 6, '2024-02-29 02:39:01', 'QUIZZSDLC');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `quiz` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quiz`))
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `id_mapel`, `quiz`) VALUES
(2, 0, '{\"numb\": \"1\", \"question\": \"Google?\", \"answer\": \"Windows\", \"options\": [\"x\", \"y\", \"z\", \"c\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(11) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `master` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `email`, `password`, `kelas`, `created_at`, `updated_at`, `master`) VALUES
('112233', 'megumi', 'wennn@gmail.com', '$2y$10$42CDzuB4WX0MAzFtWbyAL.8fgmuM5swB0bdaxmz3v8xpwkNhwMKJ.', 'XI', '2023-11-27 03:36:17', '2023-11-27 03:36:17', 0),
('123445', 'moy', 'myy@gmail.com', '$2y$10$vZ45T3J2XIPfNScS4xmxLO0mdd9so5QaxhqVJhXytEXq0.f.QyrtO', 'X', '2023-11-26 17:46:25', '2023-11-26 17:46:25', 0),
('1234567', 'Nisrina', 'kaka@gmail.com', '$2y$10$BrKxHYfI3jbiJ4bS/C32uuxAecf/Akm6RwAzJXMlK5SFhXBAiP7Se', 'XII', '2023-11-27 03:36:30', '2023-11-27 03:36:30', 0),
('12345678', 'ucok', 'lilissimatupang@gmail.com', '$2y$10$0ZEEzCOBBV3hXt3/xMhtLeoL82uME8oVCeN81zFu5Y9vGlOyWeJxy', 'XII', '2024-02-29 02:35:59', '2024-02-29 02:35:59', 0),
('1234567890', 'Wahyu', 'felixrenylizgultom133@gmail.com', '$2y$10$rFBl5zqN/1eX.FYFykVTz.e6Sus6WNIB4G45upNhkjpleJDp6Rdw.', 'XII', '2023-11-27 03:44:08', '2023-11-27 03:44:08', 0),
('2024', 'User', 'user@gmail.com', '$2y$10$f.GMO2SIBeFafPM4zI313eXjXC9nPa.EXzegzUSZYmLRNcKjKBL72', 'X', '2024-05-14 14:09:31', '2024-05-14 14:09:31', 0),
('213262728', 'Hansen', 'evelinaagatha55@gmail.com', '$2y$10$/LPBVkrhYjslOPbPpZUpju8J9j/FYS81OvpzI0CbKLqw7ht.CZtdK', 'XII', '2023-11-27 03:45:21', '2023-11-27 03:45:21', 0),
('23', 'Nurul Musdalifah Darwis ', 'musdalifahdarwis1992@gmail.com', '$2y$10$C3zm7tjd8maHQ6h34THGMOlpSOCJ9k18xoHiw4n9ueFCEJeMspCpq', 'XII', '2023-11-27 03:36:06', '2023-11-27 03:36:06', 0),
('3270', 'Naufan', 'naufanaja124@gmail.com', '$2y$10$E4rL32cAKxt8r0Z.JH8KvetDCfyrae0NCwxwFzWDzdOldMZsPcQam', 'XII', '2023-11-27 03:37:02', '2023-11-27 03:37:02', 0),
('521', 'Fikri', 'b@gmail.com', '$2y$10$ImfKnllFHpJEOnGNKuBYKups4oRGvgdMxg3gCKa0hOAWRrqbDCe7i', 'XII', '2023-11-25 14:01:42', '2023-11-25 14:01:42', 0),
('52131', 'Finn', 'finn@gmail.com', '$2y$10$mPCJHu5/KNY2y4PE7GUKGeJEuNf9q6opDmizMt99vqVHMHuknRI96', 'XII', '2023-11-08 14:02:31', '2023-11-26 15:48:39', 0),
('5213151017', 'Theresa Sidauruk', 'sidauruktheresa@gmail.com', '$2y$10$m67kJK0g4zMCCQjhb./x2eZJMWQGmld81.voLLepuckIO6IDMX0Dm', 'XII', '2023-11-27 03:36:53', '2023-11-27 03:36:53', 0),
('5213151020', 'Ibnu Asqallani', 'asq@gmail.com', '$2y$10$92d1ZZ3BgXMNNwCFoDpBM.cee4EpqXG1y8uSBLD0TF9NMc3hT8eXS', 'XII', '2023-11-27 01:32:13', '2023-11-27 01:32:13', 0),
('52131510202', 'Ibnu Asqallani', 'asqall@gmail.com', '$2y$10$r9oFJkuEqlck.WAgv6FAoeOERPET5ld2NOBlStHz8x50oo03DEAOC', 'XII', '2023-11-27 03:35:45', '2023-11-27 03:35:45', 0),
('52136', 'Ah Tong', 'a@gmail.com', '$2y$10$mPCJHu5/KNY2y4PE7GUKGeJEuNf9q6opDmizMt99vqVHMHuknRI96', 'X', '2023-11-08 14:02:31', '2023-11-26 15:41:23', 0),
('52141', 'Irsad', 'ir@gmail.com', '$2y$10$qQ4VAZPDGx18Fe8vLFQLeuhfH2HLuvanezF49WnJrA2otCrT2PRPa', 'XII', '2023-11-08 14:02:31', '2023-11-08 14:02:31', 0),
('74258', 'Wirahadi', 'wirahadiwira@rocketmail.com', '$2y$10$3kszPmEJcujNKm.LoHL/MOiXVG6aJG0zs4830Ar/GCJw9e/U3emtK', 'XI', '2023-12-01 09:24:35', '2023-12-01 09:24:35', 0),
('91281938', 'Ucok', 'yohanesgultom133@yahoo.com', '$2y$10$.xogYhwt22ehKQYMJBZB4OrVPblt7/QLNIWwCl9TVI4KpBJV7Rs8a', 'XII', '2023-11-27 03:36:45', '2023-11-27 03:36:45', 0),
('98', 'U', 'r@gmail.com', '$2y$10$Uqn65TaRL/xE6VGPaHhmEeEpj6xApQQrn.xhvSUfatGvWJDOaSMWG', 'XI', '2023-11-27 03:36:07', '2023-11-27 03:36:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimes`
--

CREATE TABLE `testimes` (
  `id` int(12) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(40) NOT NULL,
  `amount` int(11) NOT NULL,
  `times` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimes`
--

INSERT INTO `testimes` (`id`, `date`, `name`, `amount`, `times`) VALUES
(2, '2023-11-09', '', 0, ''),
(3, '2023-11-09', '', 0, ''),
(4, '2023-11-09', '', 0, ''),
(5, '2023-11-09', '', 9, '1,2,3,4,5,6,7'),
(6, '2023-11-09', '', 3, '1,2,3,4,5,6,7'),
(7, '2023-11-09', '', 3, '1,2,3,4,5,6,7'),
(8, '2023-11-09', '', 3, '1,2,3,4,5,6,7'),
(9, '2023-11-09', 'Nol', 3, '1,2,3,4,5,6,7'),
(10, '2023-11-09', 'Finn', 3, '1,2,3,4,5,6,7'),
(11, '2023-11-09', 'Finn', 3, '1,2,3,4,5,6,7'),
(12, '2023-11-10', '0', 3, '1,2,3,4,5,6,7'),
(13, '2023-11-10', '3', 3, '1,2,3,4,5,6,7'),
(14, '2023-11-11', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `hasil_quiz`
--
ALTER TABLE `hasil_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nis_hasil` (`nis`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `testimes`
--
ALTER TABLE `testimes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_quiz`
--
ALTER TABLE `hasil_quiz`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=908;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimes`
--
ALTER TABLE `testimes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_quiz`
--
ALTER TABLE `hasil_quiz`
  ADD CONSTRAINT `fk_nis_hasil` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
