-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 08:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Alfina Damayanti', 'admin', '$2y$10$SefAgrAzRVIuqlXS2qzTdewezlIAtLpQvJRuOjDGe/0F..j8A.Spq', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `message` text NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `slug`) VALUES
(9, 'Medis Habis Pakai', 'medis-habis-pakai'),
(10, 'Obat Bebas', 'obat-bebas');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(125) NOT NULL,
  `province` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `courier` varchar(125) NOT NULL,
  `cost_courier` int(11) NOT NULL,
  `waybill` varchar(125) DEFAULT NULL,
  `status` enum('waiting','paid','process','delivered','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `date`, `invoice`, `total`, `name`, `address`, `city`, `province`, `phone`, `courier`, `cost_courier`, `waybill`, `status`) VALUES
(5, 4, '2023-10-19', '420231019104655', 2000, 'Alfina Damayanti', 'Rungkut Asri Timur', 'Surabaya', 'Jawa Timur', '085711117777', 'JNE', 35000, NULL, 'paid'),
(6, 4, '2023-10-19', '420231019104828', 2000, 'Alfina Damayanti', 'Rungkut Asri Timur', 'Surabaya', 'Jawa Timur', '085711117777', 'JNE', 35000, NULL, 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `order_confirm`
--

CREATE TABLE `order_confirm` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` int(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_confirm`
--

INSERT INTO `order_confirm` (`id`, `id_orders`, `account_name`, `account_number`, `nominal`, `note`, `image`) VALUES
(5, 5, 'Alfina Damayanti', 2147483647, 37000, '-', '420231019104655-20231019105614.png');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(4) NOT NULL,
  `message` text NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_orders`, `id_product`, `quantity`, `message`, `sub_total`) VALUES
(5, 5, 13, 1, '', 2000),
(6, 6, 13, 1, '', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(125) NOT NULL,
  `color` varchar(255) NOT NULL,
  `type` enum('Obat','Alat') NOT NULL,
  `price` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_category`, `slug`, `title`, `description`, `size`, `color`, `type`, `price`, `is_available`, `image`, `delete`) VALUES
(11, 9, 'sensitif-strip-uc-plus-wadah-urine', 'Sensitif Strip UC (Plus Wadah Urine)', 'SENSITIF STRIP UC ini merupakan alat tes kehamilan yang dilengkapi dengan wadah penampung urin atau air seni. Alat ini memiliki prinsip kerja dengan mendeteksi i tingkat kadar hormone hCG (human Chorionic Gonadotrophin) pada air seni, dimana hormon hCG akan meningkat pada saat awal kehamilan. Alat tes ini dapat digunakan setelah 7 hari berhubungan. ', '', '', 'Alat', 40000, 1, 'sensitif-strip-uc-plus-wadah-urine-20231019102148.png', 1),
(12, 9, 'spuit-without-needle-20-cc', 'Spuit Without Needle 20 cc', ' Spuit without Needle 20 cc merupakan peralatan medis suntik tanpa jarum yang digunakan untuk menyuntikkan cairan obat, susu, atau vitamin ', '', '', 'Alat', 10000, 1, 'spuit-without-needle-20-cc-20231019102312.png', 1),
(13, 10, 'sumagestic-600-mg-4-tablet', 'Sumagestic 600 mg 4 Tablet', 'SUMAGESIC TABLET merupakan obat dengan kandungan Paracetamol 600 mg. Obat ini dapat digunakan untuk meringankan rasa sakit pada sakit kepala, sakit gigi, dan menurunkan demam. Paracetamol pada kandungan obat ini bekerja pada pusat pengatur suhu di hipotalamus untuk menurunkan suhu tubuh (antipiretik) serta menghambat sintesis prostaglandin sehingga dapat mengurangi nyeri ringan sampai sedang (analgesik). ', '', '', 'Obat', 2000, 1, 'sumagestic-600-mg-4-tablet-20231019102501.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `date_register` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `is_active`, `date_register`) VALUES
(4, 'Alfina Damayanti', 'alfinad1921@gmail.com', '$2y$10$qGGs91afhFXJvp7a9/RE1O1raK//3thJ55zcXI1x3osACHFrP5ad6', '', 1, 1697686837),
(5, 'Nada', 'nada@gmail.com', '$2y$10$YMN1uaTxe120rGBWM7qzyeeGUIizs3Ej1OPR8EIfW7vqz6mjTiGEa', '', 1, 1701434376),
(6, 'Nada', 'nada1921@gmail.com', '$2y$10$wPVIuAi53tbBljsaLKSP6.lhlSVsIkYW2m6yp8ZA0BtAsbttmkVpK', '', 1, 1701434423),
(7, 'Dama', 'dama19@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 1, 1701434566);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_confirm`
--
ALTER TABLE `order_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_confirm`
--
ALTER TABLE `order_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
