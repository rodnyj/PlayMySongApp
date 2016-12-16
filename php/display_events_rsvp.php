<?php

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
?>


