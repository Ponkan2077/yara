<?php 
     $path = $_SERVER['DOCUMENT_ROOT'];
?>


<div class="asideWrapper">
        
    <div class="menuHome">
        <a href="#">Menu</a>
    </div>
    <nav class="asideNav">
         <ul>
            <li class="dashboard"><a data-active="home" href="#">DASHBOARD</a></li>
            <li class="reports"><a  data-active ="report"   href="">REPORTS</a></li>
            <li class="settings"><a data-active = "setting" href="./pages/setting.php">SETTINGS</a></li>
            <li class="tasks"><a  data-active ="task" href="./pages/task.html">TASKS</a></li>
         </ul>
    </nav>
    <div class="logout">
        <button class="logoutBtn" type="submit">Log Out</button>
    </div>
    </div>