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

$user_id = $admin = $ban = $user = $user = '';
$user_idErr = '';

$keyword ='';

$userData = [];

  if ($_SERVER['REQUEST_METHOD'] == "GET"){

    $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
    
    $userData = $adminObj->getUsersData($keyword);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['userId'];
    $admin = isset($_POST['submitadminBtn']) ? $_POST['submitadminBtn'] : null;
    $ban = isset($_POST['submitBanBtn']) ? $_POST['submitBanBtn'] : null;
    $unban = isset($_POST['submitunbanBtn']) ? $_POST['submitunbanBtn'] : null;
    $user = isset($_POST['submituserBtn']) ? $_POST['submituserBtn'] : null;


    if (!isset($user_id)) {
        $user_idErr = 'User id is not set!';
    }

    if (empty($user_idErr)) {
        if ($admin) {
            if ($adminObj->changeRoleToAdmin($user_id)) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                echo "Something went wrong.";
            }
        }

        if ($ban) {
            if ($adminObj->banUser($user_id)) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                echo "Something went wrong.";
            }
        }

        if ($unban) {
            if ($adminObj->unbanUser($user_id)) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                echo "Something went wrong.";
            }
        }

        if ($user) {
            if ($adminObj->changeRoleTouser($user_id)) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                echo "Something went wrong.";
            }
        }
    }
    $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
    $userData = $adminObj->getUsersData($keyword);
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
            <form class="formModal" action="" method="POST">
                <p>Are you sure you want to ban this user?</p>
                <input type="number" name="userId" id="ban_user_id" hidden>
                <div class="formBtnWrapper" id="btnModalWrap">
                    <input type="submit" class="redBtnSubmit" id="submitBanBtn"  name="submitBanBtn" value="Yes">
                    <button type="button" class="greenBtn" id="noBanBtn">No</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modalWrapper1" id="modalWrapper1">
        <div class="categoryModal" id="userModal">
            <form class="formModal" action="" method="POST">
                <p>Are you sure you want to make this user an admin?</p>
                <input type="number" name="userId" id="admin_user_id" hidden>
                <div class="formBtnWrapper" id="btnModalWrap">
                <input type="submit" class="greenBtn" id="submitadminBtn" name="submitadminBtn" value="Yes">
                    <button type="button" class="redBtnSubmit" id="noadminBtn">No</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modalWrapper2" id="modalWrapper2">
        <div class="categoryModal" id="userModal">
            <form class="formModal" action="" method="POST">
                <p>Are you sure you want to make this admin back to a user?</p>
                <input type="number" name="userId" id="user_user_id" hidden>

                <div class="formBtnWrapper" id="btnModalWrap">
                <input type="submit" class="greenBtn" id="submituserBtn" name="submituserBtn" value="Yes">
                    <button type="button" class="redBtnSubmit" id="nouserBtn">No</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modalWrapper3" id="modalWrapper3">
        <div class="categoryModal" id="userModal">
            <form class="formModal" action="" method="POST">
                <p>Are you sure you want to unban this user?</p>
                <input type="number" name="userId" id="unban_user_id" hidden>
                <div class="formBtnWrapper" id="btnModalWrap">
                <input type="submit" class="greenBtn" id="submitunbanBtn" name="submitunbanBtn" value="Yes">
                    <button type="button" class="redBtnSubmit" id="nounBanBtn">No</button>
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
                <tr class="theadWrapper">
                    <td>Username</td>
                    <td>Id</td>
                    <td>Email</td>
                    <td>Gender</td>
                    <td>Date</td>
                    <td>Status</td>
                    <td colspane="4">Action</td>
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
                        <td><button type="button" class="greenBtn1Value" value="<?php echo $arr['user_id']?>" id="changeAdminBtn_<?php echo $arr['user_id']; ?>">admin</button></td>
                        <td><button type="button" class="greenBtn2Value" value="<?php echo $arr['user_id']?>" id="changeUserBtn_<?php echo $arr['user_id']; ?>">user</button></td>
                        <td><button type="button" class="greenBtn3Value" value="<?php echo $arr['user_id']?>" id="changeUserBtn_<?php echo $arr['user_id']; ?>">Unban</button></td>
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
    const adminUserBtns = document.querySelectorAll(".greenBtn1Value");
    const userUserBtns = document.querySelectorAll(".greenBtn2Value");
    const UnbanUserBtns = document.querySelectorAll(".greenBtn3Value");

    banUserBtns.forEach(function(button) {
    button.addEventListener("click", function() {
        const userId = this.value;
        document.getElementById("ban_user_id").value = userId; // Set user ID for ban modal
        document.getElementById("modalWrapper").style.display = "block"; // Show the modal
    });
});

adminUserBtns.forEach(function(button) {
    button.addEventListener("click", function() {
        const userId = this.value;
        document.getElementById("admin_user_id").value = userId; // Set user ID for admin modal
        document.getElementById("modalWrapper1").style.display = "block"; // Show the modal
    });
});

UnbanUserBtns.forEach(function(button) {
    button.addEventListener("click", function() {
        const userId = this.value;
        document.getElementById("unban_user_id").value = userId;
        document.getElementById("modalWrapper3").style.display = "block";
    });
});

userUserBtns.forEach(function(button) {
    button.addEventListener("click", function() {
        const userId = this.value;
        document.getElementById("user_user_id").value = userId;
        document.getElementById("modalWrapper2").style.display = "block";
    });
});



    const noBanBtn =document.getElementById("noBanBtn");
    const noadminBtn =document.getElementById("noadminBtn");
    const nouserBtn =document.getElementById("nouserBtn");
    const nounBanBtn =document.getElementById("nounBanBtn");

    noBanBtn.addEventListener("click", ()=>{
        document.getElementById("modalWrapper").style.display = "none";
    })

    noadminBtn.addEventListener("click", ()=>{
        document.getElementById("modalWrapper1").style.display = "none";
    })

    nouserBtn.addEventListener("click", ()=>{
        document.getElementById("modalWrapper2").style.display = "none";
    })

    nounBanBtn.addEventListener("click", ()=>{
        document.getElementById("modalWrapper3").style.display = "none";
    })


</script>
</body>
</html>
