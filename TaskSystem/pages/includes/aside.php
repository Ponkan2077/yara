<?php
    $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];
?>

<div class="asideWrapper">     
    <div class="menuHome">
        <a href="/yara/TaskSystem/index.php">TaskSytem</a>
    </div>
    <nav class="asideNav">
         <ul>
            <li class="dashboard"><a data-active="home" href="/yara/TaskSystem/index.php"><img src="/yara/TaskSystem/assets/icons/dashboard.svg">dashboard</a></li>
            <li class="reports"><a  data-active ="report"   href="/yara/TaskSystem/pages/report.php"><img src="/yara/TaskSystem/assets/icons/report.svg">Reports</a></li>
            <li class="setting"><a data-active = "setting" href="/yara/TaskSystem/pages/setting.php"><img src="/yara/TaskSystem/assets/icons/setting.svg">Settings</a></li>
            <li class="task"><a  data-active ="task" href="/yara/TaskSystem/pages/task.php"><img src="/yara/TaskSystem/assets/icons/task.svg">Tasks</a></li>
            <li class="task"><a  data-active ="leaderboard" href="/yara/TaskSystem/pages/leaderboard.php"><img src="/yara/TaskSystem/assets/icons/crown.svg">Leaderboard</a></li>
            <li><button class="logoutBtn" type="submit" id="logOut"><img src="/yara/TaskSystem/assets/icons/logout.svg">Logout</button></li>
         </ul>
    </nav>
</div>