<?php 
$path = $pathSave = $_SERVER['DOCUMENT_ROOT'];

session_start();
include_once $path . '/yara/TaskSystem/pages/classes/admin.class.php';
$path = $pathSave;

if (isset($_SESSION['account'])) {
    if (!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))) {
        header('location: ./pages/login.php');
    }
    $user_id = $_SESSION['account']['user_id'];
} else {
    header('location: ./pages/login.php');
}

$adminObj = new admin($_SESSION['account']['username'], $_SESSION['account']['user_id']);

$user_id = '';
$user_idErr = '';

$keyword ='';

$userData = [];

  if ($_SERVER['REQUEST_METHOD'] == "GET"){

    $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
    
    $userData = $adminObj->getUsersData($keyword);
  }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['userId'];

    if (!isset($user_id)) {
        $user_idErr = 'User id is not set!';
    }

    if (empty($user_idErr)) {
        if ($adminObj->banUser($user_id)) {
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
                <p>Are you sure you want to ban this user?</p>
                <input type="number" name="userId" id="user_id" hidden>
                <div class="formBtnWrapper" id="btnModalWrap">
                    <input type="submit" class="redBtnSubmit" id="submitBanBtn" value="Yes">
                    <button type="button" class="greenBtn" id="noBanBtn">No</button>
                </div>
            </form>
        </div>
    </div>
    <div class="main" id="settingMain">
    <div class = "field" id="searchWrapper">
        <form action="" method="GET">
            <button type = "submit" class = "searchBtn"><i class="fa-solid fa-magnifying-glass fs-nav"></i></button>
                <input type = "text"
                        placeholder = "Search..."
                        name = "keyword"
                        class = "" id="searchField" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" >
                </form>
        </div>
        <table class="reportTable">
            <thead>
                <tr aria-rowspan="2">
                    <td>Username</td>
                    <td>Id</td>
                    <td>Email</td>
                    <td>Gender</td>
                    <td>Date</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userData as $arr) { ?>
                    <tr>
                        <td><?php echo $arr['username']?></td>
                        <td><?php echo $arr['user_id']?></td>
                        <td><?php echo $arr['email']?></td>
                        <td><?php echo $arr['gender']?></td>
                        <td><?php echo $arr['created_at']?></td>
                        <td><?php echo $arr['status']?></td>
                        <td><button type="button" class="redBtnValue" value="<?php echo $arr['user_id']?>" id="banUserBtn_<?php echo $arr['user_id']; ?>">Ban</button></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</main>
<script type="text/javascript" src="/yara/TaskSystem/assets/script/script.js"></script>
<script>
    // Get all the ban buttons
    const banUserBtns = document.querySelectorAll(".redBtnValue");

    banUserBtns.forEach(function(button) {
        button.addEventListener("click", function() {
            const userId = this.value; // Get the user ID from the button's value
            document.getElementById("user_id").value = userId; // Set the user ID in the hidden input field
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
