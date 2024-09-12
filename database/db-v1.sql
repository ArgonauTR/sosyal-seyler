-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Eyl 2024, 21:09:18
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

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
-- Tablo için tablo yapısı `ads`
--

CREATE TABLE `ads` (
  `ads_id` int(11) NOT NULL,
  `ad_name` varchar(250) DEFAULT NULL,
  `ad_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ads`
--

INSERT INTO `ads` (`ads_id`, `ad_name`, `ad_value`) VALUES
(1, 'ad_head', '<a href=\"#\">\r\n    <img class=\"img-fluid mb-4\" src=\"https://sosyalseyler.com/upload/images/reklam-1726075053.jpeg\" />\r\n</a>'),
(2, 'ad_post_page', '<a href=\"#\">\r\n    <img class=\"img-fluid mb-4\" src=\"https://sosyalseyler.com/upload/images/reklam-1726075053.jpeg\" />\r\n</a>'),
(3, 'ad_footer', '<a href=\"#\">\r\n    <img class=\"img-fluid mb-4\" src=\"https://sosyalseyler.com/upload/images/reklam-1726075053.jpeg\" />\r\n</a>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(250) DEFAULT NULL,
  `category_title_sef` varchar(250) DEFAULT NULL,
  `category_icon` varchar(250) DEFAULT NULL,
  `category_link` varchar(250) DEFAULT NULL,
  `category_description` text DEFAULT NULL,
  `category_fav` varchar(50) DEFAULT NULL,
  `category_create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_title_sef`, `category_icon`, `category_link`, `category_description`, `category_fav`, `category_create_time`) VALUES
(1, 'Genel', 'genel', 'box', 'https://localhost/categories/genel', 'genel kategori', 'on', '2024-09-12 21:21:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text DEFAULT NULL,
  `comment_status` varchar(50) DEFAULT NULL,
  `comment_author_id` int(11) DEFAULT NULL,
  `comment_post_id` int(11) DEFAULT NULL,
  `comment_parent_id` int(11) DEFAULT NULL,
  `comment_create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(250) DEFAULT NULL,
  `contact_mail` varchar(250) DEFAULT NULL,
  `contact_title` varchar(250) DEFAULT NULL,
  `contact_content` varchar(2000) DEFAULT NULL,
  `contact_status` varchar(50) DEFAULT NULL,
  `contact_type` varchar(50) DEFAULT NULL,
  `contact_create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_title` varchar(250) DEFAULT NULL,
  `image_name` varchar(250) DEFAULT NULL,
  `image_link` varchar(250) DEFAULT NULL,
  `image_width` int(5) DEFAULT NULL,
  `image_height` int(5) DEFAULT NULL,
  `image_type` varchar(20) DEFAULT NULL,
  `image_create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `option_name` varchar(250) DEFAULT NULL,
  `option_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `options`
--

INSERT INTO `options` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'option_site_title', 'Sosyal Şeyler'),
(2, 'option_site_description', 'Anime, Film Dizi gibi pek çok alandan pek çok içerik'),
(3, 'option_favicon_link', 'https://sosyalseyler.com/upload/images/site-icon-1725704396.png'),
(4, 'option_light_logo_link', 'https://sosyalseyler.com/upload/images/light-logo-1725709327.png'),
(5, 'option_dark_logo_link', 'https://sosyalseyler.com/upload/images/dark-logo-1725709322.png'),
(6, 'option_footer_text', 'Tüm Hakları Saklıdır || Copyright 2024 || www.sosyalseyler.com'),
(8, 'option_default_theme', 'dark'),
(9, 'option_analitics_code', ''),
(10, 'option_search_console_theme', ''),
(11, 'option_adsense_code', ''),
(12, 'option_fixed_top', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_num` int(11) DEFAULT NULL,
  `order_icon` varchar(100) DEFAULT NULL,
  `order_name` varchar(100) DEFAULT NULL,
  `order_value` varchar(500) DEFAULT NULL,
  `order_tab` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`order_id`, `order_num`, `order_icon`, `order_name`, `order_value`, `order_tab`) VALUES
(1, 1, 'chat-left-text', 'İletişim', 'https://sosyalseyler.com/contact', NULL),
(2, 2, 'cloud-download', 'İndir', 'https://github.com/ArgonauTR/sosyal-seyler', NULL),
(3, 3, 'code-slash', 'Geliştirici', 'https://www.r10.net/profil/128431-argonaut.html', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(250) DEFAULT NULL,
  `post_link` varchar(250) DEFAULT NULL,
  `post_content` text DEFAULT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `post_author_id` int(11) DEFAULT NULL,
  `post_status` varchar(50) DEFAULT NULL,
  `post_wievs` int(11) DEFAULT NULL,
  `post_comment_status` varchar(50) DEFAULT NULL,
  `post_create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_link`, `post_content`, `post_category_id`, `post_author_id`, `post_status`, `post_wievs`, `post_comment_status`, `post_create_time`) VALUES
(1, 'Sosyal Şeyler', 'https://localhost/1-sosyal-seyler', '<p>Genel amaçlı açık kaynaklı özgür bir yazılımdır. PHP, Boostrap ve MYSQL kullanılarak yazılmıştır.</p><p><br></p>', 1, 1, 'publish', 10, 'open', '2024-09-12 21:35:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_image_url` varchar(250) DEFAULT NULL,
  `user_nick` varchar(50) DEFAULT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_password_reset_key` varchar(50) DEFAULT NULL,
  `user_url` varchar(50) DEFAULT NULL,
  `user_role` varchar(50) DEFAULT NULL,
  `user_status` varchar(50) DEFAULT NULL,
  `user_bio` varchar(1000) DEFAULT NULL,
  `user_theme` varchar(50) DEFAULT NULL,
  `user_create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_image_url`, `user_nick`, `user_mail`, `user_password`, `user_password_reset_key`, `user_url`, `user_role`, `user_status`, `user_bio`, `user_theme`, `user_create_time`) VALUES
(1, 'https://localhost/admin/system/images/user.jpeg', 'admin', 'admin@sosyalseyler.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'https://localhost/user/admin', 'admin', 'approved', 'Mesaj eklemeyecek kadar havalayım.', 'dark', '2024-09-12 21:33:15');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ads_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Tablo için indeksler `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Tablo için indeksler `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ads`
--
ALTER TABLE `ads`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
