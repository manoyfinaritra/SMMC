<?php
session_start();
include('db_connection.php');
// Détruire toutes les variables de session
$_SESSION = array();

// Si vous souhaitez également détruire le cookie de session
if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(
		session_name(),
		'',
		time() - 42000,
		$params["path"],
		$params["domain"],
		$params["secure"],
		$params["httponly"]
	);
}

// Finalement, détruire la session
session_destroy();

// Rediriger l'utilisateur vers la page de connexion
header("Location: index.php");
exit();
