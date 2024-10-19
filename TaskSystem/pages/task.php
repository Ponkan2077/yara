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
  //header('Location:'.$_SERVER['PHP_SELF']);
  $taskObj = new task();
  $category_id = "";
  $category_name = "";
  $category = "";
  $categoryErr = "";
  $is_done = $is_doneErr =  "";
  $category_array = "";

  $task_array = "";

  $category_array = $taskObj->getCategory();

  $task_array = $taskObj->getTask();

 if ($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['category'])){
    $category = $_POST['category'];
    
    if (empty($category)){
       $categoryErr = "Empty Category";
    }

    if($taskObj->check($category)){
        
    }

    if (empty($categoryErr)){
        if($taskObj->addCategory($category));
        header('Location:'.$_SERVER['PHP_SELF']);
        
    }

    else {
        echo $categoryErr;
    }
}
    if(isset($_POST['is_done'])){
       $is_done = $_POST['is_done'];

       if(empty($is_done)){
        $is_doneErr = "Is empty";
       }

       if(empty($is_doneErr)){

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
        <div class="modalWrapper" id="modalWrapper">
        <div class="categoryModal" id="categoryModal">
        <span class="close">&times;</span>
            <div class="logo">
               <span>Logo</span>
           </div>
            <form class="formModal" action="" method="POST">
                <label for="category">Category Name:</label>
                <input type="text" name="category" class="field">
                <div class="formBtnWrapper"><input type="submit" class="btnFormR" id="btnFormR" value="Add Category"></div>
            </form>
            
        </div>
        
        </div>
        <section class="taskMainSection">
        <button type ="button" class="addCategoryBtn" id="addCategoryBtn">Add Category</button>
        <div class="addCategory">
            <?php foreach($category_array as $arr){ ?>
            <div class="categoryTask">
                <div class="tasks">
                <span><?php echo $arr['name'] ?></span>
                <?php foreach($task_array as $arrs) {
                    if($arrs['category_id'] == $arr['category_id']){?>
                <div class="taskHolder">
                    <div class="taskTitleWrap">
                <input type="checkbox" name="task">
                <label for="task"><?php echo $arrs['title']?></label>
                </div>
                <button type="button" class="btnFormRR"><a href="viewTask.php?id=<?php echo $arrs['task_id']?>">View</a></button>
                    </div>
                <?php }}
                ?>
                </div>
                <div class="addTaskWrapper">
                    <button type="button" class="addTaskBtn"><a href="addtask.php?id=<?php echo $arr['category_id'] ?>">Add Task</a></button>
                </div>
            </div>
            <?php } 
            ?>
        </div>
        </section>
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
    <script>
        var addCategoryBtn = document.getElementById("addCategoryBtn");
        var submitBtn = document.getElementById("btnFormR");
        var close = document.getElementsByClassName("close")[0];
        var modal = document.getElementById("modalWrapper");
        close.addEventListener("click", () => {
          modal.style.display = "none";
        })


        window.onclick = function(event) {
            if (event.target == modal || event.target == viewModal){
            modal.style.display = "none";
        }}
       

        addCategoryBtn.addEventListener("click", () => {
            modal.style.display = "block";
                } )
        submitBtn.addEventListener("click", () => {
            modal.style.display = "none";
        })

       // var close1 = document.getElementsByClassName("close1")[0];
      //  var viewModal = document.getElementById("viewModal");

       // var taskHolder = document.querySelectorAll(".btnFormRR").forEach(function(el){
      //      el.addEventListener("click", () =>{
       //         viewModal.style.display = "block";
                
      //      })
       // });
//
       // close1.addEventListener("click", () => {
     //     viewModal.style.display = "none";
     //   })
        
        
   //     window.onclick = function(event) {
  //          if (event.target == viewModal){
   //         viewModal.style.display = "none";
   //     }}

    </script>
</body>
</html>