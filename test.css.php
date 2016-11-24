<?php
	header('Content-type: text/css; Charset: UTF-8');
?>

/* Screensize 900px or larger---------- */
@media(min-width: 900px){
    
    <?php
                if(isset($_GET['choice'])){
                    
                    if($_GET['choice'] == 1){
                        echo "Create Event<br>";
                        echo "<a href=song_requests.php> Song Requests</a>";
                    }
                    
                    if($_GET['choice'] == 2){
                        echo "My RSVP's";
                    }
                    
                    if($_GET['choice'] == 3){
                        echo "My Events";
                    }
                }
    ?>
}


@media(max-width: 600px){
    
    <?php
                if(isset($_GET['choice'])){
                    if($_GET['choice'] == 1){
                    echo "111111";
                    }
                    
                    if($_GET['choice'] == 2){
                         echo "435432532453";
                    }
                    
                    if($_GET['choice'] == 3){
                        echo "345234546";
                    }
                }
    ?>

}