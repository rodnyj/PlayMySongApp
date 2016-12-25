<?php
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
?>