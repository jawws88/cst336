<?php
session_start();

if (!isset($_SESSION['adminName'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}

function userList(){
  include 'database.php';
  $conn = getDatabaseConnection();
  
  $sql = "SELECT *
          FROM User
          Order by firstName";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
  //print_r($records);
  return $records;
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Main Page </title>
         <script>
            
            function confirmDelete() {
                
                return confirm("Are you sure you want to delete this user?");
                
            }
            
        </script>
        <style>
        @import url("styles.css");
       </style> 
    </head>
    <body>

            <h1> Admin Main </h1>
            <h2> Welcome <?=$_SESSION['adminName']?>!</h2>
            
            <form action="addUser.php">
                
                <input type="submit" value="Add new user" />
                
            </form>
                        
            <form action="logout.php">
                
                <input type="submit" value="Logout" />
                
            </form>
            <br />
            
            <?php
            
             $users = userList();
             
             foreach($users as $user) {
                 
                 
                 echo $user['firstName'] . " " . $user['lastName'] . "<br />";
                 echo "[<a href='updateUser.php?userId=".$user['id']."'> Update </a>] <br />";
                 echo "[<a onclick='return confirmDelete()' href='deleteUser.php?userId=".$user['id']."'> Delete </a>] <br />";                 
             }
             
             
             
             ?>
            
    </body>
</html>