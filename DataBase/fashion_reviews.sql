-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 12, 2023 at 02:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion_reviews`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(18, 'Shoes', 'Shoes', 'All types of shoes from different brands. ', 0, 0, '1694700761.jpg', 'Shoes', 'Shoes for females', 'female shoe leg ', '2023-09-14 14:12:41'),
(19, 'Jewelry ', 'Jewelry ', 'All kinds of female jewelry from different brands', 0, 0, '1694701238.jpg', 'Jewelry ', 'Female jewelry', 'female jewelry fashion neck', '2023-09-14 14:20:38'),
(20, 'Dresses', 'Dress', 'Women dresses of all sizes from different brands', 0, 0, '1695385165.png', '', '', '', '2023-09-22 12:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories`) VALUES
(1, 'gucci_skirts'),
(2, 'gucci_trousers'),
(3, 'gucci_polo'),
(4, 'prada_shoes');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(24, 18, 'GUCCI BOOT WITH HORSEBIT', 'GUCCI BOOT WITH HORSEBIT', 'GUCCI', 'An established House code, the Horsebit appears as a subtle detail atop this pair of boots. Presented in black leather, the style is complete with a lug sole, for a contemporary feel.', 0, 0, '1694778075.png ', 1090, 0, 0, '', '', '', '2023-09-15 11:41:15'),
(25, 18, 'GUCCI GG KNIT ANKLE BOOTS', 'GUCCI GG KNIT ANKLE BOOTS', 'GUCCI', 'The GG logo is an established symbol of Gucci\'s heritage, evolving from the original rhombi design first used in the \'30s. Here the unmissable motif decorates this pair of technical knit fabric ankle boots.', 0, 0, '1694981948.png ', 1250, 0, 0, '', '', '', '2023-09-17 20:19:09'),
(26, 19, 'GUCCI INTERLOCKING G HEART CHOKER', 'GUCCI INTERLOCKING G HEART CHOKER', 'GUCCI', 'The Interlocking G motif throughout the fashion jewelry collection draws inspiration from the past and present. Combining classic elements such as resin pearls and metal chains, this design puts a contemporary twist on a multi-strand choker.', 0, 0, '1694982312.png ', 2400, 0, 0, '', '', '', '2023-09-17 20:25:12'),
(27, 20, 'GG VISCOSE DRESS', 'GG VISCOSE DRESS', 'GUCCI ', 'This dark brown and camel GG viscose dress presents a contemporary take on the House\'s iconic monogram, which prominently showcases the initials of its founder, Guccio Gucci. The silhouette is elegantly adorned with self-covered buttons, each featuring the distinctive G detailing.', 16, 20, '1695386327.png ', 3900, 0, 0, '6 - 10', '', '', '2023-09-22 12:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `product` varchar(191) NOT NULL,
  `review` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product`, `review`) VALUES
(18, 'GUCCI GG KNIT ANKLE BOOTS', 'This is wonderful'),
(19, 'GUCCI GG KNIT ANKLE BOOTS', 'This is wonderful'),
(20, 'GUCCI GG KNIT ANKLE BOOTS', 'Beautiful product'),
(21, 'GUCCI BOOT WITH HORSEBIT', 'This shit breaks my ankle'),
(22, 'GUCCI INTERLOCKING G HEART CHOKER', 'This almost choked me to death.'),
(23, 'GUCCI BOOT WITH HORSEBIT', 'This is wonderful'),
(24, 'GUCCI BOOT WITH HORSEBIT', 'God is the greatest'),
(25, 'GUCCI INTERLOCKING G HEART CHOKER', 'I hate it'),
(26, 'GUCCI BOOT WITH HORSEBIT', 'This shit breaks my ankle');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_as`) VALUES
(1, 'Somadina Amuchie', 'kingswatter@gmail.com', 'Donswatter12', 0),
(2, 'Somadina Amuchie', 'oma@gmail.com', 'Donswatter12', 0),
(3, 'Uchechi Benard', 'uchechi@gmail.com', 'Donswatter12', 1),
(4, 'Don', 'donaldogba5@gmail.com', 'Donswatter12', 0),
(5, 'James', 'Tiffany.walker@fb.appen.com', 'Donswatter12', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
