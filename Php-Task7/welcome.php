<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_name = $_POST["username"]; 
    $pass_word = $_POST["password"];
    session_start();
    $_SESSION["favcolor"] = "orange";
    echo "Session value is set";
}
?>
