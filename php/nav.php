<!-- Navigation -->
  <?php

echo '
      <ul class="main-nav">
        <li><a href="index.php"> PLAY MY SONG</a></li>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="eventviewer.php">Event Viewer</a></li>
        <li><a href="discover.php">Discover</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="help.php">Help</a></li>
';
  if(isset($_SESSION['username'])){
    echo '
        <li class="dropdown">
          <a href="#" class="dropbtn">Settings</a>
          <div class="dropdown-content">
            <a href="profile.php">PROFILE</a>
            <a href="profile.php?choice=1">LOGOUT</a>
          </div>
        </li>
      </ul> ';
  }

  if(!isset($_SESSION['username'])){
    echo '
        <li class="dropdown">
          <a href="#" class="dropbtn">Login / Signup</a>
          <div class="dropdown-content dropdown-content-log">
            <a href="signin.php">LOGIN</a>
            <a href="signup.php">SIGN UP</a>
          </div>
        </li>
      </ul> ';
  }
  ?>
  