<?php

        $sql = "SELECT * FROM RSVP WHERE user_id ='".$_SESSION['userid']."';";

        $run = my_sql_exec($conn, $sql);
        if(mysqli_num_rows($run)<= 0)
        {
            echo "<h1 class=center> You Don't Have Any RSVP's :(.<br> <a href=discover.php> CLICK HERE TO RSVP FOR EVENTS </a>";
        }
        else
        {
            while($rsvp_rows = $run->fetch_assoc()) // fetches all rows that meets condition
            {
                // troubleshoot echo $rsvp_rows['event_id'];
                $sql2 = "SELECT * FROM Event WHERE event_id ='".$rsvp_rows['event_id']."';";
                $result = my_sql_exec($conn, $sql2);
                
                //displays the event    
                include './php/display_events_rsvp.php';
            }
        }

//while($row = $result->fetch_assoc()) // mysqli_fetch_assoc($result);


?>