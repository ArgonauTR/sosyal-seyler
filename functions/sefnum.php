<?php
function sefnum($number) {
    if ($number >= 1000000000) {
        return round($number / 1000000000, 1) . 'b';
    } elseif ($number >= 1000000) {
        return round($number / 1000000, 1) . 'm';
    } elseif ($number >= 1000) {
        return round($number / 1000, 1) . 'k';
    } else {
        return $number;
    }
}
?>