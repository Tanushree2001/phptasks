<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  $firstname = $lastname = $fullname = "";
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstname= $_POST["fname"]; 
    $lastname= $_POST["lname"]; 
    $fullname= "$firstname".""."$lastname";
  }
  ?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    First Name: <input type="text" name="fname" required pattern="[A-Za-z]*"><br>
    Last Name: <input type="text" name="lname" required pattern="[A-Za-z]*"><br>
    Full Name: <input type="text" name="fullname" readonly value="<?php $fullname = "$firstname"." "."$lastname";
    echo($fullname); ?>">
    <br>
    <br>
    <input type="submit"><br>
  </form> 

  <h2>Welcome <?php echo("$fullname");?><br></h2>
</body>
</html>