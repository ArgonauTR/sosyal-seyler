<?php
  function basamak($sayi) {
    return number_format($sayi, 1, '.', '');
}

function sefnum($count)
{
  if (999999 < $count && $count < 100000000) {
    return basamak($count/100000);
  } elseif (999 < $count && $count < 1000000) {
    return "binli";
  } elseif (99 < $count && $count < 1000) {
    return "yüzlü";
  } else {
    return "sayı";
  }
}

echo "Sayı: " . sefnum(9998999);

?>
