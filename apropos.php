<?php
session_start();
include('db_connection.php');
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: index.php");
    exit();
} // Le reste de votre code sécurisé...
$user_email = $_SESSION['user_email'];
?>
<!DOCTYPE html>
<html lang="en">
<?php
$sql = "SELECT nom, prenom FROM inscription  ";
$stmt = $pdo->query($sql);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Matériels</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>page d'acceuil</title>
    <link rel="stylesheet" href="./css/bt.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./plugins/toast-master/css/jquery.toast.css">
    <link rel="stylesheet" href="./plugins/sweetalert/sweetalert.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        ilty="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./plugins/toast-master/js/jquery.toast.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap");

        :root {
            --primary-color: #17c13b;
            --primary-color-dark: #17c13b;
            --secondary-color: #ca8a04;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --extra-light: #faf5ff;
            --max-width: 1200px;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
        }

        body {
            font-family: "Poppins", sans-serif;
        }

        nav {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            z-index: 99;
        }

        .nav__content {
            max-width: var(--max-width);
            margin: auto;
            padding: 1.5rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav .logo a {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            transition: 0.3s;
        }

        nav .logo a:hover {
            color: var(--primary-color-dark);
        }

        nav .checkbox {
            display: none;
        }

        nav input {
            display: none;
        }

        nav .checkbox i {
            font-size: 2rem;
            color: var(--primary-color);
            cursor: pointer;
        }

        ul {
            display: flex;
            align-items: center;
            gap: 1rem;
            list-style: none;
            transition: left 0.3s;
        }

        ul li a {
            padding: 0.5rem 1rem;
            border: 2px solid transparent;
            text-decoration: none;
            font-weight: 600;
            color: var(--text-dark);
            transition: 0.3s;
        }

        ul li a:hover {
            border-top-color: var(--secondary-color);
            border-bottom-color: var(--secondary-color);
            color: var(--secondary-color);
        }

        .section {
            background-color: var(--extra-light);
        }

        .section__container {
            min-height: 100vh;
            max-width: var(--max-width);
            margin: auto;
            padding: 1rem;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 4rem;
        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .subtitle {
            letter-spacing: 2px;
            color: var(--text-light);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .title {
            font-size: 2.5rem;
            font-weight: 400;
            line-height: 3rem;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .title span {
            font-weight: 600;
        }

        .description {
            line-height: 1.5rem;
            color: var(--text-light);
            margin-bottom: 2rem;
        }

        .action__btns {
            display: flex;
            gap: 1rem;
        }

        .action__btns button {
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 2px;
            padding: 1rem 2rem;
            outline: none;
            border: 2px solid var(--primary-color);
            border-radius: 10px;
            transition: 0.3s;
            cursor: pointer;
        }

        .hire__me {
            background-color: var(--primary-color);
            color: #ffffff;
        }

        .hire__me:hover {
            background-color: var(--primary-color-dark);
        }

        .portfolio {
            color: var(--primary-color);
        }

        .portfolio:hover {
            background-color: var(--primary-color-dark);
            color: #ffffff;
        }

        .image {
            display: grid;
            place-items: center;
        }

        .image img {
            width: min(25rem, 90%);
            border-radius: 100%;
        }

        @media (width < 750px) {
            nav .checkbox {
                display: block;
            }

            ul {
                position: absolute;
                width: 100%;
                height: calc(100vh - 85px);
                left: -100%;
                top: 85px;
                background-color: var(--extra-light);
                flex-direction: column;
                justify-content: center;
                gap: 3rem;
            }

            nav #check:checked~ul {
                left: 0;
            }

            ul li a {
                font-size: 1.25rem;
            }

            .section__container {
                padding: 10rem 1rem 5rem 1rem;
                text-align: center;
                grid-template-columns: repeat(1, 1fr);
            }

            .image {
                grid-area: 1/1/2/2;
            }

            .action__btns {
                margin: auto;
            }
        }




        #liste {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            background: red;
            width: 100%;
            height: 100%;
            padding: 20px;
        }

        * {
            margin: 0;
            padding: 0;

            box-sizing: border-box;
            font-family: sans-serif;
        }

        @media print {

            .table,
            .table__body {
                overflow: visible;
                height: auto !important;
                width: auto !important;
            }
        }

        /* theme preloader */


        /*@page {
    size: landscape;
    margin: 0; 
}*/

        body {
            min-height: 100vh;
            /* background: url(images/html_table.jpg) center / cover; */
            background-color: #eee;
        }

        .tableau {

            justify-content: center;
            align-items: center;
            padding: 40px 0px;
            margin-top: 110px;
        }

        main.table {
            width: 82vw;
            max-height: 473px;
            background-color: #fff5;

            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;

            overflow-y: scroll;
            scrollbar-width: thin;
        }

        .table__header {
            width: 100%;
            height: 10%;
            background: url('./images/html_table.jpg');
            padding: .8rem 1rem;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table__header .input-group1 {
            width: 35%;
            height: 100%;
            background-color: #fff5;
            padding: 0 .8rem;
            border-radius: 2rem;

            display: flex;
            justify-content: center;
            align-items: center;

            transition: .2s;
        }

        .table__header .input-group1:hover {
            width: 45%;
            background-color: #fff8;
            box-shadow: 0 .1rem .4rem #0002;
        }

        .table__header .input-group1 img {
            width: 2.2rem;
            height: 2.2rem;
            background-color: transparent;
        }

        .table__header .input-group1 input {
            width: 100%;
            padding: 0 .5rem 0 .3rem;
            background-color: transparent;
            border: none;
            outline: none;
        }

        .table__body {
            width: 95%;
            max-height: calc(89% - 1.6rem);
            background-color: #fffb;

            margin: .8rem auto;
            border-radius: .6rem;

            overflow: auto;
            overflow: overlay;
        }


        .table__body::-webkit-scrollbar {
            width: 0.5rem;
            height: 0.5rem;
        }

        .table__body::-webkit-scrollbar-thumb {
            border-radius: .5rem;
            background-color: #0004;
            visibility: hidden;
        }

        .table__body:hover::-webkit-scrollbar-thumb {
            visibility: visible;
        }


        table {
            width: 100%;

        }

        td img {
            width: 36px;
            height: 36px;
            margin-right: .5rem;
            border-radius: 50%;

            vertical-align: middle;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            padding: 1rem;
            text-align: left;
        }

        thead th {
            position: sticky;
            top: 0;
            left: 0;
            background-color: #d5d1defe;
            cursor: pointer;
            text-transform: capitalize;
        }

        tbody tr:nth-child(even) {
            background-color: #0000000b;
        }

        tbody tr {
            --delay: .1s;
            transition: .5s ease-in-out var(--delay), background-color 0s;
        }

        tbody tr.hide {
            opacity: 0;
            transform: translateX(100%);
        }

        tbody tr:hover {
            background-color: #fff6 !important;
        }

        tbody tr td,
        tbody tr td p,
        tbody tr td img {
            transition: .2s ease-in-out;
        }

        tbody tr.hide td,
        tbody tr.hide td p {
            padding: 0;
            font: 0 / 0 sans-serif;
            transition: .2s ease-in-out .5s;
        }

        tbody tr.hide td img {
            width: 0;
            height: 0;
            transition: .2s ease-in-out .5s;
        }

        .status {
            padding: .4rem 0;
            border-radius: 2rem;
            text-align: center;
        }

        .status.delivered {
            background-color: #86e49d;
            color: #006b21;
        }

        .status.cancelled {
            background-color: #d893a3;
            color: #b30021;
        }

        .status.pending {
            background-color: #ebc474;
        }

        .status.shipped {
            background-color: #6fcaea;
        }


        @media (max-width: 1000px) {
            td:not(:first-of-type) {
                min-width: 12.1rem;
            }
        }

        thead th span.icon-arrow {
            display: inline-block;
            width: 1.3rem;
            height: 1.3rem;
            border-radius: 50%;
            border: 1.4px solid transparent;

            text-align: center;
            font-size: 1rem;

            margin-left: .5rem;
            transition: .2s ease-in-out;
        }

        thead th:hover span.icon-arrow {
            border: 1.4px solid #6c00bd;
        }

        thead th:hover {
            color: #6c00bd;
        }

        thead th.active span.icon-arrow {
            background-color: #6c00bd;
            color: #fff;
        }

        thead th.asc span.icon-arrow {
            transform: rotate(180deg);
        }

        thead th.active,
        tbody td.active {
            color: #6c00bd;
        }

        .export__file {
            position: relative;
        }

        .export__file-btn {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            background: transparent url(images/export.png) center / 80% no-repeat !important;
            border-radius: 50%;
            color: white;
            transition: .2s ease-in-out;
            margin-bottom: -12px;
            margin-left: 4px;

        }


        .export__file .export__file-btn:hover {
            background-color: #fff;
            transform: scale(1.15);
            cursor: pointer;
        }

        .export__file input {
            display: none;
        }

        .export__file .export__file-options {
            position: absolute;
            right: 0;

            width: 12rem;
            border-radius: .5rem;
            height: 80px;
            overflow-y: scroll;
            scrollbar-width: thin;
            text-align: center;

            opacity: 0;
            transform: scale(.8);
            transform-origin: top right;

            box-shadow: 0 .2rem .5rem #0004;

            transition: .2s;
        }

        .export__file input:checked+.export__file-options {
            opacity: 1;
            transform: scale(1);
            z-index: 100;
        }

        .export__file .export__file-options label {
            display: block;
            width: 100%;
            padding: .6rem 0;
            background-color: #f2f2f2;

            display: flex;
            justify-content: space-around;
            align-items: center;

            transition: .2s ease-in-out;
        }

        .export__file .export__file-options label:first-of-type {
            padding: 1rem 0;
            background-color: #86e49d !important;
        }

        .export__file .export__file-options label:hover {
            transform: scale(1.05);
            background-color: #fff;
            cursor: pointer;
        }

        .export__file .export__file-options img {
            width: 2rem;
            height: auto;
        }

        .modal-content {
            border-radius: 10px;

            border: 2px solid #2a9773;

        }

        .modal-header {

            justify-content: space-between;
            color: white;
            font-weight: bold;

        }



        /* Styles de base pour le pre-loader */
        .theme-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader-track {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .preloader-wrapper {
            width: 50px;
            height: 50px;
            position: relative;
        }

        .spinner-layer {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            animation: rotate 1.2s linear infinite;
        }

        .spinner-blue {
            border: 4px solid blue;
        }

        .spinner-red {
            border: 4px solid red;
        }

        .spinner-yellow {
            border: 4px solid yellow;
        }

        .spinner-green {
            border: 4px solid green;
        }

        .circle-clipper {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
        }

        .circle-clipper.left {
            left: 0;
        }

        .circle-clipper.right {
            right: 0;
        }

        .circle {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: transparent;
            border: 4px solid currentColor;
        }

        .gap-patch {
            position: absolute;
            top: 0;
            left: 45%;
            width: 10%;
            height: 100%;
            overflow: hidden;
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dee2e6;

            padding: 10px;

            text-align: left;

        }

        tr:hover {
            background-color: #f1f1f1;

        }
        .h4{
            transition: all 800ms;
        }
        .h4:hover{
            transform: scale(1.1);
        }
        @media  (max-width: 956px) {
            .gri{
                padding-top:130px !important;
            }
        }
    </style>
</head>

<body id="body">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <!-- <?php include('index3.php'); ?> -->
    <?php
    include('modal.php');
    ?>
    <!--#manoy modal avec le id fullsecreenmodal -->

    <div class="modal fade" id="fullsecreenmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog"
            style="
            width: 100vw;
            max-width: none;
            height: 100%;
            margin: 0;">
            <div class="modal-content"
                style="
             height: 100%;
             border: 0;">
                <div class="modal-header">
                    <img width="98" src="./Pellicule Photo/smmc.PNG" alt="EXPRESS LOGO" style="opacity: .8">
                    <button type="button" data-bs-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
                </div>
                <div class="modal-body" style=" overflow-y: auto; display:flex; justify-content: center; align-items: center;">

                    <!--#manoy include express_nouveaucompte.php -->
                    <?php include('changerdecompte.php'); ?>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn" data-bs-dismiss="modal" style="background-color:rgba(0,0,0,0.5); color: white;"> <i class="ti-arrow-left"></i>retour</button>
                    <!-- <button type="button" class="btn" style="background:black; color: white;"><i class="ti-save"> Enregistrer</i></button> -->
                </div>
            </div>
        </div>
    </div>
    <nav>
        <div class="nav__content">

            <div class="logo"><img src="./assets/smmc.PNG" width="100" alt=""></div>

            <label for="check" class="checkbox">

                <i class="ri-menu-line"></i>

            </label>

            <input type="checkbox" name="check" id="check" />
            <ul>

                <li><a href="index.php" id="acceuil">🏚️acceuil</a></li>
                <!-- <li><a href="./iventaire.php">🔃inventaire</a></li> -->
                <li><a href="#">ℹ️ A propos</a></li>
                <!-- <li><a href="#" data-bs-toggle="modal" data-bs-target="#historiqueModal">Historique</a></li> -->
                <li class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <a href=""><img style="border-radius:100%;" src="./Pellicule Photo/users.png" width="35"></a>
                    <?php
                    $sql = "SELECT nom, prenom, email FROM inscription WHERE email = :user_email";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['user_email' => $user_email]);
                    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        echo htmlspecialchars($row['prenom']) . "</h5>";
                    } else {
                        echo "<h1>Utilisateur non trouvé</h1>";
                    }
                    // echo $_SESSION['user_prenom'];
                    ?>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item  ti-user" id="data1" href="#"> Profil</a></li>
                        <li data-bs-toggle="modal" data-bs-target="#fullsecreenmodal"><a class="dropdown-item" id="data1" href="#"><i class="bi bi-arrow-left-right"></i> Changer de compte</i></a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#deconnexionModal">
                                <i class="ti-power-off"> Deconnexion</i>
                            </a>
                        </li>
                    </ul>
            </ul>

        </div>
    </nav>
    <div class="gri" style="padding:150px; display:flex;justify-content:center;gap:20px;align-items:center;flex-direction:column">
        <div class="h4" style="background-color: #0bb063;box-shadow:0px 2px 10px black;display:flex;justify-content:center;align-items:center;border-radius:10px;flex-direction:column;padding:10px;color:white">
            <h4>1. generlité</h4>
            <span>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem quas totam, tenetur repellendus cumque facilis earum debitis doloremque, maxime natus sed quaerat quisquam esse laborum vitae et sint corporis tempore  voir plus...
            </span>

        </div>
        <div class="h4" style="background-color: #0bb063;box-shadow:0px 2px 10px black;display:flex;justify-content:center;align-items:center;border-radius:10px;flex-direction:column;padding:10px;color:white">
            <h4>2. objectifs</h4>
            <span>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem quas totam, tenetur repellendus cumque facilis earum debitis doloremque, maxime natus sed quaerat quisquam esse laborum vitae et sint corporis tempore voir plus...
            </span>

        </div>
        <div class="h4" style="background-color: #0bb063;box-shadow:0px 2px 10px black;display:flex;justify-content:center;align-items:center;border-radius:10px;flex-direction:column;padding:10px;color:white">
            <h4>3. propriètés</h4>
            <span>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem quas totam, tenetur repellendus cumque facilis earum debitis doloremque, maxime natus sed quaerat quisquam esse laborum vitae et sint corporis tempore voir plus...
            </span>

        </div>
    </div>
    <!-- Modal deconnexion -->

    <div class="modal fade" id="deconnexionModal" tabindex="-1" aria-labelledby="deconnexionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deconnexionModalLabel">
                        Confirmer la déconnexion

                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <i class="bi bi-box-arrow-right"></i>
                    Êtes-vous sûr de vouloir vous déconnecter ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <a href="confirmation.php" class="btn btn-danger">Déconnexion</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="./plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        // Lorsque toute la page et les ressources sont chargées
        window.onload = function() {
            // Ajoute un délai de 2 secondes avant de masquer le pre-loader
            setTimeout(function() {
                var loader = document.querySelector('.theme-loader');
                loader.style.display = 'none';
            }, 1000); // 1500 millisecondes = 1.5 secondes
        };
    </script>
</body>

</html>