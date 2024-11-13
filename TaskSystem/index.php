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

$complete = '';
$incomplete ='';
$overdue = '';
$count_task = $taskObj->countCompleteTask($user_id);
if (!$count_task == 0){
    $complete = $count_task['completed'];
    $incomplete = $count_task['incompleted'];
    $overdue = $count_task['overDueTask'];
}else {
    $complete = 0;
    $incomplete = 0;
    $overdue = 0;
}


$categoryTask = $taskObj->countCategory($user_id);
$json = json_encode($categoryTask);


$upcomingDeadline = $taskObj->upcomingDeadlines($user_id);

$recentActivities = $taskObj->recentActivities($user_id);

$leaderboard = $taskObj->leaderboard();



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
                <div class="dashDead">
                <?php foreach ($upcomingDeadline as $arr) { ?>
                   <div class="dashDeadChild">
                    <div class="DeadTop">
                    <span><?php echo $arr['title'] ?></span>
                    <span><?php echo $arr['due_date'] ?></span>
                    </div>
                   </div>
                   <?php } ?>
                </div>
                </div>
                <div class="dashRecent">
                <span>Recent Activities</span>
                <div class="dashAct">
                <?php foreach ($recentActivities as $arrs) { ?>
                   <div class="dashActChild">
                   <div class="DeadTop">
                    <span><?php echo $arrs['title'] ?></span>
                    <span><?php echo $arrs['updated_at'] ?></span>
                    </div>
                    <span> <span><?php echo $arrs['action'] ?> </span>
                   </div>
                   <?php } ?>
                </div>
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
             </article>
       </div>
       <div class="dashBottomRightWrapper">
                    <div class="dashLeaderboard">
                        <span>Leaderboard</span>
                        <div class="leaderboardWrapper">
                        <div class="userWrapper">
                                <div class="userInfo">Rank</div>
                                <div class="userInfo">Username</div>
                                <div class="userInfo">Number Of Tasks Done</div>
                                <div class="userInfo">Number of Tasks Done Today</div>
                                <div class="userInfo">Account Created At</div>
                            </div>
                            <?php $count = 0; foreach($leaderboard as $arr) { ?>
                            <div class="userWrapper">
                                <div class="userInfo"><?php echo $count += 1?></div>
                                <div class="userInfo"><?php echo $arr['username'] ?></div>
                                <div class="userInfo"><?php echo $arr['NumTaskComplete'] ?></div>
                                <div class="userInfo"><?php echo $arr['created_at'] ?></div>
                                <div class="userInfo"></div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
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

var data = <?php echo "$json" ?> ;

var data1 = <?php echo json_encode($categoryTask); ?>;

console.log(data1);

console.log(data);
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: data.map(row => row.category_name),
    datasets: [{
      label: '# hours',
      data: data.map(row => row.numTask),
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
      data: [<?php echo $complete ?>, <?php echo $incomplete?>,<?php echo $overdue ?>],
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


console.log('category');
new Chart(taskCategory, {
  type: 'polarArea',
  data: {
    labels: data.map(row => row.category_name),
    datasets: [{
      label: '# of Task',
      data: data.map(row => row.numTask),
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