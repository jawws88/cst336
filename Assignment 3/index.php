<!DOCTYPE html>
<html>
    <html class="home-bg">
        <?php
            $backgroundImage = "imgs/lab.jpg"; 
    
    
    if (isset($_GET['Background'])) {
        $backgroundImage = $_GET['Background']; 
    } 
    
    if (isset($_GET['message'])) {
        $msg = $_GET['message'];
        ?>
        <p><?=$msg?></p>
        <?php
    } 
    
    if (isset($_GET['Morty'])) {
       $imgURL=$_GET['Morty'];
       echo "<img id='reel4' img src = $imgURL alt='morty' title= 'Morty' width='450' />";
    } 
    if (isset($_GET['Summer'])) {
       $imgURL=$_GET['Summer'];
       echo "<img id='reel6' img src = $imgURL alt='summer' title= 'Summer' width='180' />";
    } 
    if (isset($_GET['Jerry'])) {
       $imgURL=$_GET['Jerry'];
       echo "<img id='reel8' img src = $imgURL alt='jerry' title= 'Jerry' width='300' />";
    } 
    if (isset($_GET['What'])) {
       $imgURL=$_GET['What'];
       echo "<img id='reel3' img src = $imgURL alt='what' title= 'What' width='600' />";
    } 
    if (isset($_GET['Rick'])) {
       $imgURL=$_GET['Rick'];
       echo "<img id='reel7' img src = $imgURL alt='rick' title= 'Rick' width='50' />";
    } 
    ?>
        
    <head>
        <link rel="stylesheet" type="text/css" href= "fonts/fonts.css" />
        <title> The Lab </title>
        <style>
            @import url("styles.css");
            body {
                background-image: url("<?=$backgroundImage?>");
            }
        </style>
    </head>
    
        
    <body>
        <div id="main">
            <?php
                
                
                
             
            ?>
         </div>    
                 <div id="msg">
                 <form>
                <input type="text" name="message" placeholder="Message">
                </div>
                <div id="submitButton">
                <input type="submit" value="Submit">
                </div>
                <div id="Cbox">
                <input type="checkbox" name="Morty" value="imgs/morty.png"> Morty<br>
                <input type="checkbox" name="Summer" value="imgs/summer.png">Summer<br>
                <input type="checkbox" name="Jerry" value="imgs/jerry.png">Jerry<br>
                <input type="checkbox" name="What" value="imgs/haha.png">What?<br>
                <input type="checkbox" name="Rick" value="imgs/rick.png">Rick<br>
                </div>
            <select name = "Background" >
                <option value ="imgs/lab2.jpg">Select One</option>
                <option value ="imgs/mortysRoom.png">Morty's Room</option>
                <option value = "imgs/livingRoom.png">Living Room</option>
                <option value = "imgs/space.jpg">Space</option>
                <option value = "imgs/school.jpg">School</option>
                <option value = "imgs/mrpoo.jpg">Surprise!</option>
            </select>
        </form>
    </body>
</html>