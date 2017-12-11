<?php
$search_keyword = $_GET['title'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>JMDb: Movie Info</title>
        <style>
        @import url("https://bootswatch.com/4/darkly/bootstrap.css");
       </style>
    </head>
    <body>
        <div class="container text-center">
            <h1>JMDb: Movie Info</h1>
            <hr id="line">
            <h3>Title: <?php echo $_GET['title']; ?></h3>
            <h3>Year Released: <?php echo $_GET['yearReleased']; ?></h3>
            <h3>Genre: <?php echo $_GET['genre']; ?></h3>
            <h3>Runtime: <?php echo $_GET['runtime']; ?> minutes</h3>
            <br />
            <br />
            	
            
            
            <form method="post">
                <button class="btn btn-primary btn-sm"formaction="index.php" type="submit">Back to Movies</button>
            </form>
        </div>
    </body>
</html>