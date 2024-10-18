<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/yara/TaskSystem/pages/database.php";
 include_once $path;

 date_default_timezone_set("Asia/Manila");
 $date = new DateTime('now');
 $currentDate = $date->format('Y-m-d H:i:s');

 class task {
     private $date;
     public $user_id = '';
     public $category_id = '';
     public $name = '';
     public $title = '';
     public $description = '';
     public $due_date = '';

     protected $db;

     public $is_completed = false;


     function __construct() {
        $this->db = new database();
        $this->date = new DateTime('now');
     }

     function addTask() {
        $sql = "INSERT INTO task (user_id, title, description, due_date, category_id, is_completed) VALUES (:user_id, :title, :description, :due_date, :category_id, :is_completed);";
        $query = $this->db->connect()->prepare($sql);

        $query->bindParam(':user_id', $this->user_id);

        $query->bindParam(':title', $this->title);

        $query->bindParam(':description', $this->description);

        $query->bindParam(':due_date', $this->due_date);

        $query->bindParam(':category_id',$this->category_id);

        $query->bindParam(':is_completed', $this->is_completed);

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

     function addCategory($category){
        $sql = "INSERT INTO category (name) VALUES (:category);";

        $query = $this->db->connect()->prepare($sql);

        $query->bindParam('category', $category);

        if($query->execute()){
            return true;
        }

        return false;
     }

     function getCategory(){
        $sql = "Select * from category;";

        $query = $this->db->connect()->prepare($sql);

        $data = null;
        if ($query->execute()){
            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        }

        return false;

     }

     function getTask(){
        $sql = "Select task_id, title, due_date, description, category_id from task;";
        $query = $this->db->connect()->prepare($sql);
        $data = null;
       
            if ($query->execute()){
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
    
                return $data;
            }

            return false;
        }

     function is_done($task_id){
        $sql = "UPDATE task set is_completed = 1 where task_id = :task_id;";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':task_id', $task_id);
        if($query->execute()){
            return true;
        }

        return false;
     }

     function countCompleteTask(){
        $sql = "Select (Select count(is_completed) from task where is_completed = 1) As completed, (Select count(is_completed) from task where is_completed = 0 and :date < completion_date) As incompleted, (Select count(task_id) from task where :date > completion_date and is_completed = 0) As overDueTask from task;";

        $query = $this->db->connect()->prepare($sql);

        $date = $this->date->format('Y-m-d H:i:s');
        //$currentDate = strtotime($date); 

        $query->bindParam(':date', $date);
        $data = null;

        if($query->execute()){
            $data = $query->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        
        return false;
     }

     function countCategory(){
        $sql = "";
     }
 }