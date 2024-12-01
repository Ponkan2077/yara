<?php 
$path =  $_SERVER['DOCUMENT_ROOT'];
$path .= "/yara/TaskSystem/pages/classes/user.class.php";
include_once $path;
class report extends user {
    public $username;
    public $user_id;

    public $description;

    public $reportTitle;

   function __construct($username, $user_id){
       parent::__construct();
       $this->username = $username;
       $this->user_id = $user_id;
   }

   function report(){
    $sql = "Insert into report (user_id, description, report_title) values (:user_id, :description, :reportTitle);";

    $query = $this->db->connect()->prepare($sql);

    $query->bindParam(":user_id", $this->user_id);
    $query->bindParam(":description", $this->description);
    $query->bindParam(":reportTitle", $this->reportTitle);

    if($query->execute()){
        return true;
    }

    return false;

   }

   function getReport(){
    $sql = "Select * from report where user_id = :user_id;";

    $query = $this->db->connect()->prepare($sql);

    $query->bindParam(":user_id", $this->user_id);

    $data = null;
    if($query->execute()){
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }


    return false;
   }
}