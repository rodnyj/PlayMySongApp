<?php
// Start the session
session_start();
//remember to go in and close all database connections
//mysqli_close($conn);
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
                    $conn = connection();
                    
                    if(isset($_GET['choice']))
                    {
                        
                        if($_GET['choice'] == 1)
                        {
                            echo "<h3 id=create_event_header>Create A New Event</h3>";
            ?>
                    <!-- choice 1 html form -->
                    <?php include 'create_event.php'; ?>
            
            <!-- continuation of choices -->    
            <?php
                    
                        }
                    
                        if($_GET['choice'] == 2)
                        {
                            $sql = "SELECT * FROM RSVP WHERE user_id ='".$_SESSION['userid']."';";
                            $run = my_sql_exec($conn, $sql);
                            if(mysqli_num_rows($run)<= 0)
                            {
                                echo "
                                <div class=bb>
                                <h3 class=center> You Dont Have Any RSVP'S :(<br><br> To RSVP For An Event<br> Click Below &darr;<br>
                                <button class=butn>
                                <a href=discover.php?choice=1>DISCOVER</a>
                                </button>
                                </h3><br/>
                                </div>
                                ";
                            }
                            else
                            {
                                if(($_GET['remove'] == "on"))
                                {
                                  remove_on($result); 
                                }
                                else
                                {
                                    echo "<h1 class='center rsvp_header'> CLICK AN EVENT TO REQUEST A SONG</h1>";
                                    echo "<div class='default default-28'> <button><a href='eventviewer.php?choice=2&remove=on'> 
                                            Click Here To Remove An Event</a></button></div>";
                                    echo "<hr>"; 
                                    my_rsvp_func($result);
                                }
                            }
                                      
                        }
                        
                        if($_GET['choice'] == 3)
                        {
                            $sql = "SELECT * FROM Event WHERE user_id='" .$_SESSION['userid']. "';";

                            $result = my_sql_exec($conn, $sql);
                            if(mysqli_num_rows($result)<=0) //if it is empty or returns zero
                            {
                                    echo "
                                    <div class=bb>
                                    <h3 class=center> You Dont Have Any Events :(<br><br> To Create Your First Event<br> Click Below &darr;<br> 
                                    <button class=butn>
                                    <a href=eventviewer.php?choice=1>CREATE EVENT</a>
                                    </button>
                                    </h3><br/>
                                    </div>
                                    ";
                            }
                            else
                            {
                                if(($_GET['delete'] == "on"))
                                {
                                  delete_on($result); 
                                }
                                else
                                {
                                    my_event($result);
                                }
                            }
                        }
                        if($_GET['choice'] == 4)
                        {
                            include 'wishlist.php';
                        }
                    }
                    mysqli_close($conn);
                }
                else 
                {
                    if($_GET['choice']){
                        
                        echo "
                        <div class=cc>
                        <h3 class=center> Please Login To Use Our Services <br><br> To Login<br> Click Below &darr;<br> 
                        <button class=butn>
                        <a href=signin.php>Login</a>
                        </button>
                        </h3><br/>
                        </div>
                        <br><br>
                        ";
                        echo "
                        <div class=cc>
                        <hr>
                        <br><br><br>
                        <h3 class=center> Not Yet A Member? Please Signup. <br>Our Services Are 100% FREE :)<br><br> To Signup<br> Click Below &darr;<br> 
                        <button class=butn>
                        <a href=signup.php>Signup</a>
                        </button>
                        </h3><br/>
                        </div>
                        ";
                    }
                }
            ?>
        </section>
    </main>
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>

</html>