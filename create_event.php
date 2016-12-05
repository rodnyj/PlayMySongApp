<?php include './php/file_upload.php'; ?>
<form id="create_event_form" method="POST" enctype="multipart/form-data" action="eventviewer.php?choice=1" >
    <table class=createevent>
        <tr><td class=createevent>Event Name:</td> <td><input class="c_e_class" id="create_event_name_id" type="text" name="event_name"/></td></tr>
        <tr><td class=createevent>Location:</td> <td><input class="c_e_class" id="create_event_locatio_id" type="text" name="event_location"/></td></tr>
        <tr><td class=createevent>Start Date & Time:</td> <td><input class="c_e_class" id="startdate_id" type="datetime-local" name="start_time"></td></tr>
        <tr><td class=createevent>End Date & Time:</td> <td><input class="c_e_class" id="enddate_id" type="date" name="end_time"></td></tr>
        <!-- <tr><td class=createevent>Song Request Limit:</td> <td><input class="c_e_class" type="text" name="song_request_Limit"></td></tr> -->
        <tr><td class=createevent>Description:</td> <td><textarea class="c_e_class" name="event_description" id="description_id" cols=25 rows=3></textarea></td></tr>
        <tr><td class=createevent>Upload An Image:</td> <td><input class="c_e_class" id="create_event_img_id" type="file" name="myfile"/></td></tr>
    <tr><td><input type="submit" name="submit"/></td>
    <td><input type="reset" name="reset"/></td></tr>
    </table>
</form>

<?php
//event_id    
$event_name = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['event_name'])));
$event_location = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['event_location'])));
$event_description = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['event_description'])));
$start_time = htmlspecialchars(trim($_POST['start_time']));
$end_time = htmlspecialchars(trim($_POST['end_time']));
//user_id
$song_request_Limit = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['song_request_Limit'])));

if(isset($_POST['submit'])){
    if($event_name == NULL)
      echo "Event Name Required";
    elseif($event_location == NULL)
        echo "Location Is Required";
    elseif ($event_description == NULL)
        echo "A Description Is Required";
    else{
        
        $file = uploadfile("myfile", "img/event_img/");
        
        //event_id is included VALUES('', )
        $sql = "INSERT INTO Event VALUES('','".
               
                   $event_name."','".         $event_location."','".
            $event_description."','".             $start_time."','".  
                     $end_time."','".    $_SESSION['userid']."','". 
           $song_request_Limit."','".     $file."'". 
            ");";
    
        my_sql_exec($conn, $sql);
        header("location: eventviewer.php?choice=3");
    }
}
?>
