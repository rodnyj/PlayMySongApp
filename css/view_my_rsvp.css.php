<?php
	header('Content-type: text/css; Charset: UTF-8');
?>

.rsvp_header{
    padding: 3%;
}

.all_event_img{
    max-width: 200px;
    padding-left: 4%;
}

.all_event_img_2{
    max-width: 200px;
    padding-left: 4%;
}

.call_event_img{
    padding: 4%;
    max-width: 200px;
}

.call_event_img_2{
    padding: 4%;
    max-width: 200px;
}

table.rsvp{
    border: 2px solid black;
    border-radius: 5px;
    margin: 2%;
}

li.rsvp{
    margin-bottom: 1%;
}

a.rsvp{
    text-decoration: underline;
}

/* Media Query ------------------------- */

@media screen and (max-width: 600px){

    .all_event_img{
        width: 100px;
        padding-left: 4%;
    }
    
    .call_event_img{
        padding: 4%;
        width: 100px;
    }
}