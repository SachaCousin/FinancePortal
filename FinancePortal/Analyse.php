<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <title>Analyse</title>
    <meta charset="utf-8">
    <meta name="Dashboard" content="width=device-width,initial-scale=1" >
    <link rel="stylesheet" href="../FinancePortal/Stylesheets/Analyse.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js" integrity="sha512-UXumZrZNiOwnTcZSHLOfcTs0aos2MzBWHXOHOuB0J/R44QB0dwY5JgfbvljXcklVf65Gc4El6RjZ+lnwd2az2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   
   
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/1.2.1/chartjs-plugin-zoom.min.js" integrity="sha512-klQv6lz2YR+MecyFYMFRuU2eAl8IPRo6zHnsc9n142TJuJHS8CG0ix4Oq9na9ceeg1u5EkBfZsFcV3U7J51iew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../FinancePortal/chartRange.js"></script>
    <script src="../FinancePortal/Chart.js"></script>
 
</head>

<body >
    
    <div class="container-fluid" >
        <nav class="navbar navbar-expand-md" >
                                
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MynavBarNav"  aria-controls="navbarNav" aria-expanded="right" aria-label="Toggle navigation">
                <img src="../FinancePortal/meta/logo (2).png" style="width: 50px;">
                     
            </button>
        
            <div class="collapse navbar-collapse navbar-collapse" id="MynavBarNav"> 
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="../FinancePortal/Dashboard.php" style="color:#BF9456 ;text-decoration: none;">Home</a>
                    </li>
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="/Front/Owners"style="color:#BF9456 ;text-decoration: none;">Analyse</a>
                    </li>
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="#"style="color:#BF9456 ;text-decoration: none;">News</a>
                    </li>
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="#"style="color:#BF9456 ;text-decoration: none;">Unique</a>
                    </li>
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <?php 
                        if(isset($_SESSION["userId"])){
                    
                      echo '<form id="formlgt"action="../FinancePortal/externe/logout.ext.php" method="post">
                            <button type="submit" name="button-logout" id="btnlgt" style="color:#BF9456 ;text-decoration: none;">Logout</button>
                            </form>';
                        };
                    ?>
                
                </li>
                </ul>
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                    
                    <?php 
                        if(isset($_SESSION["userId"])){
                            
                          
                            echo '<a class="nav-link" href="#"style="color:#1770c9;">Logged : '.$_SESSION["username"].'</a>';

                        };
                    ?>
                </li>
                </ul>
            </div>
            
            
        </nav>
        
            

       
        
      
        <div id="particles-js2" >
   
            <div id="Bodygrid"> 
                
                    



                <div class="chart-container" id="chartContainer">
                    <div class="btnContainer">
                        <button onclick="toGraph(getId(this))" class="btnSC2" type="button" id="7" name="data-submit3">Week</button>
                        <button onclick="toGraph(getId(this))" class="btnSC2" type="button" id="31">Month</button>
                        <button  onclick="toGraph(getId(this))" class="btnSC2" type="button" id="365" name="data-submit2">Year</button>
                        <button  onclick="toGraph(getId(this))" class="btnSC2" type="button" id="1825" name="data-submit2">5Year</button>
                        <button  onclick="toGraph(getId(this))" class="btnSC2" type="button" id="6000" name="data-submit2">All</button>
                    </div>    
                    
                    <div id="gridChart">  
                    </div>
                    <!--<canvas id="myChart"></canvas> -->
                    
                </div>
                
                <div class="FORM">

                    <div class="form-text">

                        
                        <form action="../FinancePortal/externe/Analyse.ext.php" method="post" autocomplete="off">
                        <label class="un">Recher par nom, retourne le Ticker</label>
                        <div style="display:flex;width:100%;">
                        <input  type="text" id="mot" onkeyup="ajaxing()"placeholder="Entrer le Symbol" name="nomste" required> <br>
                        <button class="btnSC" type="submit" id="dtsubmit" name="data-submit">Download&Update</button>
                        </div>
                        <input class="onSnow" type="text" name="inputbox2" id="nTable" placeholder="Nom Stock a entrer !!!" >
 
                        
                        
                        <div id="sugg"></div>
                       
                        </form>
                    </div>
                </div>  

                <div id="detailDBH" class="containerX" >
                    <div class="btnContainer">
                    <button class="btnSC" type="submit" id="dtsubmit3" name="data-submit3">Remove from graph.</button>
                    <button onclick="updatelist()" class="btnSC" type="submit" id="BouttonnUm2">Update</button>
                    <button onclick="toGraph()"  class="btnSC" type="submit" id="dtsubmit2" name="data-submit2">Send to graph.</button>
                    </div>
                    <h1 id="titreUp" Style="margin-top:4%;color:white;">Detail Database:</h1>
                
                    <div class="lowerPanelSC" id="sugg2"></div>
                    
                   
                    
                </div>

            
            </div>
       
        </div>  
        
  
        <div style="height: 100%;width:100%;background-color: rgba(196, 196, 196, 0.483);text-align: center;position: relative;bottom: 18%;margin-top: 10px ;">
            
            <img src="../FinancePortal/meta/careconciergelogo.png" >
                
        </div>
      
        <script>
        function filterGraph(){
                        const filteredData= document.getElementById("myChart").data.datasets.labels.values    ;
                        consol.log(filteredData);
        }
               
       

        function getxhr(){
                try{xhr=new XMLHttpRequest();}
                catch(e){
                    try{xhr=new ActiveXObject("Microsoft.XMLHTTP")}
                catch(e1){
                    alert("erreur");
                }
          }
          return xhr;
        };

        function ajaxing(){
           
            if(document.getElementById("mot").value==""){
                document.getElementById("sugg").style.visibility="hidden";
            }else{
              
            xhr=getxhr();
            xhr.onreadystatechange=function(){
                if (xhr.readyState==4 && xhr.status==200){
                    if(xhr.responseText==""){
                        document.getElementById("sugg").style.visibility="hidden";
                        document.getElementById("nTable").style.visibility="visible";
                        document.getElementById("nTable").required=true;
                    }else{
                    document.getElementById("nTable").required=false;
                    document.getElementById("nTable").style.visibility="hidden";   
                    document.getElementById("sugg").style.visibility="visible";
                    document.getElementById("sugg").innerHTML=xhr.responseText;
                    
                    
                        };
                }else{
                    document.getElementById("sugg").innerHTML="<img src=../FinancePortal/meta/9FZI.gif"; 
                }
            }
            xhr.open("post","ContenuAjax.php",true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            xhr.send("mot="+document.getElementById("mot").value);
        }
        }
        
        document.getElementById("sugg").onclick=function(){
            str = event.target.textContent;
            Chain = "Ticker: ";
            searchstr=str.search(Chain);
            document.getElementById("mot").value=str.slice(searchstr+8);

            
        }

        function updatelist(){
            xh=getxhr();
            xh.onreadystatechange=function(){
                if (xh.readyState==4 && xh.status==200){
                    
                    document.getElementById("sugg2").innerHTML=xh.responseText;
                        
                }else{
                    document.getElementById("sugg2").innerHTML="<img src=../FinancePortal/meta/9FZI.gif>"; 
                }
            }
            xh.open("post","ContenuAjaxLowPanel.php",true);
            xh.setRequestHeader("content-type","application/x-www-form-urlencoded");
            xhr.send(null);
            
        }

        function toGraph(valueRange){
            
            xhc=getxhr();
            xhc.onreadystatechange=function(){
                if (xhc.readyState==4 && xhc.status==200){
                    
                    //document.getElementById("chartContainer").innerHTML=xhc.responseText;
                    //console.log(JSON.parse(xhc.responseText));
                    var Value = parseInt(valueRange,10);

                    var myTest=JSON.parse(xhc.responseText);
                    var theDate= new Date();
                    var Date1 = new Date(2018,1,20);
                    var theDate2 = new Date (
                        theDate.getFullYear(),
                        theDate.getMonth(),
                        theDate.getDate()-Value,
                    )

                    myTest2=[];
                    tbDate=[];
                    tbData=[]
                    for (var i=0;i<myTest[0].length;i++){
                                                                                               
                         if(((myTest[0][i])*1000)>theDate2.getTime()){
                        var Date2 = new Date;
                        var Date3 = Date2.setTime(((myTest[0][i])*1000));
                        const dateDisplayed = Date2.toLocaleDateString('fr-FR')
                        var myTest3 =  tbDate.push(dateDisplayed);
                        var myTest4 = tbData.push(myTest[1][i]);
                        
                         };
                        };
                    myTest2=[tbDate,tbData];
                    
                    addElement();
                    document.getElementById("myChart").innerHTML=theGraph(myTest2[0],myTest2[1]);
                    
                }else{
                    document.getElementById("gridChart").innerHTML="<img src=../FinancePortal/meta/9FZI.gif"; 
                }
            }
            xhc.open("post","ContenuAjaxChart.php",true);
            xhc.setRequestHeader("content-type","application/x-www-form-urlencoded");
            xhc.send("mot="+document.getElementById("mot").value);
            
            
             
        }
        
            function addElement () {
                let div = document.createElement('canvas');
                div.id = 'myChart';
                
                div.innerHTML = '<p>CreateElement example</p>';
                dte= document.getElementById("gridChart");
               dte.appendChild(div);
            }
       
        
       
        </script>
        
         <script >particlesJS("particles-js2", {
            "particles": {
                "number": {
                    "value": 150,
                    "density": {
                        "enable": true,
                        "value_area": 700
                    }
                },
                "color": {
                    "value": "#68B7F5"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#68B7F5"
                    },
                    "polygon": {
                        "nb_sides": 4
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 10,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#68B7F5",
                    "opacity": 0.8,
                    "width": 2
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 200,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 200,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 100,
                        "duration": 0.2
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
        </script>

    
    


    <div>    
    <div>
    

    





    
</body>


</html>