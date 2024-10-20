<?php
	session_start();
	//session_regenerate_id(true);
include('db_connection.php');
if (!empty($_SESSION['user_id'])) {
    header("Location: login.php");
    exit(); // Assurez-vous d'arrêter le script après la redirection
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./plugins/sweetalert/sweetalert.css">
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        .slideshow-container {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .active {
            opacity: 1;
        }

        body {
            color: white;
            display: flex;
            align-items: center;
        }

        body::before {
            background-color: rgba(0, 0, 0, 0.6);
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(9px);
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
            color: #212121;
            border-radius: 25px;
            z-index: 1;
            backdrop-filter: blur(10px);
            box-shadow: 0px 0px 30px rgba(255, 255, 255, 0.2);

        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"],
        .form-signin input[type="password"] {
            transition: all 700ms;
            color: white;
        }
    </style>
</head>

<body class="" id="body">
    <div class="slideshow-container">
        <div class="slide" style="background-image: url('./Pellicule\ Photo/fond1');"></div>
        <div class="slide" style="background-image: url('./Pellicule\ Photo/fond2');"></div>
        <div class="slide" style="background-image: url('./Pellicule\ Photo/fond3');"></div>
        <div class="slide" style="background-image: url('./Pellicule\ Photo/fond4');"></div>
        <div class="slide" style="background-image: url('./Pellicule\ Photo/fond5');"></div>
        <div class="slide" style="background-image: url('./Pellicule\ Photo/fond6');"></div>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['motdepasse'];

        // Préparer une requête SQL pour vérifier l'email
        $query = $pdo->prepare("SELECT * FROM inscription WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();

        // Récupérer l'utilisateur
        $user = $query->fetch(PDO::FETCH_ASSOC);


        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['motdepasse'])) {
            // L'utilisateur est authentifié, démarrer la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_nom'] = $user['nom'];
            $_SESSION['user_prenom'] = $user['prenom'];

            // Rediriger vers la page de destination après connexion
            header("Location:login.php");
            exit();
        } else {
    ?>
            <?php $message = "mot de passe ou email incorect!";
             ?>
    <?php
        }
    }
    ?>
    <div class="form-signin border border-light text-white">
        <form action="" method="POST" autocomplete="off" style="padding:10px;">
            <div class="text-center">
                <img src="./Pellicule Photo/smmc.PNG" alt="" width="100">
                <p class="mb-3 mt-2 fw-normal"><small>Entrez votre compte :</small></p>
            </div>
            <div class="d-flex justify-content-center align-items-center flex-column gap-4">
                <div class="d-flex justify-content-center align-items-center in">
                    <input type="email" class="form-control" id="floatingInput" style="border:none;border-bottom:1px solid white; background-color: transparent;" placeholder="name@example.com" name="email" required>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <input type="password" class="form-control" id="floatingPassword"
                        style="background-color:transparent;border:none; border-bottom:1px solid white;"
                        placeholder="********" name="motdepasse" required>
                </div>
            </div>
            <div class="text-center">
                <i style="color:red; font-size:12px;">
                    <?php
                    if (isset($message)) {
                        echo $message;
                    }
                    ?>
                </i>
            </div>
            <div class="text-center mt-3">
                <p style="font-style:italic;">Si vous n'avez pas encore de compte, veuillez cliquer sur <a href="#" data-bs-toggle="modal"
                        data-bs-target="#modalId" style="text-decoration:none;" id="inscrire">s'inscrire</a></p>
            </div>
            <div class="text-center">
                <button class="w-100 btn text-white" style="background-color:#00b383; border-radius:20px;" type="submit">Connexion</button>
                <p class="mt-4 mb-3 text-muted">&copy; 2023–2024</p>
            </div>
        </form>

    </div>
    <?php include('inscription.php'); ?>
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let slides = document.querySelectorAll('.slide');
            let currentSlide = 0;
            const slideInterval = 9000; // Intervalle de changement d'image en millisecondes

            function showNextSlide() {
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
            }

            setInterval(showNextSlide, slideInterval);

            // Initialiser le diaporama en montrant la première image
            slides[currentSlide].classList.add('active');
        });
    </script>
</body>

</html>