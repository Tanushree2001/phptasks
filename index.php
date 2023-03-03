<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
    <section class="container">
      <div class="box">
    <form action="welcome.php" method="post"> <!--form started -->
    First Name: <input type="text" name="fname" class="fname" required pattern="[A-Za-z]*"><br> <!--First name created-->
    Last Name: <input type="text" name="lname" class="lname" required pattern="[A-Za-z]*"><br> <!--last name created-->
    Full Name: <input type="text" name="fullname" class="fullname" readonly> <!--fullname created-->
    <br>
    <br>
    <input type="submit" class="submit"><br> <!--submit button--> 
  </form>  <!--Form closed-->
</div>
    </section>
  <script> 
    $(document).ready(function () {
      $(".fname, .lname").on('input',function() {  //when input the value of firstname and lastname 
          $(".fullname").val($('.fname').val() +" "+ $('.lname').val()); //fullname will appear with the conactenation of first name and last name
        });
      });
  </script>
</body> 
</html>