<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/yara/TaskSystem/pages/database.php";
 include_once $path;

 class user {
    public $username = '';
    public $password = '';

    public $email = '';

    public $id;
    protected $db = '';

    function __construct(){
        $this->db = new database();
    }

    function login(){
        $sql  = "Select user_id,username, password from user where username = :username AND password = :password; limit 1";
    $query = $this->db->connect()->prepare($sql);
     
     $query->bindParam(':username', $this->username);
     $query->bindParam(':password', $this->password);
     $data = null;
    if($query->execute()){

       $count = $query->rowCount();
       if($count == 1){
         $data = $query->fetch();
         $this->id = $data['user_id'];
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

        if($query->execute()){
            return true;
        }

       else {
        return false;
       }
    }

    function fetchId($username, $password) {
        $sql = "Select id from user where username = :username and password = :password;";
    }
}
?>