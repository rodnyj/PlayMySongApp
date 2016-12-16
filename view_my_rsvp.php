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
            //displays the event    
            include './php/display_events_rsvp.php';
        }
//while($row = $result->fetch_assoc()) // mysqli_fetch_assoc($result);
?>