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

$count_task = $taskObj->countCompleteTask($user_id);

$complete = isset($count_task['completed']) ? $count_task['completed'] : 0;
$incomplete = isset($count_task['incompleted']) ? $count_task['incompleted'] : 0;
$overdue = isset($count_task['overDueTask']) ? $count_task['overDueTask'] : 0;
$total= isset($count_task['total']) ? $count_task['total'] : 0;


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
    <link rel="stylesheet" type="text/css" href="/yara/TaskSystem/assets/generalStyle.css">

    <title>Document</title>
</head>
<body id="home">
<aside>
        <?php 
        $path .= "/yara/TaskSystem/pages/includes/admin.aside.php";
        include_once($path);
        $path = $pathSave;
        ?>
    
    </aside>
    <main class="dashboardPage">
        <section class="dashSect1">
            <div class="dashboardInfo">
                <div>
                    <img src="/yara/TaskSystem/assets/icons/task2.svg" alt=""><span>Task Completed</span>
                </div>
                <div>
                    <span><?php echo "$complete"?></span>
                </div>
            </div>
            <div class="dashboardInfo">
                <div>
                    <img src="/yara/TaskSystem/assets/icons/task2.svg" alt=""><span>Total Task</span>
                </div>
                <div>
                    <span><?php echo "$total"?></span>
                </div>
            </div>
            <div class="dashboardInfo">
                <div>
                    <img src="/yara/TaskSystem/assets/icons/task2.svg" alt=""><span>Pending Task</span>
                </div>
                <div>
                    <span><?php echo "$incomplete"?></span>
                </div>
            </div>
            <div class="dashboardInfo">
                <div>
                        <img src="/yara/TaskSystem/assets/icons/task2.svg" alt=""><span>Overdue task</span>
                </div>
                <div>
                    <span><?php echo "$overdue"?></span>
                </div>
            </div>
        </section>
        <section>
            <div class="dashGraph">
                <span>Task Distribution by Category</span>
                <div class="dashGraphWrap">
                        <canvas class="dashPie" id="dashPie"></canvas>
                </div>
            </div>
        </section>
        <section class="dashSect3">
            <div class="dashSect3Box">
                <span>Recent Activities</span>
                <?php foreach($recentActivities as $arr){?>
                <div class="dashSect3Info">
                    <span><?php echo $arr['action']?></span>
                    <span><?php echo $arr['title']?></span>
                    <span><?php echo $arr['updated_at']?></span>
                </div>
                <?php }?>
            </div>
            
            <div class="dashSect3Box">
                <span>Upcoming Deadlines</span>
                <?php foreach($upcomingDeadline as $arr){?>
                <div class="dashSect3Info">
                    <span><?php echo $arr['title']?></span>
                    <span><?php echo $arr['due_date']?></span>
                </div>
                <?php }?>
            </div>
             
        </section>
    </main>

<script type="text/javascript"  src="./assets/script/script.js"></script>
<script type="text/javascript"  src="../../assets/script/chartColor.js"></script>
<script>
    const ctx = document.getElementById('dashBar');

var data = <?php echo "$json" ?> ;

var data1 = <?php echo json_encode($categoryTask); ?>;

console.log(data1);

console.log(data);

const taskCategory = document.getElementById('dashPie');

console.log('category');

const taskData = {
    labels: data.map(row=>row.category_name),
    datasets: [{
        label: 'Number Of Task',
        data: data.map(row=>row.numTask),
        borderWidth: 1,
        backgroundColor: chartColors
    }]
}


new Chart(taskCategory, {
  type: 'polarArea',
  data: taskData,
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        r: {
            grid: {
                    color: '#0000000', // Change gridline color
                    lineWidth: 2, // Set the thickness of gridlines
                    borderDash: [5, 5], // Dashed gridlines (dashes and gaps of 5px)
                    circular: true, // Make gridlines circular (default for polarArea)
                },
                angleLines: {
                    color: '#FF5722', // Change radial gridlines (angle lines) color
                    lineWidth: 1, // Set radial gridline width
                },
                ticks: {
                    display: false,
                    backdropColor: 'rgba(0,0,0,0)', // Remove the tick label backdrop
                    color: '#212121', // Tick label color
                    beginAtZero: true
                }
            }
        }
    }
});

</script>
</body>
</html>