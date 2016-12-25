<?php

    //database connection
    function connection()
    {
        //create database connection
        $hostname = "127.0.0.1";
        $password = "";
        $my_username = "rodnyjoseph";
        $dbname = "play_my_song";
        $port = 3306; 
        $conn = mysqli_connect($hostname, $my_username, $password, $dbname, $port);
            if(!$conn)
            die("Connection failed: ".mysqli_connect_error());  
        return $conn;
    }
    
    //query a string to database
    function my_sql_exec($conn, $sql)
    {
        if($conn == NULL || $sql == NULL)
            exit();
        //executes the sql query and if it is a SELECT statment, stores the data in $result
         $result = mysqli_query($conn, $sql);
        
        if($result)
        {
         //below to test if getting errors 
         //echo $result;
         //echo "SQL statement done successfully<br/>";
        }
        else 
        {
        //echo "<h3 class=center>Something Went Wrong :( </h3><br>";
        //below to test if getting errors  
        //echo "Error: " .$sql."<br/>".mysqli_error($conn);
        }
        return $result;
    }
    
    function model()
    {
        
    }

    function createTables()
    {
        /////////////////////////////////////////////// create Users table
        	//verify if table is already created
            $sql = "SHOW TABLES LIKE 'Users';";
            $result = my_sql_exec($conn, $sql);
            //table does not exist
            if(mysqli_num_rows($result) <= 0)
            {
                $sql = "
                        CREATE TABLE Users (
                        
                    	user_id int auto_increment NOT NULL PRIMARY KEY,
                    	firstname varchar(40) NOT NULL,
                    	lastname varchar(40) NOT NULL,
                    	password varchar(32) NOT NULL,
                    	email varchar(128) NOT NULL,
                    	username varchar(32) NOT NULL,
                    	profile_img varchar(100) NOT NULL
                    	);
                ";
                my_sql_exec($conn, $sql);
            }
        ////////////////////////////////////////////// create Event table
        	//verify if table is already created
            $sql = "SHOW TABLES LIKE 'Event';";
            $result = my_sql_exec($conn, $sql);
            //table does not exist
            if(mysqli_num_rows($result) <= 0)
            {
                $sql = "
                	CREATE TABLE Event (
                	
                	event_id int unsigned NOT NULL auto_increment PRIMARY KEY,
                	event_name varchar(40) NOT NULL,
                	location varchar(100) NOT NULL,
                	description varchar(500) NOT NULL,
                	start_time datetime NOT NULL,
                	end_time datetime NOT NULL,
                	user_id int UNSIGNED NOT NULL,
                	song_request_Limit int(2),
                	event_img varchar(100) 
                	);
                ";
                my_sql_exec($conn, $sql);
            }
        
        ///////////////////////////////////////////////// create RSVP table
        	//verify if table is already created
            $sql = "SHOW TABLES LIKE 'RSVP';";
            $result = my_sql_exec($conn, $sql);
            //table does not exist
            if(mysqli_num_rows($result) <= 0)
            {
                $sql = "
                
        			CREATE TABLE RSVP (
        			rsvp_id int unsigned NOT NULL auto_increment PRIMARY KEY,
        			event_id int UNSIGNED NOT NULL,
        			user_id int UNSIGNED NOT NULL
        			);
                ";
                my_sql_exec($conn, $sql);
            }
        ///////////////////////////////////////////////////// create WishList table
        	//verify if table is already created
            $sql = "SHOW TABLES LIKE 'WishList';";
            $result = my_sql_exec($conn, $sql);
            //table does not exist
            if(mysqli_num_rows($result) <= 0)
            {
                $sql = "
        				CREATE TABLE WishList (
        				
        				wishlist_id int unsigned NOT NULL auto_increment PRIMARY KEY,
        				song_id int UNSIGNED NOT NULL,
        				user_id int UNSIGNED NOT NULL
        				
        				);
                ";
                my_sql_exec($conn, $sql);
            }
        ///////////////////////////////////////////////////// create Songs table
        	//verify if table is already created
            $sql = "SHOW TABLES LIKE 'Songs';";
            $result = my_sql_exec($conn, $sql);
            //table does not exist
            if(mysqli_num_rows($result) <= 0)
            {
                $sql = "
        			CREATE TABLE Songs (
        				
        				song_id int unsigned NOT NULL auto_increment PRIMARY KEY,
        				song_name varchar(50) NOT NULL,
        				genre varchar(25) NOT NULL,
        				author varchar(40) NOT NULL
        				
        				);
                ";
                my_sql_exec($conn, $sql);
            }
        /////////////////////////////////////////////////////////// create SongRequest table
        	//verify if table is already created
            $sql = "SHOW TABLES LIKE 'SongRequest';";
            $result = my_sql_exec($conn, $sql);
            //table does not exist
            if(mysqli_num_rows($result) <= 0)
            {
                $sql = "
                        CREATE TABLE SongRequest (
                        song_id int unsigned NOT NULL auto_increment PRIMARY KEY,
                        user_id int UNSIGNED NOT NULL,
                        event_id int UNSIGNED NOT NULL,
                        song_name VARCHAR(50) NOT NULL,
                        artist VARCHAR(50),
                        approval enum('Y','N')
                        );
                ";
                my_sql_exec($conn, $sql);
            }
        ///////////////////////////////////////////////////////////////////////////////
    }

    function uploadfile($myfile, $dir)
    {
        //$dir = "uploads/";
        $file = $dir . basename($_FILES[$myfile]['name']);
        if($_FILES[$myfile]['size']<50000000) //In Bytes, ie 50MB
        {
          $filetype = pathinfo($file,PATHINFO_EXTENSION);
          if(strcasecmp($filetype,"jpg")==0 || strcasecmp($filetype,"png")==0 || strcasecmp($filetype,"gif")==0)
          {
            if(!file_exists($file))
            {
              if(move_uploaded_file($_FILES[$myfile]["tmp_name"],$file))
              {                
                  return $file;
              }
                else echo "<p class=center>Uploading failed</p>";
            }
            else {echo "<p class=center> Image filename already exists. Please change the name and try again.</p><br/>"; return $file;}
          }
          else echo "<p class=center>Wrong file types</p><br/>";
        }
        else echo "<p class=center>file is too big</p><br/>";
        
        return NULL;
    }
    
    function bug()
    {
        echo '
        <div>
            <form id="form1" method="post"  action="about.php?bugreport=set">
                <div class=t-d>
                    <table border=0 style="text-align:left" class="bug-table">
                        <tr><td class=td-bug>Your Name:</td><td> <input type="text" name="name"></td></tr>
                        <tr><td class=td-bug>Report A Bug:</td><td>  <textarea id=area-width rows="4" cols="50" name="bug"></textarea></td></tr>
                    </table>
                <div>
                <div id="button-div">
                    <button type="submit" value="Submit" class="default1 button1 but"  name="submit">Submit</button>
                    <button type="reset" value="Reset" class="default1 button2">Reset</button>
                </div>
            </form>
        <div>
        ';
    
        $name = $_POST['name'];
        $bug = $_POST['bug'];
        
        date_default_timezone_set("America/New_York");
    
        if(isset($_POST['submit']))
        {
            echo "<hr>";
    
            if($bug == NULL)
            {
                echo "<h3 class=center>TextArea Empty. Please Report Bug :)</h3>";
            }
            elseif($name == NULL)
            {
                //can save in database as anonymous if name is empty
                echo "<h3 class=center>Please Enter Your Name :)</h3><br>";
            }
            else
            {
                // save comment to database
                $conn = connection();
                $sql = "INSERT INTO bugreport VALUES ('', '".$_POST['name']."','".date("Y-m-d h:i:sa")."','".$_SERVER['REMOTE_ADDR']."','".$_POST['bug']."')";
                my_sql_exec($conn, $sql);
                
                echo "<h3 class=center>Thank You For Your Report!</h3><br>";
                echo "
                        <div class=submitbug>
                            <p class=center>Your Submission</p><br><p>" . $_POST['bug']. "</p>
                        </div>
                        
                    ";
            }
        }   
    }
    
    function feedback()
    {
        echo '
            <div>
                <form id="form1" method="post"  action="about.php?feedback=set" >
                    <div class=t-d>
                        <table border=0 style="text-align:left" class="bug-table">
                            <tr><td class=td-bug>Your Name:</td><td> <input type="text" name="name"></td></tr>
                            <tr><td class=td-bug>Your Feedback:</td><td>  <textarea id=area-width rows="4" cols="50" name="feed"></textarea></td></tr>
                        </table>
                    <div>
                    <div id="button-div">
                        <button class=but type="submit" name="submit" value="Submit" form="form1" class="default1 button1">Submit</button>
                        <button type="reset" value="Reset" form="form1" class="default1 button2">Reset</button>
                    </div>
                </form>
            <div>
            ';
    
        $name = $_POST['name'];
        $feed = $_POST['feed'];
        
        date_default_timezone_set("America/New_York");
    
        if(isset($_POST['submit']))
        {
            echo "<hr>";
    
            if($feed == NULL)
            {
                echo "<h3 class=center>TextArea Empty. Please Provide Feedbacks :)</h3>";
            }
            elseif($name == NULL)
            {
                //can save in database as anonymous if name is empty
                echo "<h3 class=center>Please Enter Your Name :)</h3>";
            }
            else
            {
                // save comment to database
                $conn = connection();
                $sql = "INSERT INTO feedback VALUES ('', '".$_POST['name']."','".date("Y-m-d h:i:sa")."','".$_SERVER['REMOTE_ADDR']."','".$_POST['feed']."')";
                my_sql_exec($conn, $sql);
                
                echo "<h3 class=center>Thank You For Your Feedback!<h3><br>";
                echo "
                        <div class=submitbug>
                            <p class=center>Your Submission</p><br>
                            <p>" . $_POST['feed']. "</p>
                        </div>
                        
                    ";
            }
        }
    }
    
    function author()
    {
        echo '
                <img class=author src="./img/authors_img/rodny0.jpg" alt="Image Not Available"/>                   
                <h3 class=center> Rodny Joseph</h3>
                <h6 class=center> Lead Developer & Creator</h6>
                <br>
                <h4 class=center>PHP Certified</h4>
                <br>
                <a href="http://www.refsnesdata.no/certification/w3certified.asp?id=8078597">
                <img class=default src="./img/extra/w3cert.png" border="0" /></a>
                <br>
                <h4 class=center><a href=https://www.linkedin.com/in/rodnyjoseph> Add Me On LinkedIn</a></h4>
        ';
    }
    
    
    function display_events()
    {
        echo "<div class=flex-container-discover>"; 
        //will grab all contents from database and display them by their name
        while($row = $result->fetch_assoc())
        {
            //if event_img is null, then do
            if($row["event_img"] == "")
            {
                //starts echo "<div class=discover-main>";
                echo "<div class=discover-main>";
                    echo "<img class='default_event_img' src='./img/event_img/partypeople5454.jpg' alt='Image Not Available 1'>";
            }
            else
            {
                echo "<div class=discover-main>";
                    //displays event image that user uploaded
                    echo "<img class='custom_event_img' src='".$row["event_img"]."' alt='Image Not Available 2'>";
            }
            //echo's the event informations
            echo "
                    <div class=event-details>
                        <div class='flex_check padd'>
                            <h2 class=flex_check_child>Event Name</h2>
                            <h3 class=flex_check_child>Location</h3>
                        </div>
                        
                        <div class='flex_check padd'> 
                            <p class=flex_check_child>" . $row['event_name'] . "</p>
                            <p class=flex_check_child>" . $row['location'] . "</p>
                        </div>
                        <br>
                        
                        <p><h3>Description</h3>" . $row['description'] . "</p><br>
                        
                        <div class=flex_check>
                            <p class=flex_check_child><h3>Start Date Start Time</h3> " . $row['start_time'] . "</p><br>
                            <p class=flex_check_child><h3>End Date End Time</h3> " . $row['end_time'] . "</p><br>
                        </div>
                        <br>
                        <h3><a href=rsvp.php?rsvp_for_event=".$row['event_id'].">RSVP For This Event</a></h3><br>
                    </div>
                ";
                //ends echo "<div class=discover-main>";
                echo "</div>";
        }
        echo "</div>";
    }
    
    /////////////////////// RSVP FUNCTIONS //////////////////////////////////////////////////////////////////////
    function my_rsvp_func($result)
    {
        $conn = connection();
        $sql = "SELECT * FROM RSVP WHERE user_id ='".$_SESSION['userid']."';";
        $run = my_sql_exec($conn, $sql);
    
        //echo "<div class='default default-80'>";
        while($rsvp_rows = $run->fetch_assoc()) // fetches all rows that meets condition
        {
            // troubleshoot echo $rsvp_rows['event_id'];
            $sql2 = "SELECT * FROM Event WHERE event_id ='".$rsvp_rows['event_id']."';";
            $result = my_sql_exec($conn, $sql2);
            
            //Creating a table to place the contents
            echo "<table class=rsvp>";
            echo "<tbody>";
            
            //will grab all contents from database and display them by their name
            while($row = $result->fetch_assoc())
            {
               
                //if event_img is null, then do
                if($row["event_img"] == "")
                {
                    //table row start
                    echo "<tr>"; 
                    //starts echo "<div class=discover-main>";
                    //echo "<div class=discover-main>";
                        echo "<td>";
                            echo "<a href=request_song_redirect.php?rsvp_id=".$rsvp_rows['rsvp_id']."> 
                                        <img class='call_event_img' src='./img/event_img/partypeople5454.jpg' alt='Image Not Available 1'>
                                  </a>";
                        echo "</td>";
                }
                else
                {
                    //table row start
                    echo "<tr>";
             //       echo "<div class=discover-main>";
                        //displays event image that user uploaded
                        echo "<td>";
                            echo "
                                    <a href=request_song_redirect.php?rsvp_id=".$rsvp_rows['rsvp_id']."> 
                                        <img class='all_event_img' src='".$row["event_img"]."' alt='Image Not Available 2'>
                                    </a>
                                ";
                        echo "</td>";
                }
                        //echo's the event informations
                        echo "
                                <td>
                                     <a href=request_song_redirect.php?rsvp_id=".$rsvp_rows['rsvp_id'].">
                                        <ul>
                                            <li class=rsvp>Event Name: '" . $row['event_name'] . "'</li>
                                            <li class=rsvp>Location: '" . $row['location'] . "'</li>
                                            <li class=rsvp>Description: '" . $row['description'] . "'</li>
                                            <li class=rsvp>Start Date & Time: '" . $row['start_time'] . "'</li>
                                            <li class=rsvp>End Date & Time: '" . $row['end_time'] . "'</li>
                                        </ul>
                                    </a>
                                </td>
                       
                            ";
                    //ends echo "<div class=discover-main>";
            //        echo "</div>";
                    echo "</tr>";
            echo "</a>";
            }
            echo "</tbody>";
            echo "</table>";
        }
    }
    
    
    function remove_on($result)
    {
        $conn = connection();
        
        if($_GET['remove_event'] == "on")
        {
        include './php/redirect.php';
        exit;
        }    
        
        echo "<h1 class='center rsvp_header'> Click An Event To Remove RSVP</h1>";
        echo "<div class='default default-10'> <button><a href='eventviewer.php?choice=2'> Return</a></button></div>";
        echo "<hr>";
                
                //WHERE RSVP.user_id ='".$_SESSION['userid']."'
        $sql = 
                "SELECT RSVP.rsvp_id, RSVP.event_id, RSVP.user_id, 
                        Event.event_name, Event.location, Event.description, 
                        Event.start_time, Event.end_time, Event.user_id, Event.event_img
                FROM RSVP
                INNER JOIN Event
                ON RSVP.event_id=Event.event_id
                WHERE RSVP.user_id ='".$_SESSION['userid']."';
            
            ";
        
        $result = my_sql_exec($conn, $sql);
        
        //echo '<div class="flex-container-delete">';    
        //will grab all contents from database and display them by their name
        echo '<div class="flex-container-delete">';  
        
        while($row = $result->fetch_assoc())
        {    
            if($row["event_img"] == "")
            {
                //starts echo "<div class=discover-main>";
                //echo "<div class=discover-main>";
                echo "
                        <div class='flex-item-delete'>
                            <a class=a-delete href=eventviewer.php?choice=2&remove=on&remove_event=on&rsvp_id=".$row["rsvp_id"].">
                               <!-- <div class=a-delete>
                                    <p class=in> Name </p>
                                    <p class=in> Location </p> -->
                                <img class='call_event_img_2' src='./img/event_img/partypeople5454.jpg' alt='Image Not Available 1'>
                            
                        
                    ";
            }
            else
            {
                echo "
                        <div class='flex-item-delete'>
                            <a href=eventviewer.php?choice=2&remove=on&remove_event=on&rsvp_id=".$row["rsvp_id"].">
                                <!--<div class=a-delete>
                                    <p class=in> Name </p>
                                    <p class=in> Location </p> -->
                                <img class='all_event_img_2' src='".$row["event_img"]."' alt='Image Not Available 2'>
                                
                              
                        
                    ";
            }
            echo '
                            <h3>'.$row["event_name"].'</h3>
                            <p class=container-pat>'.$row["description"].'</p>
                           <!-- </div> -->
                        </a>
                    </div>
            ';              
        }
        echo '</div>';
    }
    
    /////////////////// MY EVENTS /////////////////////////////////////////////////////////////////////////////////

    function my_event($result)
    {
        echo "<h1 class='center rsvp_header'> CLICK AN EVENT TO SEE REQUESTED SONGS</h1>";
        echo "<div class='default default-28'> <button><a href='eventviewer.php?choice=3&delete=on'> Click Here To Delete An Event</a></button></div>";
        echo "<hr>";
        
        //will grab all contents from database and display them by their name
        while($row = $result->fetch_assoc())
        {
        //Creating a table to place the contents
        echo "<table class=rsvp>";
        echo "<tbody>";
            
            //if event_img is null, then do
            if($row["event_img"] == "")
            {
                //table row start
                echo "<tr>"; 
                //starts echo "<div class=discover-main>";
                //echo "<div class=discover-main>";
                    echo "<td>";
                        echo "
                                <a class=ax href=song_requests.php?songrequest=".$row["event_id"].">
                                    <img class='call_event_img' src='./img/event_img/partypeople5454.jpg' alt='Image Not Available 1'>
                                </a>
                            ";
                    echo "</td>";
            }
            else
            {
                //table row start
                echo "<tr>";
         //       echo "<div class=discover-main>";
                    //displays event image that user uploaded
                    echo "<td>";
                        echo "
                                <a href=song_requests.php?songrequest=".$row["event_id"].">
                                <img class='all_event_img' src='".$row["event_img"]."' alt='Image Not Available 2'>
                                </a>
                            ";
                    echo "</td>";
            }
                    //echo's the event informations
                    echo "
                            <td>
                            <a href=song_requests.php?songrequest=".$row["event_id"].">
                                <ul>
                                    <li class=rsvp>Event Name: " . $row['event_name'] . "</li>
                                    <li class=rsvp>Location: " . $row['location'] . "</li>
                                    <li class=rsvp>Description: " . $row['description'] . "</li>
                                    <li class=rsvp>Start Date & Time: " . $row['start_time'] . "</li>
                                    <li class=rsvp>End Date & Time: " . $row['end_time'] . "</li>
                                  <!--  <li class=rsvp>Song Request Limit: " . $row[''] . "</li> -->
                                </ul>
                            </a>
                            </td>
                   
                        ";
                //ends echo "<div class=discover-main>";
        //        echo "</div>";
                echo "</tr>";
        echo "</tbody>";
        echo "</table>";
        }
    }
    
    function delete_on($result)
    {
    
      if($_GET['delete_event'] == "on")
      {
       include './php/redirect.php';
        exit;
      }
        echo "<h1 class='center rsvp_header'> Caution!! <br>Events CAN'T be retrieved once Deleted!!! :( <br> Click An Event To Delete</h1>";
        echo "<div class='default default-10'> <button><a href='eventviewer.php?choice=3'> Return</a></button></div>";
        echo "<hr>";
        
        echo '<div class="flex-container-delete">';    
        //will grab all contents from database and display them by their name
        while($row = $result->fetch_assoc())
        {
        
            if($row["event_img"] == "")
            {
                //starts echo "<div class=discover-main>";
                //echo "<div class=discover-main>";
                echo "
                        <div class='flex-item-delete'>
                            <a class=a-delete href=eventviewer.php?choice=3&delete=on&delete_event=on&event_id=".$row["event_id"].">
                               <!-- <div class=a-delete>
                                    <p class=in> Name </p>
                                    <p class=in> Location </p> -->
                                <img class='call_event_img_2' src='./img/event_img/partypeople5454.jpg' alt='Image Not Available 1'>
                            
                        
                    ";
            }
            else
            {
                echo "
                        <div class='flex-item-delete'>
                            <a href=eventviewer.php?choice=3&delete=on&delete_event=on&event_id=".$row["event_id"].">
                                <!--<div class=a-delete>
                                    <p class=in> Name </p>
                                    <p class=in> Location </p> -->
                                <img class='all_event_img_2' src='".$row["event_img"]."' alt='Image Not Available 2'>
                                
                              
                        
                    ";
            }
            echo '
                            <h3>'.$row["event_name"].'</h3>
                            <p class=container-pat>'.$row["description"].'</p>
                           <!-- </div> -->
                        </a>
                    </div>
            ';
        
        }
        echo '</div>';
    }
    
    
    function profile_prep()
    {

        $username = htmlspecialchars(trim($_POST['username']));
        $passwrd = htmlspecialchars(trim($_POST['passwrd']));
        $submit = $_POST['submit'];
        
        if(isset($submit)){
            echo "<hr>";
            if($username == NULL)
                echo "<p class=center> Username Required </p>";
            elseif($passwrd == NULL)
                echo "<p class=center> Password Is Required </p>";
            else{
                $conn = connection();
            
                //VERIFY IF ID AND PASSWORD MATCH OUR DATABASE
                $sql = "SELECT * FROM Users WHERE username ='".$username."'".
                        "AND password='".md5($passwrd)."'". ";";
            
                $result = my_sql_exec($conn, $sql);
                if(mysqli_num_rows($result)<=0) //user failed to log in
                {
                        echo "<p class=center> INVALID USERNAME OR PASSWORD, PLEASE TRY AGAIN</p><br/>";
                }
                else
                {
                    $row = mysqli_fetch_row($result);
                    $_SESSION['userid'] = $row[0];
                    $_SESSION['firstname'] = $row[1];
                    $_SESSION['lastname'] = $row[2];
                    $_SESSION['passwrd'] = $row[3];
                    $_SESSION['email'] = $row[4];
                    $_SESSION['username'] = $row[5];
                    $_SESSION['profile_img'] = $row[6];
                    
                    header("Location:profile.php");
                }
            
            }
        }        
    }
    
?>