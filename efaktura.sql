-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Lis 2019, 14:31
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `efaktura`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `NIP` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode_town` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `category`, `NIP`, `name`, `firstName`, `lastName`, `street`, `town`, `postcode`, `postcode_town`, `property_number`, `phone_number`) VALUES
(1, NULL, 1, '1231231230', 'eFaktura', 'Jan', 'Kowalski', 'Owocowa', 'Kolbuszowa', '36-150', '', '7', '111 222 333'),
(2, NULL, 2, '', '', 'Jabezfirmyn', 'Kowalski', 'lipowa', 'Kolbuszowa', '36-150', '', '7', '111 222 333'),
(3, NULL, 2, '9999999990', '', 'bezfirmy ale z nip', 'NOwak', 'cik', 'BEZFIRMY SMIESZEK z NIP', '36-150', '', '7', '111 222 333'),
(4, NULL, 2, '', 'Smieszek z firma ale bez z NIP', 'imie Smieszek z firma ale bez z NIP', 'NOwak', 'cik', 'Smieszek z firma ale bez z NIP', '36-150', '', '7', '111 222 333');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIP` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode_town` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `total_price` double(8,2) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `invoices`
--

INSERT INTO `invoices` (`id`, `number`, `category`, `NIP`, `name`, `firstName`, `lastName`, `street`, `town`, `postcode`, `postcode_town`, `property_number`, `status`, `client_id`, `total_price`, `created_at`, `updated_at`) VALUES
(1, '1/06/2019', '2', '', 'Smieszek z firma ale bez z NIP', 'imie Smieszek z firma ale bez z NIP', 'NOwak', 'cik', 'Smieszek z firma ale bez z NIP', '36-150', '', '7', 'przelew', 4, NULL, '2019-06-09 08:57:53', '2019-06-09 08:57:53'),
(2, '2/06/2019', '2', '9999999990', '', 'bezfirmy ale z nip', 'NOwak', 'cik', 'BEZFIRMY SMIESZEK z NIP', '36-150', '', '7', 'przelew', 3, NULL, '2019-06-09 08:57:54', '2019-06-09 08:57:54'),
(3, '3/06/2019', '1', '1231231230', 'eFaktura', 'Jan', 'Kowalski', 'Owocowa', 'Kolbuszowa', '36-150', '', '7', 'przelew', 1, NULL, '2019-06-18 19:51:54', '2019-06-18 19:51:54');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `invoice_positions`
--

CREATE TABLE `invoice_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `product_count` double NOT NULL,
  `price` double NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `invoice_positions`
--

INSERT INTO `invoice_positions` (`id`, `invoice_id`, `product_count`, `price`, `item`) VALUES
(1, 1, 24, 200, 'Kodowanie strony'),
(2, 1, 2, 600, 'Modernizacja'),
(3, 2, 24, 200, 'Kodowanie strony'),
(4, 2, 2, 600, 'Modernizacja'),
(5, 3, 1, 200, 'Kodowanie strony');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_01_171645_create_client_table', 1),
(4, '2017_10_08_152939_create_roles_table', 1),
(5, '2017_10_08_155730_create_roles_has_users_table', 1),
(6, '2017_10_30_102549_create_invoices_table', 1),
(7, '2018_03_22_155050_create_invoice_position_table', 1),
(8, '2018_04_30_110108_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-06-09 08:57:39', '2019-06-09 08:57:39'),
(2, 'user', '2019-06-09 08:57:39', '2019-06-09 08:57:39');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles_has_users`
--

CREATE TABLE `roles_has_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `roles_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$hX3Uue5xMYwoHRvZNvFlp.39.YYZ1WC6vGoplZs1as4cXVIUNwlWK', 'admin@test.pl', '2019-06-09 08:57:39', NULL, '2019-06-09 08:57:39', '2019-06-09 08:57:39'),
(2, 'user', '$2y$10$IgpnKyl/fKKSwwfBc8e6jeJ9W/PeC5njAAEg3Amj65w/.JaIXuaYS', 'user@test.pl', '2019-06-09 08:57:39', NULL, '2019-06-09 08:57:39', '2019-06-09 08:57:39');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`);

--
-- Indeksy dla tabeli `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_client_id_foreign` (`client_id`);

--
-- Indeksy dla tabeli `invoice_positions`
--
ALTER TABLE `invoice_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_positions_invoice_id_foreign` (`invoice_id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `roles_has_users`
--
ALTER TABLE `roles_has_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_has_users_users_id_foreign` (`users_id`),
  ADD KEY `roles_has_users_roles_id_foreign` (`roles_id`);

--
-- Indeksy dla tabeli `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `invoice_positions`
--
ALTER TABLE `invoice_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `roles_has_users`
--
ALTER TABLE `roles_has_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL;

--
-- Ograniczenia dla tabeli `invoice_positions`
--
ALTER TABLE `invoice_positions`
  ADD CONSTRAINT `invoice_positions_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

--
-- Ograniczenia dla tabeli `roles_has_users`
--
ALTER TABLE `roles_has_users`
  ADD CONSTRAINT `roles_has_users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_has_users_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
