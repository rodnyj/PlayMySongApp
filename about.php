<!-- template -->
<?php
// Start the session
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
	<link rel="stylesheet" type="text/css" href="./css/index.css.php">
	<link rel="stylesheet" type="text/css" href="./css/about.css.php">

</head>

<body>
    
    <!-- navigation -->
    <?php include './php/nav.php';?>

    <main>
        <section>
            <h1 class=center> About The Author</h1>
			<article>
                <div>
                    <img class=author src="./img/authors_img/rodny0.jpg" alt="Image Not Available"/>
                    <h3 class=center> Rodny Joseph</h3>
                    <h6 class=center> Lead Developer</h6>
                </div>
            </article>
        </section>

        <aside>
            <article>
               <h3 class=center>Version 1. 3</h3><br>
               <ul class=side>
                   <li>Ability to create events</li>
                   <li>Ability to search created events using Event Name or Location</li>
               </ul>
               <hr>
               <button class=version><a href="about.php?previousversions=set"> View Previous Versions</a></button>
            <?php
                if($_GET['previousversions'] == "set")
                {
            ?>
	                <link rel="stylesheet" type="text/css" href="./css/olderversion.css.php">
	       <?php

                    
                     include './php/olderversion.php';
                }
            
            
            ?>
            </article>

            <article>
                <h3 class=center>Coming Soon In Later Versions</h3><br>
                <ul class=side>
                    <li>Ability to Add to Approved List and Wishlist</li></li>
                    <li>Ability to search using Event Token</li>
                    <li>Ability to search through youtube api for songs</li>
                </ul>
            </article>
            
            <article>
                <div class=side-div2>
                    <button class=bug><a href="about.php?bugreport=set"> Report Bug</a></button>
                    <button class=feed><a href="about.php?feedback=set">Give Feedback</a></button>
                </div>
            </article>
                    <?php
                        if(isset($_GET['bugreport']))
                        {            
                            echo "<article>";
                                
                                include './php/bug.php';

                            echo "</article>"; 
                        }
                        elseif (isset($_GET['feedback'])) 
                        {
                            echo "<article>";
                                    
                                include './php/feedback.php';
                            echo "</article>";
                        }
                        else{
                            
                        }
                    ?> 
            
            
        </aside>

    </main>
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>

</html>