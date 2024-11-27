<?php 
      $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];

      session_start();
      include_once $path .='/yara/TaskSystem/pages/classes/task.class.php';
      $path = $pathSave;

      if(isset($_SESSION['account'])){
        if(!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))){
            header('location: ./pages/login.php');
        }
        $user_id = $_SESSION['account']['user_id'];
    } 
    else {
        header('location: ./pages/login.php');
    }
  //header('Location:'.$_SERVER['PHP_SELF']);
  $taskObj = new task();
  $category_id = "";
  $category_name = "";
  $category = "";
  $categoryErr = "";
  $is_done = $is_doneErr =  "";
  $category_array = "";

  $categorySearch = $Keyword ='';

  $task_array = "";

  $category_array = $taskObj->getCategory($user_id);

  $task_array = $taskObj->getTask($user_id);

 if ($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['category'])){
    $category = $_POST['category'];
    
    if (empty($category)){
       $categoryErr = "Empty Category";
    }

    if($taskObj->check($category)){
        
    }

    if (empty($categoryErr)){
        if($taskObj->addCategory($category, $user_id));
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
<aside>
    <?php 
        $path .= "/yara/TaskSystem/pages/includes/admin.aside.php";
        include_once($path);
        $path = $pathSave;
        ?> 
</aside>
    <main>
        <div class="main">
            <div class="taskCategory">
                <div>
                    <span>Category</span>
                    <nav>
                        <ul class="categoryLink">
                           <li><a href="#">Work</a></li>
                           <li><a href="#">School</a></li>
                        </ul>
                    </nav>
                </div>
                <button type="button" class="reusableBtn">Add Category</button>
            </div>
            <div class="taskDiv2">
                <div class="taskWrap">
                    <div>
                        <span>Title: </span>
                        <button type="button" class="taskView">View</button>
                    </div>
                    <span>Date: </span>
                    <div class="incomplete"><span>Incomplete</span></div>
                </div>
                
            </div>
            <div class="addTaskBtnWrapper"> <button type="button" class="reusableBtn" id="addTaskBtn">Add Task</button></div>
        </div>
    </main>
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