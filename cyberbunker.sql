-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 01:24 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyberbunker`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `blogposts`
--

CREATE TABLE `blogposts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `author` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogposts`
--

INSERT INTO `blogposts` (`id`, `title`, `content`, `created_at`, `author`, `image_url`) VALUES
(1, 'xss_test', '<img src/onerror=prompt(8)>', '2024-01-08 22:49:12', 'AyoXeN', '..\\posts\\images\\test.png'),
(4, 'xss_test', '<img src/onerror=prompt(8)>', '2024-01-08 22:49:12', 'AyoXeN', '..\\posts\\images\\test.png'),
(5, 'xss_test', '<img src/onerror=prompt(8)>', '2024-01-08 22:49:12', 'AyoXeN', '..\\posts\\images\\test.png'),
(6, 'xss_test', '<img src/onerror=prompt(8)>', '2024-01-08 22:49:12', 'AyoXeN', '..\\posts\\images\\test.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment_text` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT curtime(),
  `users_id` int(11) DEFAULT NULL,
  `blogposts_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `email`, `creation_date`) VALUES
(1, 'AyoXeN', '$2y$12$4IQ0un4MZ.byt0pBSbbRO.Upc9cGdQf5TbEa.vqNozMTk6iSbgf7G', 'ayoxen93@gmail.com', '2024-01-03 01:20:12'),
(10, 'test', '$2y$12$1rz4ElDPvu3WZkxa3eKgxOV4wzv5RWhfwTgZQ.G0A/r/GiyFqXJZi', 'test@test.com', '2024-01-03 01:53:23');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `blogposts`
--
ALTER TABLE `blogposts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `blogposts_id` (`blogposts_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogposts`
--
ALTER TABLE `blogposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`blogposts_id`) REFERENCES `blogposts` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
