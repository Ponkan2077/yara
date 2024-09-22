<?php 
class database{
    private $host = 'localhost:8080';
    private $username = 'root';
    private $password = '';
    private $dbname = 'tasksystem';

    protected $connection;

    function connect (){
        $this->connection = new PDO("mysql:host =$this->host;dbname=$this->dbname", $this->username, $this->password);
        return $this->connection;
    }
}

