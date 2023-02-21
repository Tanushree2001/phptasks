<html>
    <body>
        <h2>Welcome</h2>
        <?php
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $img_name=$_FILES['img_upload']['name']; //Use $_FILES for uploading image and from the array of folder we choose a key: name and store it in a variable.
            $img_tmp=$_FILES['img_upload']['tmp_name']; // from array of folder we choose a key tmp_name and store it in a variable.
            move_uploaded_file($img_tmp,"uploadimg/".$img_name); //php function for image upload contain tmp_name and destination of file.

            echo "<p><img src='uploadimg/$img_name' alt='img'></p>";  //used image tag and gave the source of file and printed it.
            echo $_POST["fname"]." ".$_POST["lname"];  //for printing fullname
        }
        ?>
    </body>
</html>