                
                <?php 
                            $sql = "SELECT * FROM Event WHERE user_id='" .$_SESSION['userid']. "';";

                            $result = my_sql_exec($conn, $sql);
                            if(mysqli_num_rows($result)<=0) //if it is empty or returns zero
                            {
                                    echo "<p class=center> You Dont Have Any Events. <a href=eventviewer.php?choice=1>CLICK HERE</a> To Create Events</p><br/>";
                            }
                            else
                            {
                                include './php/display_my_events.php';

                                   // echo "Ability to Modify Date And Event Information Coming Soon";
                            }
                                    
                    ?>