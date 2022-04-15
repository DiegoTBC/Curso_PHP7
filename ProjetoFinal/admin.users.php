<?php

use Hcode\PageAdmin;
use Hcode\Model\User;


$app->get('/admin/users', function (){

    User::verifyLogin();

    $users = User::listAll();

    $page = new PageAdmin();
    $page->setTpl('users', [
        "users" => $users
    ]);

});

$app->get('/admin/users/create', function (){

    User::verifyLogin();

    $page = new PageAdmin();
    $page->setTpl('users-create');

});

$app->post('/admin/users/create', function (){

    User::verifyLogin();

    $user = new User();

    $_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

    $user->setData($_POST);

    $user->save();

    header("Location: /admin/users");
    exit;

});

$app->get('/admin/users/:iduser/delete', function ($idUser){

    User::verifyLogin();

    $user = new User();

    $user->get((int)$idUser);

    $user->delete();

    header("Location: /admin/users");
    exit;

});

$app->get('/admin/users/:iduser', function ($idUser){

    User::verifyLogin();

    $user = new User();
    $user->get((int)$idUser);

    $page = new PageAdmin();
    $page->setTpl('users-update', [
        "user" => $user->getValues()
    ]);

});

$app->post('/admin/users/:iduser', function ($idUser){

    User::verifyLogin();

    $user = new User();

    $_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

    $user->get((int)$idUser);

    $user->setData($_POST);

    $user->update();

    header("Location: /admin/users");
    exit;

});