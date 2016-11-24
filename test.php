<?php
	    //create database connection
        $hostname = "127.0.0.1";
        $password = "";
        $username = "rodnyjoseph";
        $dbname = "c9";
        $port = 3306; 
        $connection = mysqli_connect($hostname, $username, $password, $dbname, $port);
            if(!$connection)
            die("Connection failed: ".mysqli_connect_error());

    //And now to perform a simple query to make sure it's working
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    echo $result['id'];
    echo "Went throught";
    //while ($row = mysqli_fetch_assoc($result)) {
    //    echo "The ID is: " . $row['id'] . " and the Username is: " . $row['username'];
   // }

?>