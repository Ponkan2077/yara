<?php
session_start();
$path = $pathSave = $_SERVER['DOCUMENT_ROOT'];
include_once $path .='/yara/TaskSystem/pages/classes/task.class.php';
$path = $pathSave;
include_once $path .='/yara/TaskSystem/pages/classes/admin.class.php';
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
$adminObj = new admin($_SESSION['account']['username'], $_SESSION['account']['user_id']);

$count_task = $taskObj->countCompleteTask($user_id);

$complete = isset($count_task['completed']) ? $count_task['completed'] : 0;
$incomplete = isset($count_task['incompleted']) ? $count_task['incompleted'] : 0;
$overdue = isset($count_task['overDueTask']) ? $count_task['overDueTask'] : 0;
$total= isset($count_task['total']) ? $count_task['total'] : 0;

$userData = $adminObj->getUsers();

$totalUsers = isset($userData['totalUsers']) ? $userData['totalUsers'] : 0;
$newUsers = isset($userData['newUsers']) ? $userData['newUsers'] : 0;
$activeUsers = isset($userData['activeUsers']) ? $userData['activeUsers'] : 0;
$inactiveUsers = isset($userData['inactiveUsers']) ? $userData['inactiveUsers'] : 0;
$male = isset($userData['male']) ? $userData['male'] : 0;
$female = isset($userData['female']) ? $userData['female'] : 0;
$other = isset($userData['other']) ? $userData['other'] : 0;


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
<body id="home" class="adminDash">
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
                    <img src="/yara/TaskSystem/assets/icons/task2.svg" alt=""><span>Total Users</span>
                </div>
                <div>
                    <span><?php echo "$totalUsers"?></span>
                </div>
            </div>
            <div class="dashboardInfo">
                <div>
                    <img src="/yara/TaskSystem/assets/icons/task2.svg" alt=""><span>New Users</span>
                </div>
                <div>
                    <span><?php echo "$newUsers"?></span>
                </div>
            </div>
            <div class="dashboardInfo">
                <div>
                    <img src="/yara/TaskSystem/assets/icons/task2.svg" alt=""><span>Active Users</span>
                </div>
                <div>
                    <span><?php echo "$activeUsers"?></span>
                </div>
            </div>
            <div class="dashboardInfo">
                <div>
                        <img src="/yara/TaskSystem/assets/icons/task2.svg" alt=""><span>Inactive Users</span>
                </div>
                <div>
                    <span><?php echo "$inactiveUsers"?></span>
                </div>
            </div>
        </section>
        <section class="sectionChart">
            <div class="dashGraph" id="lineChartWrapper">
                <span>User Distribution</span>
                <div class="dashGraphWrap">
                        <canvas class="dashPie" id="lineChart"></canvas>
                </div>
            </div>

            <div class="dashGraph" id="barChartWrapper">
                <span>Gender Distribution</span>
                <div class="dashGraphWrap">
                        <canvas class="dashPie" id="barChart"></canvas>
                </div>
            </div>
        </section>
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
const userDistribution = document.getElementById('lineChart');
const genderDistribution = document.getElementById('barChart');

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

const userData = {
    labels: ['Total Users', 'New Users', 'Active Users', 'Inactive Users'],
    datasets: [{
        label: 'Number of Users',
        data: ['<?php echo $totalUsers ?>', '<?php echo $newUsers ?>', '<?php echo $activeUsers ?>', '<?php echo $inactiveUsers ?>'],
        fill: true,
        backgroundColor: '#5463FF4C',
        borderColor: '#5463FF',
        pointBackgroundColor: '#5463FF'
    }]
}

const userGenderData = {
    labels: ['Male', 'Female', 'other'],
    datasets: [{
        label: 'Number of Users',
        data: ['<?php echo $male ?>', '<?php echo $female ?>', '<?php echo $other ?>'],
        backgroundColor: chartColors
    }]
}


new Chart(lineChart, {
    type: 'line',
    data: userData,
    options: {
    responsive: true,
    maintainAspectRatio: false,
    }
});

new Chart(barChart, {
    type: 'bar',
    data: userGenderData,
    options: {
    responsive: true,
    maintainAspectRatio: false,
    }
});

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