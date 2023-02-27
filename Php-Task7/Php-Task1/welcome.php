<html>
    <body>
        <?php
        // class created by name forms
        class Forms{
            // initialize variables
            public $first_name, $last_name, $img_name, $img_tmp;

            // constructor created 
            public function __construct($firstname, $lastname)
            {
                $this->first_name = $firstname;
                $this->last_name = $lastname;    
                
            }

            // created function to show full name 
            public function FullName()
            {
                $full = "Welcome " . $this->first_name . " " . $this->last_name;
                echo $full; //printing full name
            }

        }
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $firstname = $_POST["fname"]; 
            $lastname = $_POST["lname"]; 
            $imgname=$_FILES['img_upload']['name']; //Use $_FILES for uploading image and from the array of folder we choose a key: name and store it in a variable.
            $imgtmp=$_FILES['img_upload']['tmp_name']; // from array of folder we choose a key tmp_name and store it in a variable
            $new = new Forms($firstname, $lastname ); //calling constructor
            
            $new->FullName(); //calling function Fullname
        }
        ?>
        
    </body>
</html>