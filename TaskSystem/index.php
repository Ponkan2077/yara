<?php

session_start();
$path = $pathSave = $_SERVER['DOCUMENT_ROOT'];


if(isset($_SESSION['account'])){
    if(!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))){
        header('location: ./pages/login.php');
    }
    else {
        header('location: ./pages/login.php');
    }
} 

$var = 100;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c0056d4561.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <section class="dashMainSection">
       <div class="dashMainTopWrapper">
            <article class="dashLeftWrapper">
                <div class="dashTaskWrapper">
                <div class="labelTaskGraph">
                <span>Tasks</span>
                <div class="taskGraphWrapper">
                    <canvas id="taskGraph"></canvas>
                </div>
                </div>
                <div class="dashLeftBottomWrapper">
                <div class="dashDeadlines">
                <span>Upcoming Deadlines</span>
                <div class="dashDead"></div>
                </div>
                <div class="dashRecent">
                <span>Recent Activities</span>
                <div class="dashAct"></div>
                </div>
                </div>
                </div>
            </article>
            <article class="dashRightWrapper">
                <div class="dashTopRightWrapper">
                     <div class="dashPieGraph">
                        <span>Task Distribution by Category</span>
                        <div class="dashPieWrapper">
                        <canvas class="dashPie" id="dashPie"></canvas>
                        </div>
                     </div>
                     <div class="dashBarGraph">
                        <span>Task Completion Overtime</span>
                        <div class="dashBarWrapper">
                        <canvas id="dashBar"></canvas>
                        </div>
                        
                     </div>
                </div>
                <div class="dashBottomRightWrapper">
                    <div class="dashLeaderboard">
                        <span>Leaderboard</span>
                        <div class="leaderboardWrapper"></div>
                    </div>
                </div>
             </article>
       </div>
       </section>
    </main>
    <aside>
    <?php 
        $path .= "/yara/TaskSystem/pages/includes/aside.php";
        include_once($path);
        $path = $pathSave;
        ?> 
    </aside>
</div>
<script type="text/javascript"  src="./assets/script/script.js"></script>
<script>
    const ctx = document.getElementById('dashBar');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Day 1', 'Day 2', 'Day 3'],
    datasets: [{
      label: '# hours',
      data: [12, 30,90],
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
  }
});

    const task = document.getElementById('taskGraph');

new Chart(task, {
  type: 'doughnut',
  data: {
    labels: ['Completed Task', 'Pending Task', 'Overdue Task'],
    datasets: [{
      label: '# of Task',
      data: [<?php echo $var ?>, 30,90],
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
  }
});

const taskCategory = document.getElementById('dashPie');

new Chart(taskCategory, {
  type: 'polarArea',
  data: {
    labels: ['Category 1', 'Category 2', 'Category 3'],
    datasets: [{
      label: '# of Task',
      data: [12, 30,90],
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
  }
});
</script>
</body>
</html>