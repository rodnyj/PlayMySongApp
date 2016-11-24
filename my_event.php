                
                <?php 
                            $sql = "SELECT * FROM Event WHERE user_id='" .$_SESSION['userid']. "';";

                            $result = my_sql_exec($conn, $sql);
                            if(mysqli_num_rows($result)<=0) //if it is empty or returns zero
                            {
                                    echo "<p class=center> You Dont Have Any Events. <a href=eventviewer.php?choice=1>CLICK HERE</a> To Create Events</p><br/>";
                            }
                            else
                            {

                                $myEvent_header = array(//'Event Token#',
                                                        'Event Name', 'Event Location', 'Event Description', 'Start Date & Time', 'End Date & Time', 'Song Request Limit', 'All Song Requests');
                                echo '<table class=mytable>';
                                echo '<tr class="myevent bold">';
            
                                for($h=0; $h < count($myEvent_header); $h++)
                                {
                                    echo "<td class=myevent>" .$myEvent_header[$h] . "</td>";
                                }
                                echo "</tr>";
                                
                                
                                while($row = $result->fetch_assoc()) // mysqli_fetch_assoc($result);
                                {
                                    echo "<tr class=myevent>";
                                    //echo "<td class=myevent>".$row["event_id"] . "</td>";
                                    echo "<td class=myevent>".$row["event_name"] . "</td>";
                                    echo "<td class=myevent>".$row["location"] . "</td>";
                                    echo "<td class=myevent>".$row["description"] . "</td>";
                                    echo "<td class=myevent>".$row["start_time"] . "</td>";
                                    echo "<td class=myevent>".$row["end_time"] . "</td>";
                                    echo "<td class=myevent>".$row["song_request_Limit"] . "</td>";
                                    echo "<td class=myevent><a href=song_requests.php?songrequest=".$row["event_id"]."> SONG REQUESTS </a></td>";                                    
                                    echo "</tr>";

                                }
                                
                                echo "</table>";

                                   // echo "Ability to Modify Date And Event Information Coming Soon";
                            }
                                    
                    ?>