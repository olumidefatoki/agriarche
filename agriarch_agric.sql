-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2020 at 06:49 AM
-- Server version: 5.7.32
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriarch_agric`
--

-- --------------------------------------------------------

--
-- Table structure for table `aggregator`
--

CREATE TABLE `aggregator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_person_first_name` varchar(50) NOT NULL,
  `contact_person_last_name` varchar(50) DEFAULT NULL,
  `contact_person_email` varchar(255) DEFAULT NULL,
  `contact_person_phone_number` varchar(11) NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `account_number` varchar(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aggregator`
--

INSERT INTO `aggregator` (`id`, `name`, `address`, `contact_person_first_name`, `contact_person_last_name`, `contact_person_email`, `contact_person_phone_number`, `bank_id`, `account_number`, `account_name`, `state_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'flomovina', 'abuja', 'Babangida', 'Shittu', 'babangida@gmail.com', '08036163353', 12, '08036163353', 'babangida', 1, 1, 1, '2020-10-07 12:06:55', '2020-10-07 12:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`) VALUES
(12, 'Access Bank'),
(7, 'Citi Bank'),
(8, 'Ecobank Bank'),
(17, 'Ecobank Heritage'),
(16, 'Enterprise Bank'),
(2, 'FCMB'),
(5, 'Fidelity Bank'),
(13, 'First Bank of Nigeria'),
(11, 'GTBank Plc'),
(4, 'JAIZ Bank'),
(6, 'Polaris Bank'),
(10, 'StanbicIBTC Bank'),
(1, 'Sterling Bank'),
(3, 'UBA Bank'),
(15, 'Union Bank'),
(9, 'Unity Bank'),
(14, 'Wema Bank');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_person_first_name` varchar(50) NOT NULL,
  `contact_person_last_name` varchar(50) DEFAULT NULL,
  `contact_person_email` varchar(255) DEFAULT NULL,
  `contact_person_phone_number` varchar(11) NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `name`, `address`, `contact_person_first_name`, `contact_person_last_name`, `contact_person_email`, `contact_person_phone_number`, `state_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Ajebor Farms Ltd', 'No. 2 Al- Afaaf Industrial Estate Off Banyagi, Jerry Gana Street Bida, Niger State', 'Emmmanuel', NULL, 'Emmmanuel@gmail.com', '08128486740', 26, 1, 1, '2020-10-07 09:42:55', '2020-10-07 09:42:55'),
(2, 'Coscharis Farms Limited', 'Etele pPlaza, besidde CBN awka,', 'Micheal', NULL, 'micheal@coscharisfarms.com', '08136222518', 4, 1, 1, '2020-10-07 09:46:20', '2020-10-07 09:46:20'),
(3, 'Aminu Dawaki Oil mills', '66 maganda raod bompai kano', 'Ali Aminu', 'Dawaki', 'ali@gmail.com', '08095555597', 22, 1, 1, '2020-10-07 09:54:38', '2020-10-07 09:54:38'),
(4, 'Onyx Rice Mills', 'Niger state', 'Femi', NULL, 'femi@onyx.com', '07060975177', 26, 1, 1, '2020-10-07 11:25:17', '2020-10-07 11:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_order`
--

CREATE TABLE `buyer_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(13,2) NOT NULL,
  `coupon_price` decimal(13,2) NOT NULL,
  `commodity_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_location` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `code_generation`
--

CREATE TABLE `code_generation` (
  `id` int(11) NOT NULL,
  `prefix` varchar(25) NOT NULL,
  `next_num` varchar(11) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commodity`
--

CREATE TABLE `commodity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commodity`
--

INSERT INTO `commodity` (`id`, `name`) VALUES
(2, 'Maize'),
(1, 'Rice'),
(3, 'Soya bean');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logistics_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_price` decimal(13,2) NOT NULL,
  `strike_price` decimal(13,2) NOT NULL,
  `discounted_price` decimal(13,2) NOT NULL,
  `quantity_of_bags_accepted` decimal(13,2) NOT NULL,
  `number_of_bags_accepted` int(11) NOT NULL,
  `quantity_of_bags_rejected` decimal(13,2) NOT NULL,
  `number_of_bags_rejected` int(11) NOT NULL,
  `waybill` longtext NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lga`
--

CREATE TABLE `lga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logistics`
--

CREATE TABLE `logistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `buyer_order_id` bigint(20) UNSIGNED NOT NULL,
  `aggregator_id` bigint(20) UNSIGNED NOT NULL,
  `logistics_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_type` varchar(255) NOT NULL,
  `quantity` decimal(13,2) NOT NULL,
  `no_of_bags` int(11) NOT NULL,
  `logistics_company_id` bigint(20) UNSIGNED NOT NULL,
  `truck_number` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_phone_number` varchar(255) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logistics_company`
--

CREATE TABLE `logistics_company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_person_name` varchar(50) NOT NULL,
  `contact_person_phone_number` varchar(11) NOT NULL,
  `state_id` bigint(11) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_mapping`
--

CREATE TABLE `order_mapping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_order_id` bigint(20) UNSIGNED NOT NULL,
  `strike_price` decimal(13,2) NOT NULL,
  `logistics_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `aggregator_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `state_code`) VALUES
(1, 'ABIA', 'NG-AB'),
(2, 'ADAMAWA', 'NG-AD'),
(3, 'AKWA IBOM', 'NG-AK'),
(4, 'ANAMBRA', 'NG-AN'),
(5, 'BAUCHI', 'NG-BA'),
(6, 'BENUE', 'NG-BE'),
(7, 'BORNO', 'NG-BO'),
(8, 'BAYELSA', 'NG-BY'),
(9, 'CROSS RIVER', 'NG-CR'),
(10, 'DELTA', 'NG-DE'),
(11, 'EBONYI', 'NG-EB'),
(12, 'EDO', 'NG-ED'),
(13, 'EKITI', 'NG-EK'),
(14, 'ENUGU', 'NG-EN'),
(15, 'FCT', 'NG-FC'),
(16, 'GOMBE', 'NG-GO'),
(17, 'IMO', 'NG-IM'),
(18, 'JIGAWA', 'NG-JI'),
(19, 'KEBBI', 'NG-KE'),
(20, 'KADUNA', 'NG-KD'),
(21, 'KOGI', 'NG-KO'),
(22, 'KANO', 'NG-KN'),
(23, 'KATSINA', 'NG-KT'),
(24, 'KWARA', 'NG-KW'),
(25, 'LAGOS', 'NG-LA'),
(26, 'NIGER', 'NG-NI'),
(27, 'NASSARAWA', 'NG-NA'),
(28, 'ONDO', 'NG-ON'),
(29, 'OGUN', 'NG-OG'),
(30, 'OSUN', 'NG-OS'),
(31, 'OYO', 'NG-OY'),
(32, 'PLATEAU', 'NG-PL'),
(33, 'RIVERS', 'NG-RI'),
(34, 'SOKOTO', 'NG-SO'),
(35, 'TARABA', 'NG-TA'),
(36, 'YOBE', 'NG-YO'),
(37, 'ZAMFARA', 'NG-ZA');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(8, 'Accepted'),
(2, 'Active'),
(7, 'Approved'),
(4, 'Arrived'),
(5, 'Delivered'),
(1, 'Inactive'),
(6, 'Pending'),
(9, 'Rejected'),
(3, 'Transit');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'olumide', 'olumide.fatoki@gmail.com', NULL, '$2y$10$oul/axaRCdmI7oLvoFvI8OAIpC4VroNzUg32Nc1kSdcLoXh3nq0sa', NULL, '2020-10-07 04:43:46', '2020-10-07 04:43:46'),
(2, 'Deinabo Mayaki', 'deina@agriarche.com', NULL, '$2y$10$G.FoV.oBC.RjeZOs/7Em7ekrVyGkuHIg5d0Xs8AiSek8BAPHP/YL.', NULL, '2020-12-09 14:26:25', '2020-12-09 14:26:25'),
(3, '30SBMRTAYSNBYHJGPZDGHA5N http://mail.com/003', 'waggamantitus18157413@gmail.com', NULL, '$2y$10$jCl0pcIxN.hjM7NXp0GfD.PkbjPpiA5G5z9ACM5ArOVrRmumU15Nm', NULL, '2020-12-18 16:33:48', '2020-12-18 16:33:48'),
(5, 'XXO0VSXUORGLDE8259S0YOXX http://mail.com/402', 'carillofrancoise23455645@gmail.com', NULL, '$2y$10$VQBGBq3EMOHDGHQqJDHvQuoq7NkJNC3I7gA7h/I/iBTTj5tKKaN1e', NULL, '2020-12-20 18:34:53', '2020-12-20 18:34:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aggregator`
--
ALTER TABLE `aggregator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aggregator_contact_person_phone_number_unique` (`contact_person_phone_number`),
  ADD UNIQUE KEY `aggregator_account_number_unique` (`account_number`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `aggregator_state_id_foreign` (`state_id`),
  ADD KEY `aggregator_bank_id_foreign` (`bank_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bank_name_unique` (`name`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buyer_contact_person_phone_number_unique` (`contact_person_phone_number`),
  ADD UNIQUE KEY `name` (`name`) USING BTREE,
  ADD KEY `buyer_state_id_foreign` (`state_id`),
  ADD KEY `update_by` (`updated_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `buyer_order`
--
ALTER TABLE `buyer_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `buyer_order_commodity_id_foreign` (`commodity_id`),
  ADD KEY `buyer_order_state_id_foreign` (`state_id`),
  ADD KEY `buyer_order_buyer_id_foreign` (`buyer_id`) USING BTREE,
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `code_generation`
--
ALTER TABLE `code_generation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prefix` (`prefix`),
  ADD KEY `next_num` (`next_num`);

--
-- Indexes for table `commodity`
--
ALTER TABLE `commodity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `commodity_name_unique` (`name`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_logistics_id_foreign` (`logistics_id`),
  ADD KEY `delivery_status_id_foreign` (`status_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lga`
--
ALTER TABLE `lga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lga_name_unique` (`name`),
  ADD KEY `lga_state_id_foreign` (`state_id`);

--
-- Indexes for table `logistics`
--
ALTER TABLE `logistics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `logistics_buyer_order_id_foreign` (`buyer_order_id`),
  ADD KEY `logistics_aggregator_id_foreign` (`aggregator_id`),
  ADD KEY `logistics_status_id_foreign` (`status_id`),
  ADD KEY `logistics_logistics_company_id_foreign` (`logistics_company_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `truck_number` (`truck_number`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `payment_type` (`payment_type`);

--
-- Indexes for table `logistics_company`
--
ALTER TABLE `logistics_company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logistics_company_contact_person_phone_number_unique` (`contact_person_phone_number`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_mapping`
--
ALTER TABLE `order_mapping`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buyer_order_id` (`buyer_order_id`,`aggregator_id`),
  ADD KEY `aggregator_id` (`aggregator_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `state_name_unique` (`name`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aggregator`
--
ALTER TABLE `aggregator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buyer_order`
--
ALTER TABLE `buyer_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `code_generation`
--
ALTER TABLE `code_generation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commodity`
--
ALTER TABLE `commodity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lga`
--
ALTER TABLE `lga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logistics`
--
ALTER TABLE `logistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logistics_company`
--
ALTER TABLE `logistics_company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_mapping`
--
ALTER TABLE `order_mapping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aggregator`
--
ALTER TABLE `aggregator`
  ADD CONSTRAINT `aggregator_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`),
  ADD CONSTRAINT `aggregator_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `aggregator_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `aggregator_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`);

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `buyer_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `buyer_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`);

--
-- Constraints for table `buyer_order`
--
ALTER TABLE `buyer_order`
  ADD CONSTRAINT `buyer_order_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`id`),
  ADD CONSTRAINT `buyer_order_commodity_id_foreign` FOREIGN KEY (`commodity_id`) REFERENCES `commodity` (`id`),
  ADD CONSTRAINT `buyer_order_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `buyer_order_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `buyer_order_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `delivery_logistics_id_foreign` FOREIGN KEY (`logistics_id`) REFERENCES `logistics` (`id`),
  ADD CONSTRAINT `delivery_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `lga`
--
ALTER TABLE `lga`
  ADD CONSTRAINT `lga_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`);

--
-- Constraints for table `logistics`
--
ALTER TABLE `logistics`
  ADD CONSTRAINT `logistics_aggregator_id_foreign` FOREIGN KEY (`aggregator_id`) REFERENCES `aggregator` (`id`),
  ADD CONSTRAINT `logistics_buyer_order_id_foreign` FOREIGN KEY (`buyer_order_id`) REFERENCES `buyer_order` (`id`),
  ADD CONSTRAINT `logistics_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `logistics_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `logistics_logistics_company_id_foreign` FOREIGN KEY (`logistics_company_id`) REFERENCES `logistics_company` (`id`),
  ADD CONSTRAINT `logistics_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `order_mapping`
--
ALTER TABLE `order_mapping`
  ADD CONSTRAINT `order_mapping_ibfk_1` FOREIGN KEY (`aggregator_id`) REFERENCES `aggregator` (`id`),
  ADD CONSTRAINT `order_mapping_ibfk_2` FOREIGN KEY (`buyer_order_id`) REFERENCES `buyer_order` (`id`),
  ADD CONSTRAINT `order_mapping_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_mapping_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
