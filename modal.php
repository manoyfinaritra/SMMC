<!-- Modal pour ajouter un matériel à l'inventaire -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0bb063; color: white;">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-plus-circle"></i> Ajouter matériel informatique</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="materielForm" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="select" class="form-label">ARTICLE</label>
                            <select name="article" class="form-select" id="select" required style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                                <option selected disabled>selectionner</option>
                                <?php
                                include('db_connection.php');
                                $sql = "SELECT * FROM articles";
                                $result = $pdo->query($sql);
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='{$row['nom']}'>{$row['nom']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" required name="date" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                        </div>
                        <div class="col-md-6">
                            <label for="marque" class="form-label">Marque</label>
                            <input type="text" class="form-control" id="marque" required name="marque" placeholder="marque" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                        </div>
                        <div class="col-md-6">
                            <label for="modele" class="form-label">Modèle</label>
                            <input type="text" class="form-control" id="modele" required placeholder="modèle" name="modele" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                        </div>
                        <div class="col-md-6">
                            <label for="processeur" class="form-label">Processeur</label>
                            <input type="text" class="form-control" id="processeur" placeholder="processeur" required name="processeur" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                        </div>
                        <div class="col-md-6">
                            <label for="ram" class="form-label">Ram</label>
                            <select class="form-select" id="ram" required name="ram" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                                <option disabled selected>selectionner</option>
                                <option value="2">2 GB</option>
                                <option value="4">4 GB</option>
                                <option value="8">8 GB</option>
                                <option value="16">16 GB</option>
                                <option value="16">32 GB</option>
                                <option value="16">pas disponile</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="etat" class="form-label">Etat</label>
                            <select class="form-select" id="etat" required name="etat" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                                <option selected disabled>selectionner</option>
                                <option value="operationnel" style="background:green;color:white;">Opérationnel</option>
                                <option value="en panne" style="background:red;color:white;">En panne</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="etablissement" class="form-label">Etablissement</label>
                            <select class="form-select" id="etablissement" required name="etablissement" style="background: 
                                                                                                                #ddd7d7;
                                                                                                    border-radius: 10px;">
                                <option selected disabled>selectionner</option>
                                <option value="Batiment 1">Batiment 1</option>
                                <option value="Batiment 1">Batiment 2</option>
                                <option value="Batiment 3">Batiment 3</option>
                                <option value="Batiment 4">Batiment 4</option>
                                <option value="Batiment 5">Batiment 5</option>
                                <option value="Batiment 6">Batiment 6</option>
                                <option value="Batiment 7">Batiment 7</option>
                                <option value="Batiment 8">Batiment 8</option>
                                <option value="Batiment 9">Batiment 9</option>
                                <option value="Batiment 10">Batiment 10</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn" style="background-color: #0bb063; color:white;"><i class="ti-save"></i> Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour modifier un matériel -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0bb063; color: white;">
                <h5 class="modal-title" id="editModalLabel">📝 Modifier Matériel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editMaterielForm" method="POST" class="gp-3 row">
                    <input type="hidden" id="edit_id" name="id">
                    <!-- Identique au formulaire d'ajout mais avec des valeurs préremplies -->
                    <div class="col-md-6">
                        <label for="edit_article" class="form-label">ARTICLE</label>
                        <select class="form-select" id="edit_article" name="article" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                            <option selected disabled>selectionner</option>
                            <?php
                            include('db_connection.php');
                            $sql = "SELECT * FROM articles";
                            $result = $pdo->query($sql);
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='{$row['nom']}'>{$row['nom']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="edit_date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="edit_date" name="date" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                    </div>
                    <div class="col-md-6">
                        <label for="edit_marque" class="form-label">Marque</label>
                        <input type="text" class="form-control" id="edit_marque" name="marque" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                    </div>
                    <div class="col-md-6">
                        <label for="edit_modele" class="form-label">Modéle</label>
                        <input type="text" class="form-control" id="edit_modele" name="modele" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                    </div>
                    <div class="col-md-6">
                        <label for="edit_processeur" class="form-label">Processeur</label>
                        <input type="text" class="form-control" id="edit_processeur" name="processeur" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                    </div>
                    <div class="col-md-6">
                        <label for="edit_ram" class="form-label">Ram</label>
                        <select class="form-select" id="edit_ram" required name="ram" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                            <option selected disabled>selectionner</option>
                            <option value="2">2 GB</option>
                            <option value="4">4 GB</option>
                            <option value="8">8 GB</option>
                            <option value="16">16 GB</option>
                            <option value="16">32 GB</option>
                            <option value="16">pas disponile</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="edit_etat" class="form-label">Etat</label>
                        <!-- <input class="form-control" id="edit_etat" name="etat"> -->
                        <select class="form-select" id="edit_etat" name="etat" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                            <option selected disabled>selectionner</option>
                            <option value="operationnel" style="background:green;color:white;">operationnel</option>
                            <option value="en panne" style="background:red;color:white;">en panne</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="edit_etablissement" class="form-label">Etablissement</label>
                        <!-- <input type="text" id="edit_etablissement" name="etablissement"> -->
                        <select class="form-select" id="edit_etablissement" name="etablissement" style="background: #ddd7d7;
                                                                                                   border-radius: 10px;">
                            <option selected disabled>selectionner</option>
                            <option value="Batiment 1">Batiment 1</option>
                            <option value="Batiment 1">Batiment 2</option>
                            <option value="Batiment 3">Batiment 3</option>
                            <option value="Batiment 4">Batiment 4</option>
                            <option value="Batiment 5">Batiment 5</option>
                            <option value="Batiment 6">Batiment 6</option>
                            <option value="Batiment 7">Batiment 7</option>
                            <option value="Batiment 8">Batiment 8</option>
                            <option value="Batiment 9">Batiment 9</option>
                            <option value="Batiment 10">Batiment 10</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
                        <button type="submit" class="btn btn-primary" style="background-color: #0bb063; color:white;"> modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <script>
    $(document).ready(function() {
        $("#materielForm").submit(function(event) {
            event.preventDefault(); // Empêche le rechargement de la page

            var formData = $(this).serialize(); // Récupère les données du formulaire

            $.ajax({
                type: "POST",
                url: "iventaire.php", // Cible le script PHP
                data: formData,
                success: function(response) {
                    Swal.fire({
                        title: 'Succès!',
                        text: response,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });

                    // Réinitialiser le formulaire après succès
                    $('#materielForm')[0].reset();
                    // Fermer le modal
                    $('#exampleModal').modal('hide');
                },
                error: function() {
                    Swal.fire({
                        title: 'Erreur!',
                        text: 'Un problème est survenu lors de l\'enregistrement',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script> -->