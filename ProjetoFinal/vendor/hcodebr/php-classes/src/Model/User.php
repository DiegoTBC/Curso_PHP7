<?php

namespace Hcode\Model;

use Hcode\DB\Sql;
use Hcode\Mailer;
use Hcode\Model;

class User extends Model
{
    const SESSION = "User";
    const SECRET = "HcodePhp7_Secret";
    const SECRET_IV = "HcodePhp7_Secret_IV";
    const ERROR = "UserError";
    const ERROR_REGISTER = "UserErrorRegister";
    const SUCCESS = "UserSucesss";

    public static function getFromSession()
    {
        $user = new User();

        if (isset($_SESSION[self::SESSION]) && (int)$_SESSION[self::SESSION] > 0)
        {
            $user->setData($_SESSION[self::SESSION]);
        }

        return $user;
    }

    public static function checkLogin($inadmin = true)
    {
        if(!isset($_SESSION[User::SESSION]) ||
            !$_SESSION[User::SESSION] ||
            !(int)$_SESSION[User::SESSION]["iduser"] > 0)
        {
            //Não está logado
            return false;
        }
        else
        {
            if ($inadmin === true && (bool)$_SESSION[User::SESSION]["inadmin"] === true)
            {
                return true;
            }
            elseif ($inadmin === false)
            {
                return true;
            }
            else
            {
                return false;
            }

        }
    }

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

        if (self::checkLogin($inAdmin))
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

    public static function getForgot($email, $inadmin = true)
    {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_users b USING (idpersons) WHERE a.desemail = :email;" , [
            ":email" => $email
        ]);

        if (count($results) == 0)
        {
            throw new \Exception("Não foi possível recuperar a senha.");
        }
        else
        {
            $data = $results[0];

            $results2 = $sql->select("CALL sp_userspasswordsrecoveries_create(:iduser, :desip)", [
                ":iduser" => $results['iduser'],
                ":desip" => $_SERVER["REMOTE_ADDR"]
            ]);

            if (count($results2) == 0 )
            {
                throw new \Exception("Não foi possivel recuperar a senha");
            }
            else
            {
                $dataRecovery = $results2[0];

                $code = openssl_encrypt($dataRecovery['idrecovery'], 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_IV));

                $code = base64_encode($code);

                if ($inadmin === true) {

                    $link = "http://localhost:8000/admin/forgot/reset?code=$code";

                } else {

                    $link = "http://localhost:8000/forgot/reset?code=$code";

                }

                $mailer = new Mailer($data['desemail'], $data['desperson'], "Redefinir senha da Hcode Store", "forgot", array(
                    "name"=>$data['desperson'],
                    "link"=>$link
                ));

                $mailer->send();

                return $link;
            }
        }

    }

    public static function validForgotDecrypt($code)
    {
        $code = base64_decode($code);

        $idrecovery = openssl_decrypt($code, 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_IV));

        $sql = new Sql();

        $results = $sql->select("
			SELECT *
			FROM tb_userspasswordsrecoveries a
			INNER JOIN tb_users b USING(iduser)
			INNER JOIN tb_persons c USING(idperson)
			WHERE
				a.idrecovery = :idrecovery
				AND
				a.dtrecovery IS NULL
				AND
				DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();
		", array(
            ":idrecovery"=>$idrecovery
        ));

        if (count($results) === 0)
        {
            throw new \Exception("Não foi possível recuperar a senha.");
        }
        else
        {

            return $results[0];

        }
    }

    public static function setForgotUsed($idRecovery)
    {
        $sql = new Sql();
        $sql->query("UPDATE tb_userspasswordsrecoveries SET dtrecovery = NOW() WHERE idrecovery = :idrecovery", [
            ":idrecovery" => $idRecovery
        ]);

    }

    public function setPassword($password)
    {
        $sql = new Sql();
        $sql->query("UPDATE tb_users SET despassword = :password WHERE iduser = :iduser", [
            ":password" => $password,
            ":iduser" => $this->getIdUser()
        ]);
    }
}