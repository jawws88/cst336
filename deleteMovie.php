<?php
session_start();

if (!isset($_SESSION['adminName'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}

  include 'database.php';
  $conn = getDatabaseConnection();
  
  $sql = "DELETE FROM movie 
          WHERE movieID = " . $_GET['movieID'];
          
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  
  header("Location: admin.php");
  



?>