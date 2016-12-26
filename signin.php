<?php
//starts a session
session_start();
require 'corefunc.php';
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
            <h1> SIGN IN</h1>
            <form id="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
                
                <table border=0 style="text-align:left" id="signin">
                <tr><td style="text-align:right">Username:</td><td>  <input type="text" name="username"></td></tr>
                <tr><td style="text-align:right">Password:</td><td>  <input type="password" name="passwrd"></td></tr>
                </table>
                <div id="button-div">
                    <button type="submit" name="submit" value="Submit" form="form1" class="default2 button3" >Submit</button>
                    <button type="reset" value="Reset" form="form1" class="default2 button4">Reset</button>
                </div>
            </form>
        </section>
    <!-- Validates user, and create connection -->
    <?php
        $username = htmlspecialchars(trim($_POST['username']));
        $passwrd = htmlspecialchars(trim($_POST['passwrd']));
        $submit = $_POST['submit'];
        
        if(isset($submit))
        {
            echo "<hr>";
            if($username == NULL)
                echo "<p class=center> Username Required </p>";
            elseif($passwrd == NULL)
                echo "<p class=center> Password Is Required </p>";
            else{
                $conn = connection();
            
                //VERIFY IF ID AND PASSWORD MATCH OUR DATABASE
                $sql = "SELECT * FROM Users WHERE username ='".$username."'".
                        "AND password='".md5($passwrd)."'". ";";
            
                $result = my_sql_exec($conn, $sql);
                if(mysqli_num_rows($result)<=0) //user failed to log in
                {
                        echo "<p class=center> INVALID USERNAME OR PASSWORD, PLEASE TRY AGAIN</p><br/>";
                }
                else
                {
                    $row = mysqli_fetch_row($result);
                    $_SESSION['userid'] = $row[0];
                    $_SESSION['firstname'] = $row[1];
                    $_SESSION['lastname'] = $row[2];
                    $_SESSION['passwrd'] = $row[3];
                    $_SESSION['email'] = $row[4];
                    $_SESSION['username'] = $row[5];
                    $_SESSION['profile_img'] = $row[6];
                    
                    header("Location:profile.php");
                }
            
            }
        }
    
    ?>
    </main>
    
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>
</html>