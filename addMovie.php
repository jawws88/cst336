<?php

session_start();

if (!isset($_SESSION['adminName'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}

include 'database.php';
$conn = getDatabaseConnection();


if (isset($_GET['addMovie'])) {  //the add form has been submitted

    $sql = "INSERT INTO Movie
                (title, yearReleased, directorID, runtime, genre) 
            VALUES
                (:ti, :year, :dir, :run, :gen)";
    $np = array();
    $np[':ti'] = $_GET['title'];
    $np[':year'] = $_GET['yearReleased'];
    $np[':dir'] = $_GET['directorID'];
    $np[':run'] = $_GET['runtime'];
    $np[':gen'] = $_GET['genre'];
    
    $stmt=$conn->prepare($sql);
    $stmt->execute($np);
    
    echo "Movie was added!";
    
    
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>JMDb: Add new Movie</title>
        <style>
        @import url("https://bootswatch.com/4/darkly/bootstrap.css");
       </style> 
    </head>
    <body>



<h1> JMDb: Adding a New Movie </h1>

        
        <form method="GET">
            Title:<input type="text" name="title" />
            <br />
            Year Released:<input type="text" name="yearReleased"/>
            <br/>
            Director ID: <input type= "text" name ="directorID"/>
            <br/>
            Runtime: <input type ="text" name= "runtime"/>
            <br />
           Genre: 
           <select name="genre">
                <option value=""> - Select One - </option>
                <option value="Action">Action</option>
                <option value="Comedy">Comedy</option>
                <option value="Romance">Romance</option>
                <option value="Sci-Fi">Sci-Fi</option>
            </select>
            <br />
                
            </select>
            <button class="btn btn-primary" input type="submit" name="addMovie">Add Movie</button>
        </form>
        <form> <button class="btn btn-primary" formaction="admin.php" input type="submit">Back to Home Screen</button>
        </form>
         <form> <button class="btn btn-primary" formaction="logout.php" input type="submit">Logout</button>
                
            </form>
    </body>
</html>