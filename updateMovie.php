<?php
session_start();

if (!isset($_SESSION['adminName'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}
  include 'database.php';
  $conn = getDatabaseConnection();

function getMovieInfo() {
    
    global $conn;
    $sql = "SELECT * 
            FROM movie
            WHERE movieID = " . $_GET['movieID']; 
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $record;
    
}


 if (isset($_GET['movieID'])) {
     
    $movieInfo = getMovieInfo(); 
     
 }

 if (isset($_GET['UpdateMovie'])) { //checks whether admin has submitted form.
     
     $sql= "UPDATE movie
            SET title = :ti,
                yearReleased = :year,
                directorID = :dir,
                runtime = :run,
                genre = :gen
            WHERE movieID = :ID";
            
     $np = array();
     $np[':ti'] = $_GET['title'];
     $np[':year'] = $_GET['yearReleased'];
     $np[':dir'] = $_GET['directorID'];
     $np[':run'] = $_GET['runtime'];
     $np[':gen'] = $_GET['genre'];
     $np[':ID'] = $_GET['mID'];
     
    //print_r($np); 
    //echo $sql; 
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
     
    echo '<script type="text/javascript">'; 
    echo 'alert("Record has been updated!");'; 
    echo 'window.location.href = "admin.php";';
    echo '</script>';
     
 }

?>



<html>
    <head>
        <title>JMDb: Update Movie </title>
        <style>
        @import url("https://bootswatch.com/4/darkly/bootstrap.css");
       </style> 
    </head>
    <body>

<h1> JMDb: Update Movie </h1>
        <form method="GET">
            <input type="hidden" name="mID" value="<?=$movieInfo['movieID']?>" />
            Title:<input type="text" name="title" value="<?=$movieInfo['title']?>" />
            <br />
            Year Released:<input type="text" name="yearReleased" value="<?=$movieInfo['yearReleased']?>"/>
            <br/>
            DirectorID: <input type= "text" name ="directorID" value="<?=$movieInfo['directorID']?>"/>
            <br/>
            Run time: <input type ="text" name= "runtime" value="<?=$movieInfo['runtime']?>"/>
            <br />
           Genre: 
           <select name="genre">
                <option value=""> - Select One - </option>
                <option value="Action"  <?=($movieInfo['genre']=='Action')?" selected":"" ?>  >Action</option>
                <option value="Comedy" <?=($movieInfo['genre']=='Comedy')?" selected":"" ?>  >Comedy</option>
                <option value="Romance" <?=($movieInfo['genre']=='Romance')?" selected":"" ?>>Romance</option>
                <option value="Sci-Fi" <?=($movieInfo['genre']=='Sci-Fi')?" selected":"" ?>>Sci-Fi</option>
            </select>
            <br />
            <button class="btn btn-primary" input type="submit" name="UpdateMovie">Update Movie</button>
            <br/>
         <form> <button class="btn btn-primary" formaction="logout.php" input type="submit">Logout</button>
            </form>
    </body>
</html>