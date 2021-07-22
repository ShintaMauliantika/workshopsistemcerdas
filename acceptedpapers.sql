-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Jul 2021 pada 04.41
-- Versi server: 8.0.18
-- Versi PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acceptedpapers`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_clusterawal`
--

CREATE TABLE `tb_clusterawal` (
  `id_clusterawal` int(4) NOT NULL,
  `id_data` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_clusterawal`
--

INSERT INTO `tb_clusterawal` (`id_clusterawal`, `id_data`) VALUES
(1, 5),
(2, 10),
(3, 15),
(4, 20),
(5, 25),
(6, 30),
(7, 35),
(8, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data`
--

CREATE TABLE `tb_data` (
  `id_data` int(4) NOT NULL,
  `age` int(4) NOT NULL,
  `anaemia` int(1) NOT NULL,
  `creatinine_phosphokinase` int(4) NOT NULL,
  `diabetes` int(1) NOT NULL,
  `ejection_fraction` int(2) NOT NULL,
  `high_blood_pressure` int(1) NOT NULL,
  `platelets` int(8) NOT NULL,
  `serum_creatinine` int(3) NOT NULL,
  `serum_sodium` int(3) NOT NULL,
  `sex` int(1) NOT NULL,
  `smoking` int(1) NOT NULL,
  `time` int(3) NOT NULL,
  `death_event` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_data`
--

INSERT INTO `tb_data` (`id_data`, `age`, `anaemia`, `creatinine_phosphokinase`, `diabetes`, `ejection_fraction`, `high_blood_pressure`, `platelets`, `serum_creatinine`, `serum_sodium`, `sex`, `smoking`, `time`, `death_event`) VALUES
(1, 75, 0, 582, 0, 20, 1, 265000, 2, 130, 1, 0, 4, 1),
(2, 55, 0, 7861, 0, 38, 0, 263358, 1, 136, 1, 0, 6, 1),
(3, 65, 0, 146, 0, 20, 0, 162000, 1, 129, 1, 1, 7, 1),
(4, 50, 1, 111, 0, 20, 0, 210000, 2, 137, 1, 0, 7, 1),
(5, 65, 1, 160, 1, 20, 0, 327000, 3, 116, 0, 0, 8, 1),
(6, 90, 1, 47, 0, 40, 1, 204000, 2, 132, 1, 1, 8, 1),
(7, 75, 1, 246, 0, 15, 0, 127000, 1, 137, 1, 0, 10, 1),
(8, 60, 1, 315, 1, 60, 0, 454000, 1, 131, 1, 1, 10, 1),
(9, 65, 0, 157, 0, 65, 0, 263358, 2, 138, 0, 0, 10, 1),
(10, 80, 1, 123, 0, 35, 1, 388000, 9, 133, 1, 1, 10, 1),
(11, 75, 1, 81, 0, 38, 1, 368000, 4, 131, 1, 1, 10, 1),
(12, 62, 0, 231, 0, 25, 1, 253000, 1, 140, 1, 1, 10, 1),
(13, 45, 1, 981, 0, 30, 0, 136000, 1, 137, 1, 0, 11, 1),
(14, 50, 1, 168, 0, 38, 1, 276000, 1, 137, 1, 0, 11, 1),
(15, 49, 1, 80, 0, 30, 1, 427000, 1, 138, 0, 0, 12, 0),
(16, 82, 1, 379, 0, 50, 0, 47000, 1, 136, 1, 0, 13, 1),
(17, 87, 1, 149, 0, 38, 0, 262000, 1, 140, 1, 0, 14, 1),
(18, 45, 0, 582, 0, 14, 0, 166000, 1, 127, 1, 0, 14, 1),
(19, 70, 1, 125, 0, 25, 1, 237000, 1, 140, 0, 0, 15, 1),
(20, 48, 1, 582, 1, 55, 0, 87000, 2, 121, 0, 0, 15, 1),
(21, 65, 1, 52, 0, 25, 1, 276000, 1, 137, 0, 0, 16, 1),
(22, 65, 1, 128, 1, 30, 1, 297000, 2, 136, 0, 0, 20, 1),
(23, 68, 1, 220, 0, 35, 1, 289000, 1, 140, 1, 1, 20, 1),
(24, 53, 0, 63, 1, 60, 0, 368000, 1, 135, 1, 0, 22, 0),
(25, 75, 0, 582, 1, 30, 1, 263358, 2, 134, 0, 0, 23, 1),
(26, 80, 0, 148, 1, 38, 0, 149000, 2, 144, 1, 1, 23, 1),
(27, 95, 1, 112, 0, 40, 1, 196000, 1, 138, 0, 0, 24, 1),
(28, 70, 0, 122, 1, 45, 1, 284000, 1, 136, 1, 1, 26, 1),
(29, 58, 1, 60, 0, 38, 0, 153000, 6, 134, 1, 0, 26, 1),
(30, 82, 0, 70, 1, 30, 0, 200000, 1, 132, 1, 1, 26, 1),
(31, 94, 0, 582, 1, 38, 1, 263358, 2, 134, 1, 0, 27, 1),
(32, 85, 0, 23, 0, 45, 0, 360000, 3, 132, 1, 0, 28, 1),
(33, 50, 1, 249, 1, 35, 1, 319000, 1, 128, 0, 0, 28, 1),
(34, 50, 1, 159, 1, 30, 0, 302000, 1, 138, 0, 0, 29, 0),
(35, 65, 0, 94, 1, 50, 1, 188000, 1, 140, 1, 0, 29, 1),
(36, 69, 0, 582, 1, 35, 0, 228000, 4, 134, 1, 0, 30, 1),
(37, 90, 1, 60, 1, 50, 0, 226000, 4, 134, 1, 0, 30, 1),
(38, 82, 1, 855, 1, 50, 1, 321000, 1, 145, 0, 0, 30, 1),
(39, 60, 0, 2656, 1, 30, 0, 305000, 2, 137, 1, 0, 30, 0),
(40, 60, 0, 235, 1, 38, 0, 329000, 3, 142, 0, 0, 30, 1),
(41, 70, 0, 582, 0, 20, 1, 263358, 2, 134, 1, 1, 31, 1),
(42, 50, 0, 124, 1, 30, 1, 153000, 1, 136, 0, 1, 32, 1),
(43, 70, 0, 571, 1, 45, 1, 185000, 1, 139, 1, 1, 33, 1),
(44, 72, 0, 127, 1, 50, 1, 218000, 1, 134, 1, 0, 33, 0),
(45, 60, 1, 588, 1, 60, 0, 194000, 1, 142, 0, 0, 33, 1),
(46, 50, 0, 582, 1, 38, 0, 310000, 2, 135, 1, 1, 35, 1),
(47, 51, 0, 1380, 0, 25, 1, 271000, 1, 130, 1, 0, 38, 1),
(48, 60, 0, 582, 1, 38, 1, 451000, 1, 138, 1, 1, 40, 1),
(49, 80, 1, 553, 0, 20, 1, 140000, 4, 133, 1, 0, 41, 1),
(50, 57, 1, 129, 0, 30, 0, 395000, 1, 140, 0, 0, 42, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_databaru`
--

CREATE TABLE `tb_databaru` (
  `id_databaru` int(4) NOT NULL,
  `id_data` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_clusterawal`
--
ALTER TABLE `tb_clusterawal`
  ADD PRIMARY KEY (`id_clusterawal`);

--
-- Indeks untuk tabel `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `tb_databaru`
--
ALTER TABLE `tb_databaru`
  ADD PRIMARY KEY (`id_databaru`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_clusterawal`
--
ALTER TABLE `tb_clusterawal`
  MODIFY `id_clusterawal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id_data` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tb_databaru`
--
ALTER TABLE `tb_databaru`
  MODIFY `id_databaru` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
