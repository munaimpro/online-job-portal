-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 09:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_pulse`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_employees_infos`
--

CREATE TABLE `company_employees_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `company_role` int(11) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `joining_date` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_employees_infos`
--

INSERT INTO `company_employees_infos` (`id`, `user_id`, `company_id`, `company_role`, `gender`, `contact`, `address`, `photo`, `joining_date`, `created_at`, `updated_at`) VALUES
(7, 23, 7, 2, 'Male', '01723456789', 'Sunlit Kindergarten/Rinku master basa, Jhanak Society, 37 no. Word, Munir Nagar, Bandar, Chattogram, Bangladesh', NULL, '2024-03-23', '2024-03-16 00:10:37', '2024-03-16 00:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `company_infos`
--

CREATE TABLE `company_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_contact` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_infos`
--

INSERT INTO `company_infos` (`id`, `user_id`, `company_name`, `company_email`, `company_contact`, `company_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'P Cube Digital', 'pcubedigital@gmail.com', '+88017000', 'Rajshahi', '2024-03-04 17:57:34', '2024-03-15 23:47:46'),
(7, 3, 'Rolax IT', 'rolaxit@gmail.com', '01845667890', 'Bichakandi, Chittagong, Bangladesh', '2024-03-15 23:46:51', '2024-03-16 05:55:48');

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
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `user_id`, `company_id`, `job_id`, `first_name`, `last_name`, `address`, `gender`, `dob`, `image`, `signature`, `cv`, `status`, `created_at`, `updated_at`) VALUES
(20, 1, 1, '1', 'Md.', 'Khan', 'Sunlit Kindergarten/Rinku master basa, Jhanak Society, 37 no. Word, Munir Nagar, Bandar, Chattogram, Bangladesh', 'male', '2024-03-13', '12_w3schools.PNG', '18_theordinproject.PNG', '113_mdn.PNG', 2, '2024-03-13 05:32:56', '2024-03-15 18:31:46'),
(22, 22, 7, '7', 'Munaim', 'Khan', 'Pathanpara, Bayezid, Chattogram', 'male', '1999-06-15', '22munaim khan.jpg', '2244726.png', '22Munaim_Resume.pdf', 2, '2024-03-15 23:30:39', '2024-03-16 00:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(3, 'Web Development', '2024-03-04 17:56:23', '2024-03-15 23:39:38'),
(4, 'Content Writing', '2024-03-04 17:56:23', '2024-03-15 23:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `job_circulars`
--

CREATE TABLE `job_circulars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `job_category_id` bigint(20) UNSIGNED NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `application_deadline` date NOT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `vacancy_count` int(11) NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `minimum_salary` decimal(10,2) NOT NULL,
  `published_date` date NOT NULL,
  `education` text NOT NULL,
  `experience` text NOT NULL,
  `requirements` text NOT NULL,
  `responsibilities` text NOT NULL,
  `benefits` text NOT NULL,
  `employment_status` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_circulars`
--

INSERT INTO `job_circulars` (`id`, `company_id`, `job_category_id`, `organization_name`, `designation`, `application_deadline`, `company_logo`, `vacancy_count`, `job_location`, `minimum_salary`, `published_date`, `education`, `experience`, `requirements`, `responsibilities`, `benefits`, `employment_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'P Cube Digital', 'Full Stack Developer', '2024-03-20', 'company_logo1710503585.png', 10, 'Dhaka', 25000.00, '2024-03-04', 'Bachelor of Science (BSc)', '3 to 7 years', 'Education\r\nBachelor of Science (BSc)\r\nExperience\r\n3 to 7 years\r\nThe applicants should have experience in the following business area(s):\r\nIT Enabled Service', 'Collaborate with cross-functional teams to design, develop, and deploy high-quality software solutions.\r\nDevelop and maintain both frontend and backend components of web applications.\r\nWrite clean, maintainable, and efficient frontend code in HTML, CSS, JavaScript, and Python.', 'Work from home, Work at office', 'Full Time', 0, '2024-03-04 17:59:34', '2024-03-15 19:28:59'),
(4, 1, 3, 'Demo organization', 'Laravel Developer', '2024-03-23', 'company_logo1710503585.png', 3, 'Narayanganj', 34999.00, '2024-03-22', 'B.Sc in Computer Science and Information Technology', 'Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor', 'Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor', 'Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor', 'Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor', 'Full Time', 0, '2024-03-15 05:53:05', '2024-03-15 05:53:05'),
(7, 7, 4, 'Rolax IT', 'Content Writer', '2024-03-30', 'company_logo1710568830.PNG', 3, 'Bichakandi, Chittagong, Bangladesh', 12000.00, '2024-03-18', 'Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor', 'Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor', 'Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor', 'Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor', 'Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor', 'Full Time', 0, '2024-03-16 00:00:30', '2024-03-16 00:00:30');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_28_024437_create_job_categories_table', 1),
(6, '2024_02_28_032204_create_company_infos_table', 1),
(7, '2024_02_28_033741_create_job_circulars_table', 1),
(8, '2024_02_28_174042_create_company_employees_infos_table', 1),
(9, '2024_03_04_171703_create_job_applications_table', 1),
(10, '2024_03_08_060808_create_site_informations_table', 2),
(11, '2024_03_08_061138_create_site_menus_table', 2),
(12, '2024_03_14_111125_create_plugins_table', 3);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plugin` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `plugin`, `status`, `created_at`, `updated_at`) VALUES
(1, 'employee', 0, '2024-03-14 11:22:34', '2024-03-16 00:11:34'),
(2, 'blogs', 0, '2024-03-14 11:22:34', '2024-03-15 23:44:31'),
(3, 'pages', 0, '2024-03-14 11:22:34', '2024-03-15 23:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `site_informations`
--

CREATE TABLE `site_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_informations`
--

INSERT INTO `site_informations` (`id`, `title`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Job Pulse', 'assets/img/settings/65f4941827032_1710527512.png', '2024-03-07 15:48:17', '2024-03-15 12:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `site_menus`
--

CREATE TABLE `site_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `navigation_menu_name` varchar(255) NOT NULL,
  `navigation_menu_link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_menus`
--

INSERT INTO `site_menus` (`id`, `navigation_menu_name`, `navigation_menu_link`, `created_at`, `updated_at`) VALUES
(2, 'home', '/home', '2024-03-08 02:51:12', '2024-03-15 23:43:17'),
(3, 'about', '/about', '2024-03-08 02:51:12', '2024-03-11 00:16:23'),
(5, 'jobs', '/jobs', '2024-03-07 22:55:55', '2024-03-15 17:35:00'),
(6, 'contact', '/contact', '2024-03-11 00:17:31', '2024-03-11 00:17:31'),
(9, 'service', '/service', '2024-03-15 23:43:41', '2024-03-15 23:43:41');

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
  `role` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'User-Rahim', 'user@gmail.com', NULL, '$2y$12$rmYO6.Yy3lvxInZl/164XOfdkx8qPaCMDtfLv/coTjP2xw3D.sXRu', NULL, 0, '2024-03-04 11:54:22', '2024-03-05 07:11:23'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$12$FmQVpkaCsGCNVrzLUFtF4eB.rxjGVbwyqjs4OJpPdlkTv.j5Pt9QS', NULL, 1, '2024-03-04 14:41:34', '2024-03-16 05:35:37'),
(3, 'Company', 'company@gmail.com', NULL, '$2y$12$JvjJjo05lKP.urcHwfcwZOeblzMJGRODcxi3.qFKBPenkVHUK/c3y', NULL, 2, '2024-03-04 14:41:34', '2024-03-16 05:35:54'),
(21, 'Fayaz Ahmed', 'fayaz@gmail.com', NULL, '$2y$12$dk8H.dxOuYcIvly2mvxJ2eDxiIqK672afyXC8QR.Y5U975pkGl3Gm', NULL, 0, '2024-03-15 18:24:25', '2024-03-15 18:24:25'),
(22, 'Md. Munaim Khan', 'munaim@gmail.com', NULL, '$2y$12$eS.9blaof89gqSGC4gK.VeUwaq6m6oEI0qrXuJzwxrk3c.gDHzAvK', NULL, 0, '2024-03-15 23:26:00', '2024-03-15 23:34:36'),
(23, 'Rashel Chowdhury', 'rashel@gmail.com', NULL, '$2y$12$H7SYOhcLKQotB3pvJmhraOi5Isr/kFIoQJNgA/kwuLzJBXz7o8lOK', NULL, 0, '2024-03-16 00:10:37', '2024-03-16 00:10:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_employees_infos`
--
ALTER TABLE `company_employees_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_employees_infos_user_id_foreign` (`user_id`),
  ADD KEY `company_employees_infos_company_id_foreign` (`company_id`);

--
-- Indexes for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_circulars`
--
ALTER TABLE `job_circulars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_circulars_company_id_foreign` (`company_id`),
  ADD KEY `job_circulars_job_category_id_foreign` (`job_category_id`);

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
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_informations`
--
ALTER TABLE `site_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_menus`
--
ALTER TABLE `site_menus`
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
-- AUTO_INCREMENT for table `company_employees_infos`
--
ALTER TABLE `company_employees_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_circulars`
--
ALTER TABLE `job_circulars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_informations`
--
ALTER TABLE `site_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_menus`
--
ALTER TABLE `site_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_employees_infos`
--
ALTER TABLE `company_employees_infos`
  ADD CONSTRAINT `company_employees_infos_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company_infos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `company_employees_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_circulars`
--
ALTER TABLE `job_circulars`
  ADD CONSTRAINT `job_circulars_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company_infos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `job_circulars_job_category_id_foreign` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
