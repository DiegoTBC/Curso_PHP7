<?php

require_once "vendor/autoload.php";

use Slim\Slim;

$app = new Slim();
$app->get('/', function () {
    echo json_encode([
        'date' => date("d/m/Y")
    ]);
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, " . $name;
});
$app->run();