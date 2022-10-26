
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tempah_homestay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nokp_admin` varchar(12) NOT NULL,
  `nama_admin` varchar(60) DEFAULT NULL,
  `katalaluan_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nokp_admin`, `nama_admin`, `katalaluan_admin`) VALUES
('030118020451', 'limmiinning', '2020'),
('020202020202', 'Azmin ', '1456'),
('121212021212', 'Doraemon', '1212'),
('080808020451', 'Soh Zai', '4896'),
('080706020511', 'Tan Poh Geok', '6969');

-- --------------------------------------------------------

--
-- Table structure for table `homestay`
--

CREATE TABLE `homestay` (
  `no_rumah` varchar(10) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `id_jenis` int(2) DEFAULT NULL,
  `harga` double(6,2) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homestay`
--

INSERT INTO `homestay` (`no_rumah`, `alamat`, `id_jenis`, `harga`, `gambar`) VALUES
('NO69', 'Taman Pelangi', 4, 350.00, 'a3.jpg'),
('88SH', 'Taman Berjaya', 2, 250.00, 'a2.jpg'),
('238TP', 'Taman Bersatu', 1, 100.00, 'a1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_rumah`
--

CREATE TABLE `jenis_rumah` (
  `id_jenis` int(2) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_rumah`
--

INSERT INTO `jenis_rumah` (`id_jenis`, `jenis`) VALUES
(1, 'VVIP'),
(2, 'Luxury'),
(3, 'Superior Room'),
(4, 'Single'),
(5, 'Double');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `nokp_penyewa` varchar(12) NOT NULL,
  `nama_penyewa` varchar(100) DEFAULT NULL,
  `notel_penyewa` varchar(12) DEFAULT NULL,
  `katalaluan_penyewa` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`nokp_penyewa`, `nama_penyewa`, `notel_penyewa`, `katalaluan_penyewa`) VALUES
('123456021234', 'Law Yi Lynn', '0175421073', '2019'),
('120303020567', 'Teoh Xin Fang', '01115488073', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `nokp_penyewa` varchar(12) NOT NULL,
  `no_rumah` varchar(10) NOT NULL,
  `tarikh_masuk` date NOT NULL,
  `tarikh_keluar` date DEFAULT NULL,
  `jumlah_bayaran` double(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`nokp_penyewa`, `no_rumah`, `tarikh_masuk`, `tarikh_keluar`, `jumlah_bayaran`) VALUES
('123456021234', 'NO69', '2020-09-09', '2020-09-10', 350.00),
('123456021234', '88SH', '2020-09-09', '2020-09-10', 250.00),
('123456021234', '88SH', '2020-10-31', '2020-11-03', 250.00),
('120303020567', '238TP', '2020-11-03', '2020-11-10', 100.00),
('120303020567', '238TP', '2020-11-13', '2020-11-27', 100.00),
('120303020567', '238TP', '2020-12-12', '2020-12-14', 100.00),
('120303020567', '238TP', '2020-12-23', '2020-12-27', 100.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nokp_admin`);

--
-- Indexes for table `homestay`
--
ALTER TABLE `homestay`
  ADD PRIMARY KEY (`no_rumah`),
  ADD KEY `homestay_ibfk_1` (`id_jenis`);

--
-- Indexes for table `jenis_rumah`
--
ALTER TABLE `jenis_rumah`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`nokp_penyewa`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD PRIMARY KEY (`nokp_penyewa`,`no_rumah`,`tarikh_masuk`),
  ADD KEY `no_rumah` (`no_rumah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_rumah`
--
ALTER TABLE `jenis_rumah`
  MODIFY `id_jenis` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `homestay`
--
ALTER TABLE `homestay`
  ADD CONSTRAINT `homestay_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_rumah` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD CONSTRAINT `tempahan_ibfk_1` FOREIGN KEY (`nokp_penyewa`) REFERENCES `penyewa` (`nokp_penyewa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tempahan_ibfk_2` FOREIGN KEY (`no_rumah`) REFERENCES `homestay` (`no_rumah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
