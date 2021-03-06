<?php

if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("libraries/password_compatibility_library.php");
}

require_once("_settings/settings.php");

require_once("_settings/db.php");

require_once("classes/Login.php");

require_once ("libraries/helper.php");

$login = new Login();


if ($login->isUserLoggedIn() == true) {

    include("views/logged_in.php");

} else {

    include("views/not_logged_in.php");
}
