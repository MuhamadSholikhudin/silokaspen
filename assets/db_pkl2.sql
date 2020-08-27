-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2020 pada 09.29
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pkl2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jnspengeluaran`
--

CREATE TABLE `tb_jnspengeluaran` (
  `kdjnspengeluaran` varchar(30) NOT NULL,
  `uraian` varchar(50) NOT NULL,
  `carapembayaran` varchar(30) NOT NULL,
  `namatoko` varchar(30) NOT NULL,
  `alamattoko` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jnspengeluaran`
--

INSERT INTO `tb_jnspengeluaran` (`kdjnspengeluaran`, `uraian`, `carapembayaran`, `namatoko`, `alamattoko`) VALUES
('KDJNS011', 'pembayran dengan cara datang ke pt1', 'Tunai1', 'Toko Bapak1', 'Desa Klaling1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `idusername` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `namalengkap` varchar(30) NOT NULL,
  `hakakses` varchar(30) NOT NULL,
  `telepon` int(11) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`idusername`, `username`, `password`, `namalengkap`, `hakakses`, `telepon`, `nip`) VALUES
(1, 'lisa', '123', 'Lisa Rachmawati', 'bendahara', 8673463, 1254215),
(2, 'eka', '123', 'eka agustina', 'pembantu', 80723621, 926396912);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pajak`
--

CREATE TABLE `tb_pajak` (
  `nodok` int(11) NOT NULL,
  `tgldok` date NOT NULL,
  `idusername` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kdjnspengeluaran` varchar(30) NOT NULL,
  `kdsaldo` varchar(30) NOT NULL,
  `ppn` int(11) NOT NULL,
  `pph21` int(11) NOT NULL,
  `pph22` int(11) NOT NULL,
  `pph23` int(11) NOT NULL,
  `pphlain` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pajak`
--

INSERT INTO `tb_pajak` (`nodok`, `tgldok`, `idusername`, `jumlah`, `kdjnspengeluaran`, `kdsaldo`, `ppn`, `pph21`, `pph22`, `pph23`, `pphlain`, `gambar`) VALUES
(1, '2020-08-27', 'eka', 1, 'KDJNS011', '4', 1, 1, 1, 1, 1, 'WhatsApp_Image_2020-02-21_at_10_49_121.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saldoawal`
--

CREATE TABLE `tb_saldoawal` (
  `kdsaldo` int(11) NOT NULL,
  `jumlahsaldosisa` int(11) NOT NULL,
  `tglsaldomasuk` date NOT NULL,
  `periodebulan` date NOT NULL,
  `periodetahun` year(4) NOT NULL,
  `saldomasuk` int(11) NOT NULL,
  `tglsaldosisa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_saldoawal`
--

INSERT INTO `tb_saldoawal` (`kdsaldo`, `jumlahsaldosisa`, `tglsaldomasuk`, `periodebulan`, `periodetahun`, `saldomasuk`, `tglsaldosisa`) VALUES
(4, 5000000, '2020-08-27', '2020-08-27', 2020, 5000000, '2020-08-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `notransaksi` int(11) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `idusername` varchar(30) NOT NULL,
  `kdsaldo` varchar(30) NOT NULL,
  `kdjnspengeluaran` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `uraian` varchar(30) NOT NULL,
  `jnstransaksi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jnspengeluaran`
--
ALTER TABLE `tb_jnspengeluaran`
  ADD PRIMARY KEY (`kdjnspengeluaran`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`idusername`);

--
-- Indeks untuk tabel `tb_saldoawal`
--
ALTER TABLE `tb_saldoawal`
  ADD PRIMARY KEY (`kdsaldo`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `idusername` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
