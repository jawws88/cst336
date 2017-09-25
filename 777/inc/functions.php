<?php

                function RandImg($randVal, $pos){
                switch ($randVal){
                    case 0:
                        echo "<img id='reel$pos' img src = 'img/seven.png' alt='seven' title= 'Seven' width='70' />";
                        break;
                    case 1:
                        echo "<img id='reel$pos' img src = 'img/cherry.png' alt='cherry' title= 'Cherry' width='70' />";
                        break;
                    case 2: 
                        echo "<img id='reel$pos' img src = 'img/lemon.png' alt='lemon' title= 'Lemon' width='70' />";
                        break;
                    case 3:
                        echo "<img id='reel$pos' img src = 'img/grapes.png' alt='grapes' title= 'Grapes' width='70' />";
                        break;
                }
            }
                
               function DisplayPoints($RandVal1, $RandVal2, $RandVal3){
                    
                    echo "<div id = 'output'>";
                    if($RandVal1 == $RandVal2 && $RandVal2==$RandVal3){
                        switch ($RandVal1){
                            case 0: $totalPoints=1000;
                                    echo "<h1>Jackpot!</h1>";
                                    echo "<embed name='goofy-yell' src='inc/goofy-yell.mp3' loop='true' hidden='true' autostart='true'/>";
                                    break;
                            case 1: $totalPoints=750;
                                    break;
                            case 2: $totalPoints=250;
                                    break;
                            case 3: $totalPoints=900;
                                    break;
                        }
                        
                        echo "<h2>You won $totalPoints points!</h2>";
                    }else{
                        echo"<h3> Try Again! </h3>";
                    }
                    echo"</div>";
                }
                
            function play()
                {
                for($i=1;$i<4;$i++)
                {
                    ${"randomValue" . $i} = rand(0,3);
                    RandImg(${"randomValue" . $i}, $i );
                }
                DisplayPoints($randomValue1, $randomValue2, $randomValue3);
                }

?>