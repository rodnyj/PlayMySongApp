<!DOCTYPE html>
<html>

    <head>
    
        <!-- meta -->
        <?php include './php/meta.php';?>
        
        <title>
            PlayMySong
        </title>
        
    	<!-- stylesheet -->
    	<link rel="stylesheet" type="text/css" href="./css/master.css.php">
    	<link rel="stylesheet" type="text/css" href="./css/eventviewer.css.php">
    	<link rel="stylesheet" type="text/css" href="./css/create_event.css.php">
    	<link rel="stylesheet" type="text/css" href="./css/my_event.css.php">
    	<link rel="stylesheet" type="text/css" href="./css/view_my_rsvp.css.php">
    
        <!--	<link rel="stylesheet" type="text/css" href="./css/view_my_rsvp.php">  -->
    
    </head>
    
    <body>
    
        <?php
            echo "NEXT STRUGGLE!";
            include './php/my_sql_exec.php';
            
            include './php/display_events_rsvp.php'; 
            my_rsvp_func($result);
        
        ?>
    </body>

</html>