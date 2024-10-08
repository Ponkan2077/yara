<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/yara/TaskSystem/';
session_start();


if(isset($_SESSION['account'])){
    if(!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))){
        header('location: ./pages/login.php');
    }
    else {
        header('location: ./pages/login.php');
    }
} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c0056d4561.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./assets/generalStyle.css">

    <title>Document</title>
</head>
<body id="home">
    <div class="gridWrapper">
    <header>
        <div class="head">
            <div class="left">
                <div class="logo">
                <span>Logo</span>
            </div>
            <div class = "search">
                <form class = "searchForm"> 
                <form>
                    <button type = "submit" class = "searchBtn"><i class="fa-solid fa-magnifying-glass fs-nav"></i></button>
                        <input type = "text"
                                placeholder = "Search..."
                                name = "search"
                                class = "searchField">
                        </form>
            </div>
            </div>
            <div class="right">
                <div class="bellIcon">
                    <button class="bellBtn" type="button"><i class="fa-regular fa-bell fa-2x1"></i></button>
                </div>
                <div class="userIcon">
                    <button class="userBtn" type="button"><i class="fa-regular fa-user fa-2x1"></i></button>
                </div>
            </div>
        </div>
    </header>
    <main>
       <div class="mainWrapper">
        <span></span>
       </div>
    </main>
    <aside>
        <div class="asideWrapper">
        
        <div class="menuHome">
            <a href="#">Menu</a>
        </div>
        <nav class="asideNav">
             <ul>
                <li class="dashboard"><a data-active="home" href="#">DASHBOARD</a></li>
                <li class="reports"><a  data-active ="report"   href="./pages/report.php">REPORTS</a></li>
                <li class="settings"><a data-active = "setting" href="./pages/setting.php">SETTINGS</a></li>
                <li class="tasks"><a  data-active ="task" href="./pages/task.php">TASKS</a></li>
             </ul>
        </nav>
        <div class="logout">
            <button class="logoutBtn" type="submit">Log Out</button>
        </div>
        </div>
    </aside>
</div>
<script type="text/javascript"  src="./assets/script/script.js"></script>
</body>
</html>