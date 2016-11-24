<?php
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
                <p><h2>Event Name</h2> '" . $row['event_name'] . "'</p><br>
                <p><h3>Location</h3> '" . $row['location'] . "'</p><br>
                <p><h3>Description</h3>'" . $row['description'] . "'</p><br>
                <p><h3>Start Date & Time</h3> '" . $row['start_time'] . "'</p><br>
                <p><h3>End Date & Time</h3> '" . $row['end_time'] . "'</p><br>
                <h3><a class=a href=request_song_redirect.php?rsvp_id=".$rsvp_rows['rsvp_id'].">Request Songs</a></h3><br>
            </div>
        ";
        //ends echo "<div class=discover-main>";
        echo "</div>";
}
?>


