<?php
//
//include './php/create_tables.php';

$username = htmlspecialchars(trim($_POST['username']));
$passwrd = htmlspecialchars(trim($_POST['passwrd']));
$submit = $_POST['submit'];

if(isset($submit)){
    echo "<hr>";
    if($username == NULL)
        echo "<p class=center> Username Required </p>";
    elseif($passwrd == NULL)
        echo "<p class=center> Password Is Required </p>";
    else{
        $conn = connection();
    
        //VERIFY IF ID AND PASSWORD MATCH OUR DATABASE
        $sql = "SELECT * FROM Users WHERE username ='".$username."'".
                "AND password='".md5($passwrd)."'". ";";
    
        $result = my_sql_exec($conn, $sql);
        if(mysqli_num_rows($result)<=0) //user failed to log in
        {
                echo "<p class=center> INVALID USERNAME OR PASSWORD, PLEASE TRY AGAIN</p><br/>";
        }
        else
        {
            $row = mysqli_fetch_row($result);
            $_SESSION['userid'] = $row[0];
            $_SESSION['firstname'] = $row[1];
            $_SESSION['lastname'] = $row[2];
            $_SESSION['passwrd'] = $row[3];
            $_SESSION['email'] = $row[4];
            $_SESSION['username'] = $row[5];
            $_SESSION['profile_img'] = $row[6];
            
            header("Location:profile.php");
        }
    
    }
}
?>