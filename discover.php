<?php
// Start the session
session_start();
require 'corefunc.php';
$conn = connection();
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
	<link rel="stylesheet" type="text/css" href="./css/my_event.css.php">
	<link rel="stylesheet" type="text/css" href="./css/discover.css.php">
	

</head>

<body>
    
    <!-- navigation -->
    <?php include './php/nav.php';?>

    <main>
        
        <form id="seaches" method="POST" action=<?php echo $_SERVER['PHP_SELF']; ?> >
            <br><h3 class=center>Search by Event Name or Event Location</h3>
            <select class=center3 name="searchtype">
              <option value="name">Name</option>
              <option value="location">Location</option>
            </select>
            <div>
                <br>
                <input class=center2 type="text" name="search_name">
                <input class=center4 type="submit" name="search" value="search">
                <input class=center5 type="submit" name="all" value="Show All Events">
            </div>
        </form>
        <hr>

    
        <?php
        
        // 
            if(isset($_SESSION['username']))
            {
                if(isset($_SESSION['username'])) 
                {
                    $sql = "SELECT * FROM Event;";
        
                    $result = my_sql_exec($conn, $sql);
                    if(mysqli_num_rows($result)<=0) //if it is empty or returns zero
                    {
                            echo "<p class=center> Sorry We don't have any events at this time. <a href=eventviewer.php?choice=1>CLICK HERE</a> To Create Events</p><br/>";
                    }
                    else
                    {
                        
                        if($_POST['search'] != "")
                        {
                            if($_POST['search_name'] == NULL)
                            {
                                echo "<h3 class=center> Name or Location Required</h3>";
                            }
                            else
                            {
                                // look to find either event name or location where the name is like the input from the user
                                if($_POST['searchtype'] == name)
                                    $sql = "SELECT * FROM Event WHERE event_name LIKE'".mysqli_real_escape_string($conn, $_POST['search_name'])."%';";
                                else
                                    $sql = "SELECT * FROM Event WHERE location LIKE'".mysqli_real_escape_string($conn, $_POST['search_name'])."%';";

                                $result = my_sql_exec($conn, $sql);
                                if(mysqli_num_rows($result)<=0) //if it is empty or returns zero
                                {
                                        echo "<h3 class=center> No Events found using ".$_POST['searchtype']." :(</h3><br/>";
                                }
                                else
                                {
                                    //displays the event    
                                    display_events($result);
                                }
                            }
                        }
                        elseif(isset($_POST['all']))
                        {
                            //displays the event
                            display_events($result);
                        
                        }
                    }
                }                        
            }
            else
            {
                if(isset($_POST['search']) || isset($_POST['all']))
                {
                    echo "<h3 class=center> Please Login </h3>";
                }
            }
        ?>
    </main>
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>

</html>