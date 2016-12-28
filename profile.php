<?php
//starts a session
session_start();
require 'corefunc.php';
?>

<!DOCTYPE html>
<html>

<head>
    <!-- meta -->
    <?php 
        include './php/meta.php';
    ?>
    
    <title>
        PlayMySong
    </title>
    
	<!-- stylesheet -->
	<link rel="stylesheet" type="text/css" href="./css/master.css.php">
	<link rel="stylesheet" type="text/css" href="./css/profile.css.php">
</head>

<body>
    
    <!-- navigation -->
    <?php include './php/nav.php';?>

    <main>
        <?php
            if(isset($_SESSION['username']))
            {
                if($_SESSION['username'] == 'admin' || $_SESSION['username'] == 'rodny')
                {
 
                    echo "<h1 class='profile_en center'> WELCOME " .$_SESSION['username']. "!</h1>" ;
                    echo "
                        <div>
                            <img id=profileImg src='img/developer/developer.jpg'>
                        </div>    
                        ";
                    echo "<h3 class=center>". $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "</h3>";
                    echo "<h3 class=center>". $_SESSION['email']. "</h3><br>";
                    echo "<a class=center href=developer.php?reports=true><h3>Reports </h3></a><br> ";
                    echo "<a class=center href=./php/developer_account.php><h3>Create Reports DB Tables </h3></a><br> ";
                    echo "<a class=center href=profile.php?drop=on><h3>Drop All DB Tables</h3></a><br> ";
    
                    if($_GET['choice']==1)
                    {
                        //remove all session variables
                        session_unset(); 
        
                        // destroy the session 
                        session_destroy();
                        
                        header("location:index.php");
                    }
                    //
                    if($_GET['drop'] == 'on')
                    {
                        dropTables();
                    }
                    echo "<h3 class=center> <a href=profile.php?choice=1> CLICK HERE TO LOG OUT </a></h3>";

                }
                else
                {
                    echo "<br><h1 class='center profile_en'> WELCOME " .$_SESSION['username']. "!</h1>" ;
                    if($_SESSION['profile_img'] == NULL)
                    {
                        echo "
                            <div>
                                <img id=profileImg src='img/default_profile_img/headshot.png'>
                            </div>    
                            ";                        
                    }
                    else
                    {
                        echo "
                            <div>
                                <img id=profileImg src='" .$_SESSION['profile_img']. "'>
                            </div>    
                            ";
                    }
                    echo "<h3 class=center>". $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "</h3>";
                    echo "<h3 class=center>". $_SESSION['email']. "</h3>";
    
                    if($_GET['choice']==1){
                        //remove all session variables
                        session_unset(); 
        
                        // destroy the session 
                        session_destroy();
                        
                        header("location:index.php");
                    }
                    echo "<h3 class=center> <a href=profile.php?choice=1> CLICK HERE TO LOG OUT </a></h3>";
                    echo "<p class=center> Coming soon: Ability to update email and password </p>";
                }
                
                $_SESSION['userid'];
                $_SESSION['firstname'];
                $_SESSION['lastname'];
                $_SESSION['passwrd'];
                $_SESSION['email'];
                $_SESSION['username'];
                $_SESSION['profile_img'];
            }
            else{
                echo "<h1 class=center>Please Login <a href=signin.php> HERE </a>";
            }
        ?>
        

    </main>
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>

</html>