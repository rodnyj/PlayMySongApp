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
	margin-left: 0.5%;
	margin-right: 0.5%;
	padding: 25px;
	background: lightgray;
	color: white;
}

#homepage{

}

section{
    background: white;
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
    border-radius: 20px;
}

a{
    
}

/* Colors ---------------------- */
.riri{
    background: #232f3e;
}

.titi{
    background: #841B2D;
}

.mimi{
    background: #3B444B;
}

/* Screensize 900px or larger---------- */
@media(min-width: 900px){
    main{
        display: flex;
    }
    section{
        flex: 4;
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