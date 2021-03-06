<?php

session_start();

use Slim\Slim;

require_once("vendor/autoload.php");

$app = new Slim();
$app->config('debug', true);

require_once("site.php");
require_once("admin.php");
require_once("admin.categories.php");
require_once("admin.users.php");
require_once("admin.products.php");
require_once("functions.php");

$app->run();

 ?>