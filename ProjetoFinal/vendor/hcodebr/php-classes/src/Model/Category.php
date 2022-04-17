<?php

namespace Hcode\Model;

use Hcode\DB\Sql;
use Hcode\Model;

class Category extends Model
{

    public static function listAll()
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_categories ORDER BY idcategory");
    }

    public function save()
    {
        $sql = new Sql();
        $result = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", [
            ":idcategory" => $this->getidcategory(),
            ":descategory" => $this->getdescategory(),
        ]);

        $this->setData($result[0]);

        self::updateFile();
    }

    public function get($idCategory)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", [
            ":idcategory" => $idCategory
        ]);

        $this->setData($result[0]);

    }

    public function delete()
    {

        $sql = new Sql();
        $sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [
            ":idcategory" => $this->getidcategory()
        ]);

        self::updateFile();

    }

    //Atualiza o arquivo categories-menu toda vez que houver alguma alteração no banco
    //evitando que seja feito uma busca ao BD toda vez que o usuario acessar o site
    public static function updateFile()
    {
        $categories = Category::listAll();

        $html = [];

        foreach ($categories as $row)
        {
            array_push($html, '<li><a href="/categories/'.$row['idcategory'].'">'.$row['descategory'].'</a></li>');
        }

        file_put_contents($_SERVER["DOCUMENT_ROOT"].DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'categories-menu.html', implode('', $html));
    }

    public function getProducts(bool $related = true)
    {
        $sql = new Sql();

        if ($related)
        {
            return $sql->select("SELECT * FROM tb_products WHERE idproduct IN (
                    SELECT a.idproduct FROM tb_products a
                    INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
                    WHERE b.idcategory = :idcategory)", [
                        "idcategory" => $this->getidcategory()
            ]);
        }
        else
        {
            return $sql->select("SELECT * FROM tb_products WHERE idproduct NOT IN (
                    SELECT a.idproduct FROM tb_products a
                    INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
                    WHERE b.idcategory = :idcategory)", [
                "idcategory" => $this->getidcategory()
            ]);
        }
    }

    public function getProductsPage($page = 1, $itemsPerPage = 3)
    {
        $start = ($page-1) * $itemsPerPage;

        $sql = new Sql();
        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS * FROM TB_PRODUCTS A INNER JOIN TB_PRODUCTSCATEGORIES B ON A.IDPRODUCT = B.IDPRODUCT
                                INNER JOIN TB_CATEGORIES C ON C.IDCATEGORY = B.IDCATEGORY WHERE C.IDCATEGORY = :idcategory LIMIT $start, $itemsPerPage;", [
                                    "idcategory" => $this->getidcategory()
        ]);

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            "data" => Product::checkList($results),
            "total" => (int)$resultTotal[0]['nrtotal'],
            "pages" => ceil((int)$resultTotal[0]['nrtotal'] / $itemsPerPage)
        ];
    }

    public function addProduct(Product $product)
    {
        $sql = new Sql();
        $sql->query("INSERT INTO tb_productscategories (idcategory, idproduct) VALUES (:idcategory, :idproduct)",[
            ":idcategory" => $this->getidcategory(),
            ":idproduct" => $product->getidproduct()
        ]);
    }

    public function removeProduct(Product $product)
    {
        $sql = new Sql();
        $sql->query("DELETE FROM tb_productscategories WHERE idcategory = :idcategory AND idproduct = :idproduct",[
            ":idcategory" => $this->getidcategory(),
            ":idproduct" => $product->getidproduct()
        ]);
    }

}