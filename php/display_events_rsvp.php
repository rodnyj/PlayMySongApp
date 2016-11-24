<?php

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
                echo "<img class='call_event_img' src='./img/event_img/partypeople5454.jpg' alt='Image Not Available 1'>";
            echo "</td>";
    }
    else
    {
        //table row start
        echo "<tr>";
 //       echo "<div class=discover-main>";
            //displays event image that user uploaded
            echo "<td>";
                echo "<img class='all_event_img' src='".$row["event_img"]."' alt='Image Not Available 2'>";
            echo "</td>";
    }
            //echo's the event informations
            echo "
                    <td>
                        <ul>
                            <li class=rsvp>Event Name: '" . $row['event_name'] . "'</li>
                            <li class=rsvp>Location: '" . $row['location'] . "'</li>
                            <li class=rsvp>Description: '" . $row['description'] . "'</li>
                            <li class=rsvp>Start Date & Time: '" . $row['start_time'] . "'</li>
                            <li class=rsvp>End Date & Time: '" . $row['end_time'] . "'</li>
                            <li class=rsvp><a class=rsvp href=request_song_redirect.php?rsvp_id=".$rsvp_rows['rsvp_id'].">Request Songs</a></li>
                        </ul>
                    </td>
           
                ";
        //ends echo "<div class=discover-main>";
//        echo "</div>";
        echo "</tr>";
}
echo "</table>";
echo "</tbody>";
?>


