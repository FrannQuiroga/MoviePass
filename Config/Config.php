<?php namespace Config;

define("ROOT", dirname(__DIR__) . "/");
//Path to your project's root folder
define("FRONT_ROOT", "/Tp/");
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
define("IMG_PATH", VIEWS_PATH . "img/");

define("DB_HOST", "localhost");
define("DB_NAME", "MoviePass");
define("DB_USER", "root");
define("DB_PASS", "");

define("BASE_API_URL", "https://api.themoviedb.org/3/");
define("IMAGE_URL","https://image.tmdb.org/t/p/w500");
?>




