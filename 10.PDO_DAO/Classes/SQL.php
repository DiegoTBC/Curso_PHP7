<?php

class SQL extends PDO
{
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "17062018");
    }

    private function setParam($statement, $key, $value){
        $statement->bindParam($key, $value);
    }

    private function setParams($statement, $parameters = []){
        foreach ($parameters as $key => $value){
            $this->setParam($statement, $key, $value);
        }
    }

    public function query($rawQuery, $params = [])
    {
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();

        return $stmt;

    }

    public function select($rawQuery, $params = []): array
    {
        $stmt = $this->query($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}