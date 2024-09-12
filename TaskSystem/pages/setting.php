<?php 
      $path = $pathSave = $_SERVER['DOCUMENT_ROOT'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/TaskSystem/assets/generalStyle.css">
    <script src="https://kit.fontawesome.com/c0056d4561.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body id="setting">
<div class="gridWrapper">
    <header>
        <?php 
         $path .= "/TaskSystem/pages/includes/header.html";
            include_once($path);
         $path = $pathSave;
        ?>
        </header>
    <main> <div class="mainWrapper"><span>setting</span></div></main>
    <aside>
        <?php 
        $path .= "/TaskSystem/pages/includes/aside.php";
        include_once($path);
        $path = $pathSave;
        ?>
    
    </aside>
    </div>
    <script type="text/javascript"  src="/TaskSystem/assets/script/script.js"></script>
</body>
</html>