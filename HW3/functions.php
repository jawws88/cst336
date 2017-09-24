<?php

                function RandImg($randVal, $pos){
                switch ($randVal){
                    case 0:
                        echo "<img id='reel$pos' img src = 'img/cartman.png' alt='cartman' title= 'Carman' width='160' />";
                        break;
                    case 1:
                        echo "<img id='reel$pos' img src = 'img/PChaos.png' alt='professor chaose' title= 'PChaos' width='150' />";
                        break;
                    case 2: 
                        echo "<img id='reel$pos' img src = 'img/mrgarrison.png' alt='Mr.Garrison' title= 'mrgarrison' width='150' />";
                        break;
                    case 3:
                        echo "<img id='reel$pos' img src = 'img/Tweek.png' alt='Tweek' title= 'Tweek' width='150' />";
                        break;
                    case 4:
                        echo "<img id='reel$pos' img src = 'img/Kyle.png' alt='Kyle' title= 'Kyle' width='150' />";
                        break;
                    case 5:
                        echo "<img id='reel$pos' img src = 'img/butters2.png' alt='butters2' title= 'butters2' width='130' />";
                        break;
                    case 6:
                        echo "<img id='reel$pos' img src = 'img/Kenny.png' alt='Kenny' title= 'Kenny' width='130' />";
                        break;
                    case 7:
                        echo "<img id='reel$pos' img src = 'img/Randy.png' alt='Randy' title= 'Randy' width='120' />";
                        break;
                    case 8:
                        echo "<img id='reel$pos' img src = 'img/Stan.png' alt='Stan' title= 'Stan' width='130' />";
                        break;
                }
            }
            
            function displayCharacters(){
                $pos = array();
                $pos=characterposition();
                $char =array();
                $char=character();
                $rnum=rand(1,8);
                
                
                
                for($i=0;$i<$rnum;$i++)
                {
                    $rpos=array_pop($pos);
                    $rchar=array_pop($char);
                    RandImg($rchar,$rpos);
                }
            }
            
            function character(){
                $char = array(); 
        
                for ($i = 0; $i < 9; $i++) {
                array_push($char, $i); 
                }
            
                shuffle($char); 
                return $char;
            }
            
               function characterposition(){
                $pos = array(); 
        
                for ($i = 1; $i < 9; $i++) {
                array_push($pos, $i); 
                }
            
                shuffle($pos); 
                return $pos;
            }
            
             function RandMsg($randVal){
                switch ($randVal){
                    case 0:
                    echo "I'm not fat. I'm big-boned.";
                    break;
                    case 1:
                    echo "Stan, don't you know the first law of physics? Anything that's fun costs at least eight dollars.";
                    break;
                    case 2:
                    echo "I'm not just sure, I'm HIV positive.";
                    break;
                    case 3:
                    echo "How do I reeeach these kids?";
                    break;
                    case 4:
                    echo "Hippies. They're everywhere. They wanna save the earth, but all they do is smoke pot and smell bad.";
                    break;
                    case 5:
                    echo "Screw you guys, I'm going home!";
                    break;
                    case 6:
                    echo "Respect my Authoritah!";
                    break;
                    
                
                }
             }
?>