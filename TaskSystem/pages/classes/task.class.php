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
        $sql = $sql . "Update task set updated_at = :date where task_id = :task_id;";
        
        $sql = $sql . "Update task set action = :action where task_id = :task_id;";

        $date = new DateTime('now');
        $date = $this->date->format('Y-m-d H:i:s');

        $action = "Add Task";

        $query = $this->db->connect()->prepare($sql);

        $query->bindParam(':user_id', $this->user_id);

        $query->bindParam(':title', $this->title);

        $query->bindParam(':description', $this->description);

        $query->bindParam(':due_date', $this->due_date);

        $query->bindParam(':category_id',$this->category_id);

        $query->bindParam(':is_completed', $this->is_completed);

        $query->bindParam(':date', $date);

        $query->bindParam(':action', $action);

        if($query->execute()){
            return true;
        }

        return false;
     }

     function showAll($keyword ='', $category='') {
        $sql = "Select * from task  where user_id = :id";

        $query = $this->db->connect()->prepare($sql);
        $data = null;
        if($query->execute()){
            $data = $query->fetchAll();

            return $data;
        }

        return false;
     }

     function addCategory($category, $user_id){
        $sql = "INSERT INTO category (name, user_id) VALUES (:category, :user_id);";

        $sql = $sql . "Update category set updated_at = :date where name = :category;";
        
        //$sql = $sql . "Update category set action = :action where name = :category;";

        $action = "Add Category";

        $date = new DateTime('now');

        $date = $this->date->format('Y-m-d H:i:s');

        $query = $this->db->connect()->prepare($sql);

        $query->bindParam('category', $category);

        $query->bindParam(":date", $date);

        $query->bindParam(":user_id", $user_id);

        //$query->bindParam(':action', $action);

        if($query->execute()){
            return true;
        }

        return false;
     }

     function getCategory($user_id){
       // $sql = "Select c.name from task as k  inner join category as c on k.category_id = c.category_id where c.user_id = :user_id; ";

       $sql = "Select * from category where user_id = :user_id;";

        $query = $this->db->connect()->prepare($sql);
         
        $query->bindParam(":user_id", $user_id);
        $data = null;
        if ($query->execute()){
            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        }

        return false;

     }

     function getTask($user_id){
        $sql = "Select task_id, title, due_date, description, category_id, user_id from task where user_id = :user_id;";
        $query = $this->db->connect()->prepare($sql);
        $data = null;

        $query->bindParam(":user_id", $user_id);
       
            if ($query->execute()){
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
    
                return $data;
            }

            return false;
        }

     function is_done($task_id){
        $sql = "UPDATE task set is_completed = 1 where task_id = :task_id;";

        $sql = $sql . "Update task set updated_at = :date where task_id = :task_id;";
        
        $sql = $sql . "Update task set action = :action where task_id = :task_id;";

        $date = new DateTime('now');

        $date = $this->date->format('Y-m-d H:i:s');

        $action = "Done Task";

        $query = $this->db->connect()->prepare($sql);


        $query->bindParam(':date', $date);
        $query->bindParam(':task_id', $task_id);
        $query->bindParam(":action", $action);
        if($query->execute()){
            return true;
        }

        return false;
     }

     function countCompleteTask($user_id){
        $sql = "Select (Select count(is_completed) from task where is_completed = 1 and user_id = :user_id) As completed, (Select count(is_completed) from task where is_completed = 0 and :date < due_date and user_id = :user_id) As incompleted, (Select count(task_id) from task where :date > due_date and is_completed = 0 and user_id = :user_id) As overDueTask, (Select count(task_id) from task where user_id = :user_id) As total from task where :user_id = user_id;";

        $query = $this->db->connect()->prepare($sql);
        
        $date = new DateTime('now');
        $date = $this->date->format('Y-m-d H:i:s');
        //$currentDate = strtotime($date); 

        $query->bindParam(':date', $date);
        $query->bindParam(":user_id", $user_id);
        $data = 0;

        if($query->execute()){
            $data = $query->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        
        return $data;
     }

     function countCategory($user_id){
        $sql = "Select c.name As category_name, count(task_id) As numTask from task  t inner  join category as c on t.category_id = c.category_id where :user_id = t.user_id group by category_name;";
         
        $query = $this->db->connect()->prepare($sql);
        
        $query->bindParam(":user_id", $user_id);
        $data = null;

        if($query->execute()){
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        
        return false;

     }

     function check($keyword){
     $sql = "Select name from category where name = :name;";

     $query = $this->db->connect()->prepare($sql);
     
     $query->bindParam(':name', $keyword);

     $rowCount = null;

        if($query->execute()){
            $rowCount = $query->rowCount();
            
            if($rowCount >= 1){
                return false;
            }
        }
        
        return true;

         }

         function upcomingDeadlines($user_id){
            $sql = "Select title, due_date from task where due_date > :date and :user_id = user_id order by due_date - created_at ASC LIMIT 3; ";

            $date = new DateTime('now');
            $date = $this->date->format('Y-m-d H:i:s');

            $query = $this->db->connect()->prepare($sql);

            $query->bindParam(':date', $date);

            $query->bindParam(":user_id", $user_id);

            $data = null;

            if($query->execute()){
                $data = $query->fetchAll(PDO::FETCH_ASSOC);

                return $data;
            }

            return false;

         }

         function recentActivities($user_id) {
            $sql = "Select updated_at, action, title from task where :user_id = user_id order by updated_at  DESC LIMIT 3;";
            
            $query = $this->db->connect()->prepare($sql);

            $query->bindParam(":user_id", $user_id);
            
            $data = null;

            if($query->execute()){
                $data = $query->fetchAll(PDO::FETCH_ASSOC);

                return $data;
            }

            return false;
         }

         function leaderboard(){
            $sql = "Select u.username as username, u.created_at, (Select count(is_completed) from task where is_completed = 1) as NumTaskComplete from task t inner join user u on t.user_id = u.user_id group by u.username order by NumTaskComplete DESC limit 5;";

            $query = $this->db->connect()->prepare($sql);

            $data = null;

            if($query->execute()){
               $data =  $query->fetchAll(PDO::FETCH_ASSOC);
               return $data;
            }

            return false;
         }
 }