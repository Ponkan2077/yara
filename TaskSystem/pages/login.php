<?php
 session_start();
     $pathindex = $path1 = $path = $_SERVER['DOCUMENT_ROOT'];
     $path .= "/yara/TaskSystem/pages/classes/user.class.php";
     $path1 .= "/yara/TaskSystem/assets/function.php";
     $pathindex .= "/yara/TaskSystem/index.php";
     require_once $path;
     require_once $path1;
     $loginErr='';

     $username = $password = "";//$email = "";
     $usernameErr = $passwordErr = ""; //$emailErr = "";

     if(isset($_SESSION['account'])){
         if(!(isset($_SESSION['account']['is_user']) || isset($_SESSION['account']['is_admin']))){
             header('location: login.php');
         }
     } 
    
      $userObj = new user();
     if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = clean_input($_POST['username']);
        $password = trim(($_POST['password']));
       // $email = clean_input($_POST['email']);

        if(empty($username)){
            $usernameErr = "Please enter your username!";
        }

        if(empty($password)){
            $passwordErr = "Wrong password!";
        }

        //if (empty($email)){
           //$emailErr = "Please enter the correct email!";
        //}

        if(empty($usernameErr) && empty($passwordErr)){ //&& empty($emailErr)){
           // $userObj->email = $email;

            if($userObj->login($username,$password)){
                $_SESSION['account'] = $userObj->fetch($username);

                if($_SESSION['account']['is_admin'] || $_SESSION['account']['is_user']){ 
                    header('location: ../index.php');
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
<body class="loginBody">
    <div class="wraplogin">
    <div class="formWrapper">
    <div id="loginLogo">
        <span>TaskSystem</span>
    </div>
    <div class="signUpLoginBtnWrapper">
        <div class="loginBtnWrapper">
            <button class="loginBtn"><a href="#">LogIn</a></button>
        </div>
        <div class="signUpBtnWrapper">
            <button class="signUpBtn"><a href="./signUp.php">SignUp</a></button>
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

        <!--<div class="formInput">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="inputl">
        </div>-->
        <div class="submitBtn">
        <input type="submit" value="LogIn" class="reusableBtn" id="submitLoginBtn">
        </div>
        </form>
        </div>
    </div>
</body>
</html>