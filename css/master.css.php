/*master.css*/

<?php
	header('Content-type: text/css; Charset: UTF-8');
?>

.default{
    display: block;
    margin: 0 auto;
}

.default-80{
    width: 80%;
}


h1, h2, h3, h4, h5, h6, p, body {
	margin: 0;
	padding: 0;
}

html {
  height: 100%;
}

body {
    min-height: 100%;
    width: 100%;
	display: flex;
	flex-direction: column;
}

main{
	flex: 1 0 auto;
}

footer {
  background: #333;
  color: white;
  text-align: center;
}

#logo{
    background: gray;
    font-size: 23px;
    
}
/* Logo --------------------------- */
li#logo a {
    color: #330000;
    font-family: "Comic Sans MS", cursive, sans-serif
}

li#logo a:hover:not(.active) {
    background-color: gray;
}

/* Nav ---------------*/
ul.main-nav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    top: 0;
    width: 100%;

}

ul.main-nav li {
    float: left;
}

ul.main-nav li a {
    display: block;
    color: white;
    padding: 14px 16px;
    height: 20px;
    text-decoration: none;
    text-align: center;
    padding-top: 15px;
}

ul.main-nav li a:hover:not(.active) {
    background-color: #111;
}

ul.main-nav li a.active {
    background-color: brown;
}

ul.main-nav li.dropdown {
    float: right;
}

/* Drop Down -------------------------- */

.dropbtn{
    font-size: 20px;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: gray;
    min-width: 95px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    margin-right: 50%;
}

.dropdown-content-log {
    min-width: 142px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.center{
    text-align: center;
}

.bold{
    font-weight: bold;
    font-size: 17px;
    color: darkblue;
}

/* Media Query ---------------------------- */

@media screen and (max-width: 600px){
    ul.main-nav li.dropdown,
    ul.main-nav li {float: none;}
    .dropdown-content{ width: 100%; opacity: 0.8;}
    
    ul.main-nav li a {

        padding: 10px 16px;
        height: 20px;
        padding-top: 10px;
    }


}

/* id -------------------- */


/* class -------------------- */

.butn{
    font-size: 50px;
}

.bb{
    position: relative;
    display: block;
    margin: 0 auto;
    top: 25%;
}