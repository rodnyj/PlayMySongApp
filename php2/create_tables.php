<?php
/////////////////////////////////////////////// create Users table
	//verify if table is already created
    $sql = "SHOW TABLES LIKE 'Users';";
    $result = my_sql_exec($conn, $sql);
    //table does not exist
    if(mysqli_num_rows($result) <= 0)
    {
        $sql = "
                CREATE TABLE Users (
                
            	user_id int auto_increment NOT NULL PRIMARY KEY,
            	firstname varchar(40) NOT NULL,
            	lastname varchar(40) NOT NULL,
            	password varchar(32) NOT NULL,
            	email varchar(128) NOT NULL,
            	username varchar(32) NOT NULL,
            	profile_img varchar(100) NOT NULL
            	);
        ";
        my_sql_exec($conn, $sql);
    }
////////////////////////////////////////////// create Event table
	//verify if table is already created
    $sql = "SHOW TABLES LIKE 'Event';";
    $result = my_sql_exec($conn, $sql);
    //table does not exist
    if(mysqli_num_rows($result) <= 0)
    {
        $sql = "
        	CREATE TABLE Event (
        	
        	event_id int unsigned NOT NULL auto_increment PRIMARY KEY,
        	event_name varchar(40) NOT NULL,
        	location varchar(100) NOT NULL,
        	description varchar(500) NOT NULL,
        	start_time datetime NOT NULL,
        	end_time datetime NOT NULL,
        	user_id int UNSIGNED NOT NULL,
        	song_request_Limit int(2),
        	event_img varchar(100) 
        	);
        ";
        my_sql_exec($conn, $sql);
    }

///////////////////////////////////////////////// create RSVP table
	//verify if table is already created
    $sql = "SHOW TABLES LIKE 'RSVP';";
    $result = my_sql_exec($conn, $sql);
    //table does not exist
    if(mysqli_num_rows($result) <= 0)
    {
        $sql = "
        
			CREATE TABLE RSVP (
			rsvp_id int unsigned NOT NULL auto_increment PRIMARY KEY,
			event_id int UNSIGNED NOT NULL,
			user_id int UNSIGNED NOT NULL
			);
        ";
        my_sql_exec($conn, $sql);
    }
///////////////////////////////////////////////////// create WishList table
	//verify if table is already created
    $sql = "SHOW TABLES LIKE 'WishList';";
    $result = my_sql_exec($conn, $sql);
    //table does not exist
    if(mysqli_num_rows($result) <= 0)
    {
        $sql = "
				CREATE TABLE WishList (
				
				wishlist_id int unsigned NOT NULL auto_increment PRIMARY KEY,
				song_id int UNSIGNED NOT NULL,
				user_id int UNSIGNED NOT NULL
				
				);
        ";
        my_sql_exec($conn, $sql);
    }
///////////////////////////////////////////////////// create Songs table
	//verify if table is already created
    $sql = "SHOW TABLES LIKE 'Songs';";
    $result = my_sql_exec($conn, $sql);
    //table does not exist
    if(mysqli_num_rows($result) <= 0)
    {
        $sql = "
			CREATE TABLE Songs (
				
				song_id int unsigned NOT NULL auto_increment PRIMARY KEY,
				song_name varchar(50) NOT NULL,
				genre varchar(25) NOT NULL,
				author varchar(40) NOT NULL
				
				);
        ";
        my_sql_exec($conn, $sql);
    }
/////////////////////////////////////////////////////////// create SongRequest table
	//verify if table is already created
    $sql = "SHOW TABLES LIKE 'SongRequest';";
    $result = my_sql_exec($conn, $sql);
    //table does not exist
    if(mysqli_num_rows($result) <= 0)
    {
        $sql = "
                CREATE TABLE SongRequest (
                song_id int unsigned NOT NULL auto_increment PRIMARY KEY,
                user_id int UNSIGNED NOT NULL,
                event_id int UNSIGNED NOT NULL,
                song_name VARCHAR(50) NOT NULL,
                artist VARCHAR(50),
                approval enum('Y','N')
                );
        ";
        my_sql_exec($conn, $sql);
    }

?>