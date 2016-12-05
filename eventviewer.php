<?php
// Start the session
session_start();

//remember to go in and close all database connections
//mysqli_close($conn);
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
	<link rel="stylesheet" type="text/css" href="./css/eventviewer.css.php">
	<link rel="stylesheet" type="text/css" href="./css/create_event.css.php">
	<link rel="stylesheet" type="text/css" href="./css/my_event.css.php">
	<link rel="stylesheet" type="text/css" href="./css/view_my_rsvp.css.php">

<!--	<link rel="stylesheet" type="text/css" href="./css/view_my_rsvp.php">  -->

</head>

<body>
    
    <!-- navigation -->
    <?php include './php/nav.php';?>

    <main>
        
        <aside>
            <article id="create-event1"> 
                <h1><a href="eventviewer.php?choice=1">CREATE EVENT</a></h1>
            </article>
            
            <article id="create-event2">
                <h1><a href="eventviewer.php?choice=2">View My RSVP</a></h1> 
            </article>
            
            <article id="create-event3">
                <h1><a href="eventviewer.php?choice=3">MY EVENTS</a></h1>
            </article>
            <article id="create-event3">
                <h1><a href="eventviewer.php?choice=4">WishList</a></h1>
            </article>
        </aside>   
            
        <section>
            <!-- script to handle different choices -->
            <?PHP
                //if choice is not set, show random img
                if(!$_GET['choice'])
                {
                    
                    //random num from 1 to 7 generated
                    $rand = rand(1, 7);
                    //prints img with random num
                    echo "
                        <div id=e_v_m_i_div>
                            <img id=event_viewer_main_img src=./img/dj_/dj_".$rand.".jpg alt='image not available'>
                        </div>
                    ";
                }
                
                if(isset($_SESSION['username']))
                {
                    include './php/my_sql_exec.php';
                    $conn = connection();
                    
                    if(isset($_GET['choice']))
                    {
                        
                        if($_GET['choice'] == 1)
                        {
                            echo "<h3 id=create_event_header>Create A New Event</h3>";
            ?>
                    <!-- choice 1 html form -->
                    <?php include('create_event.php'); ?>
            
            <!-- continuation of choices -->    
            <?php
                    
                        }
                    
                        if($_GET['choice'] == 2)
                        {
                            include 'view_my_rsvp.php';
      
                        }
                        
                        if($_GET['choice'] == 3)
                        {
                            include 'my_event.php';
                        }

                        if($_GET['choice'] == 4)
                        {
                            include 'wishlist.php';
                        }

                    }
                }
                else 
                {
                    if($_GET['choice']){
                        echo "<h1 class=isnotset> PLEASE LOGIN: <a class=isnotset href=signin.php> CLICK HERE </a></h1>";
                        echo "<h1 class=isnotset> DON'T HAVE AN ACCOUNT? <br>PLEASE SIGNUP: <a class=isnotset href=signup.php> CLICK HERE </a></h1>";
                    }
                }
            ?>
        </section>
    </main>
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>

</html>
