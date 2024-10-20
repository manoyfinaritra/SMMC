<?php
include('db_connection.php'); // Connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("DELETE FROM historique");
    $stmt->execute();

    echo json_encode(['success' => true]);
    exit;
}
