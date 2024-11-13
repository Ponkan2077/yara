<?php 
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

    $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];

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
<body id="setting">
<div class="gridWrapper">
    <header>
        <?php 
         $path .= "/yara/TaskSystem/pages/includes/header.php";
            include_once($path);
         $path = $pathSave;
        ?>
        </header>
    <main> 
        <div class="mainWrapper">
            <div class="settingWrapper">
            <div><img class="profile"></div>
            <div class="settingdiv1Wrapper">
            <div class ="settingdiv1">
                <div class="settingRight"><span>Rey</span></div>
                <div>Zamboanga City</div>
            </div>
            <button type="button" class="btnFormR">Edit Profile</button>
            </div>
            <div class ="settingdiv2">
                <div class="settingRight"><span>Age: 21</span></div>
                <div class="settingRight"><span>Gender: Male</span></div>
                <div><span>Status: Active*</span></div>
            </div>
            <div class="settingdiv3">
                <div>Email: albion123@gmail.com</div>
                <div>Contact: +639188196339</div>
            </div>
            </div>
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