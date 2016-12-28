<?php
	header('Content-type: text/css; Charset: UTF-8');
?>

main{
    background-color: lightgrey;
}

input.radio {
    width: auto;
    display: inline;

}

no-block{
    display: inline;
}

.discover-main{
    border: 3px solid darkblue;
    diplay: block;
    margin: 0 auto;
    height: 100%;
    margin-bottom: 1%;
}

.padd{
    padding-top: 1%;
    padding-left: 5%;
    padding-right: 5%;
}

.center2{
    margin-left: 39%;
}
.center3{
    margin-left: 48%;
}

inline{
   display: inline-block;
}

.default_event_img{
    display: block;
    margin: 0 auto;
    width: 100%;
}

.custom_event_img{
    display: block;
    margin: 0 auto;
    width: 100%;
}

.event-details{
    text-align: center;
}

a.a{
    text-decoration: underline;
    color: darkblue;
}

    .flex_check{
        display: flex;
        background-color: gray;
    }
    
    .flex_check_child{
        flex: 1;
    }

/* ---------------------------------------------- Media Queries ------ */
@media screen and (min-width: 781px){
    .flex-container-discover{
        display: flex;
        flex-wrap: wrap;
        width: 90%;
        margin: 0 auto;
    }
    
    .discover-main{
        width: 30%;
    }
}

/* ------------------------------------------------ Media Queries ---- */
@media screen and (max-width: 780px){
    body{
        background-color: lightgray;
    }
    
    .discover-main{
        width: 90%;
        margin-bottom: 3%;
    }
    
    .center{
        margin: 3%;
    }
    
    .center2{
        margin-left: 35%;
        display: block;
        border: 2px solid black;
        border-radius: 5px;
    
    }
    
    .center3{
        margin-top: 4%;
        margin-left: 46%;
        display: block;
    
    }
    
    .center4{
        margin-left: 32%;
        border: 2px solid black;
        border-radius: 5px;
        margin-top: 2%;
    }
    
    .center5{
        border: 2px solid black;
        border-radius: 5px;
        margin-top: 2%;
    }

}