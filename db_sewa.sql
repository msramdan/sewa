-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Jun 2022 pada 09.49
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sewa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `kendaraan_id` int(11) NOT NULL,
  `nopol` varchar(20) NOT NULL,
  `nama_kendaraan` varchar(200) NOT NULL,
  `merk` varchar(200) DEFAULT NULL,
  `warna` varchar(200) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `no_rangka` varchar(100) DEFAULT NULL,
  `no_mesin` varchar(100) DEFAULT NULL,
  `no_bpkb` varchar(100) DEFAULT NULL,
  `tgl_berlaku_stnk` date DEFAULT NULL,
  `status` varchar(100) DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`kendaraan_id`, `nopol`, `nama_kendaraan`, `merk`, `warna`, `tahun`, `no_rangka`, `no_mesin`, `no_bpkb`, `tgl_berlaku_stnk`, `status`) VALUES
(3, '12345', 'Sigra', 'Sed molestiae nisi a', 'In necessitatibus co', 1996, 'Sit nisi provident', 'Iusto voluptatem nul', 'Vero incididunt repe', '1990-10-14', 'available'),
(4, '9090', 'Avanza', 'Reprehenderit quidem', 'Cupiditate asperiore', 3, 'Expedita laborum In', 'Voluptas irure sed p', 'Quo qui ex laudantiu', '2016-07-18', 'Not available'),
(6, '678', 'Civic', 'Et unde occaecat dol', 'Cumque dolorem verit', 3, 'Consectetur natus do', 'Ratione ad minim qui', 'Animi porro quas si', '2009-04-11', 'available');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `nip`, `nama_pegawai`, `unit_id`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
(3, '123', 'Ramdan', 7, 'Perempuan', 'Voluptatum repr', 'Culpa esse qui bland'),
(4, '9090', 'Dignissimos laborum', 9, 'Laki Laki', '12345678', 'Sed animi duis quia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `pemeliharaan_id` int(11) NOT NULL,
  `jenis_pemeliharaan` varchar(50) NOT NULL,
  `kendaraan_id` int(11) NOT NULL,
  `kategori_kilometer` varchar(100) NOT NULL,
  `km_terakhir` varchar(50) NOT NULL,
  `dinamo_starter` char(1) DEFAULT NULL,
  `ket1` varchar(250) DEFAULT NULL,
  `service_ecu` char(1) DEFAULT NULL,
  `ket2` varchar(250) DEFAULT NULL,
  `karburator` char(1) DEFAULT NULL,
  `ket3` varchar(250) DEFAULT NULL,
  `oli_mesin` char(1) DEFAULT NULL,
  `ket4` varchar(250) DEFAULT NULL,
  `oli_power_steering` char(1) DEFAULT NULL,
  `ket5` varchar(250) DEFAULT NULL,
  `deksripsi` text,
  `photo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`pemeliharaan_id`, `jenis_pemeliharaan`, `kendaraan_id`, `kategori_kilometer`, `km_terakhir`, `dinamo_starter`, `ket1`, `service_ecu`, `ket2`, `karburator`, `ket3`, `oli_mesin`, `ket4`, `oli_power_steering`, `ket5`, `deksripsi`, `photo`) VALUES
(10, 'Insidental', 6, '10.000 - 20.000 km', '34', NULL, 'Assumenda occaecat b', 'Y', 'Vitae quis minima re', 'Y', 'Dolore itaque reicie', NULL, 'Sunt illo laboriosam', NULL, 'Sit consequatur ita', 'At accusamus assumen', 'File-220628-8b29b7b816.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(11) NOT NULL,
  `no_peminjaman` varchar(50) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `kendaraan_id` int(11) NOT NULL,
  `tanggal_request` datetime NOT NULL,
  `estimasi_pengembalian` datetime NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `keperluan` text NOT NULL,
  `tanggal_approved` datetime DEFAULT NULL,
  `status_request` varchar(100) NOT NULL,
  `tanggal_pengembalian` datetime DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `status_pengembalian` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `no_peminjaman`, `karyawan_id`, `kendaraan_id`, `tanggal_request`, `estimasi_pengembalian`, `tujuan`, `keperluan`, `tanggal_approved`, `status_request`, `tanggal_pengembalian`, `photo`, `status_pengembalian`) VALUES
(20, 'REQ/2022/0001', 4, 6, '2022-06-28 14:44:17', '2022-06-28 12:44:00', 'XX', 'XXX', '2022-06-28 14:44:23', 'Approved', '2022-06-28 12:50:00', 'File-220628-bc0cfa0e1c.png', 'Approved'),
(21, 'REQ/2022/0002', 4, 4, '2022-06-28 18:40:49', '1982-07-06 02:21:00', 'Qui et enim error at', 'Cumque facilis rerum', '2022-06-28 18:41:12', 'Approved', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `nama_unit` varchar(200) NOT NULL,
  `kepala_unit` varchar(200) NOT NULL,
  `ttd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`unit_id`, `nama_unit`, `kepala_unit`, `ttd`) VALUES
(7, 'Tenetur proident ex', 'Et saepe ratione aut', 'File-220626-9f8d43466d.png'),
(8, 'Minim nostrud rerum', 'Velit aut quasi labo', 'File-220626-7c5736fd1d.png'),
(9, 'SDM', 'Anton', 'File-220626-3ee60c60cf.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_id` int(2) NOT NULL COMMENT '1:admin,2:pegawai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `level_id`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(4, '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
(5, '9090', '143ad82c245be0610f3b3dc3b0bc94b2db721a3b', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`kendaraan_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indeks untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`pemeliharaan_id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `kendaraan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `pemeliharaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
