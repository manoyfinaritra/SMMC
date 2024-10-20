<?php
session_start(); // Démarrer la session
include('db_connection.php');

try {
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		$stmt = $pdo->prepare("DELETE FROM equipements WHERE id = :id");
		$stmt->execute([':id' => $_POST['id']]);

	
		$user_email = $_SESSION['user_email']; 
		$stmt = $pdo->prepare("SELECT nom FROM inscription WHERE email = :email");
		$stmt->execute([':email' => $user_email]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

	
		if ($user) {
			$user_name = $user['nom'];

			
			$current_date = date('Y-m-d');
			$current_time = date('H:i:s'); 
			$action = "Supprimé un équipement";

			$stmt = $pdo->prepare("INSERT INTO historique (nom, action, date, heure) VALUES (:nom, :action, :date, :heure)");
			$stmt->execute([
				':nom' => $user_name,
				':action' => $action,
				':date' => $current_date,
				':heure' => $current_time
			]);
		}

		include 'fetch.php';
	}
} catch (PDOException $e) {
	echo "Erreur : " . $e->getMessage();
}