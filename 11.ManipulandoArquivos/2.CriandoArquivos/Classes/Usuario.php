<?php

class Usuario
{
    private $idUsuario;
    private $login;
    private $senha;
    private $dtCadastro;

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login): void
    {
        $this->login = $login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha): void
    {
        $this->senha = $senha;
    }

    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro($dtCadastro): void
    {
        $this->dtCadastro = $dtCadastro;
    }

    public function loadById($id)
    {
        $sql = new SQL();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", [":ID" => $id]);

        if (count($result) > 0){
            $this->setData($result[0]);
        }
    }

    public static function getList()
    {
        $sql = new SQL();
       return $sql->select("SELECT * FROM tb_usuarios ORDER BY IDUSUARIO");

    }

    public static function search($login)
    {
        $sql = new SQL();
        return $sql->select("SELECT * FROM tb_usuarios WHERE login LIKE :SEARCH ORDER BY login", [":SEARCH" => "%".$login."%"]);
    }

    public function login($login, $senha)
    {
        $sql = new SQL();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE login = :LOGIN AND senha = :SENHA", [":LOGIN" => $login, ":SENHA" => $senha]);

        if (count($result) > 0){
            $this->setData($result[0]);

        } else {
            throw new Exception("Login e/ou senha inválidos.");
        }
    }

    public function setData($data){
        $this->setIdUsuario($data['idUsuario']);
        $this->setLogin($data['login']);
        $this->setSenha($data['senha']);
        $this->setDtCadastro(new DateTime($data['dtcadastro']));
    }

    public function insert(){
        $sql = new SQL();
        $results = $sql->select("CALL SP_Usuarios_Insert(:LOGIN, :PASSWORD)", [":LOGIN" => $this->getLogin(), "PASSWORD" => $this->getSenha()]);

        if (count($results) > 0){
            $this->setData($results[0]);
        }

    }

    public function update($login, $password)
    {
        $this->setLogin($login);
        $this->setSenha($password);

        $sql = new SQL();
        $sql->query("UPDATE tb_usuarios SET login = :LOGIN, senha = :SENHA WHERE idusuario = :ID", [
            ":ID" => $this->getIdUsuario(),
            ":LOGIN" => $this->getLogin(),
            ":SENHA" => $this->getSenha()
        ]);
    }

    public function delete()
    {
        $sql = new SQL();
        $sql->query("DELETE FROM TB_USUARIOS WHERE IDUSUARIO = :ID", [":ID" => $this->getIdUsuario()]);

        $this->setIdUsuario(0);
        $this->setLogin("");
        $this->setSenha("");
        $this->setDtCadastro(new DateTime());

    }

    public function __construct($login = "", $senha = "")
    {
        $this->setLogin($login);
        $this->setSenha($senha);
    }

    public function __toString()
    {
        return json_encode([
            "idUsuario" => $this->getIdUsuario(),
            "login" => $this->getLogin(),
            "senha" => $this->getSenha(),
            "dtCadastro" => $this->getDtCadastro()->format("d/m/Y H:i:s")
        ]);
    }

}