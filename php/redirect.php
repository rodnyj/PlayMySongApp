<?php


if(isset($_GET['approval']))
{
include 'my_sql_exec.php';
$conn = connection();
    if($_GET['approval'] == 'y')
    {
        $sql = "UPDATE SongRequest SET approval='Y' WHERE song_id='".$_GET['song_id']."'"; //alter approaval to y
        $result = my_sql_exec($conn, $sql);
    }
      //echo $_GET['song_id'] . "<br>" . $_GET['songrequest_id'];
    elseif($_GET['approval'] == 'w')
    {
        $sql = "UPDATE SongRequest SET approval='W' WHERE song_id='".$_GET['song_id']."'"; //alter approaval to w
        $result = my_sql_exec($conn, $sql);
    }
    elseif($_GET['approval'] == 'n')
    {
        $sql = "UPDATE SongRequest SET approval='N' WHERE song_id='".$_GET['song_id']."'"; //alter approaval to w
        $result = my_sql_exec($conn, $sql);
    }
    else
    {
        
    }

    mysqli_close($conn);
    header('location: ../song_requests.php?songrequest='.$_GET['songrequest_id']);
}

if($_GET['delete_event'] == "on")
{
    $conn = connection();
    $sql = "DELETE FROM Event WHERE event_id=".$_GET['event_id'].";";
    //$sql = "SELECT * FROM Event WHERE event_id=".$_GET['event_id'].";";
    my_sql_exec($conn, $sql);
    
    $sql = "DELETE FROM RSVP WHERE event_id=".$_GET['event_id'].";";
    //$sql = "SELECT * FROM Event WHERE event_id=".$_GET['event_id'].";";
    my_sql_exec($conn, $sql);    

   header('location: eventviewer.php?choice=3&delete=on');
}
else if($_GET['remove_event'] == "on")
{
    $conn = connection();
    $sql = "DELETE FROM RSVP WHERE rsvp_id=".$_GET['rsvp_id'].";";
    //$sql = "SELECT * FROM Event WHERE event_id=".$_GET['event_id'].";";
    my_sql_exec($conn, $sql);

   header('location: eventviewer.php?choice=2&remove=on');
}
else
{
    echo "ACESS DENIED";
    //header('location: ../');
}
?>