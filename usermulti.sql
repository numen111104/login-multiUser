-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Sep 2023 pada 18.54
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usermulti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `login_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`login_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'guru', '77e69c137812518e359196bb2f5e9bb9'),
(3, 'siswa', 'bcd724d15cde8c47650fda962968f102'),
(4, 'spp', '5566919ceb387560157c4fddbf8314c7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_akses`
--

CREATE TABLE `admin_akses` (
  `login_id` int(11) NOT NULL,
  `akses_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `admin_akses`
--

INSERT INTO `admin_akses` (`login_id`, `akses_id`) VALUES
(1, 'guru'),
(1, 'siswa'),
(1, 'spp'),
(2, 'guru'),
(3, 'siswa'),
(4, 'spp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_akses`
--

CREATE TABLE `master_akses` (
  `akses_id` varchar(10) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `master_akses`
--

INSERT INTO `master_akses` (`akses_id`, `keterangan`) VALUES
('guru', 'ini untuk halaman guru'),
('siswa', 'ini untuk halaman siswa'),
('spp', 'ini untuk halaman spp');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indeks untuk tabel `admin_akses`
--
ALTER TABLE `admin_akses`
  ADD KEY `akses_id` (`akses_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indeks untuk tabel `master_akses`
--
ALTER TABLE `master_akses`
  ADD PRIMARY KEY (`akses_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin_akses`
--
ALTER TABLE `admin_akses`
  ADD CONSTRAINT `admin_akses_ibfk_1` FOREIGN KEY (`akses_id`) REFERENCES `master_akses` (`akses_id`),
  ADD CONSTRAINT `admin_akses_ibfk_2` FOREIGN KEY (`login_id`) REFERENCES `admin` (`login_id`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata untuk tabel admin
--

--
-- Metadata untuk tabel admin_akses
--

--
-- Metadata untuk tabel master_akses
--

--
-- Metadata untuk database usermulti
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
