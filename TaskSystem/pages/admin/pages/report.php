<?php 
      $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];

      session_start();
      include_once $path .='/yara/TaskSystem/pages/classes/admin.class.php';
      $path = $pathSave;

      if(isset($_SESSION['account'])){
        if(!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))){
            header('location: ./pages/login.php');
        }
        $user_id = $_SESSION['account']['user_id'];
    } 
    else {
        header('location: ./pages/login.php');
    }

    $adminObj = new admin($_SESSION['account']['username'], $_SESSION['account']['user_id']);

    $reportData = $adminObj->getReport();

    $report_id = '';
    $report_idErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $report_id = $_POST['reportId'];

    if (!isset($report_id)) {
        $report_idErr = 'User id is not set!';
    }

    if (empty($report_idErr)) {
        if ($adminObj->reportDone($report_id)) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Something went Wrong";
        }
    }
}

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/yara/TaskSystem/assets/generalStyle.css">
    <script src="https://kit.fontawesome.com/c0056d4561.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body id="report">
<aside>
    <?php 
        $path .= "/yara/TaskSystem/pages/includes/admin.aside.php";
        include_once($path);
        $path = $pathSave;
        ?> 
    </aside>
    <main>
    <div class="modalWrapper" id="modalWrapper">
        <div class="categoryModal" id="userModal">
            <span class="close">&times;</span>
            <form class="formModal" action="" method="POST">
                <p>Are you sure you that this report is solved?</p>
                <input type="number" name="reportId" id="report_id" hidden>
                <div class="formBtnWrapper" id="reportModalBtn">
                    <input type="submit" class="redBtnSubmit" id="submitBanBtn" value="Yes">
                    <button type="button" class="greenBtn" id="noBanBtn">No</button>
                </div>
            </form>
        </div>
    </div>
        <div class="main" id="settingMain">
            <table class="reportTable">
                <thead>
                    <tr aria-rowspan="2">
                        <td>Title</td>
                        <td>Id</td>
                        <td>Username</td>
                        <td>Description</td>
                        <td>Status</td>
                        <td>Date</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reportData as $arr) {?>
                        <tr>
                            <td><?php echo $arr['report_title']?></td>
                            <td><?php echo $arr['report_id']?></td>
                            <td><?php echo $arr['username']?></td>
                            <td><?php echo $arr['description']?></td>
                            <td><?php echo $arr['status']?></td>
                            <td><?php echo $arr['generated_at']?></td>
                            <td><button class="greenBtnValue" type="button" value="<?php echo $arr['report_id']?>" id="banUserBtn_<?php echo $arr['report_id']; ?>" >Done</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
           <!-- <div class="reportBtnWrapper"><button type="button" class="reusableBtn" id="reportBtn">Report Problem</button></div> -->
        </div>
    </main>
    <script type="text/javascript"  src="/yara/TaskSystem/assets/script/script.js"></script>
    <script>
        const greenReportBtns = document.querySelectorAll(".greenBtnValue");

greenReportBtns.forEach(function(button) {
    button.addEventListener("click", function() {
        const reportId = this.value; // Get the user ID from the button's value
        document.getElementById("report_id").value = reportId; // Set the user ID in the hidden input field
        document.getElementById("modalWrapper").style.display = "block"; // Show the modal
    });
});

// Close the modal
document.querySelector(".close").addEventListener("click", function() {
    document.getElementById("modalWrapper").style.display = "none";
});

// Close the modal if clicked outside
window.onclick = function(event) {
    if (event.target == document.getElementById("modalWrapper")) {
        document.getElementById("modalWrapper").style.display = "none";
    }
};

const noBanBtn =document.getElementById("noBanBtn");

noBanBtn.addEventListener("click", ()=>{
    document.getElementById("modalWrapper").style.display = "none";
})
    </script>
</body>
</html>