-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Sep 2020 pada 07.15
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
('2', 'Shoppe', 'nontunai', 'Shoope.id', 'Online');

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
(1, 'lisa', '123', 'Lisa Rachmawati', 'kadin', 898080, 1114378233),
(2, 'eka', '123', 'eka gudtina', 'bendahara', 897655732, 111213234),
(3, 'aina', '123', 'kairina sapna', 'pembantu', 866358222, 1122133332);

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
('123', '2020-08-21', '3', 1, '1', '1', 1, 1, 1, 1, 1, 'WhatsApp_Image_2020-03-07_at_21_50_53(1).jpeg'),
('213231', '0000-00-00', '3', 100, '2', '1', 100, 0, 0, 0, 0, '242d31f204ef4b309025486cdad5348614.jpg'),
('23432', '2020-09-11', '3', 5000, '21324', '1', 1000, 1000, 1000, 1000, 1000, '242d31f204ef4b309025486cdad5348613.jpg'),
('58869', '0000-00-00', '3', 500, '67879', '2', 500, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saldoawal`
--

CREATE TABLE `tb_saldoawal` (
  `kdsaldo` int(11) NOT NULL,
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
(1, '2020-08-14', 'Januari', 9000, '2020-08-07', 63900, 2020, 2),
(2, '2020-08-21', 'Januari', 3000, '2020-08-21', 1000, 2020, 0),
(3, '2020-08-21', 'April', 5000, '2020-08-21', 6000, 2020, 0);

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
('1', '234342', '2020-08-21', '3', '1', '1', 1000, 'eko', 'dfhdfhdf', 'WhatsApp_Image_2020-02-21_at_07_50_071.jpeg', 2),
('2', '232423', '2020-08-17', '3', '1', '2', 2000, '12323435', 'adad', 'WhatsApp_Image_2020-02-21_at_08_20_50(1).jpeg', 2),
('21324', '3234234', '2020-09-11', '3', '1', '2', 1000, 'beli amw', 'asds', 'WhatsApp_Image_2020-02-21_at_08_20_50(1).jpeg', 2),
('3', '432323', '0000-00-00', '3', '1', '1', 3000, 'asdf', 'jk;kl;\'j', 'photo6136249780892969468.jpg', 0),
('5', '234234', '2020-09-11', '3', '2', '2', 1000, 'beli ssusu', 'fgh', '242d31f204ef4b309025486cdad534864.jpg', 0),
('67879', '5366', '2020-09-13', '3', '2', '2', 500, 'beli tas', '', '', 0);

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
  MODIFY `idusername` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
