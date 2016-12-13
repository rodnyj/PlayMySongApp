<!--index.php-->
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
</head>

<body>

    <!-- navigation -->
    <?php include './php/nav.php';?>

    <main id="homepage">
        <section>
            <article class=riri>
                <h1>Welcome To Play My Song</h1>
                <br />
                <p>
                    Are you throwing a party? 
                    Do you want to keep track of RSVP’s? 
                    Do you want to receive Song requests for your events? 
                    Are you a DJ? If So, then this 100% FREE App is for you! 

                </p>
                <br />
                <p>
                    Create Events and users can RSVP and request song for that event. 
                    This is a great way for you to receive song requests without people having to walk up to you during the event to request songs.
                </p>
                <br />
                
                <div>
                
            </article>

            <article class=titi>
                <h1>QUOTES</h1>
                <br />
                <p>"Gee I sure did save alot of time by not having to walk over to the DJ" -Adam</p>
                <br />
                <p>"Parties are kind of like an adventure, you never know where you're going to end up... The app is pretty neat" -Jordan</p>
                <br />
                <p>"This app is dope!" -Alicia</p>
            </article>

            <article class=mimi style="text-align:center;">
                Enjoy!
            </article>
        </section>

        <aside>
            <article>
                <h1>Follow us on our social media!</h1>
            </article>
            
            <article>
                <a href="https://www.facebook.com/Play-My-Song-1705767213073030/" target="_blank"><img src="img/sm/fbIcon.png" height="30px" width="30px" /></a>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><img src="img/sm/yticon.jpg" height="30px" width="30px" /></a>
            </article>

            <hr>
            <article>
                <div>
                    <img class=side-img src=./img/homepage/giphy.gif> 
                </div>
            </article>

            <article>
                <?php 
                    include 'youtube.php';
                
                ?>
                
            </article>
<!--           
            <article>
                
                <div class="cal">
                    <h1> Today's Date</h1>
                    <div class="cal2">
                        <h2>1</h2>
                    </div>
                
                    <div class="cal3">
                        <p>January 1, 2016</p>
                    </div>
                </div>
            </article>
-->
        </aside>
    </main>
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>

</html>
