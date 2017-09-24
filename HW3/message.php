<!DOCTYPE html>
<html>
    <html class="message-bg">
        
        
    
    <head>
        <title> Daily Inspiration </title>
        <style>
            @import url("css/styles.css");
             html, body { margin: 0; padding: 0; width: 100%; height: 100%; }
            a { display: block; width: 100%; height: 100%; }
        </style>
    </head>
    <body>
        <div id="msg">
            <?php
                include 'functions.php';
                $rnum=rand(0,5);
                RandMsg($rnum);
            ?>
        
        <a href="index.php"></a>
            
        </div>
    </body>
</html>