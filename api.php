<?php
// connect to our mysql database server

  include 'database.php';


function avgMovieLength(){
    $dbConn = getDatabaseConnection();
    $sql = "SELECT AVG(runtime) as arun from Movie";
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    $records = $statement->fetch();
    echo json_encode(array('result' => $records['arun'])); 
}

function totalnumberofMovies(){
    $dbConn = getDatabaseConnection();
    $sql = "SELECT count(*) as num from Movie";
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    $records = $statement->fetch();
    echo json_encode(array('result' => $records['num'])); 
}

function lengthofallMovies(){
    $dbConn = getDatabaseConnection();
    $sql = "SELECT sum(runtime) as time from Movie";
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    $records = $statement->fetch();
    echo json_encode(array('result' => $records['time'])); 
}

if ($_GET['action'] == 'get-averageRun' ) {
    avgMovieLength(); 
} 
else if ($_GET['action'] == 'get-movieTotal' ) {
    totalnumberofMovies(); 
} 
else if ($_GET['action'] == 'get-lengthofMovies' ) {
    lengthofallMovies(); 
}



?>