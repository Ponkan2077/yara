<?php 
      $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];

      session_start();

      include_once $path .='/yara/TaskSystem/pages/classes/report.class.php';
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

    $reportObj = new report($_SESSION['account']['username'], $_SESSION['account']['user_id']);

    $reportData = $reportObj -> getReport();

    $reportTitle = $description = '';

    $reportTitleErr = $descriptionErr = '';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $reportTitle = $_POST['title'];
        $description = $_POST['description'];

        if(!isset($reportTitle)){
            $reportTitleErr = 'Report Title required';
        }

        if(!isset($description)){
            $descriptionErr = 'Description required';
        }

        if(empty($reportTitleErr) && empty($descriptionErr)){
            $reportObj->reportTitle = $reportTitle;
            $reportObj->description = $description;

            if($reportObj->report()){
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }

            else {
                echo "Something went wrong!";
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
<body id="report">
<aside>
    <?php 
        $path .= "/yara/TaskSystem/pages/includes/aside.php";
        include_once($path);
        $path = $pathSave;
        ?> 
    </aside>
    <main>
    <div class="modalWrapper" id="modalWrapper">
        <div class="categoryModal" id="reportModal">
        <span class="close">&times;</span>
            <div class="logo">
               <span>TaskSystem</span>
           </div>
            <form class="formModal" action="" method="POST">
                <label for="title">Report Title:</label>
                <input type="text" name="title" class="field">
                <label for="description">Description:</label>
                <textarea name="description" id="" class="field" rows="9"></textarea>
                <div class="formBtnWrapper"><input type="submit" class="redBtn" id="submitReportBtn" value="Submit Report"></div>
            </form>
            
        </div>
        
        </div>
        <div class="main" id="settingMain">
            <table class="reportTable">
                <thead>
                    <tr aria-rowspan="2">
                        <td>Title</td>
                        <td>Id</td>
                        <td>Description</td>
                        <td>Status</td>
                        <td>Date</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reportData as $arr){?>
                        <tr>
                            <td><?php echo $arr['report_title'] ?></td>
                            <td><?php echo $arr['report_id'] ?></td>
                            <td><?php echo $arr['description'] ?></td>
                            <td><?php echo $arr['status'] ?></td>
                            <td><?php echo $arr['generated_at'] ?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            <div class="reportBtnWrapper"><button type="button" class="reusableBtn" id="reportBtn">Report Problem</button></div>
        </div>
    </main>
    <script type="text/javascript"  src="/yara/TaskSystem/assets/script/script.js"></script>
    <script>
        var addreportBtn = document.getElementById("reportBtn");
        var submitBtn = document.getElementById("submitReportBtn");
        var close = document.getElementsByClassName("close")[0];
        var modal = document.getElementById("modalWrapper");
        close.addEventListener("click", () => {
          modal.style.display = "none";
        })


        window.onclick = function(event) {
            if (event.target == modal || event.target == viewModal){
            modal.style.display = "none";
        }}
       

        addreportBtn.addEventListener("click", () => {
            modal.style.display = "block";
                } )
        submitBtn.addEventListener("click", () => {
            modal.style.display = "none";
        })
    </script>
</body>
</html>