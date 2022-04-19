<?php

namespace Hcode\Model;

use Hcode\DB\Sql;
use Hcode\Model;
use Hcode\Model\Product;

class Cart extends Model
{

    const SESSION = "Cart";

    public static function getFromSession()
    {
        $cart = new Cart();

        if (isset($_SESSION[self::SESSION]) && (int)$_SESSION[self::SESSION]['idcart'] > 0)
        {
            $cart->get((int)$_SESSION[self::SESSION]['idcart']);
        }
        else
        {
            $cart->getFromSessionId();

            if (!(int)$cart->getidcart() > 0)
            {
                $data = [
                  'dessessionid' => session_id()
                ];

                if (User::checkLogin(false))
                {
                    $user = User::getFromSession();

                    $data['iduser'] = $user->getiduser();
                }

                $cart->setData($data);
                $cart->save();
                $cart->setToSession();
            }
        }

        return $cart;
    }

    public function setToSession()
    {
        $_SESSION[self::SESSION] = $this->getValues();
    }


    public function getFromSessionId()
    {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_carts WHERE dessessionid = :dessessionid", [
            ":dessessionid" => session_id()
        ]);

        if (count($results) > 0)
            $this->setData($results[0]);
    }

    public function get(int $idCart)
    {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_carts WHERE idcart = :idcart", [
            ":idcart" => $idCart
        ]);

        if (count($results) > 0)
            $this->setData($results[0]);
    }

    public function save()
    {
        $sql = new Sql();
        $results = $sql->select("CALL sp_carts_save(:pidcart, :pdessessionid, :piduser, :pdeszipcode, :pvlfreight, :pnrdays)", [
            ":pidcart" => $this->getidcart(),
            ":pdessessionid" => $this->getdessessionid(),
            ":piduser" => $this->getiduser(),
            ":pdeszipcode" => $this->getdeszipcode(),
            ":pvlfreight" => $this->getvlfreight(),
            ":pnrdays" => $this->getnrdays()
        ]);

        $this->setData($results[0]);
    }

}