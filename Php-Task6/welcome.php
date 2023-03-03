<html>
<body>
<?php
// class created by name forms
class Forms{
  // initialize variables
  public $first_name, $last_name, $img_name, $img_tmp, $mobile_num,$email_id;

  // constructor created 
  public function __construct($firstname, $lastname, $imgname, $imgtmp, $mobilenum, $emailid)
  {
    $this->first_name = $firstname;
    $this->last_name = $lastname;    
    $this->img_name = $imgname;
    $this->img_tmp = $imgtmp;
    $this->mobile_num = $mobilenum;
    $this->email_id = $emailid;
    
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
  
  // created function to show and vaidate email id
  public function CheckEmailId()
  { 
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=".$this->email_id,
    CURLOPT_HTTPHEADER => array(
    "Content-Type: text/plain",
    "apikey: I1X8UEURe2LcmZHfMfYJJj00GysGo2oT"
    ),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET"
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    $arr_res = json_decode($response, true);  //function convert into php array
    if($arr_res['smtp_check']){            //
        echo "<br> valid email" . $this->email_id;
    }else{
        echo "Not valid";
    }
  }

  // Making function for writing data to a file and then serving the file as download 
  public function MakeTwoDocs()
  {
    $location = "$this->email_id.docx";   //The filename is created using the email ID with docx extension
    $fp = fopen($location, 'a');  //opens the file at the specified location in append mode
    // write the first name, last name, and email ID of the user to the file 
    fwrite($fp, $this->first_name);
    fwrite($fp, $this->last_name);
    fwrite($fp, $this->email_id);
    fclose($fp); //closes the file after the data has been written.

    $file= "$this->email_id"; //the name of the file to be given as a download
    if ($this->email_id = "") { // file does not exist
      die('file not found');
    } else { 
      //headers specify the filetype and filename
      header('Content-type: application/octet-stream');
      header("Content-Type: " . mime_content_type($file));
      header("Content-Disposition: attachment; filename=" . $file);
      while (ob_get_level()) {  
      ob_end_clean();  //use to clear any previously generated data
      }
      readfile($file);  //sends the contents of the file to the browser
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
    $emailid= $_POST['email'];
    $new = new Forms($firstname, $lastname, $imgname, $imgtmp, $mobilenum, $emailid); //calling constructor or creating object
    $new->ShowImage(); // calling function ShowImage
    $new->FullName(); //calling function Fullname
    $new->ShowMobileNumber(); //calling function ShowMobileNumber
    $new->CheckEmailId(); //calling function CheckEmailId
    $new->MakeTwoDocs(); //calling function MakeTwoDocs
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
