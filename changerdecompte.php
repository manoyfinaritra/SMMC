<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Login Form | MrDeveloper</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600&family=Roboto&family=Roboto+Flex:opsz,wght@8..144,200;8..144,400&display=swap");

    .container2 {
      background-color: white;
      border-radius: 30px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
      position: relative;
      overflow: hidden;
      width: 768px;
      max-width: 100%;
      min-height: 480px;
    }

    .container2 p {
      font-size: 14px;
      line-height: 20px;
      letter-spacing: 0.3px;
      margin: 20px 0;
    }

    .container2 span {
      font-size: 12px;
    }

    .container2 a {
      color: #333;
      font-size: 13px;
      text-decoration: none;
      margin: 15px 0 10px;
    }

    .container2 button {
      background-color: #000;
      color: #fff;
      font-size: 12px;
      padding: 10px 45px;
      border: 1px solid transparent;
      border-radius: 8px;
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      margin-top: 10px;
      cursor: pointer;
    }

    .container2 button.hidden {
      display: none;
    }

    .container2 form {
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 40px;
      height: 100%;
    }

    .container2 input {
      background: #eee;
      border: none;
      margin: 8px 0;
      padding: 10px 15px;
      font-size: 13px;
      border-radius: 8px;
      width: 100%;
      outline: none;
    }

    .form-container {
      position: absolute;
      top: 0;
      height: 100%;
      transition: all 0.6s ease-in-out;
    }

    .sign-in {
      left: 0;
      width: 50%;
      z-index: 2;
    }

    .container2.active .sign-in {
      transform: translateX(100%);
    }

    .sign-up {
      left: 0;
      width: 50%;
      opacity: 0;
      z-index: 1;
    }

    .container2.active .sign-up {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: move 0.6s ease-in-out;
    }

    @keyframes move {

      0%,
      49.99% {
        opacity: 0;
        z-index: 1;
      }

      50%,
      100% {
        opacity: 1;
        z-index: 5;
      }
    }

    .social-icons {
      margin: 20px 0;
    }

    .social-icons a {
      border: 1px solid #ccc;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin: 0 3px;
      width: 40px;
      height: 40px;
    }

    .toggle-container {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: all 0.6s ease-in-out;
      border-radius: 0 0 0 150px;
      z-index: 1000;
    }

    .container2.active .toggle-container {
      transform: translateX(-100%);
      border-radius: 0 150px 0 0;
    }

    .toggle {
      background: #512da8;
      height: 100%;
      background-color: #0bb063;
      color: white;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      transform: translateX(0);
      transition: all 0.6s ease-in-out;
    }

    .container2.active .toggle {
      transform: translateX(50%);
    }

    .toggle-panel {
      position: absolute;
      width: 50%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 30px;
      text-align: center;
      top: 0;
      transform: translateX(0);
      transition: all 0.6s ease-in-out;
    }

    .toggle-left {
      transform: translateX(-200%);
    }

    .container2.active .toggle-left {
      transform: translateX(0);
    }

    .toggle-right {
      right: 0;
      transform: translateX(0);
    }

    .container2.active .toggle-right {
      transform: translateX(200%);
    }
  </style>
</head>

<body class="body">
  <div class="container2" id="container2">
    <!-- Formulaire d'inscription -->
    <div class="form-container sign-up">
      <form method="POST" id="registrationForm" action="./creationcompteinterieur.php">
        <h1>créer un compte</h1>
        <div class="social-icons">
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#"><i class="fa-brands fa-github"></i></a>
          <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        </div>
        <span>completez ce champs pour s'inscrire</span>
        <div style="height:210px; overflow-y:scroll;scrollbar-width: thin;
 padding:0px 5px;">
          <input type="text" name="nom" placeholder="Nom" required />
          <input type="text" name="prenom" placeholder="prenom" required />
          <input type="email" name="email" placeholder="e-mail" required />
          <input type="password" name="motdepasse" placeholder="mot de passe" required />
        </div>
        <button type="submit" id="save">Créer</button>
      </form>
    </div>

    <!-- Formulaire de connexion -->
    <div class="form-container sign-in">
      <form action="./verifypasswordinterieur.php" method="POST">
        <img style="width: 50%; opacity: .8;" src="./Pellicule Photo/smmc.PNG" alt="EXPRESS LOGO">
        <div class="social-icons">
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#"><i class="fa-brands fa-github"></i></a>
          <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        </div>
        <span>utilisez votre email et mot de passe</span>
        <input type="text" placeholder="e-mail" name="adresse_email" required />
        <input type="password" placeholder="******" name="mot_motdepasse" required />
        <button type="submit">Connexion</button>
      </form>
    </div>

    <!-- Panneau de basculement -->
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1 style="color:white;" class="Dtime"></h1>
          <p>Vous avez déjà un compte? Cliquez sur le bouton <i class="ti-arrow-down"></i> </p>
          <button id="login" class="waves-effect waves-light">Se connecter</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1 style="color:white;" class="Dtime"></h1>
          <p>Si vous n'avez pas encore de compte! Cliquez sur <i class="ti-arrow-down"></i></p>
          <button id="register" class="waves-effect waves-light">Nouveau compte</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    let container = document.getElementById("container2");
    let registerBtn = document.getElementById("register");
    let loginBtn = document.getElementById("login");
    let Dtimes = document.querySelectorAll(".Dtime");

    // Afficher bonjour ou bonsoir selon l'heure pour chaque élément Dtime
    var heure = new Date().getHours();
    let message = heure >= 18 ? "Bonsoir!" : "Bonjour!";

    // Mettre à jour tous les éléments Dtime avec le message
    Dtimes.forEach((element) => {
      element.innerHTML = message;
    });

    // Basculer entre login et register
    const buttons = [registerBtn, loginBtn];
    buttons.forEach((button) => {
      button.onclick = function() {
        const action = this.id === "register" ? "add" : "remove";
        container.classList[action]("active");
      };
    });
  </script>
</body>

</html>