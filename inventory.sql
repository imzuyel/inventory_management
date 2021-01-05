-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2021 at 05:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'brand', 2, '2020-10-04 22:05:13', '2020-10-08 07:01:50'),
(2, 'RFL', 1, '2020-10-04 22:06:03', '2020-10-04 22:06:03'),
(3, 'GP', 1, '2020-10-04 22:06:23', '2020-10-04 22:06:23'),
(4, 'RFL', 1, '2020-10-08 07:00:31', '2020-10-08 07:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Computer', 1, '2020-10-02 23:27:48', '2020-10-03 00:12:06'),
(3, 'Computer3', 1, '2020-10-03 00:11:59', '2020-10-03 00:11:59'),
(4, 'Potato', 1, '2020-10-08 06:24:11', '2020-10-08 06:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id`, `details`, `cost_total_price`, `date`, `month`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, '2 laptop', '499054', '03-10-20', 'May-20', '20', 1, '2020-10-03 09:51:46', '2020-10-03 09:51:46'),
(2, '2 laptop 2 pc', '10000', '03-10-20', 'May-20', '20', 1, '2020-10-03 09:57:49', '2020-10-03 09:57:49'),
(3, '2 laptop 2 pc update', '10000', '03-10-20', 'May-20', '20', 1, '2020-10-03 09:58:11', '2020-10-03 09:59:34'),
(4, 'Laptop 10000', '1000', '05-10-20', '10-20', '20', 1, '2020-10-03 11:39:38', '2020-10-05 05:59:22'),
(5, 'Laptop', '20000', '04-10-20', 'October-20', '20', 1, '2020-10-03 23:10:49', '2020-10-08 03:56:43'),
(6, '1 Fan 4000 2 pc 4000', '85000', '04-10-20', 'October-20', '20', 1, '2020-10-03 23:17:58', '2020-10-05 06:01:35'),
(7, 'Laptop', '50000', '08-10-20', 'October-20', '20', 1, '2020-10-08 10:58:05', '2020-10-08 10:58:05'),
(8, 'PC', '40000', '08-10-20', 'October-20', '20', 1, '2020-10-08 10:58:38', '2020-10-08 10:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `nid`, `phone`, `address`, `shop_name`, `photo`, `account_holder`, `account_number`, `bank_name`, `bank_branch`, `city`, `created_at`, `updated_at`) VALUES
(2, 'Zuyel Rana', 'admin@gmail.com', '20051008957438', '013035100', 'Bhelajan', NULL, 'inventory/custommers/images/100820201351245f7f195c99689paSS.PNG', 'BR', '54653', 'Brack', 'Thakurgaon', 'Thakurgaon', '2020-10-01 06:47:14', '2020-10-08 07:51:24'),
(3, 'Zuyel', 'x@gmail.com', '200510089457438', '0130351007', 'Thakyrgaon', NULL, 'inventory/custommers/images/100520200509395f7aaa935be5davatar.png', 'CCT', '54653', '54653', 'Thakurgaon', 'Thakurgaon', '2020-10-04 23:09:39', '2020-10-04 23:10:14'),
(4, 'Rasel', 'user1@gmail.com', '123456789', '34246565', 'Bhelajan', 'Shop', 'inventory/custommers/images/100520200721045f7ac9603c95cavatar.png', 'Holder', '3248945', 'Rajshahi', 'Thakurgaon', 'Thakurgaon', '2020-10-05 01:21:04', '2020-10-05 01:21:04'),
(5, 'Zuyel Update', 'a@gmail.com', '200510089576438', '0163035100', 'Bhelajan', 'CCT', 'inventory/custommers/images/100520201748365f7b5c7403abaavatar.png', 'BR', '54653', 'Brack', 'Thakurgaon', 'Thakurgaon', '2020-10-05 11:48:36', '2020-10-05 11:48:36'),
(6, 'Zuyel Rana', 'ecom@gmail.com', '20051008957741381', '0130375100', 'Thakyrgaon', 'CCT', 'inventory/custommers/images/100820201335155f7f1593adc57Captdure.PNG', 'BR', '54653', 'Brack', 'Thakurgaon', 'Thakurgaon', '2020-10-08 07:35:16', '2020-10-08 07:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expreience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `nid`, `phone`, `address`, `expreience`, `photo`, `salary`, `vacation`, `city`, `created_at`, `updated_at`) VALUES
(5, 'Rasel', 'user@gmail.com', '200510089574381', '091248958', 'Thakyrgaon', '1 years', 'inventory/employees/images/100420200531055f795e19286eainddex.jpg', '30000', 'i', 'Thakurgaon', '2020-10-01 04:45:21', '2020-10-03 23:31:05'),
(6, 'Nasirul', 'nasirul@gmail.com', '2005100895743812', '0191248958', 'Bhelajan', '1 years', 'inventory/employees/images/100420200530515f795e0bdd6ecd.jpg', '100000', 'Vacation', 'Thakurgaon', '2020-10-01 09:18:06', '2020-10-03 23:30:51'),
(8, 'Zuyel', 'admin@gmail.com', '20051008957438', '013035100', 'Bhelajan', '1 years', 'inventory/employees/images/100420200530385f795dfe8f3cainde6x.png', '100000', 'Vacation', 'Thakurgaon', '2020-10-01 09:23:15', '2020-10-03 23:30:38'),
(9, 'Zuyel Rana', 'user@gmail.com', '2005100895741381', '0130351100', 'Bhelajan', '1 years', 'inventory/employees/images/100420200530265f795df20d380index.jpg', '100000', 'Vacation', 'Thakurgaon', '2020-10-02 08:52:32', '2020-10-03 23:30:26'),
(10, 'A', 'a@gmail.com', '200510208957438', '0130335100', 'Bhelajan', '1 years', 'inventory/employees/images/100420200530095f795de1da993508-5084521_download-female-profile-icon-png-clipart-computer-icons.png', '100000', 'Vacation', 'Thakurgaon', '2020-10-03 23:30:10', '2020-10-03 23:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_10_01_040308_create_employees_table', 2),
(6, '2020_10_01_110316_create_customers_table', 3),
(7, '2020_10_01_125446_create_suppliers_table', 4),
(9, '2020_10_02_033717_create_salaries_table', 5),
(10, '2020_10_02_130823_create_salary1s_table', 6),
(11, '2020_10_03_042244_create_categories_table', 7),
(20, '2020_10_03_052906_create_products_table', 8),
(21, '2020_10_03_052948_create_brands_table', 8),
(29, '2020_10_03_133523_create_costs_table', 9),
(31, '2020_10_04_053152_create_atendences_table', 10),
(32, '2020_10_04_064022_create_settings_table', 11),
(39, '2020_10_05_041001_create_pos_table', 12),
(40, '2020_10_07_124314_create_orders_table', 12),
(41, '2020_10_07_124535_create_orderdetails_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `unit_cost`, `total`, `created_at`, `updated_at`) VALUES
(3, 2, 4, '1', '7', '8.47', NULL, NULL),
(4, 2, 3, '3', '7', '25.41', NULL, NULL),
(5, 3, 5, '1', '7', '8.47', NULL, NULL),
(6, 4, 5, '1', '7', '8.47', NULL, NULL),
(7, 4, 4, '1', '7', '8.47', NULL, NULL),
(8, 4, 3, '1', '7', '8.47', NULL, NULL),
(9, 5, 3, '1', '7', '8.47', NULL, NULL),
(10, 6, 5, '1', '7', '8.47', NULL, NULL),
(11, 7, 5, '1', '7', '8.47', NULL, NULL),
(12, 8, 5, '1', '7', '8.47', NULL, NULL),
(13, 9, 5, '1', '7', '8.47', NULL, NULL),
(14, 10, 5, '1', '7', '8.47', NULL, NULL),
(15, 11, 5, '4', '7', '33.88', NULL, NULL),
(16, 11, 4, '1', '7', '8.47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `oder_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oder_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `oder_date`, `oder_status`, `total_product`, `subtotal`, `vat`, `total`, `payment_status`, `pay`, `due`, `created_at`, `updated_at`) VALUES
(1, 4, '07-10-20', 'approve', '2', '14.00', '2.94', '16.94', 'handcash', '16.94', '00', NULL, NULL),
(2, 4, '07-10-20', 'approve', '4', '28.00', '5.88', '33.88', 'check', '16.94', '00', NULL, '2020-10-08 00:41:39'),
(3, 3, '07-10-20', 'approve', '1', '7.00', '1.47', '8.47', 'check', '12', '00', NULL, '2020-10-08 00:44:10'),
(4, 3, '08-10-20', 'approve', '3', '21.00', '4.41', '25.41', 'handcash', '25.41', '00', NULL, '2020-10-08 00:43:34'),
(5, 2, '08-10-20', 'approve', '1', '7.00', '1.47', '8.47', 'check', '16.94', '00', NULL, NULL),
(6, 5, '08-10-20', 'approve', '1', '7.00', '1.47', '8.47', 'check', '16.94', '12', NULL, '2020-10-08 01:47:30'),
(7, 2, '08-10-20', 'approve', '1', '7.00', '1.47', '8.47', 'handcash', '16.94', '00', NULL, '2020-10-08 01:47:18'),
(8, 4, '08-10-20', 'approve', '1', '7.00', '1.47', '8.47', 'check', '16.94', '00', NULL, '2020-10-08 01:49:55'),
(9, 5, '08-10-20', 'approve', '1', '7.00', '1.47', '8.47', 'handcash', '16.94', '00', NULL, '2020-10-08 02:06:15'),
(10, 2, '08-10-20', 'approve', '1', '7.00', '1.47', '8.47', 'check', '16.94', '00', NULL, '2020-10-08 08:01:00'),
(11, 5, '15-10-20', 'pendding', '5', '35.00', '7.35', '42.35', 'handcash', '12', '00', NULL, NULL);

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
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buy_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_slug`, `category_id`, `brand_id`, `supplier_id`, `product_code`, `product_place`, `product_route`, `photo`, `buy_date`, `expire_date`, `buying_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vetgetable’s Package Update', '2020-09-30-vetgetables-package-update', 2, NULL, 2, '7', 'F', 'F', 'inventory/product/images/1003202010515045f7857c66a671product-10.jpg', '2020-09-30', '2020-10-07', '6', '7', 1, '2020-10-03 02:00:28', '2020-10-03 04:52:06'),
(3, 'Vetgetable’s Package Update', '2020-10-21-vetgetables-package-update', 3, 2, 3, 'Laortio-56', 'F', 'F', 'inventory/product/images/1005202004074845f7a9c141c2dbproduct-3.jpg', '2020-10-21', '2020-10-26', '6', '7', 1, '2020-10-04 22:07:48', '2020-10-04 22:07:48'),
(4, 'Laptop  three', '2020-11-04-laptop-three', 3, 2, 3, 'll61', 'F', 'F', 'inventory/product/images/1005202004081945f7a9c33300b8product-5.jpg', '2020-11-04', '2020-10-20', '6', '7', 1, '2020-10-04 22:08:19', '2020-10-04 22:08:19'),
(5, 'Mobile', '2020-10-05-mobile', 2, 3, 2, 'Laortio-56', 'F', 'F', 'inventory/product/images/1005202004085545f7a9c57b57f6product-9.jpg', '2020-10-05', '2020-10-05', '6', '7', 1, '2020-10-04 22:08:55', '2020-10-04 22:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advance_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `month`, `year`, `advance_salary`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Febuary', '2019', '54365', 1, '2020-10-02 00:17:42', '2020-10-02 00:17:42'),
(3, 5, 'January', '2020', '54365', 1, '2020-10-02 00:38:29', '2020-10-02 00:38:29'),
(4, 8, 'January', '2020', '54365', 1, '2020-10-02 00:42:43', '2020-10-02 00:42:43'),
(5, 5, 'December', '2020', '200', 1, NULL, NULL),
(6, 5, 'September', '2020', '200', 1, NULL, NULL),
(7, 8, 'September', '2020', '100', 1, '2020-10-02 08:17:43', '2020-10-02 08:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `salary1s`
--

CREATE TABLE `salary1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_salary_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `company_address`, `company_email`, `company_phone`, `company_logo`, `created_at`, `updated_at`) VALUES
(1, 'geniuszuyel', 'Demo address', 'geniuszuyel@gmail.com', '01303510074', 'inventory/setting/images/1004202007415545f797cc3eeb1alogo.png', '2020-10-04 01:17:39', '2020-10-08 11:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `photo`, `type`, `shop`, `account_holder`, `account_number`, `bank_name`, `bank_branch`, `city`, `created_at`, `updated_at`) VALUES
(2, 'Zuyel', 'user1@gmail.com', '013035100', 'Bhelajan', 'inventory/suppliers/images/100320200622115f7818932ae18product-5.jpg', '2', 'CT', 'BR', '54653', 'Brack', 'Thakurgaon', 'Thakurgaon', '2020-10-03 00:22:11', '2020-10-03 00:22:11'),
(3, 'Zuyel', 'ecom@gmail.com', '0130351007', 'Bhelajan', 'inventory/suppliers/images/100320200622505f7818ba242bbproduct-5.jpg', '1', 'CT', 'BR', '54653', 'Brack', 'Thakurgaon', 'Thakurgaon', '2020-10-03 00:22:50', '2020-10-03 00:22:50');

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
(11, 'Zuyel Rana', 'ecom@gmail.com', NULL, '$2y$10$P2QvC5OP4Rg1euXCx9Ej0O5BGWNdBZmLsWGF/2WtYyeu5io6StN2e', NULL, '2020-09-29 23:01:48', '2020-09-29 23:01:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary1s`
--
ALTER TABLE `salary1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salary1s`
--
ALTER TABLE `salary1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
