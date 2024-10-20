<?php
include('db_connection.php'); // Connexion à la base de données

// Ajouter un nouvel article
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $id_article = $_POST['article'];
    $date_mouvement = $_POST['date'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $processeur = $_POST['processeur'];
    $ram = $_POST['ram'];
    $etat = $_POST['etat'];
    $etablissement = $_POST['etablissement'];

    $stmt = $pdo->prepare("INSERT INTO inventaire (id_article, date_mouvement, marque, modele, processeur, ram, etat, etablissement) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$id_article, $date_mouvement, $marque, $modele, $processeur, $ram, $etat, $etablissement]);
    echo json_encode(['success' => true]);
    exit;
}

// Récupérer les données de la table inventaire
$sql = "SELECT * FROM inventaire";
$result = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inventaire de Matériel</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Liste des Matériels Informatiques - Inventaire</h2>

    <!-- Formulaire d'ajout
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un Matériel</button> -->

    <table class="table table-bordered mt-4" id="inventaireTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Article</th>
                <th>Date de Mouvement</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Processeur</th>
                <th>Ram (GB)</th>
                <th>État</th>
                <th>Établissement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Afficher chaque ligne de l'inventaire
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr data-id='{$row['id']}'>";
                    echo "<td>{$row['id']}</td>"; // ID de l'enregistrement
                    echo "<td>{$row['id_article']}</td>"; // Article
                    echo "<td>{$row['date_mouvement']}</td>"; // Date de mouvement
                    echo "<td>{$row['marque']}</td>"; // Marque
                    echo "<td>{$row['modele']}</td>"; // Modèle
                    echo "<td>{$row['processeur']}</td>"; // Processeur
                    echo "<td>{$row['ram']}</td>"; // RAM
                    echo "<td>{$row['etat']}</td>"; // État
                    echo "<td>{$row['etablissement']}</td>"; // Établissement
                    echo "<td>
                            <button class='btn btn-warning btn-edit' data-id='{$row['id']}'>Modifier</button>
                            <button class='btn btn-danger btn-delete' data-id='{$row['id']}'>Supprimer</button>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10' class='text-center'>Aucun enregistrement trouvé</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal pour ajouter un matériel -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Matériel Informatique</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="materielForm">
                    <input type="hidden" name="action" value="add">
                    <div class="mb-3">
                        <label for="article" class="form-label">ARTICLE</label>
                        <input type="text" class="form-control" id="article" name="article" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date de Mouvement</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="marque" class="form-label">Marque</label>
                        <input type="text" class="form-control" id="marque" name="marque" required>
                    </div>
                    <div class="mb-3">
                        <label for="modele" class="form-label">Modèle</label>
                        <input type="text" class="form-control" id="modele" name="modele" required>
                    </div>
                    <div class="mb-3">
                        <label for="processeur" class="form-label">Processeur</label>
                        <input type="text" class="form-control" id="processeur" name="processeur" required>
                    </div>
                    <div class="mb-3">
                        <label for="ram" class="form-label">Ram (GB)</label>
                        <input type="number" class="form-control" id="ram" name="ram" required>
                    </div>
                    <div class="mb-3">
                        <label for="etat" class="form-label">État</label>
                        <select class="form-select" id="etat" name="etat" required>
                            <option value="" selected disabled>Choisir...</option>
                            <option value="operationnel">Opérationnel</option>
                            <option value="en panne">En panne</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="etablissement" class="form-label">Établissement</label>
                        <input type="text" class="form-control" id="etablissement" name="etablissement" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div> -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    // Enregistrement d'un nouvel article
    $('#materielForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'inventaire.php',
            data: $(this).serialize(),
            success: function(response) {
                location.reload(); // Recharge la page après ajout
            }
        });
    });

    // Modification d'un article (à compléter)
    $(document).on('click', '.btn-edit', function() {
        var id = $(this).data('id');
        // Ici, tu peux ouvrir un modal pour modifier l'article
        // Tu devras récupérer les données et pré-remplir le formulaire
        // Exemple: $('#edit_article').val(...) 
    });

    // Suppression d'un article
    $(document).on('click', '.btn-delete', function() {
        var id = $(this).data('id');
        if (confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) {
            $.ajax({
                type: 'POST',
                url: 'inventaire_delete.php',
                data: { id: id },
                success: function(response) {
                    location.reload(); // Recharge la page après suppression
                }
            });
        }
    });
});
</script>

</body>
</html>
