<?php
// Start the session
session_start();
//
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
	<link rel="stylesheet" type="text/css" href="./css/developer.css.php">
</head>

<body>
    
    <!-- navigation -->
    <?php include './php/nav.php';?>

    <main>
        <?php  
        
            if(isset($_SESSION['username']))
            {
                if($_SESSION['username'] == 'admin')
                {
                    
                  /*  $conn = connection();
                    $password = "PriceClass2016";
                    $devpass = md5($password);
                    
                    $sql = "SELECT * FROM Users WHERE username=".$_SESSION['username']." ;";
                    $result = my_sql_exec($conn, $sql); */
                    //    $sql = "SELECT * FROM bugreport";
                    //    $result = my_sql_exec($conn, $sql);                
                    //Reports function
                    function reports()
                    {
        ?>
                        <section>
                            <article> 
                                <h3>Bug Report</h3><hr><br>
                                
                                <div>
                                    <h3 class=center> Feature Coming Soon </h3>
                                    <?php
                                      /*  if(mysql_num_rows($result) <= 0)
                                            echo "<h3 class=center> No Bug Reports</h3>";
                                        else
                                        {
                                            while($rows -> fetch_assoc($result))
                                            {
                                                echo $rows['name'];
                                            }
                                        }
                                        */
                                    
                                    ?>
                                    <p> </p>
                                </div>
                            </article>
                        </section>
                        
                        <section>
                            <article>
                                <h3>Feedback</h3><hr><br>
                                
                                <div>
                                    <h3 class=center> Feature Coming Soon </h3>
                                </div>
                            </article>
                        </section>
        <?php
                    }
                
                    // Show Reports from Reports function
                    if($_GET['reports'] == 'true')
                    {
                        echo reports();
                    }
                    else 
                    {
                        // code...
                    } 
                }
                // ends the isset username == developer if statement
                else 
                {
                    echo "
                            <div class=reportError_div>
                            <h3> ACCESS DENIED</h3>
                            </div>
                        
                         ";
                }
            }
            // ends isset($_SESSION['username']) if statement
            else
            {
                echo "
                        <div class=reportError_div>
                        <h3> ACCESS DENIED | <a href=signin.php> PLEASE SIGN IN</a></h3>
                        </div>
                    
                     ";
            }

        ?>
    </main>
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>

</html>
