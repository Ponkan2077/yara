<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/yara/TaskSystem/pages/database.php";
 include_once $path;

 class user {

    public $user_id = '';
    public $username = '';
    public $password = '';

    public $email = '';

    public $address = '';

    public $gender = '';

    public $contact = '';

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

     $date = new DateTime('now');
     $date = $this->date->format('Y-m-d H:i:s');
     if($query->execute()){
        $data  =  $query->fetch();
        if($data && password_verify($password,$data['password'])){
            $sql .= "Update user set loggedin_at = :date where username = :username";

            $query->bindParam(":date", $data);

            if($query->execute()){
                return true;
            }
        } 
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
        $sql = "Select i.image_path as img_path, u.user_id as user_id, u.username as username, u.email as email, u.is_admin as is_admin, u.is_user as is_user, u.address as address, u.gender as gender, u.contact as contact, u.age as age from user u inner join image i on u.user_id = i.user_id where u.username = :username limit 1;";
       
        $query = $this->db->connect()->prepare($sql);
       $query->bindParam(':username', $username);
       $data = null;

       $imgPth = null;
       if($query->execute()){
          $data = $query->fetch(PDO::FETCH_ASSOC);
          return $data;

       }
       return false;
    }

    function edit($imgPth){
        $sql = "Update user SET username = :username, email = :email, address = :address, gender = :gender, contact = :contact where user_id = :user_id; ";

        $query = $this->db->connect()->prepare($sql);

        $query->bindParam(':username', $this->username);

        $query->bindParam(':email', $this->email);

        $query->bindParam(':address', $this->address);

        $query->bindParam(':gender', $this->gender);

        $query->bindParam(':contact', $this->contact);

        $query->bindParam(":user_id", $this->user_id);

        if ($query->execute()){
            $this->UploadImg($imgPth);
            return true;
        }

        return false;
    }

    function UploadImg($img_path){
        $sqlCheckImage = "SELECT * FROM image WHERE role = :role and user_id = :user_id;";
        $role = "profile";
        $queryCheckImage = $this->db->connect()->prepare($sqlCheckImage);
        $queryCheckImage->bindParam(':user_id', $this->user_id);

        $queryCheckImage->bindParam(":role", $role);

        $existingImage= null;


        if($queryCheckImage->execute()){
            $existingImage = $queryCheckImage->fetch(PDO::FETCH_ASSOC);
        }

        if ($existingImage) {
            $sqlUpdateImage = "
                UPDATE image 
                SET image_path = :image_path 
                WHERE role = :role and user_id = :user_id;
            ";

            $queryUpdateImage = $this->db->connect()->prepare($sqlUpdateImage);
            $queryUpdateImage->bindParam(':image_path', $img_path);
            $queryUpdateImage->bindParam(':user_id', $this->user_id);
            $queryUpdateImage->bindParam(":role", $role);

            if($queryUpdateImage->execute()){
                return true;
            }
    }
       $sqlInsertImage = "Insert into image (image_path, role, user_id) values (:image_path, :role, :user_id);";

       $queryInsertImage = $this->db->connect()->prepare($sqlInsertImage);

       $queryInsertImage->bindParam(":image_path", $imgPath);

       $queryInsertImage->bindParam(":user_id", $this->user_id);

       $queryInsertImage->bindParam(":role", $role);

       if($queryInsertImage->execute()){
        return true;
       }

       return false;
    }

    function getImg ($user_id){
        $sql = "Select image_path from image where user_id = :user_id and role = :role Limit 1;";
       
        $query = $this->db->connect()->prepare($sql);

        $role = 'profile';

        $data = null;

        $query->bindParam(":role", $role);

        $query->bindParam(":user_id", $user_id);

        if($query->execute()){
            $data = $query->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        return false;
    }
}