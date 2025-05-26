-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 12 May 2025, 21:20:52
-- Sunucu sürümü: 10.5.26-MariaDB
-- PHP Sürümü: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mazibasi_veri67`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `students`
--

INSERT INTO `students` (`id`, `name`, `surname`) VALUES
(22, 'demo', 'demo');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `study_records`
--

CREATE TABLE `study_records` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `study_time` time NOT NULL,
  `solved_questions` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `study_records`
--

INSERT INTO `study_records` (`id`, `student_id`, `study_time`, `solved_questions`, `date`) VALUES
(1, 1, '03:34:00', 333, '2025-05-03'),
(2, 2, '23:33:00', 34, '2025-05-03'),
(3, 3, '22:23:00', 3334, '2025-05-03'),
(4, 3, '03:03:00', 33, '2025-05-03'),
(5, 7, '12:21:00', 2133, '2025-05-02'),
(6, 6, '03:31:00', 331, '2025-05-03'),
(7, 8, '03:33:00', 11145, '2025-05-03'),
(8, 7, '23:56:00', 324566644, '2025-05-03'),
(9, 9, '12:32:00', 2, '2025-05-03'),
(10, 9, '22:02:00', 2, '2025-05-03'),
(11, 9, '22:02:00', 2, '2025-05-03'),
(12, 9, '02:02:00', 2, '2025-05-03'),
(13, 9, '23:02:00', 32, '2025-05-03'),
(33, 19, '07:33:00', 2223, '2025-05-11'),
(32, 18, '11:23:00', 234, '2025-05-11');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `study_records`
--
ALTER TABLE `study_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `study_records`
--
ALTER TABLE `study_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
