--
-- Database: `irokolifestyle`
--
CREATE DATABASE IF NOT EXISTS `jefftmbb_iroko` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jefftmbb_iroko`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`, `modified_at`) VALUES
(1, 'admin', '1234', '2022-10-04 12:31:13', '2022-10-13 21:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` varchar(5) NOT NULL,
  `popular` varchar(5) NOT NULL,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, 'Sofas', 'All Kinds of Sofas', '1', 'yes', '1666134463.jpg', 'Iroko Sofas', 'All Kinds of Sofas', 'Iroko IrokoLifestyle Sofas', '2022-10-18 23:07:43'),
(2, 'Ottomans', 'All kinds of Ottomans', '1', 'yes', '003.JPG', 'IrokoLifestyle Ottomans', 'All Kinds of Ottomans', 'Iroko IrokoLifestyle Ottomans', '2022-10-18 23:08:34'),
(3, 'Accent Chairs', 'All Kinds of Accent Chairs', '1', 'yes', '1666134548.jpg', 'Iroko Accent Chairs', 'All Kinds of  Accent Chairs', 'Iroko IrokoLifestyle Accent Chairs', '2022-10-18 23:09:08'),
(7, 'Accessories', 'All Kinds of Accessories', '1', 'yes', '1678523798.jpg', 'Iroko Accessories', 'All Kinds of Accessories', 'Iroko IrokoLifestyle Accessories', '2023-03-11 08:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `state` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_method` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `ship_status` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `prod_qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image`, `qty`, `status`, `created_at`) VALUES
(30, 1, 'AYO SINGLE SEATER SOFA', 'Ayo Single Sofa in cream, is a self assembled sofa. Use this single seater to elevate any space. It is available in two other colors Brown and Grey. N.B No tools required to assemble this sofa', 179999, '0S6A7293.JPG', 87, 1, '2023-03-05 22:25:30'),
(31, 1, 'OBANDI SINGLE SEATER SOFA', 'Obandi Single Sofa in Grey, is a self assembled sofa. Use this single seater to elevate any space. It is available in two other colors Brown and Cream. N.B No tools required to assemble this sofa', 179999, '1678523231.JPG', 89, 1, '2023-03-11 08:27:11'),
(32, 2, 'IRE OTTOMAN', 'Ore Ottoman, is a self assembled sofa. Use this ottoman to elevate any space. It is available in asooke fabrics. N.B No tools required to assemble this Ottoman', 94999, '1678523613.JPG', 65, 1, '2023-03-11 08:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `transcation`
--

DROP TABLE IF EXISTS `transcation`;
CREATE TABLE `transcation` (
  `id` int(11) NOT NULL,
  `transid` text NOT NULL,
  `mid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `narration` text NOT NULL,
  `credit` int(11) NOT NULL DEFAULT 0,
  `debit` int(11) NOT NULL DEFAULT 0,
  `channel` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `password`, `code`, `status`, `created_at`, `modified_at`) VALUES
(1, 'Jeffrey Isibor', 'jeffreydikewonsi@gmail.com', '234809154', '1234', '0', '1', '2023-03-13 11:50:58', '2023-03-13 11:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

DROP TABLE IF EXISTS `wallet_transactions`;
CREATE TABLE `wallet_transactions` (
  `id` int(11) NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `transaction_id` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcation`
--
ALTER TABLE `transcation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `transcation`
--
ALTER TABLE `transcation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
