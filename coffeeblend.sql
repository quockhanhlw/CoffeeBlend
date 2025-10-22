-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2025 at 02:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeblend`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$12$0S05Hi1uKiAbhHAm8smICO56plduACjsDsMH4wbDb1aCwyovBU5Au', '2025-10-20 03:38:19', '2025-10-19 20:48:47'),
(2, 'Khanh', 'lqk@gmail.com', '$2y$12$SN41Z/CuHVbYlUtMU.XCz.yJLljojzKYTEymH6VY2Ytrb/.7o861y', '2025-10-20 05:29:16', '2025-10-20 05:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `message` text NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `state` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` int(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `state`, `address`, `city`, `zip_code`, `phone`, `email`, `price`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Quoc', 'Khanh', 'France', '12 Chua Boc', 'Hanoi', 1253425234, 345276156, 'quockhanhlw294@gmail.com', '12', 1, 'Processing', '2025-10-18 06:14:26', '2025-10-18 06:14:26'),
(6, 'Quoc', 'Khanh', 'South', '12 Chua Boc', 'Hanoi', 1253425234, 345276156, 'user@gmail.com', '255000', 2, 'Processing', '2025-10-21 06:03:01', '2025-10-21 06:03:01'),
(7, 'Quoc', 'Khanh', 'South', '12 Chua Boc', 'Hanoi', 1253425234, 345276156, 'quockhanhlw294@gmail.com', '120000', 2, 'Processing', '2025-10-22 04:49:42', '2025-10-22 04:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Classic Cheeseburger', 'burger-3.jpg', '120000', 'A juicy beef patty with melted cheese, fresh lettuce, and tomato in a sesame seed bun.', 'burger', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(2, 'Tomahawk Steak', 'dish-1.jpg', '750000', 'A thick-cut Tomahawk steak served with broccolini, mashed sweet potato, and a rich red wine sauce.', 'dish', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(3, 'Bacon & Onion Burger', 'burger-2.jpg', '145000', 'Beef patty topped with crispy bacon, melted cheese, caramelized onions, and special sauce.', 'burger', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(4, 'Strawberry & Nut Pancakes', 'dessert-2.jpg', '90000', 'A stack of fluffy pancakes topped with fresh strawberries, blueberries, and peanuts.', 'dessert', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(5, 'Banana Split', 'dessert-5.jpg', '75000', 'Classic banana split with whipped cream, chocolate sauce, and fresh fruits like kiwi, orange, and strawberry.', 'dessert', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(6, 'Blueberry Cheesecake', 'dessert-4.jpg', '85000', 'A slice of creamy cheesecake on a biscuit base, topped with blueberry compote and a mint leaf.', 'dessert', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(7, 'Fresh Fruit Tart', 'dessert-3.jpg', '95000', 'A delicate tart shell filled with cream and topped with fresh mango, raspberries, blackberries, and strawberries.', 'dessert', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(8, 'Red Velvet Macaron Cake', 'dessert-1.jpg', '110000', 'A beautiful red velvet mousse cake decorated with macarons, chocolate shavings, and rose petals.', 'dessert', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(9, 'Sunny-Side Up Burger', 'burger-1.jpg', '135000', 'A delicious beef burger with a perfect sunny-side-up egg, cheese, and fresh greens.', 'burger', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(10, 'Berry Pancakes', 'dessert-6.jpg', '80000', 'A small stack of pancakes drizzled with maple syrup and topped with fresh strawberries and blueberries.', 'dessert', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(11, 'Grilled Salmon Steak', 'dish-6.jpg', '320000', 'Perfectly grilled salmon steak served with lettuce, avocado, cherry tomatoes, and a slice of lemon.', 'dish', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(12, 'Shrimp Stir-Fry with Vegetables', 'dish-7.jpg', '210000', 'Fresh shrimp stir-fried with broccoli, carrots, and snow peas in a savory sauce.', 'dish', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(13, 'Hearty Breakfast Scramble', 'dish-11.jpg', '130000', 'Scrambled eggs with bacon, corn, spinach, and potatoes, drizzled with ketchup.', 'dish', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(14, 'Rosé Wine', 'drink-2.jpg', '150000', 'An elegant glass of rosé wine, perfect for a romantic evening or celebration.', 'drink', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(15, 'Whole Roasted Chicken', 'dish-4.jpg', '450000', 'A whole roasted chicken with crispy skin and tender meat, perfectly seasoned, serves 2-3.', 'dish', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(16, 'Herb-Crusted Rack of Lamb', 'dish-2.jpg', '680000', 'A full rack of lamb roasted with herbs, crispy on the outside and juicy on the inside.', 'dish', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(17, 'Fresh Orange Juice', 'drink-1.jpg', '55000', 'A refreshing glass of freshly squeezed orange juice, rich in Vitamin C.', 'drink', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(18, 'Filet Mignon with Pepper Sauce', 'dish-3.jpg', '590000', 'Tender filet mignon served with asparagus, stuffed tomato, and a black pepper sauce.', 'dish', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(19, 'Steamed Prawns', 'dish-5.jpg', '180000', 'Freshly steamed whole prawns, retaining their natural sweetness, served on a silver platter.', 'dish', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(20, 'Root Vegetable Tower Salad', 'dish-8.jpg', '110000', 'A fresh salad of julienned carrots, beets, and turnips, beautifully presented in a tower with microgreens.', 'dish', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(21, 'Fruit Smoothie Trio', 'drink-9.jpg', '180000', 'A trio of tropical fruit smoothies (banana, apple, pineapple) layered with yogurt and granola.', 'drink', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(22, 'Sage & Citrus Cocktail', 'drink-8.jpg', '130000', 'A refreshing cocktail with citrus flavors, garnished with a fresh sage leaf.', 'drink', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(23, 'Colorful Cocktail Selection', 'drink-3.jpg', '110000', 'A selection of vibrant cocktails (blue, yellow, green) at the bar, perfect for a night out.', 'drink', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(24, 'Aperol Spritz', 'drink-5.jpg', '140000', 'The classic Italian Aperol Spritz cocktail with its signature orange color, ice, and a fresh orange slice.', 'drink', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(25, 'Strawberry Mojito', 'drink-6.jpg', '120000', 'A refreshing strawberry mojito with real strawberries, mint, lime, and ice.', 'drink', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(26, 'Hugo Spritz', 'drink-7.jpg', '135000', 'A light Hugo Spritz cocktail with sparkling wine, elderflower syrup, mint, lime, and ice.', 'drink', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(27, 'Draft Beer', 'drink-4.jpg', '60000', 'Two cold, golden draft beers with a frothy head, served at the bar.', 'drink', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(28, 'Vegetable Pizza', 'image_3.jpg', '180000', 'Crispy thin-crust pizza with bell peppers, red onions, black olives, and melted cheese.', 'pizza', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(29, 'Spaghetti Bolognese', 'image_1.jpg', '135000', 'Al dente spaghetti noodles topped with a rich tomato and ground beef sauce and grated cheese.', 'dish', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(30, 'Charcuterie & Cheese Platter', 'image_4.jpg', '250000', 'A beautiful appetizer platter with cured meats, cheese, hard-boiled eggs, grapes, figs, olives, and nuts.', 'dish', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(31, 'Hot Caffe Latte', 'menu-4.jpg', '65000', 'A creamy hot latte with steamed milk and intricate latte art.', 'coffee', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(32, 'Pepperoni Pizza', 'image_6.jpg', '190000', 'A classic pizza loaded with spicy pepperoni sausage and gooey mozzarella cheese.', 'pizza', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(33, 'Hot Caffe Mocha', 'menu-1.jpg', '70000', 'The perfect blend of rich espresso, sweet chocolate, and hot milk, with heart latte art.', 'coffee', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(34, 'Iced Coffee with Milk', 'menu-3.jpg', '50000', 'Traditional dark coffee swirled with cold milk and ice.', 'coffee', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(35, 'Margherita Pizza', 'image_5.jpg', '160000', 'Classic Italian pizza with tomato sauce, fresh mozzarella, and fragrant basil leaves.', 'pizza', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(36, 'Aglio e Olio Pasta', 'image_2.jpg', '120000', 'Spaghetti tossed with garlic, olive oil, chili flakes, and herbs. A simple, elegant dish.', 'dish', '2025-10-21 12:00:03', '2025-10-21 12:00:03'),
(37, 'Cappuccino To-Go', 'menu-2.jpg', '60000', 'A hot cappuccino in a convenient to-go cup, dusted with chocolate powder.', 'coffee', '2025-10-21 12:00:03', '2025-10-21 12:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `review` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `review`, `created_at`, `updated_at`) VALUES
(1, 'An Tran', 'The burger here is fantastic! Juicy patty, perfectly melted cheese. Will be back!', '2025-10-22 09:44:18', '2025-10-22 09:44:18'),
(2, 'Bich Nguyen', 'The latte is very aromatic, and the cafe has a quiet atmosphere, great for working. Staff is friendly.', '2025-10-22 09:44:18', '2025-10-22 09:44:18'),
(3, 'Minh Le', 'Food is decent, the thin-crust pizza is quite good. However, it gets very crowded on weekends, so service was a bit slow.', '2025-10-22 09:44:18', '2025-10-22 09:44:18'),
(4, 'Hang Pham', 'The blueberry cheesecake is outstanding! A must-try dessert.', '2025-10-22 09:44:18', '2025-10-22 09:44:18'),
(5, 'Tung Vo', 'The steak was tender, and the black pepper sauce was rich. A bit pricey, but the quality is worth it.', '2025-10-22 09:44:18', '2025-10-22 09:44:18'),
(6, 'Linh Dang', 'I tried the Strawberry Mojito, very refreshing and beautifully presented. Perfect for a relaxing evening.', '2025-10-22 09:44:18', '2025-10-22 09:44:18'),
(7, 'Bao Hoang', 'A good spot for lunch. The Spaghetti Bolognese was average, not too special, but decent.', '2025-10-22 09:44:18', '2025-10-22 09:44:18'),
(8, 'Anh Trinh', 'Beautiful space, enthusiastic staff. The fresh-squeezed orange juice is very pure. Will bring friends here.', '2025-10-22 09:44:18', '2025-10-22 09:44:18'),
(9, 'Nam Bui', 'The iced milk coffee is very strong, just the way I like it. Reasonable price.', '2025-10-22 09:44:18', '2025-10-22 09:44:18'),
(10, 'Thao Ly', 'The salad was fresh, but the portion of steamed shrimp felt a bit small for the price. Overall, it was okay.', '2025-10-22 09:44:18', '2025-10-22 09:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('TXFeHcaB7p2JFfVdUucZi1cYmNPcFc68ieUQqflk', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia0htT3VQa255VVFLQVVOMjNVMjFDV3pFR3h2bmROY2NsOWVTWHE0QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cy9zdWNjZXNzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1761133858);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'User', 'user@gmail.com', NULL, '$2y$12$KqDoS0PDeB9csCKA8JASM.Pr1ZKlmND44ihwh7j3Kzm4ttNvvu5SC', NULL, '2025-10-19 20:15:19', '2025-10-19 20:15:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
