<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/yara/TaskSystem/pages/database.php";
 include_once $path;

 class user {
    public $username = '';
    public $password = '';

    public $email = '';

    public $is_admin = false;
    public $is_user = true;

    public $id;
    protected $db = '';

    function __construct(){
        $this->db = new database();
    }

    function login($username,$password){
        $sql  = "Select user_id,username, password from user where username = :username limit 1;";
    $query = $this->db->connect()->prepare($sql);
     
     $query->bindParam(':username', $username);
     if($query->execute()){
        $data  =  $query->fetch();
        if($data && password_verify($password,$data['password'])){
            return true;
        } 
       return true;
     }
     return false;
 }

    function signUp() {
        $sql = "Insert into user (username,email,password,is_admin,is_user) values (:username, :email, :password, :is_admin,:is_user);";
        
        $query = $this->db->connect()->prepare($sql);
         $query->bindParam(':username', $this->username);
         $hash = password_hash($this->password,PASSWORD_DEFAULT);
         $query->bindParam(':password', $hash);
         $query->bindParam(':email', $this->email);
         $query->bindParam(':is_admin', $this->is_admin);
        $query->bindParam(':is_user', $this->is_user);
        if($query->execute()){
            return true;
        }

       else {
        return false;
       }
    }

    function fetch($username){
         $sql = "Select * from user where username = :username limit 1;";

         $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':username', $username);
        $data = null;
        if($query->execute()){
           $data = $query->fetch();
        }
        return $data;
 
    }
}
