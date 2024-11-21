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
$total = '';
$count_task = $taskObj->countCompleteTask($user_id);
if (!$count_task == 0){
    $complete = $count_task['completed'];
    $incomplete = $count_task['incompleted'];
    $overdue = $count_task['overDueTask'];
    $total = $count_task['total'];
}else {
    $complete = 0;
    $incomplete = 0;
    $overdue = 0;
    $total = 0;
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
<aside>
        <?php 
        $path .= "/yara/TaskSystem/pages/includes/aside.php";
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
<script>
    const ctx = document.getElementById('dashBar');

var data = <?php echo "$json" ?> ;

var data1 = <?php echo json_encode($categoryTask); ?>;

console.log(data1);

console.log(data);

const taskCategory = document.getElementById('dashPie');

console.log('category');

new Chart(taskCategory, {
  type: 'polarArea',
  data: {
    labels: [
    'Red',
    'Blue',
    'Yellow'
  ],//data.map(row => row.category_name),
    datasets: [{
      label: '# of Task',
      data: [300, 50, 100] //data.map(row => row.numTask),
      borderWidth: 2,
      borderColor: '#5463FF',
      backgroundColor: ['#FF0000', '#0000FF', '#FFFF00'], // Colors for each segment
      borderColor: ['#8B0000', '#00008B', '#FFD700'],
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      r: {
        beginAtZero: true // Adjusting the radius scale for polar charts
      }
    },
    layout: {
      padding: 20 // Optional: adjust padding around the chart area
    },
    plugins: {
      legend: {
        position: 'top',
      },
    }
  },
  plugins: [{
    beforeDraw: function(chart) {
      const ctx = chart.ctx;
      const chartArea = chart.chartArea;

      // Set background color for the chart area (behind the chart data)
      ctx.save();
      ctx.fillStyle = '#FFFFFF'; // Background color
      ctx.fillRect(chartArea.left, chartArea.top, chartArea.width, chartArea.height); // Fill chart area
      ctx.restore();
    }
  }]
});

</script>
</body>
</html>