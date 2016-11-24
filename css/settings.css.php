<?php
	header('Content-type: text/css; Charset: UTF-8');
?>

main{
    padding-top:100px;
    background: lightgray;
}
section{

    display: block;
    margin: 0 auto;
    width: 60%;
    text-align: center;
    border: 2px solid blue;
    border-radius: 12px;
}

table#signup{
    margin-left: 20%;
}

table#signup{
    margin-left: 20%;
}

table#songrequest{
    margin-left: 33%;
}

td{
    padding-right: 10px;
}

input{
    border: 1px solid green;
    width: 90%;
}

form{
    width:100%;
}

.default1 {
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.default2{
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 2px 1px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: white;
    color: black;
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}

.button2 {
    background-color: white;
    color: black;
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: #008CBA;
    color: white;
}

.button3 {
    background-color: white;
    color: black;
    border: 2px solid #009933;
}

.button3:hover {
    background-color: #009933;
    color: white;
}

.button4 {
    background-color: white;
    color: black;
    border: 2px solid #f44336;
}

.button4:hover {
    background-color: #f44336;
    color: white;
}

/* Media Query ------------------------- */

@media screen and (max-width: 600px){

    main{
        padding-top: 0;
    }
    section{
        border: 0;
        border-radius: 0;
        width: auto;
    }
    
    table{
        margin-left: 0;
    }
    
    form{
    margin: 0 auto;
    width: auto%;
    }
    
    div#button-div{
        padding: 0;
    }
}