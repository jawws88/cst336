window.onload = displayCharacters; 
           
            var pos = [];
            var char= [];
            function displayCharacters(){
                pos=characterposition();
                char=character();

                
             $('.add').on("click", function() {
                    var rpos=pos.pop();
                    var rchar=char.pop();
                    RandImg(rchar,rpos);
                }); 
                }


            function shuffle(array) {
              var currentIndex = array.length, temporaryValue, randomIndex;
            
              while (0 !== currentIndex) {
            
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;
            
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
              }
            
              return array;
            }

            function show_image(src, width, alt) {
                var img = document.createElement("img");
                img.src = src;
                img.width = width;
                img.alt = alt;
                document.body.appendChild(img);
            }

                function RandImg(randVal, pos){
                switch (randVal){
                    case 0:
                       // echo "<img id='reel$pos' img src = 'img/cartman.png' alt='cartman' title= 'Carman' width='160' />";
                        show_image('img/cartman.png',160,'cartman')
                        break;
                    case 1:
                      //  echo "<img id='reel$pos' img src = 'img/PChaos.png' alt='professor chaose' title= 'PChaos' width='150' />";
                        show_image('img/PChaos.png',150,'Pchaos')
                        break;
                    case 2: 
                     //   echo "<img id='reel$pos' img src = 'img/mrgarrison.png' alt='Mr.Garrison' title= 'mrgarrison' width='150' />";
                        show_image('img/mrgarrison.png',150,'mrgarrison')
                        break;
                    case 3:
                      //  echo "<img id='reel$pos' img src = 'img/Tweek.png' alt='Tweek' title= 'Tweek' width='150' />";
                        show_image('img/Tweek.png',150,'Tweek')
                        break;
                    case 4:
                       // echo "<img id='reel$pos' img src = 'img/Kyle.png' alt='Kyle' title= 'Kyle' width='150' />";
                       show_image('img/Kyle.png',150,'Kyle')
                        break;
                    case 5:
                       // echo "<img id='reel$pos' img src = 'img/butters2.png' alt='butters2' title= 'butters2' width='130' />";
                       show_image('img/butters2.png',130,'butters2')
                        break;
                    case 6:
                     //   echo "<img id='reel$pos' img src = 'img/Kenny.png' alt='Kenny' title= 'Kenny' width='130' />";
                        show_image('img/Kenny.png',130,'Tweek')
                        break;
                    case 7:
                      //  echo "<img id='reel$pos' img src = 'img/Randy.png' alt='Randy' title= 'Randy' width='120' />";
                        show_image('img/Randy.png',120,'Randy')
                        break;
                    case 8:
                      //  echo "<img id='reel$pos' img src = 'img/Stan.png' alt='Stan' title= 'Stan' width='130' />";
                        show_image('img/Stan.png',130,'Stan')
                        break;
                }
            }
            
            
            function character(){
        
                for (var i = 0; i < 9; i++) {
                char.push(i); 
                }
            
                char=shuffle(char); 
                return char;
            }
            
               function characterposition(){
        
                for (var i = 1; i < 9; i++) {
                pos.push(i); 
                }
            
                pos=shuffle(pos); 
                return pos;
            }
            

             
