<?php
	header('Content-type: text/css; Charset: UTF-8');
?>

table.mytable{
   border: 3px solid black;
   padding: 15px;
}

tr.myevent, th.myevent, td.myevent {
   border: 3px solid black;
   padding: 15px;
}

.default-28{
   width: 28%;
}

.default-10{
   width: 10%;
}

a-delete{
   position: relative;
}

.flex-item-delete:hover {
    border: 5px solid #777;
}

.container-pat{
   padding: 10px;
}

/* Media Query ---------------------------------------- */
@media screen and (min-width: 601px){

    .flex-container-delete {
        display: flex;
        flex-wrap: wrap;
    }
    
    .flex-item-delete {
        width: 30%;
        margin: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        text-align: center;
    }

}

/* Media Query ---------------------------------------- */
@media screen and (max-width: 601px){
    
    .flex-item-delete {
        margin: 20px;
        box-shadow: 3px 5px 0 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        text-align: center;
    }
}