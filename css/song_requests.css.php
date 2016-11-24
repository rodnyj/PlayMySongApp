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

.sr_pad{
    max-width: 80%;
    display: block;
    margin: 0 auto;
}

.verticalLine{
     border-left: thick solid black;
     border-right: thick solid black;

}

section{
    text-align: center;
}

article{

}


/* Screensize 900px or larger---------- */
@media(min-width: 900px){
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

@media(max-width: 600px){
    main{
        margin: 0;
    }

}