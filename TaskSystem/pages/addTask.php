<?php
     
     $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];
     $path .= '/yara/TaskSystem/pages/classes/task.class.php';
     include_once ($path);
     $path = $pathSave;

     session_start();
     $path = $pathSave;

     if(isset($_SESSION['account'])){
         if(!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))){
             header('location: ./pages/login.php');
         }
         else {
             header('location: ./pages/login.php');
         }
     } 

     $taskObj = new task();

     $title  = $description = $due_date = '';

     $titleErr  = $descriptionErr = $due_dateErr = '';
     
    if($_SERVER['REQUEST_METHOD'] == "POST"){
       $title = $_POST['title'];
       $description = $_POST['description'];
       $due_date = $_POST['due_date'];

       if(empty($title)){
          $titleErr = "There should be a title";
       }

       if (empty($description)){
        $descriptionErr = "There should be a description";
       }

       if (empty($due_date)){
        $due_dateErr = "There should be a due date";
       }

       if(empty($titleErr) && empty($descriptionErr) && empty($due_dateErr)){
         $taskObj->user_id = $_SESSION['user']['user_id'];
         $taskObj->title = $title;
         $taskObj->description = $description;
         $taskObj->due_date = $due_date;

         if($taskObj->addTask());
         else{
            echo "Something went wrong";
         }
       }
    }

     
     
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/yara/TaskSystem/assets/generalStyle.css">
    <script src="https://kit.fontawesome.com/c0056d4561.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body id="task">
    <div class="gridWrapper">
    <header>
    <?php 
         $path .= "/yara/TaskSystem/pages/includes/header.html";
            include_once($path);
         $path = $pathSave;
        ?>
    </header>
    <main>
        <div class="formWrapper">
        <div class="logo">
        <span>Logo</span>
    </div>
        <form class="addTaskForm" action="" method="POST">
            <div class="taskTitle">
            <label for="title">Title:</label>
            <input type="text" name="title"  class="field" value="<?php $title?>">
            </div>
            <div class="taskDescription">
            <label for="description">Description:</label>
            <textarea name="description" rows="10" cols="10" class="field"></textarea>
            </div>
            <div class="taskDueDate">
            <label for="due_date">Due date:</label>
            <input type="date" name="due_date" class="field">
            </div>
            <div class="formBtnWrapper"><input type="submit" class="btnFormR" value="Add Task"></div>
        </form>
        </div>
    </main>
    <aside>
    <?php 
        $path .= "/yara/TaskSystem/pages/includes/aside.php";
        include_once($path);
        $path = $pathSave;
        ?> 
    </aside>
    </div>
    <script type="text/javascript"  src="/yara/TaskSystem/assets/script/script.js"></script>
</body>
</html>