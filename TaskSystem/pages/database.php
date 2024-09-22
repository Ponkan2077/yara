<?php   
   class database {
    private $user = '';
    private $pass = '';
    private $host = 'localhost:8080'; // change mo nur yung localhost kasi port 8080 sa akin port 80 lang yung sayo
    
    private $dbname = 'tasksystem';
    protected $connection;

    function connect(){
        
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user, $this->pass);
            return $this->connection;
    }
   }
?>