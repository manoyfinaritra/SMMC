<?php
include ('db_connection.php');
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $pdo->prepare("SELECT * FROM equipements WHERE id = :id");
        $stmt->execute([':id' => $_POST['id']]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($data);
        header('location:index.php');
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}