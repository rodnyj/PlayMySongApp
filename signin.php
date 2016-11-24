<?php
//starts a session
session_start();
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
    <?php include './php/profile_prep.php';?>
    </main>
    
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>
</html>