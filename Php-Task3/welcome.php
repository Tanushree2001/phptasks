<html>
    <body>
        <?php
        // class created by name forms
        class Forms{
            // initialize variables
            public $first_name, $last_name, $img_name, $img_tmp, $marks_tmp;

            // constructor created 
            public function __construct($firstname, $lastname, $imgname, $imgtmp)
            {
                $this->first_name = $firstname;
                $this->last_name = $lastname;    
                $this->img_name = $imgname;
                $this->img_tmp = $imgtmp;
            }

            // created function to show full name 
            public function FullName()
            {
                $full = "Welcome " . $this->first_name . " " . $this->last_name;
                echo $full; //printing full name
            }

            // created function to show Image
            public function ShowImage()
            {
                move_uploaded_file($this->img_tmp ,"uploadimg/".$this->img_name); //php function for image upload contain tmp_name and destination of file.
                echo "<p><img src='uploadimg/$this->img_name' alt='img'></p>";  //used image tag and gave the source of file and printed it.
            }

        }
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $firstname = $_POST["fname"]; 
            $lastname = $_POST["lname"]; 
            $imgname=$_FILES['img_upload']['name']; //Use $_FILES for uploading image and from the array of folder we choose a key: name and store it in a variable.
            $imgtmp=$_FILES['img_upload']['tmp_name']; // from array of folder we choose a key tmp_name and store it in a variable
            $marks_tmp= explode("\n",$_POST['marks']); //explode function breaks string into array element whenever new line present and then we store it in a variable.
            $new = new Forms($firstname, $lastname, $imgname, $imgtmp); //calling constructor
            $new->ShowImage(); // calling function ShowImage
            $new->FullName(); //calling function Fullname
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