<?php

use Hcode\Model\Category;
use Hcode\Model\Product;
use Hcode\Page;

$app->get('/', function() {

    $products = Product::listAll();

    $page = new Page();
    $page->setTpl("index", [
        "products" => Product::checkList($products)
    ]);

});

$app->get('/categories/:idcategory', function ($idCategory){

    $category = new Category();
    $category->get((int)$idCategory);

    $page = new Page();
    $page->setTpl("category", [
        "category" => $category->getValues(),
        "products" => Product::checkList($category->getProducts())
    ]);
});