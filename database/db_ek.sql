-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Nis 2024, 19:30:25
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sosyal`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `chapters`
--

CREATE TABLE `chapters` (
  `chapter_id` int(11) NOT NULL,
  `chapter_image_id` int(11) DEFAULT NULL,
  `chapter_manga_id` int(11) DEFAULT NULL,
  `chapter_name` varchar(250) DEFAULT NULL,
  `chapter_description` varchar(250) DEFAULT NULL,
  `chapter_num` varchar(11) DEFAULT NULL,
  `chapter_link` varchar(200) DEFAULT NULL,
  `chapter_wiev` int(20) DEFAULT NULL,
  `chapter_status` varchar(50) DEFAULT NULL,
  `chapter_type` varchar(50) DEFAULT NULL,
  `chapter_upload_user_id` int(11) DEFAULT NULL,
  `chapter_upload_user_ip` varchar(50) DEFAULT NULL,
  `chapter_upload_user_agent` varchar(250) DEFAULT NULL,
  `chapter_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `chapters`
--

INSERT INTO `chapters` (`chapter_id`, `chapter_image_id`, `chapter_manga_id`, `chapter_name`, `chapter_description`, `chapter_num`, `chapter_link`, `chapter_wiev`, `chapter_status`, `chapter_type`, `chapter_upload_user_id`, `chapter_upload_user_ip`, `chapter_upload_user_agent`, `chapter_time`) VALUES
(5, NULL, 4, 'Metal Işık', '', '1', 'https://localhost/manga/4-isgalden-sonra/chapter-1', NULL, 'publish', NULL, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-12 17:25:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `chapter_tax`
--

CREATE TABLE `chapter_tax` (
  `ct_id` int(11) NOT NULL,
  `ct_manga_id` int(11) DEFAULT NULL,
  `ct_chapter_num` int(11) DEFAULT NULL,
  `ct_chapter_id` int(11) DEFAULT NULL,
  `ct_order` int(11) DEFAULT NULL,
  `ct_content` text DEFAULT NULL,
  `ct_link` varchar(250) DEFAULT NULL,
  `ct_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `chapter_tax`
--

INSERT INTO `chapter_tax` (`ct_id`, `ct_manga_id`, `ct_chapter_num`, `ct_chapter_id`, `ct_order`, `ct_content`, `ct_link`, `ct_time`) VALUES
(28, 4, 1, 5, 40, NULL, 'https://localhost/manga/4/1/ss41.jpg', '2024-04-12 17:25:07'),
(29, 4, 1, 5, 41, NULL, 'https://localhost/manga/4/1/ss42.jpg', '2024-04-12 17:25:07'),
(30, 4, 1, 5, 42, NULL, 'https://localhost/manga/4/1/ss43.jpg', '2024-04-12 17:25:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mangas`
--

CREATE TABLE `mangas` (
  `manga_id` int(11) NOT NULL,
  `manga_image_id` int(11) DEFAULT NULL,
  `manga_name` varchar(500) DEFAULT NULL,
  `manga_description` varchar(1000) DEFAULT NULL,
  `manga_other_name` varchar(500) DEFAULT NULL,
  `manga_category_id` int(11) DEFAULT NULL,
  `manga_author` varchar(250) DEFAULT NULL,
  `manga_artist` varchar(250) DEFAULT NULL,
  `manga_content` text DEFAULT NULL,
  `manga_year` varchar(20) DEFAULT NULL,
  `manga_country` varchar(50) DEFAULT NULL,
  `manga_upload_user_id` int(20) DEFAULT NULL,
  `manga_type` varchar(20) DEFAULT NULL,
  `manga_status` varchar(50) DEFAULT NULL,
  `manga_fansub` varchar(50) DEFAULT NULL,
  `manga_fansub_link` varchar(250) DEFAULT NULL,
  `manga_publish_status` varchar(20) DEFAULT NULL,
  `manga_translate_status` varchar(20) DEFAULT NULL,
  `manga_upload_user_ip` varchar(20) DEFAULT NULL,
  `manga_upload_user_agent` varchar(250) DEFAULT NULL,
  `manga_adult_warning` varchar(20) DEFAULT NULL,
  `manga_link` varchar(250) DEFAULT NULL,
  `manga_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mangas`
--

INSERT INTO `mangas` (`manga_id`, `manga_image_id`, `manga_name`, `manga_description`, `manga_other_name`, `manga_category_id`, `manga_author`, `manga_artist`, `manga_content`, `manga_year`, `manga_country`, `manga_upload_user_id`, `manga_type`, `manga_status`, `manga_fansub`, `manga_fansub_link`, `manga_publish_status`, `manga_translate_status`, `manga_upload_user_ip`, `manga_upload_user_agent`, `manga_adult_warning`, `manga_link`, `manga_time`) VALUES
(4, 10, 'İşgalden Sonra', 'Uydurma Eserimiz', 'After the Occupation', 3, 'Sosyal', 'Uydurma', '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.</p>', '2024', 'Türkiye', 1, 'manga', 'publish', '', '', 'draft', 'completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'no', 'https://localhost/manga/4-isgalden-sonra', '2024-04-12 17:24:48');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Tablo için indeksler `chapter_tax`
--
ALTER TABLE `chapter_tax`
  ADD PRIMARY KEY (`ct_id`);

--
-- Tablo için indeksler `mangas`
--
ALTER TABLE `mangas`
  ADD PRIMARY KEY (`manga_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `chapters`
--
ALTER TABLE `chapters`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `chapter_tax`
--
ALTER TABLE `chapter_tax`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `mangas`
--
ALTER TABLE `mangas`
  MODIFY `manga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
