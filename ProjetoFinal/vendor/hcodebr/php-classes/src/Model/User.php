<?php

namespace Hcode\Model;

use Hcode\DB\Sql;
use Hcode\Model;

class User extends Model
{
    const SESSION = "User";

    public static function login($login, $password)
    {
        $sql =  new Sql();
        $results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", [
            ":LOGIN" => $login
        ]);


        if (count($results) === 0)
        {
            throw new \Exception("Usuario inexistente ou senha inválida.");
        }

        $data = $results[0];

        if (password_verify($password, $data["despassword"]))
        {
            $user = new User();

            $user->setData($data);

            $_SESSION[User::SESSION] = $user->getValues();

            return $user;
        }
        else
        {
            throw new \Exception("Usuario inexistente ou senha inválida.");
        }

    }

    public static function verifyLogin($inAdmin = true)
    {

        if (!isset($_SESSION[User::SESSION]) ||
            !$_SESSION[User::SESSION] ||
            !(int)$_SESSION[User::SESSION]["iduser"] > 0 ||
            (bool)$_SESSION[User::SESSION]["inadmin"] !== $inAdmin)
        {
            header("Location: /admin/login");
            exit;
        }
    }

    public static function logout()
    {
        session_unset($_SESSION[User::SESSION]);
    }

    public static function listAll()
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson");
    }

    public function save()
    {
        $sql = new Sql();
        $result = $sql->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", [
            ":desperson" => $this->getdesperson(),
            ":deslogin" => $this->getdeslogin(),
            ":despassword" => password_hash($this->getdespassword(),null),
            ":desemail" => $this->getdesemail(),
            ":nrphone" => $this->nrphone(),
            ":inadmin" => $this->getinadmin()
        ]);

        $this->setData($result[0]);
    }

    public function get($idUser)
    {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", [
            ":iduser" => $idUser
        ]);

        $this->setData($results[0]);
    }

    public function update()
    {
        $sql = new Sql();
        $result = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", [
            ":iduser" => $this->getiduser(),
            ":desperson" => $this->getdesperson(),
            ":deslogin" => $this->getdeslogin(),
            ":despassword" => password_hash($this->getdespassword(),null),
            ":desemail" => $this->getdesemail(),
            ":nrphone" => $this->nrphone(),
            ":inadmin" => $this->getinadmin()
        ]);

        $this->setData($result[0]);
    }

    public function delete()
    {
        $sql = new Sql();
        $sql->select("CALL sp_users_delete(:iduser)", [
           ":iduser" => $this->getiduser()
        ]);
    }

}