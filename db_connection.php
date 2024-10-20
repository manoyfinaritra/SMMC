<?php
$dsn = 'mysql:host=localhost:3307;dbname=port_toamasina2';
$username = 'root';
$password = 'manoynan';

try {
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die("Erreur de connexion : " . htmlspecialchars($e->getMessage()));
}
