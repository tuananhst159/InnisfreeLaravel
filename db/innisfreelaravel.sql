-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 04:24 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `innisfreelaravel`
--

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2021_09_18_080722_create_tbl_admin_table', 1),
(17, '2021_09_18_095350_create_tbl_category_product', 1),
(18, '2021_09_18_130840_create_tbl_origin_product', 1),
(19, '2021_09_18_133831_create_tbl_product', 1),
(20, '2021_09_24_124450_create_tbl_customer', 1),
(21, '2021_09_25_032020_create_tbl_shipping', 1),
(22, '2021_09_25_131420_create_tbl_payment', 1),
(23, '2021_09_25_131544_create_tbl_order', 1),
(24, '2021_09_25_131611_create_tbl_order_details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tuan Anh', '0123456789', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `meta_keywords`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(2, 'Serums', 'serum, innisfree, korea', 'Serum are skin care products. Innisfree Serum', 1, NULL, NULL),
(3, 'Mask', 'mask, innisfree, korea', 'Mask is an object normally worn on the face. Innisfree Mask', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_created_at` timestamp NULL DEFAULT NULL,
  `customer_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `customer_created_at`, `customer_updated_at`) VALUES
(1, 'Tuan Anh', 'anh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0123456789', NULL, NULL),
(2, 'Thanh Quang', 'quang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0987654321', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `shipping_id` int(11) UNSIGNED NOT NULL,
  `payment_id` int(11) UNSIGNED NOT NULL,
  `order_total` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_destroy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_created_at` timestamp NULL DEFAULT NULL,
  `order_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `order_destroy`, `order_created_at`, `order_updated_at`) VALUES
(1, 1, 2, 1, '96.00', '1', '', '2021-09-23 09:17:39', '2021-10-08 01:54:24'),
(2, 2, 3, 2, '73', '2', '', '2021-10-01 08:21:38', '2021-10-09 06:11:55'),
(7, 1, 8, 10, '122', '2', '', '2021-10-04 02:28:29', '2021-10-08 01:21:54'),
(8, 1, 9, 11, '71', '2', '', '2021-10-11 03:08:17', NULL),
(9, 1, 10, 12, '103', '3', 'no money :))', '2021-11-13 13:22:43', NULL),
(10, 2, 11, 13, '61', '2', '', '2021-11-14 01:30:36', NULL),
(11, 1, 15, 14, '75', '3', 'see you next month ya', '2021-11-19 08:10:43', NULL),
(12, 1, 16, 15, '120', '3', 'khong muon mua', '2021-11-20 09:23:21', NULL),
(13, 2, 17, 16, '98', '2', NULL, '2021-11-21 13:40:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 'Moisture Plumping Serum', '34', 2, NULL, NULL),
(2, 1, 9, 'Intensive Hydrating Serum', '28', 1, NULL, NULL),
(3, 2, 10, 'Youth Enhancing Serum', '39', 1, NULL, '2021-10-08 02:50:19'),
(4, 2, 11, 'Moisture Plumping Serum', '34', 1, NULL, '2021-10-09 06:11:55'),
(15, 7, 11, 'Moisture Plumping Serum', '34', 1, NULL, '2021-11-13 06:41:38'),
(17, 7, 9, 'Intensive Hydrating Serum', '28', 2, NULL, NULL),
(18, 8, 7, 'Pore Clearing Clay Mask', '14', 1, NULL, NULL),
(19, 8, 5, 'Nourishing Sleeping Mask', '23', 1, NULL, NULL),
(20, 8, 11, 'Moisture Plumping Serum', '34', 1, NULL, NULL),
(21, 9, 8, 'Youth-Enriched Sleeping Mask', '25', 1, NULL, NULL),
(22, 9, 10, 'Youth Enhancing Serum', '39', 2, NULL, NULL),
(23, 10, 3, 'Hydrating Sleeping Mask', '20', 1, NULL, NULL),
(24, 10, 7, 'Pore Clearing Clay Mask', '14', 1, NULL, NULL),
(25, 10, 4, 'Cica Mask', '4', 1, NULL, NULL),
(26, 10, 5, 'Nourishing Sleeping Mask', '23', 1, NULL, NULL),
(27, 11, 4, 'Cica Mask', '4', 1, NULL, NULL),
(28, 11, 6, 'Refining Gommage Mask', '15', 1, NULL, NULL),
(29, 11, 9, 'Intensive Hydrating Serum', '28', 2, NULL, NULL),
(30, 12, 9, 'Intensive Hydrating Serum', '28', 2, NULL, NULL),
(33, 13, 11, 'Moisture Plumping Serum', '34', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_origin`
--

CREATE TABLE `tbl_origin` (
  `origin_id` int(10) UNSIGNED NOT NULL,
  `origin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_origin`
--

INSERT INTO `tbl_origin` (`origin_id`, `origin_name`, `origin_desc`, `meta_keywords`, `origin_status`, `created_at`, `updated_at`) VALUES
(3, 'United States', 'US is A', 'serum, innisfree, korea, us, japan, skinscare, mask, beauty', 1, NULL, NULL),
(4, 'Korean', 'Korean is A', 'serum, innisfree, korea, us, japan, skinscare, mask, beauty', 1, NULL, NULL),
(5, 'Japan', 'Japan is B', 'serum, innisfree, korea, us, japan, skinscare, mask, beauty', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Process', NULL, NULL),
(2, '1', 'Process', NULL, NULL),
(10, '1', 'Process', NULL, NULL),
(11, '1', 'Process', NULL, NULL),
(12, '1', 'Process', NULL, NULL),
(13, '1', 'Process', NULL, NULL),
(14, '1', 'Process', NULL, NULL),
(15, '1', 'Process', NULL, NULL),
(16, '1', 'Process', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `origin_id` int(11) UNSIGNED NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sold` int(11) DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `origin_id`, `product_desc`, `product_content`, `meta_keywords`, `product_price`, `product_quantity`, `product_sold`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(3, 'Hydrating Sleeping Mask', 3, 4, '<p>Overnight mask delivers refreshing hydration from Jeju Green Tea extract while you snooze. This hydrating sleeping mask helps lock in hydration through the night &amp; dries down to a mess-free finish that&rsquo;s easy to rinse off come morning.</p>', '<p>When it comes to Korean skincare, most of the magic happens at night! Jumpstart your morning glow with this hydrating sleeping mask, infused with antioxidant-rich Jeju Green Tea extract.<br />\r\n<br />\r\n<strong>Boost your beauty sleep</strong><br />\r\nSmooth on as the last step of your evening skincare routine, let the mask dry for a few moments and get your ZZZs! Since it&rsquo;s designed to be used overnight, you won&rsquo;t find this sleeping mask all over your pillow come morning. Simply rinse off in the AM and move on to your morning skincare routine.<br />\r\n<br />\r\n<strong>Skin Type:</strong>&nbsp;Normal, Dry, Combination, and Oily<br />\r\n<strong>Skincare Concerns:</strong>&nbsp;Dryness, Dullness, and Uneven Texture<br />\r\n<br />\r\n<strong>Highlighted Ingredients:</strong><br />\r\n- Jeju Green Tea Extract: Replenishes hydration.</p>', 'serum, innisfree, korea, us, japan, skinscare, mask, beauty', '20', '47', 3, 'Hydrating sleeping mask1632833763.jpg', 1, NULL, NULL),
(4, 'Cica Mask', 3, 5, '<p>Soft sheet&nbsp;mask infused with cica to balance and visibly soothe stressed skin.</p>\r\n\r\n<ul>\r\n	<li>Infused with Centella Asiatica Extract to help soothe and strengthen the protective barrier</li>\r\n	<li>Bija Seed Oil helps balance skin&rsquo;s oil and moisture levels</li>\r\n	<li>Soft, biodegradable sheet mask</li>\r\n</ul>', '<p><strong>The Story of Cica</strong><br />\r\nCica, also known as Centella Asiatica, is an Asian herb which is believed by many cultures to possess medicinal properties. You&rsquo;ll often see Cica referred to as Tiger Grass -- and that&rsquo;s because legend has it that after battle, tigers would roll in this plant to soothe their wounds.<br />\r\n<br />\r\nIn Korea, Cica has been used for centuries to help treat scars and heal injured skin. Even today, many parents reach for ointments containing Centella Asiatica when their child has a scrape.</p>', 'serum, innisfree, korea, us, japan, skinscare, mask, beauty', '4', '37', 3, 'cica mask1632833841.png', 1, NULL, NULL),
(5, 'Nourishing Sleeping Mask', 3, 3, '<p>Overnight mask with Ginger Honey Complex&trade; helps nourish and protect skin while you sleep.</p>', '<p>This bouncy sleeping mask holds tight to skin through the night to deliver moisture and nutrients while you sleep.<br />\r\n<br />\r\nGinger Honey Complex&trade;, a precious combination of Ginger and Jeju Canola Honey,<br />\r\nhelps protect and nourish skin that&rsquo;s been weakened by external stressors and dryness.</p>', 'serum, innisfree, korea, us, japan, skinscare, mask, beauty', '23', '57', 3, 'Nourishing sleeping mask1632833919.jpg', 1, NULL, NULL),
(6, 'Refining Gommage Mask', 3, 5, '<p>A gel exfoliating mask with Jeju green barley that smooths away dead skin cells using a blend of glycolic acid, salicylic acid, and natural cellulose.</p>', '<p>A K-Beauty secret for years, gommage masks allow dead skin to simply roll off with a mix of naturally derived alpha hydroxy acids.<br />\r\n<br />\r\nThis unique mask with AHA-rich Green Barley Extract from Jeju Island is our homage to gommage. Get a gentle, dual-exfoliating effect with Glycolic and Salicylic Acids and natural cellulose to buff skin.<br />\r\n<br />\r\n<strong>Skin Type:</strong>&nbsp;Normal, Combination, and Oily<br />\r\n<strong>Skincare Concerns:</strong>&nbsp;Dullness, Uneven Texture, and Pores<br />\r\n<br />\r\n<strong>Highlighted Ingredients:</strong><br />\r\n- Green Barley Vinegar: Fermented Green Barley Extracts that help brighten and refine the appearance of the skin with three naturally exfoliating AHAs.<br />\r\n- Glycolic Acid, Salicylic Acid, and Cellulose: Exfoliates dead skin cells for a smoother appearance.</p>', 'serum, innisfree, korea, us, japan, skinscare, mask, beauty', '15', '30', 0, 'Refining gommage mask1632833987.jpg', 1, NULL, NULL),
(7, 'Pore Clearing Clay Mask', 3, 4, '<p>Creamy clay mask with the extraordinary absorbing powers of Jeju Volcanic Cluster.</p>', '<p>In just minutes, this non-drying clay mask helps draw out sebum and impurities that even toners and cleansers can&rsquo;t properly remove.<br />\r\n<br />\r\nFormulated with 3,000 mg Jeju Volcanic Cluster, or micro-particles smaller than pores to naturally absorb dirt and oil while gently exfoliating skin. The result? A brighter, shine-free complexion is revealed, with pores that visibly appear smaller.</p>', 'serum, innisfree, korea, us, japan, skinscare, mask, beauty', '14', '42', 3, 'Pore clearing clay mask1632834727.png', 1, NULL, NULL),
(8, 'Youth-Enriched Sleeping Mask', 3, 3, '<p>Early-action sleeping mask with Jeju Orchid and relaxing lavender oil helps strengthen, firm, smooth, nourish and brighten the look of skin while you sleep.</p>', '<p>Wake up to skin that feels instantly quenched with hydration and nourishment while the look of firmness, tone and brightness is improved over time. Intense overnight cream is fortified with Orchidelixir&trade;, our proprietary complex of extracted actives from every part of the Jeju Orchid, from root to petal.<br />\r\n<br />\r\nDelicate flower? Not the mighty Jeju Orchid, which rises through the snow to display its majestic purple petals during the winter. In order to bloom in the intense cold, the rare flower has great anti-oxidant powers, making it highly effective to address the multiple signs of early aging.<br />\r\n<br />\r\nFormulated Without parabens, animal products, mineral oil, imidazolidinyl urea, synthetic fragrance<br />\r\nFormulated With Orchidelixir&trade;<br />\r\nDermatologically Tested</p>', 'serum, innisfree, korea, us, japan, skinscare, mask, beauty', '27', '65', 1, 'Youth-enriched sleeping mask1632834804.jpg', 1, NULL, NULL),
(9, 'Intensive Hydrating Serum', 2, 3, '<h2>Our cult-favorite is back - now better than ever!</h2>\r\n\r\n<p>A comforting, lightweight gel serum infused with Green Tea Tri-biotics&trade;&nbsp;and Hyaluronic Acid&nbsp;to help instantly hydrate, deliver 24-hour long-lasting hydration, and improve skin&#39;s moisture barrier.</p>', '<p>Our best-selling Intensive Hydrating Serum with Green Tea Seed has gotten some majorly hydrating additions. It&rsquo;s the same lightweight, gel formula you knew and loved, but now with added Hyaluronic Acid (5 different types!) and Green Tea Tri-biotics&trade; to help support your skin&rsquo;s invisible ecosystem while providing it with more amplified hydration. We&rsquo;ve also reduced the fragrance by 70% and upped the effective ingredients and green tea derived formula by 79% compared to our previous version. That&rsquo;s a whole lot of hydration coming your way!</p>', 'serum, innisfree, korea, us, japan, skinscare, mask, beauty', '28', '54', 5, 'Intensive hydrating serum1632834926.jpg', 1, NULL, '2021-10-08 01:21:50'),
(10, 'Youth Enhancing Serum', 2, 5, '<p>A lightweight, powerhouse serum infused with antioxidant-rich Black Tea, hyaluronic acid and niacinamide that helps soothe and instantly deliver a smoother, healthier, and more glowing complexion to keep cranky skin happy.</p>', '<p>A lightweight, powerhouse serum infused with antioxidant-rich Black Tea that helps soothe and instantly deliver a smoother, healthier, and more glowing complexion to keep cranky skin happy.<br />\r\n<br />\r\n- 3-Step Moisture Capsules: hyaluronic acid + ceramide capsulized with squalane<br />\r\n- Brightening Niacinamide<br />\r\n- Moisture-sustaining glycerin gel network<br />\r\n- Hypoallergenic Tested</p>', 'serum, innisfree, korea, us, japan, skinscare, mask, beauty', '39', '19', 7, 'Youth Enhancing Serum1632834980.jpg', 1, NULL, '2021-10-08 02:48:42'),
(11, 'Moisture Plumping Serum', 2, 4, '<p>Hydrating serum infused with mineral-rich seawater from Jeju Island to hydrate and help delay visible signs of aging.</p>', '<p>Water-light serum that delivers intense hydration and helps balance oil and moisture levels. Infused with 54% Jeju Lava Seawater this serum helps visibly firm and minimize pores for skin that looks plump and nourished.<br />\r\n<br />\r\n- Lightweight serum to hydrate<br />\r\n- Helps visibly firm skin<br />\r\n- Can be refrigerated to instantly cool and refresh skin</p>', 'serum, innisfree, korea, us, japan, skinscare, mask, beauty', '34', '31', 9, 'Moisture Plumping Serum1632835018.jpg', 1, NULL, '2021-10-08 02:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_notes`, `shipping_email`, `created_at`, `updated_at`) VALUES
(1, 'Tuan Anh', '130 Mau Than, Phuong Xuan Khanh, TP. Can Tho', '0123456789', 'Giao trong tuan', 'anh@gmail.com', NULL, NULL),
(2, 'Tuan Anh', '130 Mau Than, Phuong Xuan Khanh, TP. Can Tho', '0123456789', 'Giao trong tuan', 'anh@gmail.com', NULL, NULL),
(3, 'Huynh Duc', '98 Ngo Quyen, Phuong 2, Quan Thu Duc, HCM', '0896754321', 'Giao nhanh', 'duc@gmail.com', NULL, NULL),
(4, 'Thanh Son', '146 Le Loi, Phuong 8, TP. Da Nang', '0231456789', 'Giao nhanh', 'son@gmail.com', NULL, NULL),
(5, 'Thanh Son', '146 Le Loi, Phuong 8, TP. Da Nang', '0231456789', 'Giao nhanh', 'son@gmail.com', NULL, NULL),
(6, 'Thanh Son', '146 Le Loi, Phuong 8, TP. Da Nang', '0231456789', 'Giao trong tuan', 'son@gmail.com', NULL, NULL),
(7, 'Thanh Son', '146 Le Loi, Phuong 8, TP. Da Nang', '0231456789', 'Giao nhanh', 'son@gmail.com', NULL, NULL),
(8, 'Thanh Son', '146 Le Loi, Phuong 8, TP. Da Nang', '0231456789', 'Giao nhanh', 'son@gmail.com', NULL, NULL),
(9, 'Thanh Son', '146 Le Loi, Phuong 8, TP. Da Nang', '0231456789', 'Giao nhanh', 'son@gmail.com', NULL, NULL),
(10, 'Huynh Duc', '05 Quang Trung Phuong 3, Quan Thu Duc, HCM', '0896754321', 'Giao nhanh', 'duc@gmail.com', NULL, NULL),
(11, 'Huynh Lap', '23 Nguyen Hue, P1, HCM', '0123458769', 'Giao nhanh', 'huynh@gmail.com', NULL, NULL),
(12, 'Huynh Lap', '23 Nguyen Hue, P1, HCM', '0123458769', 'Giao nhanh', 'huynh@gmail.com', NULL, NULL),
(13, 'Trần Tuấn Anh', '7A Ngô Quyền, Phường 1, Sóc Trăng, Sóc Trăng', '+84942829363', 'Giao nhanh', 'tuananhst159@gmail.com', NULL, NULL),
(14, 'Trần Tuấn Anh', '7A Ngô Quyền, Phường 1, Sóc Trăng, Sóc Trăng', '+84942829363', NULL, 'tuananhst159@gmail.com', NULL, NULL),
(15, 'Huynh Lap', '23 Nguyen Hue, P1, HCM', '0123458769', 'Giao nhanh', 'huynh@gmail.com', NULL, NULL),
(16, 'Huynh Lap', '23 Nguyen Hue, P1, HCM', '0123458769', 'Giao nhanh', 'huynh@gmail.com', NULL, NULL),
(17, 'Trần Tuấn Anh', '7A Ngô Quyền, Phường 1, Sóc Trăng, Sóc Trăng', '+84942829363', 'Giao trong tuan', 'tuananhst159@gmail.com', NULL, NULL);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`,`shipping_id`,`payment_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `shipping_id` (`shipping_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `tbl_origin`
--
ALTER TABLE `tbl_origin`
  ADD PRIMARY KEY (`origin_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`,`origin_id`),
  ADD KEY `tbl_product_ibfk_1` (`origin_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_origin`
--
ALTER TABLE `tbl_origin`
  MODIFY `origin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payment` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`shipping_id`) REFERENCES `tbl_shipping` (`shipping_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`origin_id`) REFERENCES `tbl_origin` (`origin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_product` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
