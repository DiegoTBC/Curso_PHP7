<?php

session_start();

use Hcode\PageAdmin;
use Slim\Slim;
use Hcode\Page;
use Hcode\Model\User;

require_once("vendor/autoload.php");

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {

    $page = new Page();
    $page->setTpl("index");

});

$app->get('/admin', function() {

    User::verifyLogin();

    $page = new PageAdmin();
    $page->setTpl("index");

});

$app->get('/admin/login', function (){
    $page = new PageAdmin([
        "header" => false,
        "footer" => false
    ]);
    $page->setTpl('login');
});

$app->post('/admin/login', function (){

    User::login($_POST["login"], $_POST["password"]);

    header("Location: /admin");

    exit;

});

$app->post('/admin/logout', function (){

    User::logout();

    header("Location: /admin/login");

    exit;

});


$app->get('/hash', function(){
   echo password_hash("admin", null);
   echo '<br>';
   echo password_verify("admin", '$2y$10$LDAZ4a.2kX1MUUfCrYLJqOkqPauqlPVXnmoqKGm8tbqDKqN4OLLSi');

});

$app->run();

 ?>