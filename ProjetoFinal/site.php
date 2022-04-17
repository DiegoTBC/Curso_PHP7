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

    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    $category = new Category();
    $category->get((int)$idCategory);

    $pagination = $category->getProductsPage($page);

    $pages = [];

    for($i = 1; $i <= $pagination['pages']; $i++)
    {
        array_push($pages, [
            "link" => '/categories/'.$category->getidcategory().'?page='.$i,
            "page" => $i
        ]);
    }

    $page = new Page();
    $page->setTpl("category", [
        "category" => $category->getValues(),
        "products" => $pagination['data'],
        "pages" => $pages
    ]);
});

$app->get('/products/:desurl', function ($desUrl){
    $product = new Product();
    $product->getFromUrl($desUrl);

    $page = new Page();
    $page->setTpl('product-detail', [
        'product' => $product->getValues(),
        'categories' => $product->getCategories()
    ]);
});