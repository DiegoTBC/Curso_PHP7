<?php

use Hcode\Model\Category;
use Hcode\Model\Product;
use Hcode\PageAdmin;
use Hcode\Page;
use Hcode\Model\User;

$app->get('/admin/categories', function (){

    User::verifyLogin();

    $categories = Category::listAll();

    $page = new PageAdmin();
    $page->setTpl('categories', [
        "categories" => $categories
    ]);
});

$app->get('/admin/categories/create', function (){

    User::verifyLogin();

    $page = new PageAdmin();
    $page->setTpl('categories-create');
});

$app->post('/admin/categories/create', function (){

    User::verifyLogin();

    $category = new Category();
    $category->setData($_POST);
    $category->save();

    header("Location: /admin/categories");
    exit;
});

$app->get("/admin/categories/:idcategory/delete", function ($idcategory){

    User::verifyLogin();

    $category = new Category();

    $category->get((int)$idcategory);

    $category->delete();

    header("Location: /admin/categories");
    exit;
});

$app->get("/admin/categories/:idcategory", function ($idcategory){

    User::verifyLogin();

    $category = new Category();

    $category->get((int)$idcategory);

    $page = new PageAdmin();
    $page->setTpl('categories-update', [
        "category" => $category->getValues()
    ]);
});

$app->post("/admin/categories/:idcategory", function ($idcategory){

    User::verifyLogin();

    $category = new Category();
    $category->get((int)$idcategory);

    $category->setData($_POST);

    $category->save();

    header("Location: /admin/categories");
    exit();

});


$app->get('/admin/categories/:idcategory/products', function ($idCategory){

    User::verifyLogin();

    $category = new Category();
    $category->get((int)$idCategory);

    $page = new PageAdmin();
    $page->setTpl("categories-products", [
        "category" => $category->getValues(),
        "productsRelated" => $category->getProducts(),
        "productsNotRelated" => $category->getProducts(false)
    ]);

});

$app->get('/admin/categories/:idcategory/products/:idproduct/add', function ($idCategory, $idProduct){

    User::verifyLogin();

    $category = new Category();
    $category->get((int)$idCategory);
    $product = new Product();
    $product->get((int)$idProduct);
    $category->addProduct($product);

    header("Location: /admin/categories/".$idCategory."/products");
    exit();

});

$app->get('/admin/categories/:idcategory/products/:idproduct/remove', function ($idCategory, $idProduct){

    User::verifyLogin();

    $category = new Category();
    $category->get((int)$idCategory);
    $product = new Product();
    $product->get((int)$idProduct);
    $category->removeProduct($product);

    header("Location: /admin/categories/".$idCategory."/products");
    exit();

});