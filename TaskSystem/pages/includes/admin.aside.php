<?php
    $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];
?>

<div class="asideWrapper">     
    <div class="menuHome">
        <a href="/yara/TaskSystem/index.php">TaskSytem</a>
    </div>
    <nav class="asideNav">
         <ul>
            <li class="dashboard"><a data-active="home" href="/yara/TaskSystem/pages/admin/index.php"><img src="/yara/TaskSystem/assets/icons/dashboard.svg">Dashboard</a></li>
            <li class="users"><a  data-active ="users"   href="/yara/TaskSystem/pages/admin/pages/users.php"><img src="/yara/TaskSystem/assets/icons/users.svg">Users</a></li>
            <li class="reports"><a  data-active ="report"   href="/yara/TaskSystem/pages/admin/pages/report.php"><img src="/yara/TaskSystem/assets/icons/report.svg">Reports</a></li>
            <li class="setting"><a data-active = "setting" href="/yara/TaskSystem/pages/admin/pages/setting.php"><img src="/yara/TaskSystem/assets/icons/setting.svg">Settings</a></li>
            <li class="task"><a  data-active ="task" href="/yara/TaskSystem/pages/admin/pages/task.php"><img src="/yara/TaskSystem/assets/icons/task.svg">Tasks</a></li>
            <li class="task"><a  data-active ="leaderboard" href="/yara/TaskSystem/pages/admin/pages/leaderboard.php"><img src="/yara/TaskSystem/assets/icons/crown.svg">Leaderboard</a></li>
            <li><button class="logoutBtn" type="submit" id="logOut"><img src="/yara/TaskSystem/assets/icons/logout.svg">Logout</button></li>
         </ul>
    </nav>
</div>