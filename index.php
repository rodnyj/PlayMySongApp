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
            <article>
                <h1>Welcome To Play My Song</h1>
                <br />
                <h4>What do we do?</h4>
                <br />
                <p>
                    - We set out to make parties more convenient for the DJ and the guests.
                     We do that by allowing the guest to request a song at a party without
                     having to distract the DJ. If you have the urge to hear a specific song,
                     but the DJ is in the zone you won’t have to distract them. All you have
                     to do is select one of the songs from our vast database and the DJ will
                     get the word.
                </p>
                <br />
                <h4>Why should you use us?</h4>
                <br />
                <p>
                    - We’ve all been to that party where the DJ just can’t read the room.
                      With our song requesting system the DJ will have the ability to keep
                      track of what songs are being requested the most. By providing the DJ
                      with a list of songs there will be less delay between songs and less 
                      traffic to the DJ.
                </p>
                <br />
                <h4>What are some benefits for the party guest?</h4>
                <br />
                <p>
                    - Let’s face it a DJ is constantly hassled for what song to play next.
                      The most annoying thing a DJ has to do is listen to the same song
                      being requested over and over again. By providing the guest with 
                      the ability to send their request directly to the DJ there will be 
                      minimal foot traffic from the floor to the DJ booth.
                </p>
            </article>

            <article>
                <h1>QUOTES</h1>
                <br />
                <p>"Gee I sure did save alot of time by not having to walk all the way over there!" -Adam</p>
                <br />
                <p>"Parties are kind of like an adventure, you never know where you're going to end up... The app is good too" -Jordan</p>
                <br />
                <p>"This s*** is dope!" -Alicia</p>
            </article>

            <article style="text-align:center;">
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
        </aside>
    </main>
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>

</html>
