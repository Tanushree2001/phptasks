<div class="tasks"> 
    <ul>  <!--list created-->
        <li><a href="/Php-Task7/Php-Task1/index.php">Task1</a></li>  <!--Task1-->
        <li><a href="/Php-Task7/Php-Task2/index.php">Task2</a></li>  <!--Task2-->
        <li><a href="/Php-Task7/Php-Task3/index.php">Task3</a></li>  <!--Task3-->
        <li><a href="/Php-Task7/Php-Task4/index.php">Task4</a></li>  <!--Task4-->
        <li><a href="/Php-Task7/Php-Task5/index.php">Task5</a></li>  <!--Task5-->
        <li><a href="/Php-Task7/Php-Task6/index.php">Task6</a></li>  <!--Task6-->
        <form action="login.php" method = "POST">
        <input type="submit" value="Logout" name="logout">   <!--Logout option-->
        </form>
    </ul>
</div>
<?php
session_start();
if(isset($_POST["logout"])){
    session_unset();  //unset the value
    session_destroy();  // destroy the value
}
?>


