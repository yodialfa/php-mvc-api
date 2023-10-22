-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Okt 2023 pada 16.32
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cahaya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `Cities`
--

CREATE TABLE `Cities` (
  `ID` int(11) NOT NULL,
  `NamaKota` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Cities`
--

INSERT INTO `Cities` (`ID`, `NamaKota`) VALUES
(1, 'Bandung'),
(2, 'Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Districts`
--

CREATE TABLE `Districts` (
  `ID` int(11) NOT NULL,
  `NamaKecamatan` varchar(255) DEFAULT NULL,
  `IDKota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Districts`
--

INSERT INTO `Districts` (`ID`, `NamaKecamatan`, `IDKota`) VALUES
(1, 'Cibeunying Kidul', 1),
(2, 'Kacapiring', 1),
(3, 'Bojongloa', 1),
(4, 'Batununggal', 1),
(5, 'Kopo', 1),
(6, 'Jagakarsa', 2),
(7, 'Cempaka Putih', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `nama_karyawan` char(100) NOT NULL,
  `ttl` date NOT NULL,
  `cabang` int(11) NOT NULL,
  `no_hp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `ttl`, `cabang`, `no_hp`) VALUES
(1, 'Yodi', '2023-10-01', 1, '082218293933'),
(2, 'Diaz', '2023-10-02', 2, '08111111'),
(3, 'Aris', '2023-10-03', 2, '09876543'),
(4, 'Dhiya', '2023-10-02', 3, '098765432'),
(8, 'Anang Hermansyah', '1995-02-12', 2, '08221829399'),
(9, 'Anang', '1995-02-12', 2, '08221829399');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Prices`
--

CREATE TABLE `Prices` (
  `ID` int(11) NOT NULL,
  `IDKotaAsal` int(11) DEFAULT NULL,
  `IDKecamatanAsal` int(11) DEFAULT NULL,
  `IDKotaTujuan` int(11) DEFAULT NULL,
  `IDKecamatanTujuan` int(11) DEFAULT NULL,
  `IDLayanan` int(11) DEFAULT NULL,
  `Harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Prices`
--

INSERT INTO `Prices` (`ID`, `IDKotaAsal`, `IDKecamatanAsal`, `IDKotaTujuan`, `IDKecamatanTujuan`, `IDLayanan`, `Harga`) VALUES
(1, 1, 2, 1, 2, 1, 3000.00),
(2, 1, 2, 2, 6, 1, 4000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Services`
--

CREATE TABLE `Services` (
  `ID` int(11) NOT NULL,
  `NamaLayanan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Services`
--

INSERT INTO `Services` (`ID`, `NamaLayanan`) VALUES
(1, 'Darat'),
(2, 'Laut'),
(3, 'Darat'),
(4, 'Laut'),
(5, 'Udara'),
(6, 'Towing');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `Cities`
--
ALTER TABLE `Cities`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `Districts`
--
ALTER TABLE `Districts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDKota` (`IDKota`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `Prices`
--
ALTER TABLE `Prices`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDKotaAsal` (`IDKotaAsal`),
  ADD KEY `IDKecamatanAsal` (`IDKecamatanAsal`),
  ADD KEY `IDKotaTujuan` (`IDKotaTujuan`),
  ADD KEY `IDKecamatanTujuan` (`IDKecamatanTujuan`),
  ADD KEY `IDLayanan` (`IDLayanan`);

--
-- Indeks untuk tabel `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `Cities`
--
ALTER TABLE `Cities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `Districts`
--
ALTER TABLE `Districts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `Prices`
--
ALTER TABLE `Prices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `Services`
--
ALTER TABLE `Services`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `Districts`
--
ALTER TABLE `Districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`IDKota`) REFERENCES `Cities` (`ID`);

--
-- Ketidakleluasaan untuk tabel `Prices`
--
ALTER TABLE `Prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`IDKotaAsal`) REFERENCES `Cities` (`ID`),
  ADD CONSTRAINT `prices_ibfk_2` FOREIGN KEY (`IDKecamatanAsal`) REFERENCES `Districts` (`ID`),
  ADD CONSTRAINT `prices_ibfk_3` FOREIGN KEY (`IDKotaTujuan`) REFERENCES `Cities` (`ID`),
  ADD CONSTRAINT `prices_ibfk_4` FOREIGN KEY (`IDKecamatanTujuan`) REFERENCES `Districts` (`ID`),
  ADD CONSTRAINT `prices_ibfk_5` FOREIGN KEY (`IDLayanan`) REFERENCES `Services` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
