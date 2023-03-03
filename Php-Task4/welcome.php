<html>
<body>
  <?php
  // class created by name forms
  class Forms{
    // initialize variables
    public $first_name, $last_name, $img_name, $img_tmp, $mobile_num;

    // constructor created 
    public function __construct($firstname, $lastname, $imgname, $imgtmp, $mobilenum)
    {
      $this->first_name = $firstname;
      $this->last_name = $lastname;    
      $this->img_name = $imgname;
      $this->img_tmp = $imgtmp;
      $this->mobile_num = $mobilenum;
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
      
    // created function to show mobile number 
    public function ShowMobileNumber()
    {
      if(preg_match("/^\+91[0-9]{10}$/", $this->mobile_num)) //condition that must follow
      {
        echo ( "<br> Mobile No.: " . $this->mobile_num);
      }
      else{
        echo "Invalid number";
      }
    }

  }
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstname = $_POST["fname"]; 
    $lastname = $_POST["lname"]; 
    $imgname=$_FILES['img_upload']['name']; //Use $_FILES for uploading image and from the array of folder we choose a key: name and store it in a variable.
    $imgtmp=$_FILES['img_upload']['tmp_name']; // from array of folder we choose a key tmp_name and store it in a variable
    $marks_tmp= explode("\n",$_POST['marks']); //explode function breaks string into array element whenever new line present and then we store it in a variable.
    $mobilenum= $_POST['mobile_no'];
    $new = new Forms($firstname, $lastname, $imgname, $imgtmp, $mobilenum); //calling constructor
    $new->ShowImage(); // calling function ShowImage
    $new->FullName(); //calling function Fullname
    $new->ShowMobileNumber(); //calling function ShowMobileNumber
  ?>
  <table border="1"> <!--table created for task3-->
  <tr> <!--First row of table-->
    <th>Subject</th> <!--First column of first row-->
    <th>Marks</th> <!--Second column of first row-->
  </tr>
  <?php  //php logic started
  foreach($marks_tmp as $mark) //for every element in array
  {
    $value = explode("|",$mark); //break every string element into array element whenever | present
  ?>
  <tr>  <!--for each element a seperate row created-->
    <td><?php echo $value[0]; ?></td> <!--putting array[0] in 1st column-->
    <td><?php echo $value[1]; ?></td> <!--putting array[1] in 2nd column-->
  </tr>
<?php
    }
}   
?> 
</body>
</html>