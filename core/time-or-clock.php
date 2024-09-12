<?php
// Aşağıda ki fonskiyon tarihi parçalayıp sadece yılı döndürüyor.
function dateexplode($tarih){
    $parca = explode(" ",$tarih);
    return $parca[0];
}

// $parca[0]; TARİH DÖNDÜRÜR
// $parca[1];  ZAMAN DÖNDÜRÜR