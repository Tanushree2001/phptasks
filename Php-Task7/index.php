<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="welcome.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <button name="login">Login</button>
    </form>
    <a href="/home/tanushree/Desktop/untitled folder/phptasks/Php-Task7/Php-Task1/index.php" name="task1"></a>
    <?php
    $task_1 = $_POST["task1"];
    session_start();
    $_SESSION["Task1"] = $task_1;
    ?>
</body>
</html>