<!DOCTYPE html>
<html>
    
    <head>
       <style>
        @import url("styles.css");
       </style> 
    </head>
    
    
    <?php
    include 'database.php';
    session_start();
    
        $dbconn = getDatabaseConnection();
        
        $usrnm = $_POST['login'];
        $pass = $_POST['password'];
        
        $data = array();
        
        if(strlen($usrnm) > 0 && strlen($pass) > 0){
            $query = 'SELECT * FROM admin a WHERE a.userName = "'.$usrnm.'" AND a.password = "'.sha1($pass).'" AND a.adminId IS NOT NULL;';
            
            $response = $dbconn->query($query);
            
            $data = $response->fetchAll();
        }
            
        ?>
          
    
    
    <body>
        

        
        <p>- Admin Login - </p>
        <br>
        <form method="post">
            <div id="login">
                Login: <input type="text" name="login"><br><br>
                Password: <input type="password" name="password"><br>
                  <input type="submit" value="Search" name="submit">
         </div>
         </form>
       
        <?php
        
            if(count($data) == 0){
              
              if(strlen($usrnm) > 0 || strlen($pass) > 0){
                echo '<div id="error">Wrong username or password!</div>';
              }
        
          }else{
              
              $_SESSION['adminName']= $data[0]['firstname'].' '.$data[0]['lastname'];
              header("Location: admin.php");
              
            }
        
        
        
        ?>
        
    </body>
    
</html>