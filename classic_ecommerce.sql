-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 10:12 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classic_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `location_id`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '29 Ragab Street, Al Zayton', '2021-01-10 11:18:08', '2021-01-10 11:18:08'),
(2, 1, 2, '29 Ragab Street, Al Zayton', '2021-01-10 12:11:27', '2021-01-10 12:11:27'),
(4, 1, 1, 'ش كمال الشاذلي – أعلى مكتب تأمينات السيارات دور 5 شقه 17​', '2021-01-13 09:09:51', '2021-01-13 09:09:51'),
(5, 3, 3, '8 phores buildings batran districy el libiny street', '2021-01-18 08:33:53', '2021-01-18 08:33:53'),
(6, 4, 3, '8 phores buildings batran districy el libiny street', '2021-01-18 09:26:34', '2021-01-18 09:26:34'),
(7, 4, 1, 'kitkat', '2021-01-19 08:13:34', '2021-01-19 08:13:34'),
(8, 4, 2, 'agoza', '2021-01-19 08:17:54', '2021-01-19 08:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branches_banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_banner_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id`, `cart_banner_image`, `checkout_banner_image`, `profile_banner_image`, `shop_banner_image`, `branches_banner_image`, `shipping_banner_image`, `created_at`, `updated_at`) VALUES
(1, '1611049573u9zQOQTLmo.jpg', '1611049573Cz0Ot0v3Ep.jpg', '1611049573yec4WcmUGR.jpg', '1611049573TCUvwfNZLn.jpg', '16110495732snID8iWXk.jpg', '16110495730hriG4BPm0.jpg', '2021-01-17 11:38:50', '2021-01-19 07:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_branch_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_branch_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_branch_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_branch_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_branch_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_branch_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_phone_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_phone_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `en_branch_location`, `ar_branch_location`, `en_branch_city`, `ar_branch_city`, `en_branch_address`, `ar_branch_address`, `branch_phone_1`, `branch_phone_2`, `branch_phone_3`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Maadi', 'المعادي', 'Cairo', 'Cairo', '21 Al-Nasr Street with 263 St- Taata Building', 'رقم 21  شارع النصر بالمعادى تقاطع شارع 263 - عمارة طأطأ', '01020101553', '01020101553', '01020101553', '1610556890qhrtWSgNt2.jpg', '2021-01-13 14:54:50', '2021-01-19 10:39:15'),
(2, 'Nasr city', 'مدينة نصر', 'Cairo', 'Cairo', '59 Abbas Al Akkad- inside Wonder Land', '59 عباس العقاد - بداخل الوندر لاند', '01149978536', '01149978536', '01149978536', '1610557062aGKDTRlshB.jpg', '2021-01-13 14:57:42', '2021-01-19 10:38:22'),
(3, '6th Octuber', '6 اكتوبر', 'Cairo', 'Cairo', 'Classic Biscuits factory – 2nd Industrial Zone', 'بسور مصنع كلاسيك بالمنطقة الصناعية الثانية', '01149917963', '01149917963', '01149917963', '1611060065q2SPaqWjfQ.jpg', '2021-01-19 10:41:05', '2021-01-19 10:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `en_name`, `ar_name`, `en_text`, `ar_text`, `en_slug`, `ar_slug`, `banner_image`, `created_at`, `updated_at`) VALUES
(5, 'Classic', 'كلاسيك', 'Classic in English', 'كلاسيك بالعربي', 'classic', 'كلاسيك', '1610901405ZbqxqXSkZ4.png', '2021-01-17 14:36:45', '2021-01-17 14:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `en_name`, `ar_name`, `en_text`, `ar_text`, `en_slug`, `ar_slug`, `image`, `brand_id`, `banner_image`, `created_at`, `updated_at`) VALUES
(10, 'Classic Butter Cookies', 'كلاسيك زبدة كوكيز', 'Classic Butter Cookies', 'كلاسيك زبدة كوكيز', 'classic-butter-cookies', 'كلاسيك-زبدة-كوكيز', '1610901567tgc2IckUyF.png', 5, '1610901567ayoteuBVv4.png', '2021-01-17 14:39:27', '2021-01-17 14:39:27'),
(11, 'classic collection', 'مجموعات كلاسيك', 'classic collection', 'مجموعات كلاسيك', 'classic-collection', 'مجموعات-كلاسيك', '1610901641ZbUSapGP17.jpg', 5, '1610901641GApmghFgNU.jpg', '2021-01-17 14:40:41', '2021-01-17 14:40:41'),
(12, 'Classic Tea Biscuits', 'بسكويت الشاي الكلاسيكي', 'Classic Tea Biscuits', 'بسكويت الشاي الكلاسيكي', 'classic-tea-biscuits', 'بسكويت-الشاي-الكلاسيكي', '1610901691gFudx78inY.png', 5, '1610901691erkXUxepYO.png', '2021-01-17 14:41:31', '2021-01-17 14:41:31'),
(13, 'mini', 'ميني', 'mini', 'ميني', 'mini', 'ميني', '161105211097WeO8QdDI.jpg', 5, '1611052110ERSmWSZm65.jpg', '2021-01-19 08:28:30', '2021-01-19 08:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `order_id`, `address_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2021-01-13 09:12:19', '2021-01-13 09:12:19'),
(2, 4, 4, '2021-01-13 10:59:42', '2021-01-13 11:04:52'),
(3, 5, 1, '2021-01-13 12:44:17', '2021-01-13 12:44:17'),
(4, 6, 1, '2021-01-13 13:28:14', '2021-01-13 15:06:19'),
(5, 7, 2, '2021-01-17 13:29:58', '2021-01-17 13:29:58'),
(6, 8, 2, '2021-01-17 14:47:44', '2021-01-17 14:47:44'),
(7, 9, 5, '2021-01-18 08:33:59', '2021-01-18 08:58:38'),
(8, 10, 5, '2021-01-18 09:17:46', '2021-01-18 09:17:46'),
(9, 11, 6, '2021-01-18 10:01:42', '2021-01-19 11:15:55'),
(10, 12, 7, '2021-01-19 11:54:41', '2021-01-19 11:58:02'),
(11, 13, 8, '2021-01-19 12:31:24', '2021-01-19 12:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `en_title`, `ar_title`, `logo`, `created_at`, `updated_at`) VALUES
(2, 'Bee', 'Bee', '16110507638nuc1Dripy.jpg', '2021-01-18 08:46:25', '2021-01-19 08:06:03'),
(3, 'Aman', 'Aman', '1611050794UM0D7rn4at.png', '2021-01-19 08:06:34', '2021-01-19 08:06:34'),
(4, 'Visa&mastercard', 'Visa&mastercard', '1611050817AcjCOZH4Aw.png', '2021-01-19 08:06:57', '2021-01-19 08:06:57'),
(5, 'fawry', 'fawry', '1611050833Ikvn2joD0H.png', '2021-01-19 08:07:13', '2021-01-19 08:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_email_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_email_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_email_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_work_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_work_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_work_hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_work_hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `sales_email_1`, `sales_email_2`, `sales_email_3`, `phone`, `fax`, `en_location`, `ar_location`, `en_address`, `ar_address`, `en_work_days`, `ar_work_days`, `en_work_hours`, `ar_work_hours`, `facebook`, `instagram`, `twitter`, `banner_image`, `created_at`, `updated_at`) VALUES
(1, 'mohamed@gmail.com', 'mohamed@gmail.com', NULL, '0025391851241', '0025391851241', 'mohamed', 'mohamed', 'mohamed', 'mohamed', 'mohamed', 'mohamed', 'mohamed', 'mohamed', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.twitter.com', '1610463824EkFYPrP4Vw.jpg', '2021-01-12 14:59:46', '2021-01-12 13:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `en_location`, `ar_location`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Mohandseen', 'المهندسين', 10, '2021-01-10 11:12:32', '2021-01-10 11:12:32'),
(2, 'Agouza', 'العجوزة', 44, '2021-01-10 11:12:45', '2021-01-10 11:12:45'),
(3, 'Haram', 'الهرم', 100, '2021-01-10 11:12:59', '2021-01-10 11:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `mains`
--

CREATE TABLE `mains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_first_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_second_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_number_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_first_number` double NOT NULL,
  `en_home_first_number_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_home_first_number_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_second_number` double NOT NULL,
  `en_home_second_number_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_home_second_number_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_third_number` double NOT NULL,
  `en_home_third_number_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_home_third_number_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_fourth_number` double NOT NULL,
  `en_home_fourth_number_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_home_fourth_number_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_advantage_first_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_home_advantage_first_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_home_advantage_first_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_home_advantage_first_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_home_advantage_first_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_advantage_second_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_home_advantage_second_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_home_advantage_second_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_home_advantage_second_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_home_advantage_second_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_advantage_third_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_home_advantage_third_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_home_advantage_third_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_home_advantage_third_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_home_advantage_third_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_advantage_fourth_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_home_advantage_fourth_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_home_advantage_fourth_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_home_advantage_fourth_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_home_advantage_fourth_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_footer_about_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_footer_about_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_footer_about_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_footer_about_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mains`
--

INSERT INTO `mains` (`id`, `home_first_ad`, `home_second_ad`, `home_number_banner`, `home_first_number`, `en_home_first_number_title`, `ar_home_first_number_title`, `home_second_number`, `en_home_second_number_title`, `ar_home_second_number_title`, `home_third_number`, `en_home_third_number_title`, `ar_home_third_number_title`, `home_fourth_number`, `en_home_fourth_number_title`, `ar_home_fourth_number_title`, `home_advantage_first_icon`, `en_home_advantage_first_title`, `ar_home_advantage_first_title`, `en_home_advantage_first_text`, `ar_home_advantage_first_text`, `home_advantage_second_icon`, `en_home_advantage_second_title`, `ar_home_advantage_second_title`, `en_home_advantage_second_text`, `ar_home_advantage_second_text`, `home_advantage_third_icon`, `en_home_advantage_third_title`, `ar_home_advantage_third_title`, `en_home_advantage_third_text`, `ar_home_advantage_third_text`, `home_advantage_fourth_icon`, `en_home_advantage_fourth_title`, `ar_home_advantage_fourth_title`, `en_home_advantage_fourth_text`, `ar_home_advantage_fourth_text`, `en_footer_about_title`, `ar_footer_about_title`, `en_footer_about_text`, `ar_footer_about_text`, `created_at`, `updated_at`) VALUES
(1, '1610970625W7Va7HGbOu.png', '1610970625E6u0O0EwRN.png', '1610970586M8fYDWWw9F.png', 20, 'CLIENTS', 'عملاء', 6, 'PRODUCTS', 'منتجات', 25, 'Reviews', 'المراجعات', 15, 'HAPPY CLIENTS', 'العملاء السعداء', '1610970658yzjJfNvPdd.png', 'Organic', 'طبيعي', 'We use an organic ingredients in all our products to provide our consumers with high quality, delicious products', 'نستخدم منتجات ومكونات طبيعية لنقدم لكم أفضل وأشهى المنتجات', '1610970658tuLXy91vlP.png', 'Healthy', 'صحي', 'We offer you a wide range of products that are healthy without using Hydrogenated oils or Preservatives', 'نقدم لكم منتجات متنوعة بكونات صحية خالية من الزيوت المهدرجة والمواد الحافظة', '161097065886XeY3euTm.png', 'Diversity', 'تنوع', 'We offer a variety of products such as butter cookies, tea biscuits, chocolate chip cookies, and digestive biscuit', 'نقدم لكم منتجات متنوعة \"بسكويت بالزبدة، بسكويت بالشوكولاتة، بسكويت شاي وبسكويت بالشوفان والدايجستف', '1610970658d1nMtAmtqn.png', 'Technology', 'تكنولوجيا', 'We use the latest machines and techniques to provide you with a unique products with a unique taste.', 'نستخدم أحدث الأجهزة والمعدات ووسائل التصنيع لنقدم لكم منتجات مميزة ذات طعم مميز وجودة عالية', 'About our Company', 'عن شركتنا', '123Classic Foods Industry Co. owns and distributes the “Classic” brand of cookies and biscuits throughout Egypt and the Middle East. With a variety of products such as butter cookies, tea biscuits, chocolate chip cookies, and digestive biscuits Classic Foods has become one of Egypt’s leading biscuits and cookie brands.', 'شركة كلاسيك للأغذية تقدم منتج كلاسيك في مصر والشرق الأوسط... وتقدم منتجات متنوعة \"بسكويت بالزبدة، بسكويت بالشوكولاتة، بسكويت شاي وبسكويت بالشوفان والدايجستف\"... وتطمح الشركة لتكون الرائدة في مجال صناعة البسكويت والكوكيز في مصر.', '2021-01-17 15:16:34', '2021-01-19 11:10:46');

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
(3, '2020_11_22_094123_create_brands_table', 1),
(4, '2020_11_22_095912_create_categories_table', 1),
(5, '2020_11_22_095933_create_products_table', 1),
(6, '2020_11_22_100025_create_offers_table', 1),
(7, '2020_11_22_100051_create_orders_table', 1),
(8, '2020_11_22_100104_create_order_details_table', 1),
(9, '2020_11_22_165816_create_product_images_table', 1),
(10, '2020_11_23_094946_create_branches_table', 1),
(11, '2020_11_23_134534_create_order_settings_table', 1),
(12, '2020_11_23_140827_create_promo_codes_table', 1),
(13, '2020_11_26_094857_create_checkouts_table', 1),
(14, '2020_11_26_143921_create_locations_table', 1),
(15, '2020_11_26_144058_create_addresses_table', 1),
(16, '2020_11_26_145446_create_clients_table', 2),
(17, '2020_11_26_146447_create_contact_us_table', 3),
(19, '2020_11_26_147329_create_banner_images_table', 4),
(20, '2021_11_26_148120_create_mains_table', 5),
(21, '2021_11_26_148309_create_sliders_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `percentage` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` double NOT NULL,
  `confirmed_by_user` tinyint(4) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_code_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `confirmed_by_user`, `status`, `promo_code_id`, `created_at`, `updated_at`) VALUES
(8, 1, 346.56, 0, NULL, NULL, '2021-01-17 14:47:33', '2021-01-17 14:47:44'),
(9, 3, 558.6, 1, 'delivered', NULL, '2021-01-18 08:23:23', '2021-01-18 09:14:09'),
(10, 3, 262.2, 1, 'confirmed', NULL, '2021-01-18 09:16:22', '2021-01-19 11:25:31'),
(11, 4, 353.4, 1, 'delivered', NULL, '2021-01-18 09:59:00', '2021-01-19 11:18:09'),
(12, 4, 27.36, 1, 'confirmed', NULL, '2021-01-19 11:52:06', '2021-01-19 11:58:50'),
(13, 4, 92.34, 1, 'submitted', NULL, '2021-01-19 12:31:14', '2021-01-19 12:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(32, 8, 13, 130, 2, '2021-01-17 14:47:33', '2021-01-17 14:47:33'),
(33, 9, 12, 80, 1, '2021-01-18 08:23:23', '2021-01-18 08:23:23'),
(34, 9, 13, 130, 1, '2021-01-18 08:25:33', '2021-01-18 08:25:33'),
(35, 9, 14, 180, 1, '2021-01-18 08:25:43', '2021-01-18 08:25:43'),
(36, 10, 13, 130, 1, '2021-01-18 09:16:22', '2021-01-18 09:16:22'),
(37, 11, 13, 130, 1, '2021-01-18 09:59:00', '2021-01-18 09:59:00'),
(38, 11, 12, 80, 1, '2021-01-18 10:31:17', '2021-01-18 10:31:17'),
(39, 12, 12, 14, 1, '2021-01-19 11:52:06', '2021-01-19 11:52:06'),
(40, 13, 17, 37, 1, '2021-01-19 12:31:14', '2021-01-19 12:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `order_settings`
--

CREATE TABLE `order_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taxes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_settings`
--

INSERT INTO `order_settings` (`id`, `taxes`, `created_at`, `updated_at`) VALUES
(1, 14, NULL, NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_before_discount` double NOT NULL,
  `price_after_discount` double DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `hot_deal` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `en_name`, `ar_name`, `en_slug`, `ar_slug`, `en_text`, `ar_text`, `image`, `price_before_discount`, `price_after_discount`, `featured`, `hot_deal`, `status`, `category_id`, `banner_image`, `created_at`, `updated_at`) VALUES
(12, 'Classic Currant cookie', 'بسكويت كلاسيك زبيب', 'classic-currant-cookie', 'بسكويت-كلاسيك-زبيب', 'Classic Singles, which uses the same authentic Danish recipe using 100% butter with Currant and it contains 12 cookies.', 'والذي يستخدم نفس الوصفة الدنماركية الأصيلة باستخدام 100٪ زبدة مع الكشمش ويحتوي على 12 قطعة كوكيز.', '161090180237NcYyNneA.jpg', 14, 14, 1, 1, 1, 12, '1610901802aU39vHakv2.jpg', '2021-01-17 14:43:22', '2021-01-19 10:46:01'),
(13, 'Classic Cocoa Cookie', 'كوكي كاكاو كلاسيك', 'classic-cocoa-cookie', 'كوكي-كاكاو-كلاسيك', 'Classic Cocoa', 'كاكاو كلاسيك', '1610901882ISEMToyQaz.jpg', 150, 130, 0, 1, 0, 11, '16109018825GuB59snYd.jpg', '2021-01-17 14:44:42', '2021-01-19 10:51:11'),
(14, 'Classic Vanilla Danish', 'كلاسيك فانيلا دانش', 'classic-vanilla-danish', 'كلاسيك-فانيلا-دانش', 'Danish tea biscuits make a perfect companion to that cup of tea or coffee in the morning, afternoon, or evening. Using a Danish recipe these biscuits.', 'بسكويت الشاي الدنماركي هو الرفيق المثالي لكوب الشاي أو القهوة في الصباح أو بعد الظهر أو في المساء. باستخدام وصفة دنماركية هذه البسكويت.', '1611060651YcwGeoGKTi.jpg', 45, 36, 1, 0, 1, 12, '161106065138v4klrMgu.jpg', '2021-01-17 14:45:28', '2021-01-19 10:50:51'),
(15, 'Classic Mini Coconut', 'بسكويت ميني جوز الهند', 'classic-mini-coconut', 'بسكويت-ميني-جوز-الهند', 'Classic mini is a good choice for you in a small package 160 gm with the flavor of cocnut.', 'كلاسيك ميني خيار جيد لك في علبة صغيرة 160 جم بنكهة جوز الهند.', '16110500514tg3GvGEfw.jpg', 12, 12, 1, 0, 1, 13, '1611050051THLiQGDB7D.jpg', '2021-01-19 07:54:11', '2021-01-19 08:29:24'),
(16, 'Classic Mini zoo Vanilla', 'بسكويت ميني زوو فانيليا', 'classic-mini-zoo-vanilla', 'بسكويت-ميني-زوو-فانيليا', 'Classic mini is a good choice for you in a small package 160 gm in the shape of zoo animals with Vanilla flavor.', 'كلاسيك ميني خيار جيد لك في عبوة صغيرة 160 جم على شكل حيوانات حديقة الحيوان بنكهة الفانيليا.', '1611050665lLq7ADmM4Q.jpg', 12, 12, 1, 1, 1, 13, '16110506650FxEyRToxs.jpg', '2021-01-19 08:04:25', '2021-01-19 08:29:08'),
(17, 'Classic Cocoa Danish', 'بسكويت دانش كاكاو', 'classic-cocoa-danish', 'بسكويت-دانش-كاكاو', 'Danish tea biscuits make a perfect companion to that cup of tea or coffee in the morning, afternoon, or evening. Using a Danish recipe these biscuits.', 'بسكويت الشاي الدنماركي هو الرفيق المثالي لكوب الشاي أو القهوة في الصباح أو بعد الظهر أو في المساء. باستخدام وصفة دنماركية هذه البسكويت', '1611051917C7NHal7mUk.jpg', 37, 37, 1, 0, 1, 11, '1611051917areg01QxmJ.jpg', '2021-01-19 08:25:17', '2021-01-19 08:25:17'),
(18, 'Classic Vanilla Pocket', 'بسكويت بوكيت فانيليا', 'classic-vanilla-pocket', 'بسكويت-بوكيت-فانيليا', 'Classic Pocket Cookies is a great choice for good snack during the day… Classic Pocket Vanilla comes in a box that contains 4 packs.', 'يعد Classic Pocket Cookies خيارًا رائعًا لتناول وجبة خفيفة جيدة أثناء النهار ... يأتي Classic Pocket Vanilla في علبة تحتوي على 4 عبوات', '16110520322zvUufNGcn.jpg', 36, 36, 0, 1, 1, 12, '1611052032kQJYMYF9k3.jpg', '2021-01-19 08:27:12', '2021-01-19 08:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '16098542990qYJ8b3FQB.jpg', '2021-01-05 11:44:59', '2021-01-05 11:44:59'),
(3, 1, '16098542993nnMF7jJV4.png', '2021-01-05 11:44:59', '2021-01-05 11:44:59'),
(5, 1, '16102784593ZfnjGaRRv.jpg', '2021-01-10 09:34:19', '2021-01-10 09:34:19'),
(6, 2, '16102796658x7o1fWdOj.jpg', '2021-01-10 09:54:25', '2021-01-10 09:54:25'),
(7, 2, '1610279665kaMczBbqxP.jpg', '2021-01-10 09:54:25', '2021-01-10 09:54:25'),
(8, 2, '1610279665vFa6LvG0F9.jpg', '2021-01-10 09:54:25', '2021-01-10 09:54:25'),
(9, 2, '16102796659RVj1PPGlK.jpg', '2021-01-10 09:54:25', '2021-01-10 09:54:25'),
(10, 3, '1610279742IcBUCqCWbr.jpg', '2021-01-10 09:55:42', '2021-01-10 09:55:42'),
(11, 3, '1610279742fhwjpMSZ53.jpg', '2021-01-10 09:55:42', '2021-01-10 09:55:42'),
(12, 3, '1610279742q9IWwkHh59.jpg', '2021-01-10 09:55:42', '2021-01-10 09:55:42'),
(13, 4, '1610279851Pz0PLWpQ2D.jpg', '2021-01-10 09:57:31', '2021-01-10 09:57:31'),
(14, 4, '1610279851mNdce42ZSy.jpg', '2021-01-10 09:57:31', '2021-01-10 09:57:31'),
(15, 4, '161027985158faAnT5wu.jpg', '2021-01-10 09:57:31', '2021-01-10 09:57:31'),
(16, 4, '161027985157Z37J2P2v.jpg', '2021-01-10 09:57:31', '2021-01-10 09:57:31'),
(17, 5, '1610279923nXZK5vPA7g.jpg', '2021-01-10 09:58:43', '2021-01-10 09:58:43'),
(18, 5, '1610279923tEYrexURaB.jpg', '2021-01-10 09:58:43', '2021-01-10 09:58:43'),
(19, 5, '1610279923phE062rr8Y.jpg', '2021-01-10 09:58:43', '2021-01-10 09:58:43'),
(20, 5, '161027992383yiy749Zn.jpg', '2021-01-10 09:58:43', '2021-01-10 09:58:43'),
(21, 6, '1610466963eIIvPr3AH4.jpg', '2021-01-12 13:56:03', '2021-01-12 13:56:03'),
(22, 6, '1610466964tpClSg2MQQ.jpg', '2021-01-12 13:56:04', '2021-01-12 13:56:04'),
(23, 6, '1610466964zCMt01W8QW.jpg', '2021-01-12 13:56:04', '2021-01-12 13:56:04'),
(24, 7, '1610467019KPi6i25qN7.jpg', '2021-01-12 13:56:59', '2021-01-12 13:56:59'),
(25, 7, '1610467019xDx3EZ6yKf.jpg', '2021-01-12 13:56:59', '2021-01-12 13:56:59'),
(26, 7, '1610467020LfNXIDIWIr.jpg', '2021-01-12 13:57:00', '2021-01-12 13:57:00'),
(27, 8, '1610467070emGJ2HBXSg.jpg', '2021-01-12 13:57:50', '2021-01-12 13:57:50'),
(28, 8, '1610467070R42Adq91PI.jpg', '2021-01-12 13:57:50', '2021-01-12 13:57:50'),
(29, 8, '1610467070iNAjYm95vD.jpg', '2021-01-12 13:57:50', '2021-01-12 13:57:50'),
(30, 9, '1610469307cbtoXgFMeE.jpg', '2021-01-12 14:35:07', '2021-01-12 14:35:07'),
(31, 9, '1610469307mTpAIuIyH4.jpg', '2021-01-12 14:35:07', '2021-01-12 14:35:07'),
(32, 9, '1610469307DWvEdqd7Je.jpg', '2021-01-12 14:35:07', '2021-01-12 14:35:07'),
(33, 10, '1610469384jqgAQoZXSs.jpg', '2021-01-12 14:36:24', '2021-01-12 14:36:24'),
(34, 10, '1610469384ouR5YsCdKg.jpg', '2021-01-12 14:36:24', '2021-01-12 14:36:24'),
(35, 10, '1610469384bHIhzsirwr.jpg', '2021-01-12 14:36:24', '2021-01-12 14:36:24'),
(36, 11, '1610469415rEcLhPkkRU.jpg', '2021-01-12 14:36:55', '2021-01-12 14:36:55'),
(37, 11, '1610469415lO777drAGO.jpg', '2021-01-12 14:36:55', '2021-01-12 14:36:55'),
(38, 11, '1610469415IBI6WuQnlQ.jpg', '2021-01-12 14:36:55', '2021-01-12 14:36:55'),
(39, 12, '1610901802qPORRKnsg3.jpg', '2021-01-17 14:43:22', '2021-01-17 14:43:22'),
(40, 12, '1610901802on16QnAt1C.jpg', '2021-01-17 14:43:22', '2021-01-17 14:43:22'),
(41, 12, '1610901803QtISI1mhSv.jpg', '2021-01-17 14:43:23', '2021-01-17 14:43:23'),
(42, 13, '1610901882egTuy9ENCd.jpg', '2021-01-17 14:44:42', '2021-01-17 14:44:42'),
(43, 13, '1610901882mwuT48SSi6.jpg', '2021-01-17 14:44:42', '2021-01-17 14:44:42'),
(44, 13, '1610901882c0PWauf7u7.jpg', '2021-01-17 14:44:42', '2021-01-17 14:44:42'),
(45, 14, '1610901928KNmjpCqBki.jpg', '2021-01-17 14:45:28', '2021-01-17 14:45:28'),
(46, 14, '1610901928Ql71hFpD3O.jpg', '2021-01-17 14:45:28', '2021-01-17 14:45:28'),
(47, 14, '1610901928q6jBKZXO75.jpg', '2021-01-17 14:45:28', '2021-01-17 14:45:28'),
(48, 15, '16110500512CPOvCiELv.jpg', '2021-01-19 07:54:11', '2021-01-19 07:54:11'),
(49, 16, '1611050665fnDyIxHUhS.jpg', '2021-01-19 08:04:25', '2021-01-19 08:04:25'),
(50, 17, '161105191761x0lYiCGk.jpg', '2021-01-19 08:25:17', '2021-01-19 08:25:17'),
(51, 18, '1611052032SmPQTfGWxu.jpg', '2021-01-19 08:27:12', '2021-01-19 08:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `code`, `percentage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mohamed10', 10, 1, '2021-01-12 09:37:14', '2021-01-12 09:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `en_title`, `ar_title`, `en_text`, `ar_text`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Build Your Future Now', 'Build Your Future Now', 'Hello', 'Hello', '1611053914uMEpAmD8Zb.png', '2021-01-17 13:21:05', '2021-01-19 08:58:34'),
(2, 'Start Your Study Journey', 'Start Your Study Journey', 'Hello again', 'Hello again', '1611053927ncn6JgZ3Eu.png', '2021-01-17 13:22:00', '2021-01-19 08:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Hanafy', '01149978536', 'mohammedhanafy321@gmail.com', NULL, '$2y$10$4ij3wwoLacMbenDRma4JceiCLmX9vdqwwzKB847Wz/6Avr48m6.ZC', 'super-admin', NULL, '2021-01-05 11:21:09', '2021-01-05 11:21:09'),
(3, 'Mohamed Khaled', '01020101553', 'mohamed.khaled.khalifa.99@gmail.com', NULL, '$2y$10$JE8j3CxW1rv4bEVkDba1u.4g9Eg2vCWNmN1ite5lTe3kbclXi0the', 'super-admin', NULL, '2021-01-10 12:11:27', '2021-01-10 12:43:35'),
(4, 'John Maher', '01149917963', 'johnmaher179@gmail.com', NULL, '$2y$10$Z8SLxTeTvpRXoG1KIlWPGuBXFIBi7ttK2Jgn4zsl79atQ5vUi7QY6', 'super-admin', NULL, '2021-01-18 09:26:34', '2021-01-18 09:26:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mains`
--
ALTER TABLE `mains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_settings`
--
ALTER TABLE `order_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mains`
--
ALTER TABLE `mains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order_settings`
--
ALTER TABLE `order_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
