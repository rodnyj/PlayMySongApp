            <div>
                <form id="form1" method="post"  action="about.php?feedback=set" >
                    <div class=t-d>
                        <table border=0 style="text-align:left" class="bug-table">
                            <tr><td class=td-bug>Your Name:</td><td> <input type="text" name="name"></td></tr>
                            <tr><td class=td-bug>Your Feedback:</td><td>  <textarea id=area-width rows="4" cols="50" name="feed"></textarea></td></tr>
                        </table>
                    <div>
                    <div id="button-div">
                        <button class=but type="submit" name="submit" value="Submit" form="form1" class="default1 button1">Submit</button>
                        <button type="reset" value="Reset" form="form1" class="default1 button2">Reset</button>
                    </div>
                </form>
            <div>

<?php
    include './php/my_sql_exec.php';
    
    $name = $_POST['name'];
    $feed = $_POST['feed'];

    date_default_timezone_set("America/New_York");

    if(isset($_POST['submit']))
    {
        echo "<hr>";

        if($feed == NULL)
        {
            echo "<h3 class=center>TextArea Empty. Please Provide Feedbacks :)</h3>";
        }
        elseif($name == NULL)
        {
            //can save in database as anonymous if name is empty
            echo "<h3 class=center>Please Enter Your Name :)</h3>";
        }
        else
        {
            // save comment to database
            $conn = connection();
            $sql = "INSERT INTO feedback VALUES ('', '".$_POST['name']."','".date("Y-m-d h:i:sa")."','".$_SERVER['REMOTE_ADDR']."','".$_POST['feed']."')";
            my_sql_exec($conn, $sql);
            
            echo "<h3 class=center>Thank You For Your Feedback!<h3><br>";
            echo "
                    <div class=submitbug>
                        <p class=center>Your Submission</p><br>
                        <p>" . $_POST['feed']. "</p>
                    </div>
                    
                ";
        }
    }


?>