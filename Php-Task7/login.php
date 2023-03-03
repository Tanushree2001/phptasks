<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <section class="container">
  <form action="welcome.php" method="post" class="form">  <!--form created-->
    Username: <input type="text" name="username" required><br> <!--username input field-->
    Password: <input type="password" name="password" required><br> <!--Password input field-->
    <input type="submit" value="Login" name="login">  <!--Login -->
  </form>
  </section>
  <?php
  session_start();  //session started
  if(isset($_SESSION['user_name'])){
  if($_SERVER["REQUEST_METHOD"]=="POST"){
  $user_name = $_POST["username"];  //storing value 
  $pass_word = $_POST["password"];   
  $_SESSION['user_name']= $user_name;  //session variable
  } 
}
?>    
</body>
</html>