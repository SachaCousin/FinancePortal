<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <title>Front</title>
    <meta charset="utf-8">
    <meta name="Dashboard" content="width=device-width,initial-scale=1" >
    <link rel="stylesheet" href="../FinancePortal/Stylesheets/Style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

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
                    <a class="nav-link" href="#" style="color:#BF9456 ;text-decoration: none;">Home</a>
                    </li>
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="../FinancePortal/Analyse.php"style="color:#BF9456 ;text-decoration: none;">Analyse</a>
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
   
            
       
        
    
        <div id="particles-js2">
        </div>
       
        
        <div style="height: 100%;width:100%;background-color: rgba(196, 196, 196, 0.483);text-align: center;position: relative;bottom: 18%;margin-top: 10px ;">
            
            <img src="../FinancePortal/meta/careconciergelogo.png" >
                
        </div>
        
        
        
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