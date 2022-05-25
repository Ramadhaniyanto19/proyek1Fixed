-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2022 pada 09.18
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokokita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjual`
--

CREATE TABLE `penjual` (
  `id` int(11) NOT NULL,
  `nama_penjual` varchar(100) NOT NULL,
  `alamat_penjual` varchar(255) NOT NULL,
  `no_penjual` varchar(13) NOT NULL,
  `deskripsi_penjual` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjual`
--

INSERT INTO `penjual` (`id`, `nama_penjual`, `alamat_penjual`, `no_penjual`, `deskripsi_penjual`) VALUES
(4, 'Rizki', 'Jalan Bogor', '4', 'Jualan baju '),
(5, 'AHMAD', 'jakarta', '0813946878', 'jualan celana'),
(6, 'rama', 'jalan bandung raya', '08137649787', 'Penjual kerang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `harga_barang` int(255) NOT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `tanggal_barang` date NOT NULL,
  `deskripsi_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_barang`, `nama_barang`, `nama_toko`, `harga_barang`, `foto_barang`, `tanggal_barang`, `deskripsi_barang`) VALUES
(25, 'Hijab ', 'Toko Baru', 20000, '61aaef8643799.png', '2022-01-07', 'terbaru'),
(27, 'test', '', 20000, '61ab098594030.png', '0000-00-00', 'Baru'),
(28, 'Hijab segitiga', '', 200000, '61ab0aa742367.png', '0000-00-00', 'Kualitas S++'),
(29, 'kerajinan tangan', '', 20000, '61bdcee67c57e.jpg', '0000-00-00', 'merupakan barang asli dari pangandaran'),
(30, 'Kalung', '', 20000, '61c01b795d237.jpg', '0000-00-00', 'terbaru 2021'),
(31, 'gelang', '', 2000, '61c01d68543f0.jpg', '0000-00-00', 'Baruuuu'),
(32, 'gantungan', '', 12000, '61c01ddc69940.png', '0000-00-00', 'testing'),
(33, 'kerajinan kerang', '', 2000, '61c01e1345e0c.jpg', '0000-00-00', 'testinggg'),
(35, 'testing', '', 10, '61c02d05f02cd.jpg', '0000-00-00', 'cekd'),
(36, 'baru', '', 20000, '61c0340325464.jpg', '0000-00-00', ' &lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro maxime delectus facilis nulla ullam nisi modi. Veniam temporibus voluptatem optio deserunt, nihil fuga voluptate, rerum alias ratione odio provident tempora. Lorem, ipsum dolor sit a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `level`) VALUES
(1, 'rama191101', '$2y$10$9t0KewnV2ihJr1mxVNHlNe/pYnkNquI/XPH8CWBGxsZBhItAsTBnu', 'biasa'),
(2, 'rama', '$2y$10$Qy3CIMzMkMphAVvySrmP3eCUyDi7nAcPz1gGrTt9KehRK6E9tpimG', 'biasa'),
(3, 'admin', 'admin', 'admin'),
(4, 'ahmad', '$2y$10$sBx7BXWiO56btGkhVHsWdOsUqW6b1N8b4I260ymTfRv40aeqJP4JG', 'biasa'),
(5, 'ramadhan', '$2y$10$tH21ahe9qpMysigD9lIHM.eqe0voPGfUGsYtPJ/qKca69Ad7WncT2', 'biasa'),
(14, 'admin5', '$2y$10$ISqqN6nuQ/7KanWa2jQ03ujnzESQ831MXRL5MCnv./HbtUGumm5wO', 'biasa'),
(15, 'admin2', 'admin2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
