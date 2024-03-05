<?php
/*
    DB-UPDATE Dosyası önceki sürümlerde olmayan veritabanı elemanlarını ekler.
    Bu dosya mümkün mertebe kurcalanmamalıdır. 
    Sürümlere bağlı olarak yeni eklemeler ve çıkarmalar yapılmış olabilir. 
*/

// 05.03.2024 tarihli 1.2 güncellemesinde ki veritabanı değişiklikleri.
// Reklam türlerini ayırabilmek içiin ORDERS tablosuna ADD_NAME eklendi.
$checkColumn = $db->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'orders' AND COLUMN_NAME = 'order_ads'");
if ($checkColumn->fetchColumn() == 0) {
    $db->exec("ALTER TABLE orders ADD order_ads VARCHAR(200) DEFAULT NULL");
}
