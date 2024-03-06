-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Mar 2024, 18:10:38
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
-- Veritabanı: `test`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_title` varchar(250) DEFAULT NULL,
  `category_link` varchar(350) DEFAULT NULL,
  `category_description` text DEFAULT NULL,
  `category_color` varchar(250) DEFAULT NULL,
  `category_image_id` varchar(250) DEFAULT NULL,
  `category_status` varchar(50) DEFAULT NULL,
  `category_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_link`, `category_description`, `category_color`, `category_image_id`, `category_status`, `category_time`) VALUES
(1, 'Genel', 'https://localhost/1-genel', 'Genel Amaçlı Kategori', 'primary', '1', 'blog', '2024-02-20 19:26:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(20) NOT NULL,
  `comment_post_id` int(20) DEFAULT NULL,
  `comment_author_id` int(20) DEFAULT NULL,
  `comment_author_name` varchar(500) DEFAULT NULL,
  `comment_author_ip` varchar(250) DEFAULT NULL,
  `comment_content` text DEFAULT NULL,
  `comment_author_agent` varchar(500) DEFAULT NULL,
  `comment_type` varchar(50) DEFAULT NULL,
  `comment_parent_id` int(20) DEFAULT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author_id`, `comment_author_name`, `comment_author_ip`, `comment_content`, `comment_author_agent`, `comment_type`, `comment_parent_id`, `comment_time`, `comment_status`) VALUES
(1, 1, NULL, 'Argonaut', '::1', 'Teşekkürler...', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'comment', NULL, '2024-02-20 19:40:22', 'publish');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE `images` (
  `image_id` int(20) NOT NULL,
  `image_name` varchar(500) DEFAULT NULL,
  `image_title` varchar(500) DEFAULT NULL,
  `image_description` text DEFAULT NULL,
  `image_link` varchar(250) DEFAULT NULL,
  `image_width` int(20) DEFAULT NULL,
  `image_height` int(20) DEFAULT NULL,
  `image_type` varchar(20) DEFAULT NULL,
  `image_user_ip` varchar(250) DEFAULT NULL,
  `image_user_agent` varchar(250) DEFAULT NULL,
  `image_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`image_id`, `image_name`, `image_title`, `image_description`, `image_link`, `image_width`, `image_height`, `image_type`, `image_user_ip`, `image_user_agent`, `image_time`) VALUES
(1, '1708457210-genel-kategori-resmi.jpg', 'genel kategori resmi', 'genel kategori resmi', 'https://localhost/images/2024/02/1708457210-genel-kategori-resmi.jpg', 1424, 791, 'jpg', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-20 19:26:50'),
(2, '1708457459-hosgeldiniz.jpg', 'hoşgeldiniz', 'hoşgeldiniz', 'https://localhost/images/2024/02/1708457459-hosgeldiniz.jpg', 1369, 863, 'jpg', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-20 19:30:59'),
(3, '1708457537-sosyal-seyler-logo.png', 'sosyal şeyler logo', 'sosyal şeyler logo', 'https://localhost/images/2024/02/1708457537-sosyal-seyler-logo.png', 193, 41, 'png', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-20 19:32:17'),
(4, '1708457546-sosyal-seyler-favicon.png', 'sosyal şeyler favicon', 'sosyal şeyler favicon', 'https://localhost/images/2024/02/1708457546-sosyal-seyler-favicon.png', 512, 512, 'png', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-20 19:32:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `message_id` int(20) NOT NULL,
  `message_title` varchar(250) DEFAULT NULL,
  `message_content` varchar(2000) DEFAULT NULL,
  `message_status` varchar(250) NOT NULL,
  `message_author_name` varchar(250) DEFAULT NULL,
  `message_author_mail` varchar(250) DEFAULT NULL,
  `message_ip` varchar(250) DEFAULT NULL,
  `message_agent` varchar(500) DEFAULT NULL,
  `message_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`message_id`, `message_title`, `message_content`, `message_status`, `message_author_name`, `message_author_mail`, `message_ip`, `message_agent`, `message_time`) VALUES
(1, 'Test İletişim Formu', 'Bu mesajı görüyorsanız &quot;mesajlar&quot; düzgün şekilde çalışıyor demektir.\r\nWeb projenizde şimdiden başarılar dilerim.', 'wait', 'Argonaut', 'abc@abc.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-20 19:37:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `options`
--

CREATE TABLE `options` (
  `option_id` int(20) NOT NULL,
  `option_url` varchar(100) NOT NULL,
  `option_name` varchar(100) NOT NULL,
  `option_description` text NOT NULL,
  `option_footer` varchar(500) NOT NULL,
  `option_can_register` varchar(20) NOT NULL,
  `option_admin_mail` varchar(100) NOT NULL,
  `option_mailserver_url` varchar(250) NOT NULL,
  `option_mailserver_login` varchar(250) NOT NULL,
  `option_mailserver_pass` varchar(250) NOT NULL,
  `option_mailserver_port` varchar(250) NOT NULL,
  `option_default_category_id` varchar(20) NOT NULL,
  `option_default_post_status` varchar(20) NOT NULL,
  `option_posts_per_page` int(20) NOT NULL,
  `option_maintenance` varchar(20) NOT NULL,
  `option_respect` varchar(20) DEFAULT NULL,
  `option_blog_charset` varchar(20) NOT NULL,
  `option_logo_image` varchar(250) NOT NULL,
  `option_favicon_image` varchar(250) NOT NULL,
  `option_background_image` varchar(250) NOT NULL,
  `option_comments_per_page` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `options`
--

INSERT INTO `options` (`option_id`, `option_url`, `option_name`, `option_description`, `option_footer`, `option_can_register`, `option_admin_mail`, `option_mailserver_url`, `option_mailserver_login`, `option_mailserver_pass`, `option_mailserver_port`, `option_default_category_id`, `option_default_post_status`, `option_posts_per_page`, `option_maintenance`, `option_respect`, `option_blog_charset`, `option_logo_image`, `option_favicon_image`, `option_background_image`, `option_comments_per_page`) VALUES
(0, 'https://sosyalseyler.com', 'Sosyal Şeyler', 'Sosyal ve Viral haberlerin, incelemelerin ve makalelerin adresi', '©2024 || Tüm Hakları Saklıdır.', 'evet', 'osmanozer4@gmail.com', 'mail.sosyalseyler.com', 'admin', '12345', '597', '1', 'taslak', 10, 'hayır', 'yes', 'utf8_turkish_ci', '3', '4', '42', 20);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `order_row` varchar(50) DEFAULT NULL,
  `order_status` varchar(50) DEFAULT NULL,
  `order_icon` varchar(50) DEFAULT NULL,
  `order_name` varchar(200) DEFAULT NULL,
  `order_link` varchar(200) DEFAULT NULL,
  `order_content` text DEFAULT NULL,
  `order_image_id` int(20) DEFAULT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_ads` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`order_id`, `order_row`, `order_status`, `order_icon`, `order_name`, `order_link`, `order_content`, `order_image_id`, `order_time`, `order_ads`) VALUES
(1, '1', NULL, NULL, 'GOOGLE', 'https://www.google.com.tr/', NULL, NULL, '2024-02-20 19:38:03', NULL),
(2, '2', NULL, NULL, 'YOUTUBE', 'https://www.youtube.com/', NULL, NULL, '2024-02-20 19:38:17', NULL),
(3, '3', NULL, NULL, 'İNSTAGRAM', 'https://www.instagram.com/', NULL, NULL, '2024-02-20 19:38:41', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `post_id` int(20) NOT NULL,
  `post_title` varchar(250) DEFAULT NULL,
  `post_content` text DEFAULT NULL,
  `post_category_id` int(10) DEFAULT NULL,
  `post_author_id` int(10) DEFAULT NULL,
  `post_link` varchar(250) DEFAULT NULL,
  `post_wievs` int(20) DEFAULT NULL,
  `post_description` text DEFAULT NULL,
  `post_thumbnail_id` int(10) DEFAULT NULL,
  `post_source` varchar(500) DEFAULT NULL,
  `post_type` varchar(50) DEFAULT NULL,
  `post_author_agent` varchar(500) DEFAULT NULL,
  `post_author_ip` varchar(250) DEFAULT NULL,
  `post_status` varchar(50) DEFAULT NULL,
  `post_comment_status` varchar(50) DEFAULT NULL,
  `post_update_time` datetime DEFAULT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_category_id`, `post_author_id`, `post_link`, `post_wievs`, `post_description`, `post_thumbnail_id`, `post_source`, `post_type`, `post_author_agent`, `post_author_ip`, `post_status`, `post_comment_status`, `post_update_time`, `post_time`) VALUES
(1, 'Hoşgeldiniz', '<p>Hoşgeldiniz.</p><p>Harika bir şeyleri başlatıyoruz. Yakında pek çok ilginç ve güzel şey buralarda olacak. Sabırlı olun ve sık sık ziyaret edin.</p><p>Şimdiden teşekkür ederiz.&nbsp;</p>', 1, 1, 'https://localhost/1-hosgeldiniz', 13, 'Merhaba içeriği açıklaması.', 2, NULL, 'post', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '::1', 'publish', 'open', '2024-02-20 22:30:59', '2024-02-20 21:04:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `user_nick` varchar(50) DEFAULT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_url` varchar(50) DEFAULT NULL,
  `user_status` varchar(50) DEFAULT NULL,
  `user_role` varchar(50) DEFAULT NULL,
  `user_info` text DEFAULT NULL,
  `user_slug` varchar(500) DEFAULT NULL,
  `user_image` varchar(500) DEFAULT NULL,
  `user_ban` varchar(20) DEFAULT NULL,
  `user_wallpaper` varchar(500) DEFAULT NULL,
  `user_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_nick`, `user_mail`, `user_password`, `user_url`, `user_status`, `user_role`, `user_info`, `user_slug`, `user_image`, `user_ban`, `user_wallpaper`, `user_time`) VALUES
(1, 'Adminastor', 'admin', 'admin@sosyalseyler.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 'approved', 'admin', '', '', '58', NULL, '', '2024-01-01 20:18:27');

--
-- Dökümü yapılmış tablolar için indeksler
--

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
-- Tablo için indeksler `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

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
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
