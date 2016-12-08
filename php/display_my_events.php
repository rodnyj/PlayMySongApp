<?php

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
    function iframe()
    {
        
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
            echo "<iframe src='./php/putin_iframe.php'></iframe>";
        }
        else
        {
            echo "
                    <div class='flex-item-delete'>
                        <a href=song_requests.php?songrequest=".$row["event_id"].">
                            <!--<div class=a-delete>
                                <p class=in> Name </p>
                                <p class=in> Location </p> -->
                            <img class='all_event_img_2' src='".$row["event_img"]."' alt='Image Not Available 2'>
                            
                          
                    
                ";
        }
        echo '
                        <p class=container-pat>'.$row["description"].'</p>
                       <!-- </div> -->
                    </a>
                </div>
        ';
    
    }
    echo '</div>';
}
?>


