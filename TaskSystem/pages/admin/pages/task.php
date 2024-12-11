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
  $taskObj = new task($_SESSION['account']['user_id']);
  $category_id = "";
  $category_name = "";
  $category = "";
  $categoryErr = "";
  $is_done = $is_doneErr =  "";
  $category_array = [];

  $task_array = "";

  $keyword ='';

  if ($_SERVER['REQUEST_METHOD'] == "GET"){

    $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

    $category = isset($_GET['category']) ? trim($_GET['category']) : 'category';

    if($category === "category"){
        $category_array = $taskObj->getCategory($user_id, $keyword);
        $task_array = $taskObj->getTask();
    }
    
    if($category === "task" ){
        if(!empty($task_array = $taskObj->getTask($keyword))){
            $category_array = $taskObj->getCategory($user_id);
            $task_array = $taskObj->getTask($keyword);
        }   
    }


  }

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
    <div class="modalWrapper" id="modalWrapper">
        <div class="categoryModal" id="categoryModal">
        <span class="close">&times;</span>
        <div class="logo">
               <span>TaskSystem</span>
           </div>
            <form class="formModal" action="" method="POST" id="categoryForm">
                <label for="category">Category Name:</label>
                <input type="text" name="category" class="field">
                <div class="formBtnWrapper" id="categoryModalBtnWrapper"><input type="submit" class="reusableBtn" id="submitCategory" value="Add Category"></div>
            </form>
            
        </div>
        
        </div>
        <div class="main">
        <div class = "field" id="searchWrapper">
        <form action="" method="GET">
            <button type = "submit" class = "searchBtn"><i class="fa-solid fa-magnifying-glass fs-nav"></i></button>
                <input type = "text"
                        placeholder = "Search..."
                        name = "keyword"
                        class = "" id="searchField" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" >
                        <select name="category" id="category">
                            <option value="category" <?php echo (isset($_GET['category']) && $_GET['category'] == 'category') ? 'selected' : ''; ?>>Category</option>
                            <option value="task" <?php echo (isset($_GET['category']) && $_GET['category'] == 'task') ? 'selected' : ''; ?>>Task</option>
                        </select>
                </form>
        </div>
            <div class="taskCategory">
                <div>
                    <span>Category</span>
                </div>
                <button type="button" class="reusableBtn" id="addCategoryBtn">Add Category</button>
            </div>
            <?php foreach ($category_array as $arr) {?>
            <span><?php echo $arr['name'] ?></span>
            <div class="taskDiv2">
            <?php foreach ($task_array as $arr2) {?>
                <div class="taskWrap">
                    <div>
                        <span>Title: <?php echo $arr2['title']?></span>
                        <button type="button"><a href="viewTask.php?id=<?php echo $arr2['task_id'] ?>" class="taskView" >View</a></button>
                    </div>
                    <span>Due Date: <?php echo $arr2['due_date'] ?> </span>
                    <div class=" <?php echo $arr2['status'] ?> "><span><?php echo $arr2['status'] ?></span></div>
                </div>
                <?php } ?>
            </div>
            <div class="addTaskBtnWrapper"> <button type="button" class="reusableBtn" id="addTaskBtn"><a href="addtask.php?id=<?php echo $arr['category_id'] ?>">Add Task</a></button></div>
            <?php } ?>
        </div>
    </main>
    <script type="text/javascript"  src="/yara/TaskSystem/assets/script/script.js"></script>
    <script>
        var addTaskBtn = document.getElementById('addTaskBtn');

        addTaskBtn.addEventListener("click", ()=>{
            window.location.href = 'addTask.php';
        });

        var addCategoryBtn = document.getElementById("addCategoryBtn");
        var close = document.getElementsByClassName("close")[0];
        var categoryBtn = document.getElementById("categoryModal");
        var submitBtn = document.getElementById('submitCategory');
        var modal = document.getElementById("modalWrapper");

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

        close.addEventListener("click", () => {
            modal.style.display = "none";
        })
        
    </script>
</body>
</html>