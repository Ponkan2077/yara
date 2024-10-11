<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/yara/TaskSystem/pages/database.php";
 include_once $path;

 class task {
     public $user_id = '';
     public $category_id = '';
     public $name = '';
     public $title = '';
     public $description = '';
     public $due_date = '';

     protected $db='';

     function __construct() {
        $this->db = new database();
     }

     function addTask() {
        $sql = "INSERT INTO task (user_id, title, description, due_date) VALUES (:user_id, :title, :description, :due_date);";
        $query = $this->db->connect()->prepare($sql);

        $query->bindParam(':user_id', $this->user_id);
       //$query->bindParam(':category_id', $this->category_id);
        $query->bindParam(':title', $this->description);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':due_date', $this->due_date);
        
        if($query->execute()){
            return true;
        }

        return false;
     }

     function showAll($id) {
        $sql = "Select * from task where user_id = :id";

        $query = $this->db->connect()->prepare($sql);
        $data = null;
        if($query->execute()){
            $data = $query->fetchAll();

            return $data;
        }

        return false;
     }

     function addCategory(){
        $sql = "INSERT INTO category (name) VALUES (:name);";

        $query = $this->db->connect()->prepare($sql);

        $query->bindParam('name', $this->name);

        if($query->execute()){
            return true;
        }

        return false;
     }


 }