<?php
/**
 * WordPress için başlangıç ayar dosyası.
 *
 * Bu dosya kurulum sırasında wp-config.php dosyasının oluşturulabilmesi için
 * kullanılır. İsterseniz bu dosyayı kopyalayıp, ismini "wp-config.php" olarak değiştirip,
 * değerleri girerek de kullanabilirsiniz.
 *
 * Bu dosya şu ayarları içerir:
 * 
 * * Veritabanı ayarları
 * * Gizli anahtarlar
 * * Veritabanı tablo ön eki
 * * ABSPATH
 * 
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Veritabanı ayarları - Bu bilgileri servis sağlayıcınızdan alabilirsiniz ** //
/** WordPress için kullanılacak veritabanının adı */
define( 'DB_NAME', 'wp' );

/** Veritabanı kullanıcısı */
define( 'DB_USER', 'root' );

/** Veritabanı parolası */
define( 'DB_PASSWORD', '' );

/** Veritabanı sunucusu */
define( 'DB_HOST', 'localhost' );

/** Yaratılacak tablolar için veritabanı karakter seti. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Veritabanı karşılaştırma tipi. Herhangi bir şüpheniz varsa bu değeri değiştirmeyin. */
define( 'DB_COLLATE', '' );

/**#@+
 * Eşsiz doğrulama anahtarları ve tuzlar.
 *
 * Her anahtar farklı bir karakter kümesi olmalı!
 * {@link http://api.wordpress.org/secret-key/1.1/salt WordPress.org secret-key service} servisini kullanarak yaratabilirsiniz.
 * 
 * Çerezleri geçersiz kılmak için istediğiniz zaman bu değerleri değiştirebilirsiniz.
 * Bu tüm kullanıcıların tekrar giriş yapmasını gerektirecektir.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'CeeDI?/VjWO)zM=4Tv}Eh_P2sD$(Q71p+|0y|0CQo(;1@Ynz}Yt17VtWzgc]uBV-' );
define( 'SECURE_AUTH_KEY',  'tJ+*ykEPxKzi*4Pag>bWrlR6e*A_i*a/&RkPPX.fMpw!V2ffaaQpH;=p$pHgzb?R' );
define( 'LOGGED_IN_KEY',    'G)2[%e%n-.u(rai9C1HXrT? Gpu[p`[<;5`FH/k_, G_MPI6qOh*<OI~@s:_(}zi' );
define( 'NONCE_KEY',        'q}<[4h }tZX)Z@bf7JBp5]l|czEy2[A@WS1!drsBOlANYu4TR` u(%RQW.xXjLyT' );
define( 'AUTH_SALT',        'SDXq{1e,0O+g:sw<+f<zphKMt*5X[s>/=ApX&rm}.kyXl$KJM SsQl1qO$,aDckB' );
define( 'SECURE_AUTH_SALT', '[&uG48I[Ao~a++1_,#8lZB]V_<K^ <[;~mWXf*W.aAlr[a6Ja$k?NmL {JC6?3=4' );
define( 'LOGGED_IN_SALT',   '`z[cXlek=d()e^;7TdS`r(j MY^K<XHC>mXpmFmQ[#r*[$BE~kJmOgv8)FEq`H3k' );
define( 'NONCE_SALT',       '19{s:}b|ta(Tyb{dEXx1n)uj >B:Ek0dc/3IIb},|YT%u~r#{FR9L&k_d@a)Z$j ' );

/**#@-*/

/**
 * WordPress veritabanı tablo ön eki.
 *
 * Tüm kurulumlara ayrı bir önek vererek bir veritabanına birden fazla kurulum yapabilirsiniz.
 * Sadece rakamlar, harfler ve alt çizgi lütfen.
 */
$table_prefix = 'wp_';

/**
 * Geliştiriciler için: WordPress hata ayıklama modu.
 *
 * Bu değeri true olarak ayarlayıp geliştirme sırasında hataların ekrana
 * basılmasını sağlayabilirsiniz. Tema ve eklenti geliştiricilerinin geliştirme
 * aşamasında WP_DEBUG kullanmalarını önemle tavsiye ederiz.
 * 
 * Hata ayıklama için kullanabilecek diğer sabitler ile ilgili daha fazla bilgiyi
 * belgelerden edinebilirsiniz.
 * 
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Her türlü özel değeri bu satı ile "Hepsi bu kadar" yazan satır arasına ekleyebilirsiniz. */



/* Hepsi bu kadar. Mutlu bloglamalar! */

/** WordPress dizini için mutlak yol. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** WordPress değişkenlerini ve yollarını kurar. */
require_once ABSPATH . 'wp-settings.php';