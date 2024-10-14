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
  $category_id = "";
  $category_name = "";
  $category = "";
  $categoryErr = "";

  $category_array = "";

  $task_array = "";

  $category_array = $taskObj->getCategory();

  foreach($category_array as $arr){
    $task_array = $taskObj->getTask($category_id['category_id']);
  }
    

 if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $category = $_POST['category'];
    
    if (empty($category)){
       $categoryErr = "Empty Category";
    }

    if (empty($categoryErr)){
        if($taskObj->addCategory($category));
    }

    else {
        echo $categoryErr;
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
        <div class="viewModal" id="viewModal">
            <div class="viewTaskModal">
                 <span class="close1">&times;</span>
                 <div class="logo">
               <span>Logo</span>
           </div>
                  <div class="taskTitleWrap">
                      <h2 class="title">Title:</h2>
                      <p>Hello</p>
                  </div>
                  <div class="descriptionWrap">
                      <h2>Description:</h2>
                      <p>Hello</p>
                  </div>
                  <div class="dueDateWrap">
                     <h2>Due Date: </h2>
                     <p>Hello</p>
                  </div>
                  <div class="formBtnWrapper"><button type="button" class="btnFormR" id="btnFormR">Done</button></div>

            </div>
        </div>
        
        <section class="taskMainSection">
        <div class="addCategory">
            <button type ="button" class="addCategoryBtn" id="addCategoryBtn">Add Category</button>
            <div class="categoryTask">
                <div class="tasks">
                <span><?php $category_name ?></span>
                <div class="taskHolder" id="taskHolder">
                <input type="checkbox" name="task">
                <label for="task">Task</label>
                </div>
                <div class="taskHolder" id="taskHolder">
                <input type="checkbox" name="task">
                <label for="task">Task</label>
                </div>
                </div>
                <div class="addTaskWrapper">
                    <button type="button" class="addTaskBtn"><a href="addtask.php">Add Task</a></button>
                </div>
            </div>
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

        var close1 = document.getElementsByClassName("close1")[0];
        var taskHolder = document.getElementById("taskHolder");
        var viewModal = document.getElementById("viewModal");

        close1.addEventListener("click", () => {
          viewModal.style.display = "none";
        })

        window.onclick = function(event) {
            if (event.target == viewModal){
            viewModal.style.display = "none";
        }}

        taskHolder.addEventListener("click", () => {
            viewModal.style.display = "block";
        })
    </script>
</body>
</html>