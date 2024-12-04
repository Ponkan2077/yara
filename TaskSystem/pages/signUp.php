<?php 
     $path2 = $path1 = $path = $_SERVER['DOCUMENT_ROOT'];
     $path .= "/yara/TaskSystem/pages/classes/user.class.php";
     $path1 .= "/yara/TaskSystem/assets/function.php";
     $path2 .= "/yara/TaskSystem/index.html";
     require_once $path;
     require_once $path1;

     session_start();


     if(isset($_SESSION['account'])){
         if(!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))){
             header('location: login.php');
             exit;
         }
         else {
             header('location: login.php');
             exit;
         }
     } 
     
     $userObj = new user();
     $username = $password = $email = "";
     $usernameErr = $passwordErr = $emailErr = "";
     
     if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = clean_input($_POST['username']);
        $password = trim(($_POST['password']));
        $email = clean_input($_POST['email']);

        if(empty($username)){
            $usernameErr = "Please enter your username!";
        }

        if(empty($password)){
            $passwordErr = "Wrong password!";
        }

        if (empty($email)){
           $emailErr = "Please enter the correct email!";
        }

        if(empty($usernameErr) && empty($passwordErr)&& empty($emailErr)){
            $userObj->username = $username;
            $userObj->password = $password;
            $userObj->email = $email;

            if($userObj->signUp()){
                echo "You are connected!";
                header("location: login.php");
                echo "You are connected!!";
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
<body class="loginBody">
    <div class="wraplogin">
    <div class="formWrapper">
    <div id="loginLogo">
        <span>TaskSystem</span>
    </div>
    <div class="signUpLoginBtnWrapper">
        <div class="loginBtnWrapper">
            <button class="loginBtn"><a href="login.php">LogIn</a></button>
        </div>
        <div class="signUpBtnWrapper">
            <button class="signUpBtn"><a href="#">SignUp</a></button>
        </div>
    </div>
    <form action="" method="POST">
        <div class="formInput">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" class="inputl">
        </div>

        <div class="formInput">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="inputl">
        </div>

        <div class="formInput">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="inputl">
        </div>
        <div class="submitBtn">
        <input type="submit" value="SignUp" class="reusableBtn" id="submitSignUpBtn">
        </div>
        </form>
        </div>
    </div>
</body>
</html>