<?php
session_start();

if (!isset($_SESSION['adminName'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}

function movieList(){
  include 'database.php';
  $conn = getDatabaseConnection();
  
  $sql = "SELECT *
          FROM movie
          Order by title";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
  return $records;
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Main Page </title>
            <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
         <script>
            
            function confirmDelete() {
                
                return confirm("Are you sure you want to delete this Movie?");
                
            }
            
                 
        function avgrun(){
                $.ajax({
                type: "get",
                url: "api.php",
                dataType: "json",
                data: {
                    'action': 'get-averageRun'
                },
                success: function(data,status) {
                    $('#response-avg').html('');
                    if (data.result.length > 0) {
                        $('#response-avg').html(data['result']); 
                    } else {
                        $('#response-avg').html("Error");
                    }
                    
                  },
            });
                }
            function totalmovies(){
                $.ajax({
                type: "get",
                url: "api.php",
                dataType: "json",
                data: {
                    'action': 'get-movieTotal'
                },
                success: function(data,status) {
                    $('#response-total').html('');
                    if (data.result.length > 0) {
                        $('#response-total').html(data['result']); 
                    } else {
                        $('#response-total').html("Error");
                    }
                    
                  },
            });
                }
            function totalmovielength(){
                $.ajax({
                type: "get",
                url: "api.php",
                dataType: "json",
                data: {
                    'action': 'get-lengthofMovies'
                },
                success: function(data,status) {
                    $('#response-length').html('');
                    if (data.result.length > 0) {
                        $('#response-length').html(data['result']);
                    } else {
                        $('#response-length').html("Error");
                    }
                    
                  },
            });
                }
        </script>
        <style>
        @import url("https://bootswatch.com/4/darkly/bootstrap.css");
       </style> 
    </head>
    <body>
        <div id="admin">
            <h1> Admin Home </h1>
            <h2> Welcome <?=$_SESSION['adminName']?>!</h2>
            
            <form><button class="btn btn-primary" formaction="addMovie.php" input type="submit">Add new Movie</button>
            </form>
            <br/>            
            <form> <button class="btn btn-primary" formaction="logout.php" input type="submit">Logout</button>
                
            </form>
            <br />
            
            <?php
            
             $users = movieList();
             
             foreach($users as $user) {
                 
                 
                 echo $user['title'] ."<br />";
                 echo "[<a href='updateMovie.php?movieID=".$user['movieID']."'> Update </a>] <br />";
                 echo "[<a onclick='return confirmDelete()' href='deleteMovie.php?movieID=".$user['movieID']."'> Delete </a>] <br />";                 
             }
             
             
             
             ?>
    <h1> Admin Reports </h1>

    <form>
        <fieldset>
            <button class="btn btn-primary" onclick="avgrun(); return false;">Average Run Time</button> <span id="response-avg"></span><br/><br/>
            <button class="btn btn-primary" onclick="totalmovies(); return false;">Number of Movies</button> <span id="response-total"></span><br/><br/>
            <button class="btn btn-primary" onclick="totalmovielength(); return false;">Total length of all Movies</button> <span id="response-length"></span>
        </fieldset> 
    </form>
    </div>
    </body>
</html>