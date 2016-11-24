<?php

function connection()
{
    //create database connection
    $hostname = "127.0.0.1";
    $password = "";
    $my_username = "rodnyjoseph";
    $dbname = "play_my_song";
    $port = 3306; 
    $conn = mysqli_connect($hostname, $my_username, $password, $dbname, $port);
        if(!$conn)
        die("Connection failed: ".mysqli_connect_error());  
    return $conn;
}

function my_sql_exec($conn, $sql)
{
    if($conn == NULL || $sql == NULL)
        exit();
    //executes the sql query and if it is a SELECT statment, stores the data in $result
     $result = mysqli_query($conn, $sql);
    
    if($result)
    {
     //below to test if getting errors 
     //echo $result;
     //echo "SQL statement done successfully<br/>";
    }
    else 
    {
    //echo "Error<br>";
    //below to test if getting errors  
    //echo "Error: " .$sql."<br/>".mysqli_error($conn);
    }
    return $result;
}
?>