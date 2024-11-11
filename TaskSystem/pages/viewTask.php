
<?php 
      $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];

      session_start();
      include_once $path .='/yara/TaskSystem/pages/classes/task.class.php';
      $path = $pathSave;

if(isset($_SESSION['account'])){
    if(!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))){
        header('location: login.php');
    }
    else {
        header('location: login.php');
    }
}
$taskObj = new task();

$taskId = "";
$task_array = "";
$task_array = $taskObj->getTask();
if ($_SERVER['REQUEST_METHOD'] == "GET"){
   $taskId = $_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
     
    $taskId = $_POST['task_id'];
    if(isset($_POST['is_done'])){
        $is_done = $_POST['is_done'];

        if(empty($is_done)){
         $is_doneErr = "Is empty";
        }
 
        if(empty($is_doneErr)){
           $taskObj->is_done = true;

           if($taskObj->is_done($taskId)){
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
    <div class="gridWrapper">
    <header>
    <?php 
         $path .= "/yara/TaskSystem/pages/includes/header.html";
            include_once($path);
         $path = $pathSave;
        ?>
    </header>
    <main>
            <div class="viewTaskModal">
                 <span class="close1">&times;</span>
                 <div class="logo">
               <span>Logo</span>
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
                  <?php } }?>
                  <div class="formBtnWrapper"><input type="submit" name="is_done" class="btnFormR" value ="Done" id="btnFormR"></div>
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