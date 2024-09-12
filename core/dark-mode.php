<?php

// Mercut bir tema yoksa belirler. Varsa ona göre temayı değitşirir.
function currenttheme()
{
    if (isset($_SESSION["user_id"])) {
        $theme = $_SESSION["user_theme"];
        return $theme;
    } else {
        $theme = optioninfo("option_default_theme");
        return $theme;
    }
}
