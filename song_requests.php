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
	<link rel="stylesheet" type="text/css" href="./css/song_requests.css.php">
</head>

<!-- if (isset($_SESSION['username']))
<body>
    
    <!-- navigation -->
    <?php include './php/nav.php';?>

    <main>
        <section>
            <article> 
                <h3>Approved List</h3><hr><br>
                <p> Feature Coming Soon</p>
            </article>
        </section>

        <section class=verticalLine>
            <article> 
                    <h3>Song Requests</h3><hr>
                    <br>
                    <?php
                        $event_id = $_GET['songrequest'];
                      
                        include './php/my_sql_exec.php';
                        
                        $user_verification = "SELECT user_id FROM Event WHERE event_id='".$event_id."';"; 
                        $conn = connection();
                        $result = my_sql_exec($conn, $user_verification);
                        $rows = mysqli_fetch_assoc($result);

                        if($rows['user_id'] != $_SESSION['userid'])
                            header("location: index.php");
                        else 
                        {
                            $sql = "SELECT * FROM SongRequest WHERE event_id='".$event_id."';";  
                            
                            $result = my_sql_exec($conn, $sql);
                            
                            while($rows = $result->fetch_assoc()) // fetches all rows that meets condition
                            {
                                echo "<div class=sr_pad>";
                                    echo "<b>Song Name: </b>&nbsp;" .$rows['song_name'] . "<br>";
                                    echo " <b> Artist: </b>&nbsp;" .$rows['artist'] . "<br><br>";
                                    echo "<button><a class=none href=song_requests.php?approved=> Approve </a></button> &nbsp;"; 
                                    echo "<button><a href=song_requests.php?wishlist=> WishList </a></button><br><br>";
                                    echo "<hr>";
                                echo "</div>";
                            }
                            
                        /*
                            TODO
                            get[] will store songrequest_id
                            if table songrequest is N or NULL then its n song request section, if yes  then show in approved, if W then show in wishlist
                            create redirect php file and $_SESSION
                            if $_GET['approved'] != NULL
                            $_SESSION['approved'] = $_GET['approved']
                            elseif($_GET['wishlist'] != NULL)
                            $_SESSION['wishlist'] = $_GET['wishlist'] 
                            header(location: song_requests.php);
                        
                        */
                        }
                    ?>
            </article>
            
        </section>  
        
        <section>
            <article>
                <h3>WishList</h3><hr><br>
            </article>
        </section>



    </main>
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>

</html>
