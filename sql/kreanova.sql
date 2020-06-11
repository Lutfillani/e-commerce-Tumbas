-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 06:34 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kreanova`
--

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `id` int(255) NOT NULL,
  `pembeli` varchar(100) NOT NULL,
  `penjual` varchar(100) NOT NULL,
  `produk` varchar(100) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `noHape` varchar(30) NOT NULL,
  `oleh` varchar(30) NOT NULL,
  `banyak` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `pembayaran` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`id`, `pembeli`, `penjual`, `produk`, `harga`, `nama`, `noHape`, `oleh`, `banyak`, `satuan`, `gambar`, `pembayaran`, `status`) VALUES
(36, '', '', 'Lombok Hijau', '25.000/ kg', 'dewi', '0818105562', 'COD', '1', 'Porsi', '5d062bd188f64.jpeg', '', ''),
(37, '', '', 'Onde-Onde', '6500', 'dewi', '0818105562', 'COD', '1', 'Porsi', '5d062d26ae508.jpg', '', ''),
(38, '', '', 'Nasi Kuning', '5000', 'dewi pemalang', '078562312', 'COD', '1', 'Porsi', '5d062a706fbe6.jpeg', '', ''),
(39, '', '', 'Laci Panjang Minimalis', '1500.000', 'dewi sragi, pekalongan', '08386180460', 'COD', '1', 'Piece', '5d06231cc8468.jpg', '', ''),
(40, '', '', 'Tempe Keripik', '10.000/ bungkus', 'dewi sragi pekalongan', '083861800460', 'COD', '1', 'Sachet', '5d0d9f0554799.jpeg', '', ''),
(41, 'admin', '', 'Tempe Keripik', '10.000/ bungkus', 'dewi dari sragi', '083861800460', 'COD', '1', 'Sachet', '5d0d9f0554799.jpeg', '', ''),
(42, '', '', 'Dadar Gulung', '1500', 'dewrwe', '3534634', 'COD', '1', 'Porsi', '5d06313e29140.jpg', '', ''),
(43, 'admin', '', 'Tempe Keripik', '10.000/ bungkus', 'dewiwbejgwaj', '864247', 'COD', '1', 'Porsi', '5d0d9f0554799.jpeg', 'lunas', 'selesai'),
(44, '', '', 'Wortel', '25.000/ kg', 'dewrwj', '2341', 'COD', '1', 'Porsi', '5d063291e9885.jpeg', '', ''),
(45, '', '', 'Wortel', '25.000/ kg', 'contoh', '8434', 'COD', '1', 'Porsi', '5d063291e9885.jpeg', '', ''),
(47, 'umkm pemalang', '', 'Wortel', '25.000/ kg', 'nadia ', '082018012', 'Go-Send', '1', 'Kg', '5d063291e9885.jpeg', '', ''),
(48, 'umkm pemalang', '', 'Dadar Gulung', '1500', 'nia', '84901274986', 'J&T Express', '2', 'Porsi', '5d06313e29140.jpg', '', ''),
(49, 'umkm pemalang', '', 'Kacang Panggang', '8800', 'faradina', '08553761', 'Tiki', '1', 'Sachet', '5d062e44de2cf.jpeg', 'lunas', ''),
(50, 'admin', '', 'Wortel', '25.000/ kg', 'Dewi Lutfiyani - Pecangakan, Comal, Pemalang.', '083861800460', 'COD', '1', 'Kg', '5d063291e9885.jpeg', '', ''),
(51, 'admin', '', 'Dadar Gulung', '1500', 'Dewi - sragi', '0818105562', 'COD', '1', 'Porsi', '5d06313e29140.jpg', '', ''),
(52, 'administrator', 'depot dwi jaya', 'Satu Set Sofa ', '8.000.000', 'Dewi - Pecangakan, Comal, Pemalang.', '083861800460', 'COD', '1', 'Set', '5d119bd7f2912.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `insertproduk`
--

CREATE TABLE `insertproduk` (
  `id` int(11) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `namaproduk` varchar(200) DEFAULT NULL,
  `deskripsiproduk` varchar(255) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `stok` varchar(11) DEFAULT NULL,
  `berat` varchar(255) DEFAULT NULL,
  `gbrproduk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insertproduk`
--

INSERT INTO `insertproduk` (`id`, `admin`, `namaproduk`, `deskripsiproduk`, `harga`, `kategori`, `stok`, `berat`, `gbrproduk`) VALUES
(25, '', 'Laci Panjang Minimalis', 'laci Panjang Minimalis yang dibuat dengan kayu berkualitas dikeakan dikerjakan dengan detail.', '1500.000', 'Furniture', '3', '5 kg', '5d06231cc8468.jpg'),
(27, '', 'Kue Putu', 'kue tradisional yang terbuat dari tepung ketanyang ditaburi kelapa parut. \r\n\r\nMenerima pesanan. ', '1500', 'Makanan', '100', '100 gr', '5d0629140ff82.jpg'),
(28, '', 'Nasi Kuning', 'Nasi kuning gurih. Menerima pesanan.', '5000', 'Makanan', '100 bungkus', '200 gr', '5d062a706fbe6.jpeg'),
(29, '', 'Lombok Hijau', 'Lombok hijau segar.', '25.000/ kg', 'Sayur & Buah', '50 kg', '', '5d062bd188f64.jpeg'),
(30, '', 'Kursi Tunggal', 'SIngle Chair Minimalis', '320.000', 'Furniture', '10', '1 kg', '5d062c77518db.jpg'),
(31, '', 'Onde-Onde', 'Jajanan tradisional onde-onde yang dibaluri wijen. 1 bungkus isi 5 onde-onde.', '6500', 'Makanan', '50 bungkus', '100 gr', '5d062d26ae508.jpg'),
(32, '', 'Kacang Panggang', 'Kacang panggang bukan kacang rebus. Berat 1 bungkus 200 gr', '8800', 'Makanan', '50', '200 gr', '5d062e44de2cf.jpeg'),
(33, '', 'Sling Bag Handmade', 'Sling Bag handmade yang dibuat oleh para kelompok pemberdaya perempuan di daerah Barat Pemalang.', '85.500', 'Fashion', '20', '250 gr', '5d062f3739406.jpeg'),
(34, '', 'Bumbu Pawon', 'Bumbu pawon segar. ', '5000', 'Sayur & Buah', '57 bungkus', '200 gr', '5d062fa356e0b.jpeg'),
(35, '', 'Apem', 'kue tradisional Jawa Tengah.', '1000', 'Makanan', '100', '35gr', '5d0630adee812.jpg'),
(36, '', 'Dadar Gulung', 'Kue tradisional yang terbuat dari tepung terigu yang diisi enten-enten(kelapa campur gula jawa).', '1500', 'Makanan', '100', '30 gr', '5d06313e29140.jpg'),
(38, '', 'Wortel', 'Wortel segar dipetik dari kebun langsung.', '25.000/ kg', 'Sayur & Buah', '5 kwintal', '1 kg', '5d063291e9885.jpeg'),
(40, 'admin', 'Tempe Keripik', 'Tempe keripik merupakan makanan yang tidak jarang ditemui di daerah Pemalang. Tempe keripik ini dihasilkan dari tempe yang diiris tipis yang kemudian dicelupkan ke adonan tepung yang telah dibumbui untuk selanjutnya digoreng hingga krispi.', '10.000/ bungkus', 'Makanan', '50', '250 gr', '5d0d9f0554799.jpeg'),
(41, 'depot dwi jaya', 'Satu Set Sofa ', 'Satu set sofa silver untuk melengkapi ruangan di dalam rumah Anda.', '8.000.000', 'furniture', '3', '10 kg', '5d119bd7f2912.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `via` varchar(30) NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `alamat`, `via`, `jumlah`) VALUES
(1, 'Dewi - Sragi-Pekalongan', 'COD', '12 pieces'),
(2, '', '', ''),
(3, 'wiwit', 'gosent', '12'),
(4, 'andin', 'gojek', '5'),
(5, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `kategori`, `gambar`) VALUES
(1, 'makanan', 'makanan1.png'),
(2, 'fashion', 'fashion.png'),
(3, 'sayur_buah', 'sayurbuahh.png'),
(4, 'furniture', 'furniture.png'),
(5, 'kecantikan', 'kecantikan.png'),
(6, 'buku_atm', 'books.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$qrtjG0JIm5qQKSn4guB3uuOPEUDcQHZVW7I9rZzl6wH1vYuA9x4pK'),
(2, 'tumbas', '$2y$10$xU26FwRxjwfil2boaTtY5.x4nyh9t4Ri8wp8RmXWK.yDocUz7MTli'),
(3, 'administrator', '$2y$10$Ij40jLcynT5kpQUjgk21wuoBI68rHioq.5X6ZuahXmj8wWgRcTzlS'),
(4, 'umkm pemalang', '$2y$10$rd5V0UVSdPhEdaqEFB3Uk.qfk0IFo9ITCC5j2AujO0l/gpwwrDIZ2'),
(5, 'koperasi desa', '$2y$10$1b8Oc0nICDaDR30fASB6gekJbcFOLKTlxjq6GfJwvz4BCVCk7miEK'),
(6, 'depot dwi jaya', '$2y$10$4Xy0OVfuMzaxLP4ZagSUWupTTWe15tAoMAL10M98Y/H6caLm9xuEi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insertproduk`
--
ALTER TABLE `insertproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `insertproduk`
--
ALTER TABLE `insertproduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
