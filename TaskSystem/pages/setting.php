<?php 
session_start();

include_once './classes/user.class.php';

$fpath = $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];
if(isset($_SESSION['account'])){
    if(!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))){
        header('location: ./login.php');
    }
    $user_id = $_SESSION['account']['user_id'];
} 
else {
    header('location: ./login.php');
}

    $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];

    $userObj = new user();

    $user = [];

    $username = $email = $address = $gender = $age = $contact = '';
    $usernameErr = '';

    $image_path = $_SESSION['account']['img_path'];

    $imagePth;

    $userTest = [];
if($_SERVER['REQUEST_METHOD'] == "POST"){

   $username = $_POST['username'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   $gender = $_POST['gender'];
   $age = $_POST['age'];
   $contact = $_POST['contact'];
   
   if(empty($username)){
    $usernameErr = "Username is required!";
   }
   
   $imageType;
   if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = $_FILES['image'];
    $imageName = basename($image['name']);
    $imageType = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate Image Type
    if (in_array($imageType, $allowedTypes)) {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/yara/TaskSystem/assets/uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Generate unique file name
        $newImageName = uniqid('user_') . '.' . $imageType;
        $imagePth = $imagePath = "/yara/TaskSystem/assets/uploads/" . $newImageName;

        // Move the uploaded file to the designated folder
        if (!move_uploaded_file($image['tmp_name'], $uploadDir . $newImageName)) {
            echo "Failed to upload image.";
            $imagePath = ''; // Reset image path if upload fails
        }
    } else {
        echo "Invalid image format. Only JPG, JPEG, PNG, and GIF are allowed.";
    }
}

if(empty($usernameErr)){
    $userObj->username = $username;
    $userObj->email = $email;
    $userObj->address = $address;
    $userObj->gender = $gender;
    $userObj->age = $age;
    $userObj->contact = $contact;
    $userObj->user_id = $_SESSION['account']['user_id'];


    if($userObj->edit($imagePth)){
        if ($_SESSION['account'] = $userObj->fetch($username)){
            $imagePth = $_SESSION['account']['img_path'];
            header('Location:'.$_SERVER['PHP_SELF']);
        }
    }
    else {
        echo "Something went wrong";
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
<body id="setting">
<div class="gridWrapper">
    <header>
        <?php 
         $path .= "/yara/TaskSystem/pages/includes/header.php";
            include_once($path);
         $path = $pathSave;
        ?>
        </header>
    <main> 
    <div class="modalWrapper" id="modalWrapper">
        <div class="profileModal" id="profileModal">
        <span class="close">&times;</span>
            <div class="logo">
               <span> Logo</span>
           </div>
            <form class="formModal" action="" method="POST" enctype="multipart/form-data">
                <img src="<?php echo $image_path?>" class="profileImg">
                <div class="imgChooseWrapper"> <input type="file" name="image" accept="image/*" class="inputImg" id="imageBtn" hidden>
                <label for="imageBtn" class="labelProfile">Upload Image</label><span id="file-chosen" class="spanProfile">No file chosen</span></div>
                <label for="category">UserName:</label>
                <input type="text" name="username" class="field" value="<?php echo $_SESSION['account']['username']?>">
                <label for="category">Address:</label>
                <input type="text" name="address" class="field" value="<?php echo $_SESSION['account']['address']?>">
                <label for="category">Contact:</label>
                <input type="number" name="contact" class="field" value="<?php echo $_SESSION['account']['contact']?>">
                <label for="category">Gender:</label>
                <input type="number" name="gender" class="field" value="<?php echo $_SESSION['account']['gender']?>">
                <label for="category">Email:</label>
                <input type="email" name="email" class="field" value="<?php echo $_SESSION['account']['email']?>">
                <label for="category">Age:</label>
                <input type="number" name="age" class="field" value="<?php echo $_SESSION['account']['age']?>">
                <div class="formBtnWrapper"><input type="submit" class="btnFormR" id="btnFormR" value="Edit Profile"></div>
            </form>

            
        </div>
        
        </div>
        <div class="mainWrapper">
            <div class="settingWrapper">
            <div><img src = "<?php echo $image_path ?>"class="profileImg"></div>
            <div class="settingdiv1Wrapper">
            <div class ="settingdiv1">
                <div class="settingRight"><span>Username: <?php echo $_SESSION['account']['username']?></span></div>
                <div>Address: <?php echo $_SESSION['account']['address']?></div>
            </div>
            <button type="button" class="btnFormR" id="editProfile">Edit Profile</button>
            </div>
            <div class ="settingdiv2">
                <div class="settingRight"><span>Age: <?php echo $_SESSION['account']['age']?></span></div>
                <div class="settingRight"><span>Gender: <?php echo $_SESSION['account']['gender']?></span></div>
                <div><span>Status: Active*</span></div>
            </div>
            <div class="settingdiv3">
                <div>Email: <?php echo $_SESSION['account']['email']?></div>
                <div>Contact: <?php echo $_SESSION['account']['contact']?></div>
            </div>
            </div>
        </div>
    </main>
    <aside>
        <?php 
        $path .= "/yara/TaskSystem/pages/includes/aside.php";
        include_once($path);
        $path = $pathSave;
        ?>
    
    </aside>
    </div>
    <script type="text/javascript"  src="/yara/TaskSystem/assets/script/script.js"></script>
</body>
<script>
    var editProfileBtn = document.getElementById("editProfile");
        var submitBtn = document.getElementById("btnFormR");
        var close = document.getElementsByClassName("close")[0];
        var modal = document.getElementById("modalWrapper");
        close.addEventListener("click", () => {
          modal.style.display = "none";
        })


        window.onclick = function(event) {
            if (event.target == modal || event.target == viewModal){
            modal.style.display = "none";
        }}
       

        editProfileBtn.addEventListener("click", () => {
            modal.style.display = "block";
                } )
        submitBtn.addEventListener("click", () => {
            modal.style.display = "none";
        })


        const actualBtn = document.getElementById('imageBtn');

        const fileChosen = document.getElementById('file-chosen');

        actualBtn.addEventListener('change', function(){
        fileChosen.textContent = this.files[0].name
})
</script>
</html>