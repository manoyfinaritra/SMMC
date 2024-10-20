<?php
session_start();
include('db_connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['adresse_email'];
    $password = $_POST['mot_motdepasse'];

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

        // Rediriger vers la page de destination après connexion

        header("Location:login.php");
        exit();
    } else {
?>
            <?php $message = "mot de passe ou email incorect!"; ?>
    <?php
    }
}
    ?>