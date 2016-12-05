<?php

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
            echo "<h1 class='center rsvp_header'> CLICK AN EVENT TO REQUEST A SONG</h1>";
            //echo "<div class='default default-28'> <button> Click Here To Remove An Event</button></div>";
            echo "<hr>";
            //echo "<div class='default default-80'>";
            while($rsvp_rows = $run->fetch_assoc()) // fetches all rows that meets condition
            {
                // troubleshoot echo $rsvp_rows['event_id'];
                $sql2 = "SELECT * FROM Event WHERE event_id ='".$rsvp_rows['event_id']."';";
                $result = my_sql_exec($conn, $sql2);
                
                //displays the event    
                include './php/display_events_rsvp.php';
            }
            //echo "</div>";
        }

//while($row = $result->fetch_assoc()) // mysqli_fetch_assoc($result);


?>