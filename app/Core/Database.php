<?php
namespace Core;
use PDO;
class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        // $dsn="mysql:host=localhost;port=3307;dbname=myapp;charset=utf8mb4";
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($val, $params = [])
    {
        $this->statement = $this->connection->prepare($val);
        $this->statement->execute($params);
        return $this;
    }
    public function get(){
        return $this->statement->fetchAll();
    }
    public function find(){
        return $this->statement->fetch();
    }
    public function findOrFail(){
        $result=$this->find();
        if(!$result){
            abort();
        }
        return $result;
    }
}
?>