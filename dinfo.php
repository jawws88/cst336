<?php
$search_keyword = $_GET['title'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>JMDb: Director Info</title>
        <style>
        @import url("https://bootswatch.com/4/darkly/bootstrap.css");
       </style>
    </head>
    <body>
        <div class="container text-center">
            <h1>JMDb: Director Info</h1>
            <hr id="line">
            <h3>First Name: <?php echo $_GET['firstName']; ?></h3>
            <h3>Last Name: <?php echo $_GET['lastName']; ?></h3>
            <h3>Gender: <?php echo $_GET['gender']; ?></h3>
            <h3>Date of Birth: <?php echo $_GET['dob']; ?></h3>
            <br />
            <br />
            	
            
            
            <form method="post">
                <button class="btn btn-primary btn-sm"formaction="directors.php" type="submit">Back to Directors</button>
            </form>
        </div>
    </body>
</html>