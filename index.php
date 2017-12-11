<!DOCTYPE html>
<html>
    <head>
        <title>JMDb</title>
        <style>
        @import url("https://bootswatch.com/4/darkly/bootstrap.css");
       </style> 
    </head>
    <?php 
        if(!isset($_SESSION['cart'])){
            session_start();
        }
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
        if(strlen($_GET['addToCart']) > 0){
            array_push($_SESSION['cart'], $_GET['addToCart']);
        }
    ?>
    <body>
        <div class="container text-center">
            <h1>JMDb</h1>
            
            <form><button class="btn btn-primary" formaction="index.php">Movies</button>
            <button class="btn btn-primary" formaction="actors.php">Actors</button>
            <button class="btn btn-primary" formaction="directors.php">Directors</button></form>
            <hr id="line">
            <nav>
                <form method="post">
                    <span id="Filter"><strong>Sort - </strong></span>
                    <select name = "sorttype">
                        <option value="name">Name</option>
                        <option value="year">Year</option>
                        <option value="genre">Genre</option>
                        <option value="runtime">Runtime</option>
                    </select>
                    <select name = "sortorder">
                        <option value="ascending">Asc</option>
                        <option value="descending">Desc</option>
                    </select>
                    <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Submit">
                    <br>
                        
                    <strong><span id="Filter">Filter - </span> Name:</strong>  <input type="text" name="typedtext" placeholder="Movie Name" value="<?=$_GET['typedtext']?>"/>
                    <br>
                    <strong>Genre:</strong>
                    <input type="checkbox" name="action" value="true">Action
                    <input type="checkbox" name="comedy" value="true">Comedy
                    <input type="checkbox" name="romance" value="true">Romance
                    <input type="checkbox" name="scifi" value="true">Sci-Fi
                    <br/>
                    <strong> Year:</strong>
                    <input type="number" name="year" width:"4" style="width: 4em" value="year">
                    <br>
                </form>
            </nav>
        
            <?php
                
                include 'database.php';
                $dbConn = getDatabaseConnection();
                $dispatch = "SELECT * FROM movie ";
                
                $i = 0; # counter
                $tempfilter = array();
                # Filter
                if (!empty($_POST['typedtext'])) {# Name
                    $tempfilter[$i] = " title LIKE '%" . $_POST['typedtext'] . "%' ";
                    $i++;
                }
                if ($_POST['action'] == "true") { # Action
                    $tempfilter[$i] = " genre = 'Action' ";
                    $i++;
                }
                if ($_POST['comedy'] == "true") { # Comedy
                    $tempfilter[$i] = " genre = 'Comedy' ";
                    $i++;
                }
                if ($_POST['romance'] == "true") { # Action
                    $tempfilter[$i] = " genre = 'Romance' ";
                    $i++;
                }
                if ($_POST['scifi'] == "true") { # Comedy
                    $tempfilter[$i] = " genre = 'Sci-Fi' ";
                    $i++;
                }
                if ($_POST['year'] != null){
                    $tempfilter[$i] = " yearReleased = ".$_POST['year']." ";
                    $i++;
                }
                
                for ($j = 0; $j < count($tempfilter); $j++) #concat that filter string!
                {
                    if ($j == 0 && !empty($tempfilter[0]))
                    {
                        $dispatch = $dispatch . "WHERE";
                    }
                    $dispatch = $dispatch . $tempfilter[$j];
                    if (strpos($tempfilter[$j], 'title') && !empty($tempfilter[$j+1]))
                    {
                        $dispatch = $dispatch . " AND";
                    }
                    else if (strpos($tempfilter[$j], 'genre') && strpos($tempfilter[$j+1],'yearReleased'))
                    {
                        $dispatch = $dispatch . " AND";
                    }
                    else {
                        if (!empty($tempfilter[$j+1]))
                        {
                            $dispatch = $dispatch . " OR";
                        }
                    }
                }
                # Sort
                if ($_POST['sorttype'] == "name" && $_POST['sortorder'] == "ascending") # Name
                    $dispatch = $dispatch . "ORDER BY title ASC";
                else if ($_POST['sorttype'] == "name" && $_POST['sortorder'] == "descending")
                    $dispatch = $dispatch . "ORDER BY title DESC";
                else if ($_POST['sorttype'] == "year" && $_POST['sortorder'] == "ascending") # Year
                    $dispatch = $dispatch . "ORDER BY yearReleased ASC";
                else if ($_POST['sorttype'] == "year" && $_POST['sortorder'] == "descending")
                    $dispatch = $dispatch . "ORDER BY yearReleased DESC";
                else if ($_POST['sorttype'] == "genre" && $_POST['sortorder'] == "ascending") # Genre
                    $dispatch = $dispatch . "ORDER BY genre ASC";
                else if ($_POST['sorttype'] == "genre" && $_POST['sortorder'] == "descending")
                    $dispatch = $dispatch . "ORDER BY genre DESC";
                else if ($_POST['sorttype'] == "runtime" && $_POST['sortorder'] == "ascending") # Runtime
                    $dispatch = $dispatch . "ORDER BY runtime ASC";
                else if ($_POST['sorttype'] == "runtime" && $_POST['sortorder'] == "descending")
                    $dispatch = $dispatch . "ORDER BY runtime DESC";
                

                $dbData = $dbConn->query($dispatch);
                $dbArray = $dbData->fetchAll();
                echo "<br>";
                echo "<table align='center' id=\"t1\">
                <tr>
                <thead>
                <th>Title </th>
     	        <th>Year </th>
             	</thead>
                </tr>";
                foreach($dbArray as $result) {
                echo "<tr>";
                echo "<strong><td class='movielist'><a href=\"minfo.php? title=".$result['title']. "&id=" .$result['movieID']."&yearReleased=".
                         $result['yearReleased']."&genre=".$result['genre']."&runtime=".$result['runtime']."\">" . $result['title'] ."</a></td></strong>";
                echo "<td>".$result['yearReleased']."</td>";
                }
                echo "</table>";
                ?>
                
                <form><button class="btn btn-primary" formaction="login.php">Admin</button></form>
    </div>
    </body>
</html>