<?php
// connect to our mysql database server

function getDatabaseConnection() {
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "bee843b1c72b4a";
    $password = "7ef5c109";
    $dbname = "heroku_4baa2b8eebb601a"; 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}




function getUsersThatMatchUserName() {
    
    $username = $_GET['username']; 

    
     $dbConn = getDatabaseConnection(); 

     $sql = "SELECT * from User WHERE username='$username'"; 
     
     $statement = $dbConn->prepare($sql); 
    
     $statement->execute(); 
     $records = $statement->fetchAll(); 
     echo json_encode($records); 
}

function validatePassword() {
    $username = $_GET['username']; 
    $password = $_GET['password'];
    
    
    echo sha1($password); 
}

if ($_GET['action'] == 'validate-username' ) {
    getUsersThatMatchUserName(); 
} else if ($_GET['action'] == 'validate-password') {
    
}
 

?>