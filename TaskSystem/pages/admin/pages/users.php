<?php 
      $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];

      session_start();


      if(isset($_SESSION['account'])){
        if(!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))){
            header('location: ./pages/login.php');
        }
        $user_id = $_SESSION['account']['user_id'];
    } 
    else {
        header('location: ./pages/login.php');
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
        $path .= "/yara/TaskSystem/pages/includes/admin.aside.php";
        include_once($path);
        $path = $pathSave;
        ?> 
    </aside>
    <main>
        <div class="main" id="settingMain">
            <table class="reportTable">
                <thead>
                    <tr aria-rowspan="2">
                        <td>Username</td>
                        <td>Id</td>
                        <td>Email</td>
                        <td>Gender</td>
                        <td>Status</td>
                        <td>Date</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td>Username</td>
                        <td>Id</td>
                        <td>Email</td>
                        <td>Gender</td>
                        <td>Status</td>
                        <td>Date</td>
                        <td>Action</td>
                    </tr>
                </tbody>
            </table>
           <!-- <div class="reportBtnWrapper"><button type="button" class="reusableBtn" id="reportBtn">Report Problem</button></div> -->
        </div>
    </main>
    <script type="text/javascript"  src="/yara/TaskSystem/assets/script/script.js"></script>
</body>
</html>