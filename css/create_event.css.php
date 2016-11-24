<?php
	header('Content-type: text/css; Charset: UTF-8');
?>

#create_event_header{
    text-align: center;
    font-size: 4em;
    padding: 2%;
}

.c_e_class{
    margin: 1.5%;
}

/* tooltip function for the date and time of create event -----------*/
.tooltip:hover .tooltiptext {
    visibility: visible;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: gray;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

#create_event_form{
    text-align: center;
    font-size: 2em;
    margin-bottom: 2%;
}

table.createevent{
    display: block;
    margin: 0 auto;
    max-width: 75%;
    
}

input{
    border: 2px solid black;
    width: 99%;
    font-size:25px
}

textarea{
    width: 285px;
    height: 100px;
    resize: none;
    font-size:25px
}

td.createevent{
    text-align: left;
}


/* Media Query ------------------------- */

@media screen and (max-width: 600px){
    #event_viewer_main_img{
        height: 0;
    }

}