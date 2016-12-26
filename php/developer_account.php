<?php

    require 'corefunc.php';
    
    $conn = connection();
    
    $password = "PriceClass2016";
    $devpass = md5($password);
    
    $sql = "SELECT * FROM Users WHERE username='".Developer."';";
    $result = my_sql_exec($conn, $sql);
    
    if(mysqli_num_rows($result) <= 0)
    {
        $sql = "INSERT INTO Users VALUES ('', 'Developer', 'Account', '".$devpass."', 'playmysong2016@gmail.com', 'Developer', '../img/developer/developer.jpg');";
        
        my_sql_exec($conn, $sql);
    }

    /////////////////////////////////////////////// create Users table
    	//verify if table is already created
        $sql = "SHOW TABLES LIKE 'bugreport';";
        $result = my_sql_exec($conn, $sql);
        //table does not exist
        if(mysqli_num_rows($result) <= 0)
        {
            $sql = "
                    CREATE TABLE bugreport (
                    
                	report_id int auto_increment NOT NULL PRIMARY KEY,
                	name varchar(40),
                	date_entered varchar(100),
                	IPAddress varchar(40),
                	report varchar(1000)
                	);
            ";
            my_sql_exec($conn, $sql);
        }
    
    /////////////////////////////////////////////// create Users table
    	//verify if table is already created
        $sql = "SHOW TABLES LIKE 'feedback';";
        $result = my_sql_exec($conn, $sql);
        //table does not exist
        if(mysqli_num_rows($result) <= 0)
        {
            $sql = "
                    CREATE TABLE feedback (
                    
                	feedback_id int auto_increment NOT NULL PRIMARY KEY,
                	name varchar(40),
                	date_entered varchar(100),
                	IPAddress varchar(40),
                	feed varchar(1000)
                	);
            ";
            my_sql_exec($conn, $sql);
        }
mysqli_close($conn);
?>