<!DOCTYPE html>

<head>
    <title>LOGIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../FinancePortal/Stylesheets/login.css">
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    
        
</head>

<body>

    <div class="container-fluid" id="particles-js2" sty>


        <div class="FORM">

            <div class="form-text">

                <header><a href="../home.php">SC Finance Portal</a></header>
                <h1>Login</h1>
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]=="wrongpassword"){
                            echo '<p class="msg-erreur">Mot de passe invalide!</p>';
                        }else if($_GET["error"]=="dontexist"){
                            echo '<p class="msg-erreur">Utilisateur inexistant!</p>';
                        }
                       
                    }
                ?>

                <form action="../FinancePortal/externe/login.ext.php" method="post">
                    <label class="un">username/mail</label> <br>
                    <input type="text" placeholder="Entrer le nom d'utilisateur/Email" name="username" required> <br>



                    <label class="un">password</label> <br>
                    <input type="password" placeholder="Entre ton mot de passe" name="password" required> <br>


                 <button type="submit" name="login-submit">Log In</button>
                </form>

                <div class="bottom-text">
                    <p>DON'T HAVE AN ACCOUNT ? <a href="signup.php" id="signup">SIGN UP</a></p>

                </div>
                <a href="../PASSWORD/reset-password.php" class="forgot-pwd">FORGOT YOUR PASSWORD ?</a>



            </div>

        </div>

 


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

</body>
