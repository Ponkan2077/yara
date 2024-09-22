<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/yara/TaskSystem/pages/database.php";
 include_once $path;

 class user {
    public $username = '';
    public $password = '';

    public $email = '';
    protected $db = '';

    function __construct(){
        $this->db = new database();
    }

    function login(){
        $sql  = "Select username, password from user where username = :username AND password = :password;";
    $query = $this->db->connect()->prepare($sql);
     
     $query->bindParam(':username', $this->username);
     $query->bindParam(':password', $this->password);
     $data = null;
    if($query->execute()){

       $count = $query->rowCount();
       if($count == 1){
        return true;
       }
    } else {
        return false;
    }

 }

    function signUp() {
        $sql = "Insert into user (username,email,password) values (:username, :password, :email);";
        
        $query = $this->db->connect()->prepare($sql);
         $query->bindParam(':username', $this->username);
         $query->bindParam(':password', $this->password);
         $query->bindParam(':email', $this->email);

        $query->execute();
    }
}
?>