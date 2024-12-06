
<?php 
      $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];

      session_start();
      include_once $path .='/yara/TaskSystem/pages/classes/task.class.php';
      $path = $pathSave;

if(isset($_SESSION['account'])){
    if(!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))){
        header('location: login.php');
    }
}

else {
    header('location: login.php');
}
$taskObj = new task($_SESSION['account']['user_id']);

$taskId = $taskTitle = "";

$taskIdErr = $taskTitleErr = "";

$task_array = "";
$task_array = $taskObj->getTask();
if ($_SERVER['REQUEST_METHOD'] == "GET"){
   $taskId = $_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
     
    $taskId = $_POST['task_id'];
    $taskTitle = $_POST['task_title'];

    if(isset($taskId)){
        $taskIdErr = "Task Id needed!";
    }

    if (isset($taskTitle)){
        $taskTitleErr = "Task title needed needed!";
    }

    if(isset($_POST['is_done'])){
        $is_done = $_POST['is_done'];

        if(empty($is_done)){
         $is_doneErr = "Is empty";
        }
 
        if(empty($is_doneErr && empty($taskIdErr) && empty($taskTitle))){
           $taskObj->is_done = true;

           if($taskObj->is_done($_SESSION['account']['user_id'],$taskId, $task_Title )){
            header('location: task.php');
           }

           else {
            echo "Something went wrong";
           }
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
<aside>
        <?php 
        $path .= "/yara/TaskSystem/pages/includes/aside.php";
        include_once($path);
        $path = $pathSave;
        ?> 
        </aside>
    <main>
            <div class="viewTaskModal">
                 <div id="loginLogo">
                <span>TaskSystem</span>
                 </div>
                  <?php foreach($task_array as $arr){ 
                    if($arr['task_id'] == $taskId){?>
                  <div class="taskTitleWrap">
                      <h2 class="title">Title:</h2>
                      <p><?php echo $arr['title']?></p>
                  </div>.
                  <div class="descriptionWrap">
                      <h2>Description:</h2>
                      <p><?php echo $arr['description']?></p>
                  </div>
                  <div class="dueDateWrap">
                     <h2>Due Date: </h2>
                     <p><?php echo $arr['due_date']?></p>
                  </div>
                  <form action="" method="POST">
                  <input type="hidden" name="task_id" value="<?php echo $taskId?>">
                  <input type="hidden" name="task_title" value="<?php echo $arr['title']?>">
                  <?php } }?>
                  <div class="formBtnWrapper"><input type="submit" name="is_done" class="reusableBtn" value ="Done" id="btnFormR"></div>
                  </form>

            </div>
        </main>
        <script type="text/javascript"  src="/yara/TaskSystem/assets/script/script.js"></script>
</body>
</html>