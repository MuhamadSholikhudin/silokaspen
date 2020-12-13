-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2020 pada 02.38
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.2.16

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
('1', 'Pemda', 'tunai', 'Ali Baba', 'Kudus'),
('2', 'Shoppe', 'nontunai', 'Shoope.id', 'Online'),
('3', 'Keperluan Kantor', 'tunai', 'Jaya Abadi', 'Perkantoran Dinas');

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
  `nip` int(11) NOT NULL,
  `status_login` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`idusername`, `username`, `password`, `namalengkap`, `hakakses`, `telepon`, `nip`, `status_login`) VALUES
(1, 'lisa', '123', 'Lisa Rachmawati', 'kadin', 898080, 1114378233, 'Tidak Aktif'),
(2, 'Bendahara Pengeluaran', '123', 'eka gustina', 'bendahara', 897655732, 111213234, 'Aktif'),
(3, 'aina', '123', 'kairina sapna', 'pembantu', 866358222, 1122133332, 'Aktif'),
(4, 'yudha', '123', 'Yudha Prasetyo', 'pembantu', 989089658, 12321, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pajak`
--

CREATE TABLE `tb_pajak` (
  `nodok` varchar(30) NOT NULL,
  `tgldok` date NOT NULL,
  `idusername` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `notransaksi` varchar(30) NOT NULL,
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

INSERT INTO `tb_pajak` (`nodok`, `tgldok`, `idusername`, `jumlah`, `notransaksi`, `kdsaldo`, `ppn`, `pph21`, `pph22`, `pph23`, `pphlain`, `gambar`) VALUES
('123', '2020-08-21', '3', 5000, '1', '1', 1, 1, 1, 1, 1, 'ss.JPG'),
('23432', '2020-09-11', '3', 5000, '21324', '1', 1000, 1000, 1000, 1000, 1000, 'ss.JPG'),
('58869', '2020-09-15', 'aina', 1000, '67879', '2', 1000, 0, 0, 0, 1000, 'ss.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saldoawal`
--

CREATE TABLE `tb_saldoawal` (
  `kdsaldo` varchar(100) NOT NULL,
  `tglsaldomasuk` date NOT NULL,
  `periodebulan` varchar(50) NOT NULL,
  `saldomasuk` int(11) NOT NULL,
  `tglsaldosisa` date NOT NULL,
  `jumlahsaldosisa` int(11) NOT NULL,
  `periodetahun` year(4) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_saldoawal`
--

INSERT INTO `tb_saldoawal` (`kdsaldo`, `tglsaldomasuk`, `periodebulan`, `saldomasuk`, `tglsaldosisa`, `jumlahsaldosisa`, `periodetahun`, `status`) VALUES
('1', '2020-08-14', 'Juni', 60000, '2020-08-07', 62100, 2020, 2),
('2', '2020-08-21', 'Mei', 3000, '2020-08-21', 11000, 2020, 2),
('3', '2020-08-21', 'Januari', 5000, '2020-08-21', 4500, 2020, 0),
('8', '2020-11-26', 'Desember', 2000000, '2020-11-26', 2000000, 2020, 0),
('9', '2020-11-27', 'Desember', 3000000, '2020-11-27', 3000000, 2020, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `notransaksi` varchar(30) NOT NULL,
  `kode_rekening` varchar(50) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `idusername` varchar(30) NOT NULL,
  `kdsaldo` varchar(30) NOT NULL,
  `kdjnspengeluaran` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `uraian` varchar(30) NOT NULL,
  `jnstransaksi` varchar(30) NOT NULL,
  `gambar` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`notransaksi`, `kode_rekening`, `tgltransaksi`, `idusername`, `kdsaldo`, `kdjnspengeluaran`, `jumlah`, `uraian`, `jnstransaksi`, `gambar`, `status`) VALUES
('1', '234342', '2020-08-21', '3', '1', '1', 1000, 'eko', 'dfhdfhdf', 'ss.JPG', 2);

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
-- Indeks untuk tabel `tb_pajak`
--
ALTER TABLE `tb_pajak`
  ADD PRIMARY KEY (`nodok`);

--
-- Indeks untuk tabel `tb_saldoawal`
--
ALTER TABLE `tb_saldoawal`
  ADD PRIMARY KEY (`kdsaldo`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`notransaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `idusername` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
