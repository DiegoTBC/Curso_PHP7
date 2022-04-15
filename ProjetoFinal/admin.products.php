<?php

use Hcode\Model\Product;
use Hcode\PageAdmin;
use Hcode\Model\User;

$app->get('/admin/products', function() {

    User::verifyLogin();

    $products = Product::listAll();

    $page = new PageAdmin();

    $page->setTpl("products", [
       "products" => $products
    ]);

});

$app->get('/admin/products/create', function() {

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("products-create");

});


$app->post('/admin/products/create', function() {

    User::verifyLogin();

    $product = new Product();

    $product->setData($_POST);

    $product->save();

    header("Location: /admin/products");
    exit();

});

$app->get('/admin/products/:idproduct', function($idProduct) {

    User::verifyLogin();

    $product = new Product();
    $product->get((int)$idProduct);

    $page = new PageAdmin();
    $page->setTpl("products-update", [
        "product" => $product->getValues()
    ]);

});

$app->post('/admin/products/:idproduct', function($idProduct) {

    User::verifyLogin();

    $product = new Product();
    $product->get((int)$idProduct);

    $product->setData($_POST);

    $product->save();

    if($_FILES["file"]["name"] !== "") $product->setPhoto($_FILES["file"]);

    header("Location: /admin/products");
    exit;

});

$app->get('/admin/products/:idproduct/delete', function($idProduct) {

    User::verifyLogin();

    $product = new Product();
    $product->get((int)$idProduct);

    $product->delete();

    header("Location: /admin/products");
    exit;

});
