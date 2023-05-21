<?php

require "../vendor/autoload.php";
require "./services/SignService.php";

Flight::register('signService', 'SignService');

require 'routes/SignRoutes.php';

Flight::start();
 ?>
