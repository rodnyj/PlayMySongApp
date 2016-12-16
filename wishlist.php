<h1 class=center>
    Your Wishlist
</h1>

<?php
    
    $conn = connection();
    
    $sql = "
                SELECT *
                FROM SongRequest 
                WHERE user_id=".$_SESSION['userid']."
                ORDER BY artist ASC;;
            ";
            
    $result = my_sql_exec($conn, $sql);
    $count = 1;  

    if(($row = mysqli_num_rows($result)) <= 0)
    {
        echo "<br><h3 class=center> YOU DON'T HAVE ANYTHING IN YOUR WISHLIST </h3>";
    }
    else 
    {
        echo "<br>";
        while($row = $result->fetch_assoc())
        {
            if($row['approval'] == "W")
            {
            echo "<p class=center>".$count.") ".$row['song_name']." by ".$row['artist']." </p>";
            echo "<br>";
            $count++;
            }
        }
    }
    

?>