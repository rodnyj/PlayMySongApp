                
                <?php 
                            $sql = "SELECT * FROM Event WHERE user_id='" .$_SESSION['userid']. "';";

                            $result = my_sql_exec($conn, $sql);
                            if(mysqli_num_rows($result)<=0) //if it is empty or returns zero
                            {
                                    echo "
                                    <div class=bb>
                                    <h3 class=center> You Dont Have Any Events :(<br><br> To Create Your First Event<br> Click Below &darr;<br> 
                                    <button class=butn>
                                    <a href=eventviewer.php?choice=1>CREATE EVENT</a>
                                    </button>
                                    </h3><br/>
                                    </div>
                                    ";
                            }
                            else
                            {
                                include './php/display_my_events.php';

                                   // echo "Ability to Modify Date And Event Information Coming Soon";
                            }
                                    
                    ?>