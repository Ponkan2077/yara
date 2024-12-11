
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

$taskId = $taskTitle = $taskDueDate = $taskDescription = "";

$taskIdErr = $taskTitleErr = $taskDescriptionErr = $taskDueDateErr = "";

$taskAction = "";

$taskActionErr = "";

$task_array = "";
$task_array = $taskObj->getTask();
if ($_SERVER['REQUEST_METHOD'] == "GET"){
   $taskId = $_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
     
    $taskId = $_POST['task_id'];
    $taskTitle = $_POST['task_title'];
    $taskDueDate = $_POST['due_date'];
    $taskAction = $_POST['submitAction'];
    $taskDescription = $_POST['task_description'];

    if(empty($taskId)){
        $taskIdErr = "Task Id needed!";
    }

    if (empty($taskTitle)){
        $taskTitleErr = "Task title needed!";
    }

    if (empty($taskDueDate)){
        $taskDueDateErr = "Task Due Date needed!";
    }

    if (empty($taskDescription)){
        $taskDueDateErr = "Task Description needed!";
    }

        if($taskAction === "Delete"){
            if(empty($taskIdErr) && empty($taskTitleErr)){
     
                if($taskObj->deleteTask($_SESSION['account']['user_id'],$taskId, $taskTitle )){
                 header('location: task.php');
                 exit;
                }
                else {
                    error_log("Something went wrong!");
                }
             }
           }

        if($taskAction === "Edit"){
            if(empty($taskIdErr) && empty($taskTitleErr) && empty($taskDueDateErr) && empty($taskDescriptionErr)){
                
                if($taskObj->editTask($_SESSION['account']['user_id'],$taskId, $taskTitle, $taskDescription, $taskDueDate )){
                 header('location: task.php');
                 exit;
                }
     
                else {
                    error_log("Something went wrong!");
                }
             }
           }

       if($taskAction === "Done"){

        if(empty($taskIdErr) && empty($taskTitleErr)){
 
            if($taskObj->is_done($_SESSION['account']['user_id'],$taskId, $taskTitle )){
             header('location: task.php');
             exit;
            }
            else {
                error_log("Something went wrong!");
            }
         }
       } else {
        error_log("Something went wrong!");
       }
     }else {
        error_log("Something went wrong!");
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
        $path .= "/yara/TaskSystem/pages/includes/admin.aside.php";
        include_once($path);
        $path = $pathSave;
        ?> 
        </aside>
        <main>
    <div class="viewTaskModal" id="viewMainTask">
        <div id="loginLogo">
            <span>TaskSystem</span>
        </div>
        <?php foreach ($task_array as $arr) { 
            if ($arr['task_id'] == $taskId) { ?>
                <form action="" method="POST" id="viewTaskForm">
                <div class="taskTitle">
               <label for="title">Title:</label>
            <input type="text" name="task_title"  class="field" value="<?php  echo $arr['title'] ?>">
            </div>
            <div class="taskDescription">
            <label for="description">Description:</label>
            <textarea name="task_description" rows="10" cols="10" class="field" value = "<?php  echo $arr['description'] ?>"><?php  echo $arr['description'] ?></textarea>
            </div>
            <div class="taskDueDate">
            <label for="due_date">Due date:</label>
            <input type="datetime-local" name="due_date" class="field" value="<?php  echo $arr['due_date'] ?>">
            <input type="hidden" value="<?php echo $taskId?>" name="task_id">
            </div>

                    <div class="formBtnWrapper" id="viewBtnWrapper">
                        <input type="submit" name="submitAction" class="redBtn" value="Delete" id="btnFormR">
                        <input type="submit" name="submitAction" class="greenBtn" value="Done" id="btnFormR">
                        <input type="submit" name="submitAction" class="reusableBtn" value="Edit" id="btnFormR">
                    </div>
                </form>
            <?php }
        } ?>
    </div>
</main>

        <script type="text/javascript"  src="/yara/TaskSystem/assets/script/script.js"></script>
</body>
</html>