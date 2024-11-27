<?php
session_start();
$path = $pathSave = $_SERVER['DOCUMENT_ROOT'];
include_once $path .='/yara/TaskSystem/pages/classes/task.class.php';
$path = $pathSave;

$user_id = '';
if(isset($_SESSION['account'])){
    if(!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))){
        header('location: ./pages/login.php');
    }
    $user_id = $_SESSION['account']['user_id'];
}

else {
    header('location: ./pages/login.php');
}

$taskObj = new task();

$leaderboard = $taskObj->leaderboard();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/yara/TaskSystem/assets/generalStyle.css">
    <title>Document</title>
</head>
<body id="leaderboard">
<aside>
    <?php 
        $path .= "/yara/TaskSystem/pages/includes/admin.aside.php";
        include_once($path);
        $path = $pathSave;
    ?>
</aside>
<main>
<section>
    <div class="dashLeaderboard">
        <span>Leaderboard</span>
            <div class="leaderboardWrapper">
                <div class="userWrapper">
                    <div class="userInfo"></div>
                    <div class="userInfo">Rank</div>
                    <div class="userInfo">Username</div>
                    <div class="userInfo">Number Of Tasks Done</div>
                    <div class="userInfo">Number of Tasks Done Today</div>
                    <div class="userInfo">Account Created At</div>
                </div>
                <?php $count = 0; foreach($leaderboard as $arr) { ?>
                <div class="userWrapper">
                    <div class="userInfo1"> <img src="<?php echo $_SESSION['account']['img_path']?>" class="profileImg-sm"></div>
                    <div class="userInfo1"><?php echo $count += 1?></div>
                    <div class="userInfo1"><?php echo $arr['username'] ?></div>
                    <div class="userInfo1"><?php echo $arr['NumTaskComplete'] ?></div>
                    <div class="userInfo1"><?php echo $arr['created_at'] ?></div>
                     <div class="userInfo1"></div>
                </div>
                <?php } ?>
            </div>
    </div>
</section>
</main>
<script type="text/javascript"  src="./assets/script/script.js"></script>
</body>
</html>