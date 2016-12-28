<?php
    //
    require 'corefunc.php';
    //
    dropTables();
?>


<!DOCTYPE html>
<html>

<head>
    <!-- meta -->
    <?php include './php/meta.php';?>
    
    <title>
        PlayMySong
    </title>
    
	<!-- stylesheet -->
	<link rel="stylesheet" type="text/css" href="./css/master.css.php">
	<link rel="stylesheet" type="text/css" href="./css/settings.css.php">
	
</head>

<body>
    
    <!-- navigation -->
    <?php include './php/nav.php';?>

    <main>
        <section>
            <h1> SIGN UP</h1>
            <form id="form1" enctype="multipart/form-data" method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>" >
                
                <table border=0 style="text-align:left" id="signup">
                <tr><td style="text-align:right">Firstname:</td><td> <input type="text" name="firstname"></td></tr>
                <tr><td style="text-align:right">Lastname:</td><td>  <input type="text" name="lastname"></td></tr>
                <tr><td style="text-align:right">Email:</td><td>  <input type="text" name="email"></td></tr>
                <tr><td style="text-align:right">Create A Username:</td><td>  <input type="text" name="username"></td></tr>
                <tr><td style="text-align:right">Password:</td><td>  <input type="password" name="passwrd"></td></tr>
                <tr><td style="text-align:right">Re-enter your password:</td><td>  <input type="password" name="passwrd2"></td></tr>
                <tr><td style="text-align:right">Upload Profile Picture:</td><td>  <input type="file" name="myfile"></td></tr>
                </table>
                <div id="button-div">
                    <button type="submit" value="Submit" form="form1" class="default1 button1">Submit</button>
                    <button type="reset" value="Reset" form="form1" class="default1 button2">Reset</button>
                </div>
            </form>
        </section>
   <?php// include 'signup_prep.php';?>

<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// variables initialized
$firstname = htmlspecialchars(trim($_POST['firstname']));
$lastname = htmlspecialchars(trim($_POST['lastname']));
$email = htmlspecialchars(trim($_POST['email']));
$username = htmlspecialchars(trim($_POST['username']));
$passwrd = htmlspecialchars(trim($_POST['passwrd']));
$passwrd2 = htmlspecialchars(trim($_POST['passwrd2']));
$submit = $_POST['submit'];
date_default_timezone_set("America/New_York");
$sign_up_date = date("d/m/Y");
$sign_up_time = date("h:i:sa");


// log ip address and 
echo "<hr>";
if($passwrd != $passwrd2){
    echo "<p class=center> Password Does Not Match</p><br>";
}
elseif($firstname == NULL || $lastname == NULL || $email == NULL || $username == NULL)
    echo "<p class=center>ALL Fields are Required</p>";
else{
    $conn = connection();
    //include './php/create_database.php';
    createTables($conn);
    
    $sql = "SELECT * FROM Users WHERE username = '" . $username . "';";
    
    $result = my_sql_exec($conn, $sql);
    
    if(mysqli_num_rows($result) <= 0) //id does not exist
    {
        
///////////////////////////////////////////////////////////
    //$myfile is the name of the file in the <form> .... </form>
    //For example: <input type="file" name="myfile">
    //return the file name in the server side after it is successfully uploaded
    //otherwise return NULL
    function uploadfiles($myfile)
    {
        $dir = "uploads/";
        $file = $dir . basename($_FILES[$myfile]['name']);
        if($_FILES[$myfile]['size']<50000000) //In Bytes, ie 50MB
        {
          $filetype = pathinfo($file,PATHINFO_EXTENSION);
          if(strcasecmp($filetype,"jpg")==0 || strcasecmp($filetype,"png")==0 || strcasecmp($filetype,"gif")==0)
          {
            if(!file_exists($file))
            {
              if(move_uploaded_file($_FILES[$myfile]["tmp_name"],$file))
              {                
                  return $file;
              }
                else echo "<p class=center>Uploading failed</p>";
            }
            else {echo "<p class=center> Image filename already exists. Please change the name and try again.</p><br/>"; return $file;}
          }
         // else echo "<p class=center>Wrong file types</p><br/>";
        }
        else echo "<p class=center>file is too big</p><br/>";
        
        return NULL;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //name of the file from input
		  $file = uploadfiles("myfile");
          //user_id is included VALUES('', )
		  $sql = "INSERT INTO Users VALUES('','".
		           
                   $firstname."','".  $lastname."','".
                md5($passwrd)."','".     $email."','".   
                     $username."','".      $file."'". 
                ");";
        
        // to see for testing, uncomment sql query below
        //echo $sql."<br/>";
        my_sql_exec($conn, $sql);
        
        echo "<hr/>";
        
        echo "<p class=center>Registration done</p><br>";
        echo "<p class=center><a href=signin.php> CLICK HERE TO SIGNIN</a> </p><br/>";
    }
    else
    {
    	echo "<p class=center>Username already exists. Try another one</p> <br/>";
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
    </main>

    <!-- footer -->
    <?php include './php/footer.php';?>

</body>
</html>