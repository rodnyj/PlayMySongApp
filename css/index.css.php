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
	background: lightgray;
	color: black;
}

#homepage{

}

section{
    margin-right: 2%;
}

aside{
    margin-top: 1.5%;
}

article{
    margin: 2%;
    padding: 2%; 
    border-radius: 20px;
}

.side-img{
    max-width: 100%;
}

/* ---------------------------------------- calendar ----------- */
div.cal {
  display: block;
  margin: 0 auto;
  margin-top: 2%;
  margin-bottom: -4%;
  width: 250px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
}

div.cal2 {
    background-color: darkblue;
    color: white;
    padding: 10px;
    font-size: 40px;
}

div.cal3 {
    padding: 10px;
}

/* Colors ---------------------- */
.riri{
    background-image: url("../img/homepage/cb1532b03a0ffa6c8c26d0348a7eb60d.jpg");
}

.titi{
    background: darkgrey;
}

.mimi{
    background: #3B444B;
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
        flex:1;
    }
}

/* Smartphones (portrait and landscape) ----------- */
@media only screen 
and (max-device-width : 780px) {

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