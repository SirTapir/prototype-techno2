-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2019 at 12:55 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`) VALUES
(1, 'Logitech'),
(2, 'Razer'),
(3, 'Microsoft');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaction`
--

CREATE TABLE `detail_transaction` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `color` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `brand`, `image`, `description`, `featured`, `color`) VALUES
(1, 'Generic Keyboard', 1500000, 1, './images/product1.png', 'The brand new generic Keyboard ready to be used by you!', 1, 'Red,Green,Blue'),
(2, 'Generic Mouse', 150000, 2, './images/product2.png', 'Brand new generic Mouse', 1, 'Yellow,Blue,Green'),
(3, 'Microsoft Cap', 35000, 3, './images/product_Microsoft Cap_3.jpg', 'Brand new hat from microsoft', 1, 'Red,White,Blue,Green,Yellow'),
(4, 'Mechanical Keyboard', 1000000, 2, './images/product_Mechanical Keyboard_2.jpg', 'Advanced mechanical keyboard', 1, 'Red,Yellow,Green,Rainbow'),
(5, 'Razer Laptop', 175000, 2, './images/product_Razer Laptop_2.jpg', 'Oldie but goodie from Razer (not really)', 0, 'Gray');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_hotel`
--

CREATE TABLE `user_hotel` (
  `id` int(11) NOT NULL,
  `nama_hotel` text NOT NULL,
  `alamat_hotel` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_hotel`
--

INSERT INTO `user_hotel` (`id`, `nama_hotel`, `alamat_hotel`, `no_telp`) VALUES
(1, 'POP! Hotel Gubeng', 'Jl. Bangka 8-18, Gubeng, Surabaya', '0812548321'),
(2, 'Red Planet Surabaya', 'Jl. Arjuna No.64-66, Surabaya, Indonesia', '012548216547');

-- --------------------------------------------------------

--
-- Table structure for table `user_supplier`
--

CREATE TABLE `user_supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` text NOT NULL,
  `alamat_supplier` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_supplier`
--

INSERT INTO `user_supplier` (`id`, `nama_supplier`, `alamat_supplier`, `no_telp`) VALUES
(1, 'Sukses Sejati Amenities', 'Perum Bohar Permai No B1, Kabupaten Sidoarjo, Jawa Timur', '081235860001'),
(2, 'Sumber Lautan Abadi', 'Jl. Raya Darmo Baru Barat No.75, Sonokwijenan, Kec. Sukomanunggal, Kota SBY, Jawa Timur', '0317326773');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_hotel`
--
ALTER TABLE `user_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_supplier`
--
ALTER TABLE `user_supplier`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_hotel`
--
ALTER TABLE `user_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_supplier`
--
ALTER TABLE `user_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
