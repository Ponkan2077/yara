<?php
    $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];
?>

<div class="asideWrapper">
        
    <div class="menuHome">
        <a href="/yara/TaskSystem/index.php">Menu</a>
    </div>
    <nav class="asideNav">
         <ul>
            <li class="dashboard"><a data-active="home" href="/yara/TaskSystem/index.php">DASHBOARD</a></li>
            <li class="reports"><a  data-active ="report"   href="/yara/TaskSystem/pages/report.php">REPORTS</a></li>
            <li class="settings"><a data-active = "setting" href="/yara/TaskSystem/pages/setting.php">SETTINGS</a></li>
            <li class="tasks"><a  data-active ="task" href="/yara/TaskSystem/pages/task.php">TASKS</a></li>
         </ul>
    </nav>
    <div class="logout">
        <button class="logoutBtn" type="submit" id="logOut">LogOut</button>
    </div>
    </div>