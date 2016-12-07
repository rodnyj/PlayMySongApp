/* about.css.php */

<?php
	header('Content-type: text/css; Charset: UTF-8');
?>

ul.side{
    margin: 0;
    
}

.bug{
    margin-left: 9%;
}

.feed{

}

.version{
    margin-left: 24%;
}

.but{
margin-left: 20%;
}

.submitbug{
    max-width: 80%;
    margin: 0 auto;
}

.bug-table{
    margin-left:1%;
}

#area-width{
    max-width: 70%;
}

.td-bug{
    text-align:right;
    width: 10%;
}

form1{
    margin-left: 40%;
}

.author{
    max-width:30%;
    padding: 1%;
    display: block;
    margin: 0 auto;
}
/*  index.css.php stuff------------------------------------------------------------------------------------------------------ */

/* index.css.php */

<?php
	header('Content-type: text/css; Charset: UTF-8');
?>
html{
background: lightgray;
}

h1{
    text-align: center;
    border: 3px solid gray;
}

main{
	margin-left: 5%;
	margin-right: 5%;
	padding: 25px;
	background: lightgray;
}

#homepage{

}

section{
    background: #867979;
    border: 2px solid grey;
    border-radius: 5px;
    margin-right: 2%;
}

aside{
    background: #a65959;
    border: 2px solid gray;
    border-radius: 5px;

}

article{
    margin: 2%;
    padding: 2%; 
    border: 2px solid black;
    border-radius: 5px;
}

a{
    
}

/* Screensize 900px or larger---------- */
@media(min-width: 900px){
    main{
        display: flex;
    }
    section{
        flex: 3;
    }
    
    aside{
        flex:1;
    }
}

/* Smartphones (portrait and landscape) ----------- */
@media only screen 
and (max-device-width : 604px) {

    /* section article */
    section{
        text-align: center;
        max-width: 99%;
        border: 1px solid gray;
        border-radius: 12px;
        background: silver;
        float: none;
    }
    
    /* aside article */
    
    aside{
        max-width: 99%;
        border: 1px solid #008080;
        border-radius: 12px;
        background: silver;
        flex: 0;
    }
    
    article{
        border: 1px solid #008080;
        border-radius: 12px;   
        flex: 0;
    }
    
    main{
        margin: 0;
        padding-left: 0;
        padding-right: 0;
    }
    
    #homepage{
    }

}