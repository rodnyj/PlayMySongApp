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

section{
    text-align: center;
         border-left: thick solid black;
    border-right: thick solid black;
}

.reportError_div{
    display: block;
    margin: 0 auto;
}

/* Screensize 900px or larger---------- */
@media(min-width: 781){
    main{
        display: flex;
    }
    section{
        flex: 1;
    }
    
    aside{
        flex: 1;
    }
}

@media(max-width: 780px){
    main{
        margin: 0;
    }

}