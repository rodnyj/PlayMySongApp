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
	<link rel="stylesheet" type="text/css" href="./css/settings.css.php">
</head>

<body>
    
    <!-- navigation -->
    <?php include './php/nav.php';?>

    <main>
        <h1 class="center"> Request A Song To The DJ</h1>
        <section>
            <form id="form1" method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>" >
                
                <table border=0 style="text-align:left" id="songrequest">
                <tr><td style="text-align:right">Song Name:</td><td> <input type="text" name="songname"></td></tr>
                <tr><td style="text-align:right">Artist:</td><td>  <input type="text" name="artist"></td></tr>
                </table>
                <div id="button-div">
                    <button type="submit" name="submit" value="Submit" form="form1" class="default1 button1">Submit</button>
                    <button type="reset" value="Reset" form="form1" class="default1 button2">Reset</button>
                </div>
            </form>
        </section>
        
        <?php
            
            $songname = trim(htmlspecialchars($_POST['songname']));
            $artist = trim(htmlspecialchars($_POST['artist']));
        
            if(isset($_POST['submit']))
            {
               if($_POST['submit'] == NULL)
               {
                   echo "<p class=center> Song Name is Required</p>";
               }
               elseif($songname == NULL)
               {
                   echo "<p class=center> Song Name is Required</p>";
               }
               elseif($artist == NULL)
               {
                   echo "<p class=center> Artist Name is Required</p>";
               }
               else 
               { 
                   include './php/my_sql_exec.php';
                   $conn = connection();
                   
                   $sql = "SELECT * FROM RSVP WHERE rsvp_id=" .$_SESSION['rsvp_id_sr'].";";

                   $result = my_sql_exec($conn, $sql);
                    
                    //will grab the userid and event_id for the rsvp_id 
                   if($rows = mysqli_fetch_assoc($result))
                   {
                       $userid_rs = $rows['user_id'];
                       $event_id_rs = $rows['event_id'];
                       
                        $sql = "INSERT INTO SongRequest VALUES('', '".$userid_rs."','".$event_id_rs."','".$songname."','".$artist."','');";
                        
                        my_sql_exec($conn, $sql);
                        
                        echo "<h1 class=center>Song Name: ".$songname.", was Succesfully RSVP'd For</h1>";
                        
                   }
                   else
                   {
                       echo "No Event's RSVP'd For";
                   }
                   
                   mysqli_close($conn);
                 
               }
            }
        
        ?>
    </main>
    <!-- footer -->
    <?php include './php/footer.php';?>
</body>

</html>
