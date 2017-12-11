<!DOCTYPE html>
<html>
    <head>
        <title>JMDb</title>
        <style>
        @import url("https://bootswatch.com/4/darkly/bootstrap.css");
       </style> 
    </head>
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
                        <option value="firstName">First Name</option>
                        <option value="lastName">Last Name</option>
                    </select>
                    <select name = "sortorder">
                        <option value="ascending">Asc</option>
                        <option value="descending">Desc</option>
                    </select>
                    <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Submit">
                    <br>
                        
                    <strong><span id="Filter">Filter - </span> Name:</strong>  <input type="text" name="typedtext" placeholder="Director Name" value="<?=$_GET['typedtext']?>"/>
                    <br>
                    <strong>Gender:</strong>
                    <input type="checkbox" name="male" value="true">Male
                    <input type="checkbox" name="female" value="true">Female
                    <br>
                </form>
            </nav>
        
            <?php
                
                //Table: movie - movieID, title, yearReleased, directorID, runtime, genre
                //Table: actor - actorID, firstName, lastName, dob, gender
                //Table: cast - castID, movieID, actorID, characterName
                //Table: director - directorID, firstName, lastName, dob, gender
                
 
                
                include 'database.php';
                $dbConn = getDatabaseConnection();
                $dispatch = "SELECT * FROM director ";
                
                $i = 0; # counter
                $tempfilter = array();
                # Filter
                if (!empty($_POST['typedtext'])) {# Name
                    $tempfilter[$i] = " firstName LIKE '%" . $_POST['typedtext'] . "%' "." OR lastName LIKE '%" . $_POST['typedtext'] . "%' ";
                    $i++;
                }
                if ($_POST['male'] == "true") { # Male
                    $tempfilter[$i] = " gender = 'Male' ";
                    $i++;
                }
                if ($_POST['female'] == "true") { # Female
                    $tempfilter[$i] = " gender = 'Female' ";
                    $i++;
                }
                
                for ($j = 0; $j < count($tempfilter); $j++) #concat that filter string!
                {
                    if ($j == 0 && !empty($tempfilter[0]))
                    {
                        $dispatch = $dispatch . "WHERE";
                    }
                    $dispatch = $dispatch . $tempfilter[$j];
                    if (strpos($tempfilter[$j], 'firstName') && !empty($tempfilter[$j+1]))
                    {
                        $dispatch = $dispatch . " AND";
                    }
                    else if (strpos($tempfilter[$j], 'gender') && !empty($tempfilter[$j+1]))
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
                if ($_POST['sorttype'] == "firstName" && $_POST['sortorder'] == "ascending") # Name
                    $dispatch = $dispatch . "ORDER BY firstName ASC";
                else if ($_POST['sorttype'] == "firstName" && $_POST['sortorder'] == "descending")
                    $dispatch = $dispatch . "ORDER BY firstName DESC";
                else if ($_POST['sorttype'] == "lastName" && $_POST['sortorder'] == "ascending") # Name
                    $dispatch = $dispatch . "ORDER BY lastName ASC";
                else if ($_POST['sorttype'] == "lastName" && $_POST['sortorder'] == "descending")
                    $dispatch = $dispatch . "ORDER BY lastName DESC";
                

                $dbData = $dbConn->query($dispatch);
                $dbArray = $dbData->fetchAll();
                echo "<br>";
                echo "<table align='center' id=\"t1\">
                <tr>
                <thead>
                <th> Name </th>
     	        <th>Gender </th>
             	</thead>
                </tr>";
                foreach($dbArray as $result) {
                echo "<tr>";
                echo "<strong><td class='directorlist'><a href=\"dinfo.php? firstName=".$result['firstName']. "&lastName=" .$result['lastName']. "&id=" .$result['directorID']."&dob=".
                         $result['dob']."&gender=".$result['gender']."\">". $result['firstName'] .' '. $result['lastName'] ."</a></td></strong>";
                echo "<td>".$result['gender']."</td>";
                }
                echo "</table>";
                ?>
                <form><button class="btn btn-primary" formaction="login.php">Admin</button></form>
    </div>
    </body>
</html>