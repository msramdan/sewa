-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.34-MariaDB-0ubuntu0.20.04.1 - Ubuntu 20.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_sewa
CREATE DATABASE IF NOT EXISTS `db_sewa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_sewa`;

-- Dumping structure for table db_sewa.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(250) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sewa.kategori: ~47 rows (approximately)
DELETE FROM `kategori`;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`kategori_id`, `nama_kategori`) VALUES
	(1, 'MESIN MOBIL'),
	(2, 'INJEKSI MOBIL'),
	(3, 'OLI MESIN'),
	(4, 'OLI MESIN'),
	(5, 'GANTI FILTER OLI'),
	(6, 'AIR RADIATOR'),
	(7, 'RADIATOR MOBIL'),
	(8, 'DINAMO STARTER'),
	(9, 'PENGGANTIAN BUSI'),
	(10, 'PENGECEKAN IDLE MESIN'),
	(11, 'PEMBERSIHAN FILTER UDARA'),
	(12, 'PEMBERSIAN THROTTLE BODY'),
	(13, 'MINYAK REM'),
	(14, 'OLI REM'),
	(15, 'SUSPENSI'),
	(16, 'BALANCING'),
	(17, 'SPOORING'),
	(18, 'VELG MOBIL'),
	(19, 'GARDAN'),
	(20, 'SHOCKBREAKER'),
	(21, 'POWER SREERING'),
	(22, 'SISTEM KEMUDI'),
	(23, 'TEKANAN ANGIN'),
	(24, 'PENGECEKAN REM RODA'),
	(25, 'PENGECEKAN BAUT RODA'),
	(26, 'GANTI KAMPAS REM'),
	(27, 'ALARM MOBIL'),
	(28, 'AUDIO MOBIL'),
	(29, 'LAMPU MOBIL'),
	(30, 'AIRBAG'),
	(31, 'KLAKSON'),
	(32, 'ECU MOBIL'),
	(33, 'ALTERNATOR'),
	(34, 'POWER WINDOW'),
	(35, 'CENTRAL LOCK'),
	(36, 'SPEEDMETER'),
	(37, 'AKI MOBIL'),
	(38, 'REMOT MOBIL'),
	(39, 'INSTRUMEN INDIKATOR'),
	(40, 'PENGGANTIAN FILTER AC'),
	(41, 'OLI TRANSMISI'),
	(42, 'KOPLING'),
	(43, 'KACA MOBIL'),
	(44, 'BUMPER'),
	(45, 'KNALPOT'),
	(46, 'JOK'),
	(47, 'SABUK PENGAMAN');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table db_sewa.kendaraan
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `kendaraan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nopol` varchar(20) NOT NULL,
  `nama_kendaraan` varchar(200) NOT NULL,
  `merk` varchar(200) DEFAULT NULL,
  `warna` varchar(200) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `no_rangka` varchar(100) DEFAULT NULL,
  `no_mesin` varchar(100) DEFAULT NULL,
  `no_bpkb` varchar(100) DEFAULT NULL,
  `tgl_berlaku_stnk` date DEFAULT NULL,
  `status` varchar(100) DEFAULT 'available',
  PRIMARY KEY (`kendaraan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sewa.kendaraan: ~3 rows (approximately)
DELETE FROM `kendaraan`;
/*!40000 ALTER TABLE `kendaraan` DISABLE KEYS */;
INSERT INTO `kendaraan` (`kendaraan_id`, `nopol`, `nama_kendaraan`, `merk`, `warna`, `tahun`, `no_rangka`, `no_mesin`, `no_bpkb`, `tgl_berlaku_stnk`, `status`) VALUES
	(3, '12345', 'Sigra', 'Sed molestiae nisi a', 'In necessitatibus co', 1996, 'Sit nisi provident', 'Iusto voluptatem nul', 'Vero incididunt repe', '1990-10-14', 'available'),
	(4, '9090', 'Avanza', 'Reprehenderit quidem', 'Cupiditate asperiore', 3, 'Expedita laborum In', 'Voluptas irure sed p', 'Quo qui ex laudantiu', '2016-07-18', 'Not available'),
	(6, '678', 'Civic', 'Et unde occaecat dol', 'Cumque dolorem verit', 3, 'Consectetur natus do', 'Ratione ad minim qui', 'Animi porro quas si', '2009-04-11', 'available');
/*!40000 ALTER TABLE `kendaraan` ENABLE KEYS */;

-- Dumping structure for table db_sewa.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `pegawai_id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`pegawai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sewa.pegawai: ~2 rows (approximately)
DELETE FROM `pegawai`;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`pegawai_id`, `nip`, `nama_pegawai`, `unit_id`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
	(3, '123', 'Ramdan', 7, 'Perempuan', 'Voluptatum repr', 'Culpa esse qui bland'),
	(4, '9090', 'Dignissimos laborum', 9, 'Laki Laki', '12345678', 'Sed animi duis quia');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping structure for table db_sewa.pemeliharaan
CREATE TABLE IF NOT EXISTS `pemeliharaan` (
  `pemeliharaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_pemeliharaan` varchar(50) NOT NULL,
  `kendaraan_id` int(11) NOT NULL,
  `kategori_kilometer` varchar(100) NOT NULL,
  `km_terakhir` varchar(50) NOT NULL,
  `deksripsi` text DEFAULT NULL,
  `tgl_pemeliharan` date NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`pemeliharaan_id`),
  KEY `kendaraan_id` (`kendaraan_id`),
  CONSTRAINT `pemeliharaan_ibfk_1` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`kendaraan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sewa.pemeliharaan: ~0 rows (approximately)
DELETE FROM `pemeliharaan`;
/*!40000 ALTER TABLE `pemeliharaan` DISABLE KEYS */;
INSERT INTO `pemeliharaan` (`pemeliharaan_id`, `jenis_pemeliharaan`, `kendaraan_id`, `kategori_kilometer`, `km_terakhir`, `deksripsi`, `tgl_pemeliharan`, `photo`) VALUES
	(12, 'Berkala', 4, '10.000 - 20.000 km', '6888', 'gjgjgjgj', '0000-00-00', 'File-220629-7003e8fbcb.png'),
	(13, 'Insidental', 6, '20.000 - 30.000 km', '20000', 'Cobaan', '0000-00-00', 'File-220629-b8d9029927.jpg');
/*!40000 ALTER TABLE `pemeliharaan` ENABLE KEYS */;

-- Dumping structure for table db_sewa.pemeliharaan_detail
CREATE TABLE IF NOT EXISTS `pemeliharaan_detail` (
  `pemeliharaan_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `pemeliharaan_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  PRIMARY KEY (`pemeliharaan_detail_id`),
  KEY `pemeliharaan_id` (`pemeliharaan_id`),
  CONSTRAINT `pemeliharaan_detail_ibfk_1` FOREIGN KEY (`pemeliharaan_id`) REFERENCES `pemeliharaan` (`pemeliharaan_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sewa.pemeliharaan_detail: ~0 rows (approximately)
DELETE FROM `pemeliharaan_detail`;
/*!40000 ALTER TABLE `pemeliharaan_detail` DISABLE KEYS */;
INSERT INTO `pemeliharaan_detail` (`pemeliharaan_detail_id`, `pemeliharaan_id`, `kategori_id`, `keterangan`) VALUES
	(3, 12, 38, 'ini remote mobil'),
	(4, 12, 24, 'ini pengecekan rem roda'),
	(5, 13, 1, 'ayu cek mesin mobil'),
	(6, 13, 10, 'idle mesin ah');
/*!40000 ALTER TABLE `pemeliharaan_detail` ENABLE KEYS */;

-- Dumping structure for table db_sewa.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status_pengembalian` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`peminjaman_id`),
  KEY `karyawan_id` (`karyawan_id`),
  KEY `kendaraan_id` (`kendaraan_id`),
  CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `pegawai` (`pegawai_id`),
  CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`kendaraan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sewa.peminjaman: ~2 rows (approximately)
DELETE FROM `peminjaman`;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` (`peminjaman_id`, `no_peminjaman`, `karyawan_id`, `kendaraan_id`, `tanggal_request`, `estimasi_pengembalian`, `tujuan`, `keperluan`, `tanggal_approved`, `status_request`, `tanggal_pengembalian`, `photo`, `status_pengembalian`) VALUES
	(20, 'REQ/2022/0001', 4, 6, '2022-06-28 14:44:17', '2022-06-28 12:44:00', 'XX', 'XXX', '2022-06-28 14:44:23', 'Approved', '2022-06-28 12:50:00', 'File-220628-bc0cfa0e1c.png', 'Approved'),
	(21, 'REQ/2022/0002', 4, 4, '2022-06-28 18:40:49', '1982-07-06 02:21:00', 'Qui et enim error at', 'Cumque facilis rerum', '2022-06-28 18:41:12', 'Approved', NULL, NULL, NULL);
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;

-- Dumping structure for table db_sewa.unit
CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(200) NOT NULL,
  `kepala_unit` varchar(200) NOT NULL,
  `ttd` varchar(200) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sewa.unit: ~3 rows (approximately)
DELETE FROM `unit`;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
INSERT INTO `unit` (`unit_id`, `nama_unit`, `kepala_unit`, `ttd`) VALUES
	(7, 'Tenetur proident ex', 'Et saepe ratione aut', 'File-220626-9f8d43466d.png'),
	(8, 'Minim nostrud rerum', 'Velit aut quasi labo', 'File-220626-7c5736fd1d.png'),
	(9, 'SDM', 'Anton', 'File-220626-3ee60c60cf.png');
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;

-- Dumping structure for table db_sewa.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_id` int(2) NOT NULL COMMENT '1:admin,2:pegawai',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_sewa.user: ~3 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `username`, `password`, `level_id`) VALUES
	(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
	(4, '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
	(5, '9090', '143ad82c245be0610f3b3dc3b0bc94b2db721a3b', 2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
