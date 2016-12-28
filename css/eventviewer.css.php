<?php
	header('Content-type: text/css; Charset: UTF-8');
?>

html{
background: lightgray;
}

main{
	margin-left: 5%;
	margin-right: 5%;
	padding: 25px;
	background: lightgray;
}

aside{

    margin-right: 2%;
    padding: 5px;
}

section{
    border: 2px solid gray;
    border-radius: 5px;

}

article{
    margin-top: 20%;
    border: 2px solid black;
    border-radius: 5px;
    font-size: 30px;
    text-align: center;
}

a{
    color: black;
    text-decoration: none;
}

.cc{
    position: relative;
}

#create-event1{
    background-color: #008CBA;
}

#create-event1 :hover{
    background-color: #E3E3E3;
    padding: 0;
}

#create-event2 :hover{
    background-color: #E3E3E3;
}

#create-event3 :hover{
    background-color: #E3E3E3;
}

#event_viewer_main_img{
    display: block;
    margin: 0 auto;
    margin-top: 5%;
    width:70%;
    height: 400px;
}

#e_v_m_i_div{
    width: 90%;
    display: block;
    margin: 0 auto;
}

h1.isnotset{
    margin: 10%;
}

h1.isnotset{
    text-align: center;
}

a.isnotset{
    text-decoration: underline;
}

/* Screensize 900px or larger---------- */
@media(min-width: 781px){
    main{
        display: flex;
    }
    section{
        flex: 3;
    }
    
    aside{
        flex: 0.7;
    }
}

/* Screensize 600px or smaller---------- */
@media(max-width: 780px){
    main{
        margin: 0;
        padding: 0;
    }
    
    aside{
        background: 0;
        border: 0;
        margin-right: 0;
        padding: 10px;
    }
    
    article{
        margin-top: 6%;
        padding: 5%;
    }
    
    #create-event1{
        margin-top: 10px;
    }
}