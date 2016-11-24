<div>
    <form id="form1" method="post"  action="about.php?bugreport=set">
        <div class=t-d>
            <table border=0 style="text-align:left" class="bug-table">
                <tr><td class=td-bug>Your Name:</td><td> <input type="text" name="name"></td></tr>
                <tr><td class=td-bug>Report A Bug:</td><td>  <textarea id=area-width rows="4" cols="50" name="bug"></textarea></td></tr>
            </table>
        <div>
        <div id="button-div">
            <button type="submit" value="Submit" class="default1 button1 but"  name="submit">Submit</button>
            <button type="reset" value="Reset" class="default1 button2">Reset</button>
        </div>
    </form>
<div>

<?php
    include './php/my_sql_exec.php';    
    
    $name = $_POST['name'];
    $bug = $_POST['bug'];
    
    date_default_timezone_set("America/New_York");

    if(isset($_POST['submit']))
    {
        echo "<hr>";

        if($bug == NULL)
        {
            echo "<h3 class=center>TextArea Empty. Please Report Bug :)</h3>";
        }
        elseif($name == NULL)
        {
            //can save in database as anonymous if name is empty
            echo "<h3 class=center>Please Enter Your Name :)</h3><br>";
        }
        else
        {
            // save comment to database
            $conn = connection();
            $sql = "INSERT INTO bugreport VALUES ('', '".$_POST['name']."','".date("Y-m-d h:i:sa")."','".$_SERVER['REMOTE_ADDR']."','".$_POST['bug']."')";
            my_sql_exec($conn, $sql);
            
            echo "<h3 class=center>Thank You For Your Report!</h3><br>";
            echo "
                    <div class=submitbug>
                        <p class=center>Your Submission</p><br><p>" . $_POST['bug']. "</p>
                    </div>
                    
                ";
        }
    }


?>