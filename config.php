<?php
require_once "google-api/vendor/autoload.php";
$gClient = new Google_Client();

$gClient->setClientId("71645259025-nn7alr1jcp589qrmb6hob21k9aom3alp.apps.googleusercontent.com");

$gClient->setClientSecret("wiGmAurhYtfk-jpn6usg28kn");

$gClient->setApplicationName("good-website-login");

$gClient->setRedirectUri("http://localhost/good-website-login/controller.php");

$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

// login URL
$login_url = $gClient->createAuthUrl();
?>
