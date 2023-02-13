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
  // Initializing variables
  $firstname = $lastname = $fullname = "";
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstname= $_POST["fname"]; 
    $lastname= $_POST["lname"]; 
    $fullname= "$firstname".""."$lastname";
    $img_name=$_FILES['img_upload']['name']; //Use $_FILES for uploading image
    $img_tmp=$_FILES['img_upload']['tmp_name'];
    move_uploaded_file($img_tmp,"uploadimg/".$img_name); //php function for image upload
    $marks_tmp= explode("\n",$_POST['marks']);
    
  }
  ?>
  <!-- form starts  -->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    First Name: <input type="text" name="fname" required pattern="[A-Za-z]*"><br>
    Last Name: <input type="text" name="lname" required pattern="[A-Za-z]*"><br>
    Full Name: <input type="text" name="fullname" readonly value="<?php $fullname = "$firstname"." "."$lastname";
    echo($fullname); ?>"><br>
    Add Image: <input type="file" name="img_upload" required accept=".jpg,.jpeg,.png">  <br>
    Marks: <textarea name="marks" rows="5" cols="50" ></textarea>  
    <br>
    <br>
    <input type="submit"><br>
  </form> 
  <!-- form ends  -->
  <!-- php action after clicking submit function -->
  <?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  echo "<p><img src='uploadimg/$img_name' alt='img'></p>";
  echo "Hello " . $fullname;  
  ?>
  <table border="1">
    <tr>
        <th>Subject</th>
        <th>Marks</th>
    </tr>
    <?php
    
    foreach($marks_tmp as $markss) {
        $value = explode("|",$markss);
    ?>
    <tr>
        <td><?php echo $value[0]; ?></td>
        <td><?php echo $value[1]; ?></td>
    </tr>
  <?php
    }
}  
  ?>
</body>
</html>