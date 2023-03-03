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
  <form action="welcome.php" method="post" enctype="multipart/form-data" class="form"> <!--form started and added enctype to upload files, post can't upload files on server-->
  First Name: <input type="text" name="fname" class="fname" required pattern="[A-Za-z]*"><br> <!--First name created-->
  Last Name: <input type="text" name="lname" class="lname" required pattern="[A-Za-z]*"><br> <!--last name created-->
  Full Name: <input type="text" name="fullname" class="fullname" readonly> <br><!--fullname created-->
  Add Image: <input type="file" name="img_upload" class="upload" accept=".jpg,.jpeg,.png"> <br><!--for adding file created input-->
  Marks: <textarea name="marks" rows="5" cols="50" ></textarea> <br><!--created text area for uploading marks in the format subject|marks--> 
  Mobile Number: <input type="text" value="+91" name="mobile_no" maxlength="13"> <br> <!--Mobile number-->
  Email Id: <input type="text" name="email">
  <br>
  <br>
  <input type="submit" class="submit"><br> <!--submit button--> 
</form>  <!--Form closed-->
</section>

<script> 
  $(document).ready(function () {
    $(".fname, .lname").on('input',function() {  //whenever firstname and lastname filled, input should be done in fullname.
      $(".fullname").val($('.fname').val() +" "+ $('.lname').val()); //fullname should appear with the concatenation of first name and last name.
    });
  });
</script>
</body>
</html>