<?php
session_start();

if (!isset($_SESSION['adminName'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}
  include 'database.php';
  $conn = getDatabaseConnection();

function getUserInfo() {
    
    global $conn;
    $sql = "SELECT * 
            FROM User
            WHERE id = " . $_GET['userId']; 
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
 //   print_r($record);
    
    return $record;
    
}

    function departmentList(){
      
        global $conn;
        
        $sql = "SELECT * FROM Departments ORDER BY name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $records;
    }

 if (isset($_GET['userId'])) {
     
    $userInfo = getUserInfo(); 
     
     
 }

 if (isset($_GET['UpdateUser'])) { //checks whether admin has submitted form.
     
     $sql= "UPDATE user
            SET firstName = :fName,
                lastName = :lName,
                email = :email,
                phone = :phone,
                role = :role,
                deptId = :dept
            WHERE id = :id";
            
     $np = array();
     $np[':fName'] = $_GET['firstName'];
     $np[':lName'] = $_GET['lastName'];
     $np[':email'] = $_GET['email'];
     $np[':phone'] = $_GET['phoneNum'];
     $np[':role'] = $_GET['role'];
     $np[':dept'] = $_GET['department'];
     $np[':id'] = $_GET['userId'];
     
//    print_r($np); 
//    echo $sql; 
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
     
     
     echo "Record has been updated!";
     
     
 }

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update User </title>
        <style>
        @import url("styles.css");
       </style> 
    </head>
    <body>

<h1> Tech Checkout System: Update User </h1>
        <form method="GET">
            <input type="hidden" name="userId" value="<?=$userInfo['id']?>" />
            First Name:<input type="text" name="firstName" value="<?=$userInfo['firstName']?>" />
            <br />
            Last Name:<input type="text" name="lastName" value="<?=$userInfo['lastName']?>"/>
            <br/>
            Email: <input type= "email" name ="email" value="<?=$userInfo['email']?>"/>
            <br/>
            Phone Number: <input type ="text" name= "phoneNum" value="<?=$userInfo['phone']?>"/>
            <br />
           Role: 
           <select name="role">
                <option value=""> - Select One - </option>
                <option value="staff"  <?=($userInfo['role']=='Staff')?" selected":"" ?>  >Staff</option>
                <option value="student" <?=($userInfo['role']=='Student')?" selected":"" ?>  >Student</option>
                <option value="faculty" <?=($userInfo['role']=='Faculty')?" selected":"" ?>>Faculty</option>
            </select>
            <br />
            Department: 
            <select name="department">
                <option value="" > Select One </option>
                                <?php
                
                $departments = departmentList();
                
                foreach($departments as $department) {
                   echo "<option value='".$department['id']."'> " . $department['name']  . "</option>";  
                }
                
                
                ?>
            </select>
            <input type="submit" value="Update User" name="UpdateUser">
            <br/>
            <form action="logout.php">
            <input type="submit" value="Logout" />
            </form>
    </body>
</html>