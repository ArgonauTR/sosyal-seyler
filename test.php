<?php


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

echo $uri;