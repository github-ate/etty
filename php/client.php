<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require_once('configuration.php');


$authurl = Configuration::getAuthUrl();
header("Location: $authurl"); exit();

?>