-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 May 2024, 11:37:54
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
-- Veritabanı: `17guncel`
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
(2, 'Teknoloji', 'https://localhost/category/2-teknoloji', 'Teknolojik Şeyler', 'primary', '7', 'blog', '2024-04-12 17:21:29'),
(3, 'Bilim Kurgu', 'https://localhost/category/3-bilim-kurgu', 'Fantastik Macera', 'primary', '8', 'manga', '2024-04-12 17:22:16');

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
(2, 2, 1, NULL, '::1', 'İlk Yorum hayırlı olsun', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'comment', NULL, '2024-04-12 17:23:26', 'publish');

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
(5, '1712942297-sosyal-icon.png', 'sosyal icon', 'sosyal icon', 'https://localhost/images/2024/04/1712942297-sosyal-icon.png', 512, 512, 'png', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-12 17:18:17'),
(6, '1712942307-sosyal-log.png', 'sosyal log', 'sosyal log', 'https://localhost/images/2024/04/1712942307-sosyal-log.png', 193, 41, 'png', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-12 17:18:27'),
(7, '1712942489-duffy-duck.jpg', 'duffy duck', 'duffy duck', 'https://localhost/images/2024/04/1712942489-duffy-duck.jpg', 1359, 802, 'jpg', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-12 17:21:29'),
(8, '1712942536-batman.jpg', 'batman', 'batman', 'https://localhost/images/2024/04/1712942536-batman.jpg', 1548, 866, 'jpg', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-12 17:22:16'),
(9, '1712942587-hosgeldiniz.jpg', 'hoşgeldiniz', 'hoşgeldiniz', 'https://localhost/images/2024/04/1712942587-hosgeldiniz.jpg', 1369, 863, 'jpg', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-12 17:23:07'),
(10, '1712942688-kapak.jpg', 'Kapak', 'Kapak', 'https://localhost/images/2024/04/1712942688-kapak.jpg', 1080, 1350, 'jpg', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-12 17:24:48');

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

INSERT INTO `mangas` (`manga_id`, `manga_image_id`, `manga_name`, `manga_description`, `manga_other_name`, `manga_category_id`, `manga_author`, `manga_artist`, `manga_content`, `manga_year`, `manga_country`, `manga_upload_user_id`, `manga_type`, `manga_fansub_link`, `manga_publish_status`, `manga_translate_status`, `manga_upload_user_ip`, `manga_upload_user_agent`, `manga_adult_warning`, `manga_link`, `manga_time`) VALUES
(4, 10, 'İşgalden Sonra', 'Uydurma Eserimiz', 'After the Occupation', 3, 'Sosyal', 'Uydurma', '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.</p>', '2024', 'Türkiye', 1, 'manga', '', 'draft', 'completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'no', 'https://localhost/manga/4-isgalden-sonra', '2024-04-12 17:24:48');

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
(1, 'Test İletişim Formu', 'Bu mesajı görüyorsanız &quot;mesajlar&quot; düzgün şekilde çalışıyor demektir.\r\nWeb projenizde şimdiden başarılar dilerim.', 'read', 'Argonaut', 'abc@abc.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-20 19:37:17');

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
  `option_comments_per_page` int(20) NOT NULL,
  `option_terms` varchar(250) DEFAULT NULL,
  `option_analitics` varchar(1000) DEFAULT NULL,
  `option_console` varchar(1000) DEFAULT NULL,
  `option_adsense` varchar(1000) DEFAULT NULL,
  `option_index_page` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `options`
--

INSERT INTO `options` (`option_id`, `option_url`, `option_name`, `option_description`, `option_footer`, `option_can_register`, `option_admin_mail`, `option_mailserver_url`, `option_mailserver_login`, `option_mailserver_pass`, `option_mailserver_port`, `option_default_category_id`, `option_default_post_status`, `option_posts_per_page`, `option_maintenance`, `option_respect`, `option_blog_charset`, `option_logo_image`, `option_favicon_image`, `option_background_image`, `option_comments_per_page`, `option_terms`, `option_analitics`, `option_console`, `option_adsense`, `option_index_page`) VALUES
(0, 'https://sosyalseyler.com', 'Sosyal Şeyler', 'Sosyal ve Viral haberlerin, incelemelerin ve makalelerin adresi', '©2024 || Tüm Hakları Saklıdır.', 'yes', 'posta@posta.com', 'mail.sosyalseyler.com', 'admin', '12345', '597', '1', 'taslak', 10, 'no', 'yes', 'utf8_turkish_ci', '6', '5', '42', 20, 'https://sosyalseyler.com/', '', '', '', 'blog');

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
  `post_update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_category_id`, `post_author_id`, `post_link`, `post_wievs`, `post_description`, `post_thumbnail_id`, `post_source`, `post_type`, `post_author_agent`, `post_author_ip`, `post_status`, `post_comment_status`, `post_update_time`) VALUES
(2, 'Merhaba Dünya', '<h2>Lorem Ipsum Nedir?</h2><p><strong>Lorem Ipsum</strong>, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.</p><h2>Neden Kullanırız?</h2><p>Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli \'buraya metin gelecek, buraya metin gelecek\' yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda birçok masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında \'lorem ipsum\' anahtar sözcükleri ile arama yapıldığında henüz tasarım aşamasında olan çok sayıda site listelenir. Yıllar içinde, bazen kazara, bazen bilinçli olarak (örneğin mizah katılarak), çeşitli sürümleri geliştirilmiştir.</p><h2>Nereden Gelir?</h2><p>Yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock, bir Lorem Ipsum pasajında geçen ve anlaşılması en güç sözcüklerden biri olan \'consectetur\' sözcüğünün klasik edebiyattaki örneklerini incelediğinde kesin bir kaynağa ulaşmıştır. Lorm Ipsum, Çiçero tarafından M.Ö. 45 tarihinde kaleme alınan \"de Finibus Bonorum et Malorum\" (İyi ve Kötünün Uç Sınırları) eserinin 1.10.32 ve 1.10.33 sayılı bölümlerinden gelmektedir. Bu kitap, ahlak kuramı üzerine bir tezdir ve Rönesans döneminde çok popüler olmuştur. Lorem Ipsum pasajının ilk satırı olan \"Lorem ipsum dolor sit amet\" 1.10.32 sayılı bölümdeki bir satırdan gelmektedir.</p><p>1500\'lerden beri kullanılmakta olan standard Lorem Ipsum metinleri ilgilenenler için yeniden üretilmiştir. Çiçero tarafından yazılan 1.10.32 ve 1.10.33 bölümleri de 1914 H. Rackham çevirisinden alınan İngilizce sürümleri eşliğinde özgün biçiminden yeniden üretilmiştir.</p><h2>Nereden Bulabilirim?</h2><p>Lorem Ipsum pasajlarının birçok çeşitlemesi vardır. Ancak bunların büyük bir çoğunluğu mizah katılarak veya rastgele sözcükler eklenerek değiştirilmişlerdir. Eğer bir Lorem Ipsum pasajı kullanacaksanız, metin aralarına utandırıcı sözcükler gizlenmediğinden emin olmanız gerekir. İnternet\'teki tüm Lorem Ipsum üreteçleri önceden belirlenmiş metin bloklarını yineler. Bu da, bu üreteci İnternet üzerindeki gerçek Lorem Ipsum üreteci yapar. Bu üreteç, 200\'den fazla Latince sözcük ve onlara ait cümle yapılarını içeren bir sözlük kullanır. Bu nedenle, üretilen Lorem Ipsum metinleri yinelemelerden, mizahtan ve karakteristik olmayan sözcüklerden uzaktır.</p>', 3, 1, 'https://localhost/2-merhaba-dunya', 4, 'Merhaba Dünya', 9, NULL, 'post', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '::1', 'publish', 'open', '2024-04-12 20:23:07');

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
  `user_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_pass_reset` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_nick`, `user_mail`, `user_password`, `user_url`, `user_status`, `user_role`, `user_info`, `user_slug`, `user_image`, `user_ban`, `user_wallpaper`, `user_time`, `user_pass_reset`) VALUES
(1, 'Adminastor', 'admin', 'admin@sosyalseyler.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 'approved', 'admin', '', '', '58', NULL, '', '2024-01-01 20:18:27', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

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
-- Tablo için indeksler `mangas`
--
ALTER TABLE `mangas`
  ADD PRIMARY KEY (`manga_id`);

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
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `mangas`
--
ALTER TABLE `mangas`
  MODIFY `manga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `post_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
