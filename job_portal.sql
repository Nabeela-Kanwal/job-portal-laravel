-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 02:42 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'web Developer', 1, NULL, NULL),
(2, 'Full Stack Developer', 1, NULL, NULL),
(3, 'App Developer', 1, NULL, NULL),
(4, 'Graphic Designer', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `job_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vacancy` int(11) NOT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `benefits` text COLLATE utf8mb4_unicode_ci,
  `responsibility` text COLLATE utf8mb4_unicode_ci,
  `qualifications` text COLLATE utf8mb4_unicode_ci,
  `keyword` text COLLATE utf8mb4_unicode_ci,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `isFeatured` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `category_id`, `job_type_id`, `user_id`, `vacancy`, `salary`, `location`, `description`, `benefits`, `responsibility`, `qualifications`, `keyword`, `experience`, `company_name`, `company_location`, `company_website`, `status`, `isFeatured`, `created_at`, `updated_at`) VALUES
(2, 'Beatae aperiam perfe', 2, 2, 1, 49, '120k', 'Lahore', 'Suscipit velit quas', NULL, 'Dolore quaerat excep', NULL, 'php', '2', 'Daniels and Chang Associates', 'Savage and Hebert Co', 'Garrison Forbes Co', 1, 1, '2024-08-23 22:40:28', '2024-08-23 23:10:26'),
(29, 'larvel', 1, 2, 1, 4, '150k', 'lahore', 'ssssssssssssf', 'aaaaaaaaaaa', NULL, 'ddddddddd', 'php, laravel', '5', 'xyz', 'lahore', 'www.xyz.com', 1, 0, '2024-08-30 02:22:54', '2024-08-30 02:22:54'),
(3, 'Lea Steuber', 1, 1, 2, 3, NULL, 'McLaughlinview', 'Temporibus quaerat iste sapiente libero facilis aliquam. Commodi accusamus enim inventore rerum cum. Soluta voluptate quasi ut iusto et velit praesentium. Commodi eaque hic est.', NULL, NULL, NULL, 'php', '2', 'Gina Denesik', '187 Van Terrace Suite 089\nRosannaland, AZ 42140-6583', 'https://mcglynn.net/omnis-voluptatem-cumque-quaerat-ut-voluptatem-molestias.html', 1, 1, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(4, 'Ms. Cassandre Zieme II', 2, 2, 3, 3, NULL, 'New Amaya', 'Qui error placeat qui nihil eum. Laudantium dolorem minima autem. Perferendis dolor magni ex et. Quo sequi placeat consequuntur exercitationem.', NULL, NULL, NULL, NULL, '4', 'Lucio Mante', '8834 Jaeden Road\nHellerside, NC 63219', 'http://www.ernser.com/velit-velit-vel-debitis', 1, 1, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(5, 'Henri Parker', 2, 1, 1, 4, NULL, 'O\'Connellland', 'Iste voluptate id esse laborum. Quis ut optio voluptas impedit est et necessitatibus. Possimus omnis temporibus sed ea facere nostrum.', NULL, NULL, NULL, NULL, '4', 'Ms. Dannie Beatty DDS', '4479 Easter Pines Suite 098\nNorth Tavaresshire, NC 42458-8842', 'http://www.douglas.org/officiis-ut-eius-natus-vel-et.html', 1, 1, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(6, 'Prof. Pascale Hegmann V', 3, 1, 2, 2, NULL, 'West Katlynhaven', 'Excepturi laudantium eius et maxime. Eos officiis nesciunt doloremque officia odit ea error. Inventore non eum qui rerum omnis.', NULL, NULL, NULL, NULL, '4', 'Lindsay Pfannerstill', '798 Hane Groves\nNew Ottiliemouth, HI 75936-3102', 'http://morissette.info/incidunt-eos-voluptatem-sit-aliquid-occaecati-possimus', 1, 1, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(7, 'Candida Schuster', 3, 3, 1, 5, NULL, 'New Princess', 'Quia illum animi at culpa. Laudantium reprehenderit sequi iste possimus velit consequatur sint. Ad provident accusantium commodi sapiente sit quidem exercitationem. Nisi voluptate ipsum a eaque.', NULL, NULL, NULL, 'php', '10', 'Celine Rosenbaum', '63182 Marlon Shore Suite 653\nRamonton, AK 90346-5116', 'http://hettinger.com/reiciendis-qui-vero-impedit-dolor.html', 1, 1, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(8, 'Mr. Kenyon Wunsch', 2, 4, 2, 1, NULL, 'Effertzburgh', 'Illum perspiciatis debitis quia quis adipisci. Quasi itaque voluptatem soluta incidunt aspernatur atque. Quas a quis inventore nostrum. Maxime quae et labore vero quis placeat molestiae.', NULL, NULL, NULL, NULL, '6', 'Dr. Jamey Gerhold V', '8247 Arvilla Gardens Apt. 278\nKristyton, NC 27009', 'http://rippin.net/minima-nisi-laboriosam-veritatis-maxime-qui.html', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(9, 'Melvin Harvey', 3, 3, 2, 3, NULL, 'Yasmineburgh', 'Ea natus iste corporis rem minima ad. Minima ex provident rerum molestias. Quia veritatis eius architecto corporis architecto quisquam. Tempore est minima suscipit vel qui.', NULL, NULL, NULL, NULL, '4', 'Presley Carroll', '741 Henriette Ford Apt. 866\nZacherymouth, MO 78497', 'http://thiel.org/numquam-consectetur-commodi-neque-animi-soluta-perspiciatis-sequi-ullam.html', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(10, 'Mrs. Ursula Grant', 2, 2, 2, 2, NULL, 'Altachester', 'Pariatur tenetur id molestias et illum. Cumque facere quisquam perferendis est repudiandae officiis. Natus expedita magnam ratione labore delectus magni. Vero ullam repellat dicta occaecati.', NULL, NULL, NULL, NULL, '3', 'Prof. Rhiannon DuBuque', '27077 Casey Wall\nLake Kristian, MI 20222', 'http://www.kulas.org/', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(11, 'Hulda Schmidt', 4, 2, 3, 5, NULL, 'East Easterburgh', 'Iusto officiis facilis ipsam ut non qui quis ad. Eum explicabo recusandae ea ea ullam. Qui eum perspiciatis autem animi omnis consequatur. Mollitia est id animi in pariatur.', NULL, NULL, NULL, NULL, '8', 'Armand Halvorson', '776 Anna Flats Apt. 701\nWest Gertrudemouth, AL 20664', 'http://bernier.org/qui-adipisci-quis-totam-voluptatem', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(12, 'Vida Krajcik', 1, 1, 1, 5, NULL, 'West Leannport', 'Aut sit eum quo dicta animi sit et. Quod autem quam dignissimos accusamus. Aut officiis mollitia commodi. Cum exercitationem quia soluta aliquam libero nihil et.', NULL, NULL, NULL, NULL, '5', 'Reva Cruickshank', '8958 Teresa Pine Apt. 728\nWest Fleta, MN 67652', 'https://dickens.com/aut-veritatis-sunt-impedit-sapiente.html', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(13, 'Cordell Murray', 4, 4, 1, 3, NULL, 'Port Tracey', 'Qui laborum qui quis dolorem. Vel eos odit alias molestiae voluptas quisquam odio. Consequatur animi autem veniam consectetur. Rerum incidunt deserunt necessitatibus incidunt voluptatem et sapiente.', NULL, NULL, NULL, NULL, '5', 'Norberto Bruen III', '887 Felipe Shoals Suite 530\nLake Rory, PA 41343', 'http://www.barrows.com/', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(14, 'Prof. Junior Barrows MD', 4, 1, 2, 1, NULL, 'North Jayme', 'Iure sit est enim enim voluptatem. Voluptatibus vitae et omnis et et a. Dolor aut explicabo rerum mollitia est blanditiis. Quae similique accusantium saepe dolor.', NULL, NULL, NULL, NULL, '2', 'Prof. Janick Bogan', '23828 Hartmann Pines Suite 314\nWelchberg, NM 61172-7426', 'http://stehr.com/ipsam-quae-ut-totam-et-excepturi', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(15, 'Mr. Kaley Pollich', 2, 1, 2, 2, NULL, 'Walkerfurt', 'Ut quis dolor quod magnam dolores et. Qui corrupti ut laborum fuga inventore eos. Nisi non modi consectetur.', NULL, NULL, NULL, NULL, '3', 'Elody Steuber', '8794 Darren Mills Suite 454\nAbagailbury, MA 24097', 'http://boyle.com/ut-atque-neque-sit-dolorum-accusamus-odio-velit', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(16, 'Ervin Dooley', 4, 4, 1, 3, NULL, 'Benjaminbury', 'Animi et ad cupiditate deleniti a in et magnam. Quasi consequatur officiis quam doloribus quis modi voluptatibus.', NULL, NULL, NULL, NULL, '2', 'Tessie Renner', '43499 Bahringer Locks Suite 455\nSouth Demario, TN 00781-8414', 'http://mcdermott.org/', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(17, 'Nella Orn', 3, 4, 1, 1, NULL, 'West Vida', 'Odio dolorem iure expedita et magnam itaque et. Excepturi eum at eum reprehenderit non quas. Eligendi facere qui est. Libero cupiditate sint id autem ullam sequi delectus.', NULL, NULL, NULL, NULL, '2', 'Mrs. Raphaelle Rosenbaum III', '30304 Wunsch Divide\nLake Danamouth, ID 16354-4834', 'https://lueilwitz.org/ex-saepe-soluta-odit-architecto-esse.html', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(18, 'Ms. Maritza Schmidt IV', 4, 3, 2, 4, NULL, 'Joycemouth', 'Amet dolorem et at dolor. Est corporis harum ea et saepe. Accusamus in quaerat consequatur et dolor. Velit iure quod sed a consequuntur voluptatem.', NULL, NULL, NULL, NULL, '3', 'Blaze Gusikowski', '673 Gisselle Mills\nWhiteview, MT 54497', 'http://green.org/', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(19, 'Ms. Layla Sawayn MD', 4, 1, 3, 2, NULL, 'Connellyberg', 'Fugiat omnis nostrum error debitis. Neque optio et atque qui. Temporibus eaque rerum iste non dicta. Qui ut quod quisquam blanditiis aut.', NULL, NULL, NULL, NULL, '6', 'Dr. Elizabeth Kreiger', '7015 Schamberger Tunnel\nPresleymouth, NC 46231-7753', 'https://www.jakubowski.com/soluta-magni-delectus-nihil-reiciendis-qui', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(20, 'Prof. Nathaniel Schroeder', 2, 3, 1, 4, NULL, 'Jessicaport', 'Labore maxime earum ut ea dolores ut animi. Quaerat quia qui qui quia dolorem aut. Omnis similique recusandae occaecati cum tempora id.', NULL, NULL, NULL, NULL, '5', 'Icie Monahan', '2786 Rasheed Courts Suite 585\nWest Kathlynview, NE 95178-5447', 'http://dare.biz/praesentium-incidunt-earum-aspernatur-recusandae-enim-et', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(21, 'Mr. Lorenza Mraz', 3, 3, 1, 5, NULL, 'Stanleyton', 'Soluta cumque voluptatum deleniti error beatae. Cupiditate a laudantium quo autem doloribus aliquid nisi. Accusantium laboriosam eum velit.', NULL, NULL, NULL, NULL, '4', 'Prof. Eryn Pouros', '332 Halvorson Valleys\nNorth Opal, OR 64209-6363', 'https://corwin.com/libero-omnis-magni-ut-ea-reiciendis.html', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(22, 'Chelsey Kozey', 4, 4, 3, 1, NULL, 'South Marquismouth', 'Quo magnam hic sit deserunt similique exercitationem error. Laboriosam fugiat aut reprehenderit dolorem eos. Voluptas exercitationem cum illo et est consequuntur et.', NULL, NULL, NULL, NULL, '5', 'Wallace Robel', '4368 Walker Oval\nSouth Kelliton, ID 51248', 'http://emmerich.com/aut-facilis-quisquam-omnis-repellat-quis.html', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(23, 'Elinore Harris', 3, 2, 3, 1, NULL, 'North Anderson', 'Autem non velit est libero ratione. Rerum sint quasi iste quia aut. Culpa ut consequatur fugiat odit. Ex quisquam enim optio quisquam ex necessitatibus itaque.', NULL, NULL, NULL, NULL, '9', 'Jada O\'Kon', '43271 Ricky Gateway\nKutchmouth, WA 42788', 'https://larkin.com/beatae-aut-rem-consequatur.html', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(24, 'Mr. Emerson Feest DVM', 4, 2, 1, 4, NULL, 'Dareborough', 'Itaque labore expedita commodi ut dolorem eum qui sunt. Ullam vitae omnis odio. Quia in voluptas qui nisi labore harum. Dolor quo aut neque voluptas ab at.', NULL, NULL, NULL, NULL, '6', 'Nickolas Hessel', '863 Helga Loop\nNorth Rosalyn, NJ 92861', 'http://www.dicki.com/ipsa-quae-vel-sed.html', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(25, 'Willa Zulauf DVM', 4, 1, 2, 1, NULL, 'New Nelda', 'Totam consequatur pariatur id sed. Reprehenderit architecto sequi fugiat sed. Perferendis atque voluptas ratione at consequatur inventore.', NULL, NULL, NULL, NULL, '9', 'Jerrell O\'Kon III', '758 Ritchie Freeway\nNorth Vanessa, WY 21485', 'http://www.witting.com/dolor-quia-voluptatem-voluptatem-doloremque-quod-commodi-et-voluptatem', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(26, 'Myrtie McDermott', 3, 4, 1, 4, NULL, 'New Lesley', 'Qui quidem dolorem nam adipisci adipisci corporis pariatur odit. Autem unde fugit recusandae enim atque. Odit ipsam veniam magni error. Et omnis enim nemo nemo ea.', NULL, NULL, NULL, NULL, '4', 'Caroline Schiller', '61579 O\'Keefe Station\nPort Darian, VT 61947', 'http://www.collins.com/dolorem-error-quasi-ex-ipsa-qui-aut-sunt', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(27, 'Abigayle Lind', 1, 2, 1, 5, NULL, 'Lake Heloise', 'Accusamus ut excepturi et natus. Sint cum et est eaque libero. Atque ab quod incidunt illo enim.', NULL, NULL, NULL, NULL, '7', 'Curt Weissnat', '9822 Juanita Club\nNorth Loraineland, PA 61746', 'https://www.paucek.net/nihil-occaecati-ab-voluptatem-et-consequatur-expedita-autem', 1, 0, '2024-08-23 23:14:05', '2024-08-23 23:14:05'),
(28, 'php', 1, 1, 1, 2, 'Velit dolore consec', 'khan bela', 'Dolor amet ipsam vo', 'Officia vel quo nesc', 'Accusantium doloribu', 'Perferendis autem eu', 'php', '10_plus', 'Robles and Moses Trading', 'Lawson and Gilmore Trading', 'Willis Hewitt Co', 1, 0, '2024-08-23 23:34:44', '2024-08-23 23:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Remote', 1, NULL, NULL),
(2, 'Full Time', 1, NULL, NULL),
(3, 'Part Time', 1, NULL, NULL),
(4, 'Contract', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(29, '2019_08_19_000000_create_failed_jobs_table', 1),
(30, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(31, '2024_06_07_051948_create_categories_table', 1),
(32, '2024_06_08_040145_create_jobs_table', 1),
(33, '2024_06_08_041912_create_job_types_table', 1),
(34, '2024_07_25_082802_alter_jobs_table', 1),
(35, '2024_08_01_042627_alter_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `confirm_password`, `image`, `designation`, `mobile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nabeela', 'nabeela@gmail.com', NULL, '$2y$12$QjMxE37GU95NCdPNWfzKR.X7ogCVXLx5S8I5/HDFJdBlHRH5GPPD6', '123456', '1-1723616117.jpeg', 'Full Stack Developer', '0946366638', NULL, '2024-08-14 01:14:12', '2024-08-14 01:15:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  ADD KEY `jobs_category_id_foreign` (`category_id`),
  ADD KEY `jobs_job_type_id_foreign` (`job_type_id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
