<?php

function datetime($dateTimeStr) {
    $currentTime = new DateTime();
    $inputTime = new DateTime($dateTimeStr);
    $interval = $currentTime->diff($inputTime);

    if ($interval->y >= 1) {
        return $interval->y . " yıl önce";
    } elseif ($interval->m >= 1) {
        return $interval->m . " ay önce";
    } elseif ($interval->d >= 1) {
        return $interval->d . " gün önce";
    } elseif ($interval->h >= 1) {
        return $interval->h . " saat önce";
    } else {
        return $interval->i . " dakika önce";
    }
}

?>