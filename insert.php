<?php
session_start(); // Démarrer la session
include('db_connection.php');

try {
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$user_email = $_SESSION['user_email']; // Assurez-vous que cette variable est définie dans la session
		$stmt = $pdo->prepare("SELECT nom FROM inscription WHERE email = :email");
		$stmt->execute([':email' => $user_email]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		// Vérifier si l'utilisateur existe
		if ($user) {
			$user_name = $user['nom'];

			if (isset($_POST['id']) && !empty($_POST['id'])) {

				$stmt = $pdo->prepare("UPDATE equipements SET article = :article, date = :date, marque = :marque, modele = :modele, processeur = :processeur, ram = :ram, etat = :etat, etablissement = :etablissement WHERE id = :id");
				$stmt->execute([
					':article' => $_POST['article'],
					':date' => $_POST['date'],
					':marque' => $_POST['marque'],
					':modele' => $_POST['modele'],
					':processeur' => $_POST['processeur'],
					':ram' => $_POST['ram'],
					':etat' => $_POST['etat'],
					':etablissement' => $_POST['etablissement'],
					':id' => $_POST['id']
				]);


				$action = "Mis à jour l'équipement : " . $_POST['article'];
			} else {

				$stmt = $pdo->prepare("INSERT INTO equipements (article, date, marque, modele, processeur, ram, etat, etablissement) VALUES (:article, :date, :marque, :modele, :processeur, :ram, :etat, :etablissement)");
				$stmt->execute([
					':article' => $_POST['article'],
					':date' => $_POST['date'],
					':marque' => $_POST['marque'],
					':modele' => $_POST['modele'],
					':processeur' => $_POST['processeur'],
					':ram' => $_POST['ram'],
					':etat' => $_POST['etat'],
					':etablissement' => $_POST['etablissement']
				]);


				$action = "Ajouté un nouvel équipement : " . $_POST['article'];
			}


			$current_date = date('Y-m-d');
			$current_time = date('H:i:s');

			$stmt = $pdo->prepare("INSERT INTO historique (nom, action, date, heure) VALUES (:nom, :action, :date, :heure)");
			$stmt->execute([
				':nom' => $user_name,
				':action' => $action,
				':date' => $current_date,
				':heure' => $current_time
			]);


			include 'fetch.php';
		}
	}
} catch (PDOException $e) {
	echo "Erreur : " . $e->getMessage();
}
