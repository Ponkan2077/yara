<?php 
function clean_input($input){
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripcslashes($input);

    return $input;
}

?>