<?php 
$path =  $_SERVER['DOCUMENT_ROOT'];
$path .= "/yara/TaskSystem/pages/classes/user.class.php";
include_once $path;

date_default_timezone_set("Asia/Manila");
class admin extends user {
    public $username;
    public $user_id;

    public $description;

    public $reportTitle;

    public $date;

   function __construct($username, $user_id){
       parent::__construct();
       $this->username = $username;
       $this->user_id = $user_id;
       $this->date = new DateTime('now');
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
    $sql = "Select r.*, u.username as username from report as r inner join user as u on r.user_id = u.user_id;";

    $query = $this->db->connect()->prepare($sql);

    $data = null;
    if($query->execute()){
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    return false;
   }

   function getUsers(){
    $sql = "SELECT 
    COUNT(user_id) AS totalUsers,
    (SELECT COUNT(user_id) FROM user WHERE created_at BETWEEN :weekAgo AND :date) AS newUsers,
    (SELECT COUNT(user_id) FROM user WHERE loggedin_at BETWEEN :weekAgo AND :date) AS activeUsers,
    (SELECT COUNT(user_id) FROM user WHERE loggedin_at < :weekAgo) AS inactiveUsers
FROM user;
";

    $query = $this->db->connect()->prepare($sql);

    $date = new DateTime('now');

    $dateClone = clone $date;

    $date = $this->date->format('Y-m-d H:i:s');

    $weekAgo = $dateClone->modify('-1week'); 

    $weekAgo = $this->date->format('Y-m-d H:i:s');

    $data = null;

    $query->bindParam(':weekAgo', $weekAgo);

    $query->bindParam(':date', $date);

    if($query->execute()){
        $data =  $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    return false;
   }

   function banUser($user_id){
    $sql = "Update user set is_banned = 1 where user_id = :user_id;";

    $query = $this->db->connect()->prepare($sql);

    $query->bindParam(':user_id', $user_id);

    if($query->execute()){
        return true;
    }

    return false;
   }
}