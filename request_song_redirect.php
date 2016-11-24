<?php

// Start the session
session_start();

$_SESSION['rsvp_id_sr'] = $_GET['rsvp_id'];

header('location: request_songs.php')


?>