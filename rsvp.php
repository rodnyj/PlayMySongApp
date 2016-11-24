<!-- template -->

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
</head>

<body>
    
    <!-- navigation -->
    <?php include './php/nav.php';?>

    <main>
        <?php
        
        // Start the session
        session_start();
        include './php/my_sql_exec.php';
        $conn = connection();
        
        //grabs the event id from url
        $event_id = $_GET['rsvp_for_event'];
        
        //select statement that will help us check if user rsvp'd for event already or not
        $sql = "SELECT * FROM RSVP WHERE user_id ='".$_SESSION['userid']."' AND event_id ='".$event_id."';";
        $result = my_sql_exec($conn, $sql);
        
        
        if(mysqli_num_rows($result)<=0) //if it is empty or returns zero
        {
        //preparing to add id's into database
        $sql = "INSERT INTO RSVP VALUES('', '".$event_id."','".$_SESSION['userid']."');";
        
        my_sql_exec($conn, $sql);
        header('location: eventviewer.php?choice=2');
        }
        
        else
        {
            echo "<h1 class='center top-padding'>You've Already RSVP'd For This Event :) <br> <a href='rsvp.php'> Go To VIEW MY RSVP</a></h1>";
        }
        
        ?>
    </main>
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>

</html>