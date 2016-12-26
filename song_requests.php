<?php
// Start the session
session_start();
require 'corefunc.php';

$event_id = $_GET['songrequest'];

$user_verification = "SELECT user_id FROM Event WHERE event_id='".$event_id."';"; 
$conn = connection();
$result = my_sql_exec($conn, $user_verification);
$rows = mysqli_fetch_assoc($result);

if($rows['user_id'] != $_SESSION['userid'])
    header("location: index.php");

$sql = "SELECT * FROM SongRequest WHERE event_id='".$event_id."';";  

$result = my_sql_exec($conn, $sql);
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
                <?php
                    while($rows = $result->fetch_assoc()) // fetches all rows that meets condition
                    {
                        $r++;
                        if($rows['approval'] == 'Y')
                        {
                            echo "<div class=sr_pad>";
                                echo "<b>Song Name: </b>&nbsp;" .$rows['song_name'] . "<br>";
                                echo " <b> Artist: </b>&nbsp;" .$rows['artist'] . "<br><br>";  
                                $song_id = $rows['song_id'];
                                echo "<button><a class=none href=redirect.php?approval=w&song_id=".$song_id."&songrequest_id=".$_GET['songrequest']."> Add To WishList </a></button> &nbsp;"; 
                                echo "<button><a href=redirect.php?approval=n&song_id=".$song_id."&songrequest_id=".$_GET['songrequest']."> Remove </a></button><br><br>";
                                echo "<hr>";
                            echo "</div>";
                        }
                    }

                ?>
            </article>
        </section>

        <section class=verticalLine>
            <article> 
                    <h3>Song Requests</h3><hr>
                    <br>
                    <?php
                            $sql = "SELECT * FROM SongRequest WHERE event_id='".$event_id."';";  
                            $result = my_sql_exec($conn, $sql);  
                            
                            while($rows = $result->fetch_assoc()) // fetches all rows that meets condition
                            {
                                if($rows['approval'] == 'N' || $rows['approval'] == NULL)
                                {
                                    echo "<div class=sr_pad>";
                                        echo "<b>Song Name: </b>&nbsp;" .$rows['song_name'] . "<br>";
                                        echo " <b> Artist: </b>&nbsp;" .$rows['artist'] . "<br><br>";  
                                        $song_id = $rows['song_id'];
                                        echo "<button><a class=none href=redirect.php?approval=y&song_id=".$song_id."&songrequest_id=".$_GET['songrequest']."> Approve </a></button> &nbsp;"; 
                                        echo "<button><a href=redirect.php?approval=w&song_id=".$song_id."&songrequest_id=".$_GET['songrequest']."> Add To WishList </a></button><br><br>";
                                        echo "<hr>";
                                    echo "</div>";
                                }
                            }
                            
                        /*
                            TODO
                            get[] will store songrequest_id
                            if table songrequest is N or NULL then its n song request section, if yes  then show in approved, if W then show in wishlist
                            create redirect php file and $_SESSION
                            if $_GET['approval'] != NULL or N
                            $_SESSION['approval'] = 'N'
                            else
                            $_SESSION['approval'] = $_GET['approved']
                            header(location: song_requests.php);
                            
                            if($_GET['approval'] == 'y')
                                $sql = "ALTER TABLE SongRequest"; //alter approaval to y
                            elseif($_GET['approval'] == 'w')
                                $sql = "ALTER TABLE SongRequest"; //alter approaval to w
                            else
                                {
                                    
                                }
                        */
                    ?>
            </article>
            
        </section>  
        
        <section>
            <article>
                <h3>WishList</h3><hr><br>
                <?php
                    $sql = "SELECT * FROM SongRequest WHERE event_id='".$event_id."';";  
                    $result = my_sql_exec($conn, $sql);
                    
                    while($rows = $result->fetch_assoc()) // fetches all rows that meets condition
                    {
                        if($rows['approval'] == 'W')
                        {
                            echo "<div class=sr_pad>";
                                echo "<b>Song Name: </b>&nbsp;" .$rows['song_name'] . "<br>";
                                echo " <b> Artist: </b>&nbsp;" .$rows['artist'] . "<br><br>";  
                                $song_id = $rows['song_id'];
                                echo "<button><a class=none href=redirect.php?approval=y&song_id=".$song_id."&songrequest_id=".$_GET['songrequest']."> Approve </a></button> &nbsp;"; 
                                echo "<button><a href=redirect.php?approval=n&song_id=".$song_id."&songrequest_id=".$_GET['songrequest']."> Remove </a></button><br><br>";
                                echo "<hr>";
                            echo "</div>"; 
                        }
                    }
                ?>
            </article>
        </section>



    </main>
    <!-- footer -->
    <?php include './php/footer.php';?>

</body>

</html>
