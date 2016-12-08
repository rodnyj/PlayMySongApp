<!DOCTYPE html>
<html lang="en">
    <head>		
        <title>Your awesome Youtube search engine</title>
        <meta charset="UTF-8" />					
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Awesome videos!" />
        <!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/youtube.css.php">
    </head>
    
    <body>
        <hr>
        <header>
            <a class=youtube-a href="https://www.youtube.com/"><h1 class="center youtube-h2">YouTube<br>Search A Video</h1></a>
        </header>
        
        <div>
            <div>
                <form action="#">
                    <p class=youtube-p><input type="text" id="search" placeholder="Type something..." autocomplete="off"/></p>
                    <p class=youtube-p2><input type="submit" value="Search"></p>
                </form>
                <hr>
                <div class=result id="results"></div>
            </div>
        </div>
        
        <!-- scripts -->
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="js/app.js"></script>
        <script src="https://apis.google.com/js/client.js?onload=init"></script>
    </body>
</html>