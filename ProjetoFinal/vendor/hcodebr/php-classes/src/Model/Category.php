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

}