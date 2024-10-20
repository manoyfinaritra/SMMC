<?php
session_start();
include ('db_connection.php');
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: index.php");
    exit();
} // Le reste de votre code sécurisé...
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestion de Matériels</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="bg-secondary">
	<!-- <?php
            include('nav.php');
            ?> -->
	<nav class="navbar bg-body-tertiary rounded m-4">
		<div class="container-fluid">
			<a class="navbar-brand me-auto" href="#"><img src="./Pellicule Photo/smmc.PNG" width="100" alt=""></a>
			<!-- Button trigger modal -->
			<button type="button" class="btn text-light" data-bs-toggle="modal" data-bs-target="#exampleModal"
				style="background-color: #009970;margin-right: 3px;">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
					class="bi bi-person-fill-add" viewBox="0 0 16 16">
					<path
						d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
					<path
						d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
				</svg>
				ajouter
			</button>
			<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
				aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
				aria-labelledby="offcanvasNavbarLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasNavbarLabel">
						<a class="navbar-brand me-auto" href="#"><img src="./Pellicule Photo/smmc.PNG" width="100"
								alt=""></a>
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas"
						aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">
					<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">data</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								Dropdown
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>

					</ul>
					<form class="d-flex mt-3" role="search">
						<input class="form-control me-2" style="width:100px; background-color:#009970;"
							type="search" id="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success" type="submit">Search</button>
					</form>
					<li class="nav-item mt-4">
						<a href="logout.php" style="background-color:red; padding:6px; border-radius:5px;"
							onclick="return confirm('vous voulez vraiment deconnecter?')"><svg width="30px"
								height="30px" viewBox="0 -0.5 25 25" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path d="M11.75 9.874C11.75 10.2882 12.0858 10.624 12.5 10.624C12.9142 10.624 13.25 10.2882 13.25 9.874H11.75ZM13.25 4C13.25 3.58579 12.9142 3.25 12.5 3.25C12.0858 3.25 11.75 3.58579 11.75 4H13.25ZM9.81082 6.66156C10.1878 6.48991 10.3542 6.04515 10.1826 5.66818C10.0109 5.29121 9.56615 5.12478 9.18918 5.29644L9.81082 6.66156ZM5.5 12.16L4.7499 12.1561L4.75005 12.1687L5.5 12.16ZM12.5 19L12.5086 18.25C12.5029 18.25 12.4971 18.25 12.4914 18.25L12.5 19ZM19.5 12.16L20.2501 12.1687L20.25 12.1561L19.5 12.16ZM15.8108 5.29644C15.4338 5.12478 14.9891 5.29121 14.8174 5.66818C14.6458 6.04515 14.8122 6.48991 15.1892 6.66156L15.8108 5.29644ZM13.25 9.874V4H11.75V9.874H13.25ZM9.18918 5.29644C6.49843 6.52171 4.7655 9.19951 4.75001 12.1561L6.24999 12.1639C6.26242 9.79237 7.65246 7.6444 9.81082 6.66156L9.18918 5.29644ZM4.75005 12.1687C4.79935 16.4046 8.27278 19.7986 12.5086 19.75L12.4914 18.25C9.08384 18.2892 6.28961 15.5588 6.24995 12.1513L4.75005 12.1687ZM12.4914 19.75C16.7272 19.7986 20.2007 16.4046 20.2499 12.1687L18.7501 12.1513C18.7104 15.5588 15.9162 18.2892 12.5086 18.25L12.4914 19.75ZM20.25 12.1561C20.2345 9.19951 18.5016 6.52171 15.8108 5.29644L15.1892 6.66156C17.3475 7.6444 18.7376 9.79237 18.75 12.1639L20.25 12.1561Z"
									fill="#000000" />
							</svg></a>
					</li>
				</div>
			</div>
		</div>
	</nav>

	<div>
		<h3 class="text-center mt-4 text-light">MATERIEL INFORMATIQUE</h3>
	</div>
	<div>
		<div class="cont d-flex justify-content-center align-items-center" style="width:100%;">

			<div id="data-table"></div>
		</div>
		<div style="margin-left:266px;">

		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">materiel informatique</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!-- <h3>AJOUTER UN <small class="text-body-secondary">MATERIEL</small></h3> -->
					<form class="row g-3" id="materielForm" method="POST">
						<!-- Formulaire pour ajouter les détails du matériel -->
						<div class="col-md-6">
							<label for="select" class="form-label">ARTICLE</label>
							<select class="form-select" id="select" required name="article">
								<option selected>selectionner</option>
								<option value="bureau">ordinateur</option>
								<option value="portable">portable</option>
								<option value="switch">switch</option>
								<option value="cameras">cameras</option>
								<option value="cable">cable</option>
								<option value="imprimente">imprimente</option>
								<option value="routeur">routeur</option>
								<option value="modem">modem</option>
							</select>
						</div>

						<div class="col-md-6">
							<label for="date" class="form-label">Date</label>
							<input type="date" class="form-control" id="date" required name="date">
						</div>
						<div class="col-md-6">
							<label for="marque" class="form-label">Marque</label>
							<input type="text" class="form-control" id="marque" required
								placeholder="veillez saisir la marque" name="marque">
						</div>
						<div class="col-md-6">
							<label for="modele" class="form-label">Modéle</label>
							<input type="text" class="form-control" id="modele" required
								placeholder="veillez saisir le modéle" name="modele">
						</div>
						<div class="col-md-6">
							<label for="processeur" class="form-label">Processeur</label>
							<input type="text" class="form-control" id="processeur" required
								placeholder="veillez saisir le processeur" name="processeur">
						</div>

						<div class="col-md-6">
							<label for="ram" class="form-label">Ram</label>
							<select class="form-select" id="ram" required name="ram">
								<option selected>selectionner</option>
								<option value="2">2</option>
								<option value="4">4</option>
								<option value="6">6</option>
								<option value="8">8</option>
								<option value="12">12</option>
								<option value="16">16</option>
								<option value="24">24</option>
								<option value="32">32</option>
							</select>
						</div>

						<div class="col-md-6">
							<label for="etat" class="form-label">Etat</label>
							<select class="form-select" id="etat" name="etat">
								<option selected>selectionner</option>
								<option value="operationnel">operationnel</option>
								<option value="en panne">en panne</option>
							</select>
						</div>
						<div class="col-md-6">
							<label for="etablissement" class="form-label">Etablissement</label>
							<select class="form-select" id="etablissement" name="etablissement">
								<option selected>selectionner</option>
								<option value="manoy">manoy</option>
								<option value="finaritra">finaritra</option>
							</select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary"
								data-bs-dismiss="modal">fermer</button>
							<button type="submit" class="btn btn-primary">enrgistrer</button>
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
				<div class="modal-header">
					<h5 class="modal-title" id="editModalLabel">Modifier Matériel</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="editMaterielForm" method="POST" class="gp-3 row">
						<input type="hidden" id="edit_id" name="id">
						<!-- Identique au formulaire d'ajout mais avec des valeurs préremplies -->
						<div class="col-md-6">
							<label for="edit_article" class="form-label">ARTICLE</label>
							<select class="form-select" id="edit_article" name="article">
								<option>choisir</option>
								<option value="bureau">ordinateur</option>
								<option value="portable">portable</option>
								<option value="switch">switch</option>
								<option value="cameras">cameras</option>
								<option value="cable">cable</option>
								<option value="imprimente">imprimente</option>
								<option value="routeur">routeur</option>
								<option value="modem">modem</option>
							</select>
						</div>

						<div class="col-md-6">
							<label for="edit_date" class="form-label">Date</label>
							<input type="date" class="form-control" id="edit_date" name="date">
						</div>
						<div class="col-md-6">
							<label for="edit_marque" class="form-label">Marque</label>
							<input type="text" class="form-control" id="edit_marque" name="marque">
						</div>
						<div class="col-md-6">
							<label for="edit_modele" class="form-label">Modéle</label>
							<input type="text" class="form-control" id="edit_modele" name="modele">
						</div>
						<div class="col-md-6">
							<label for="edit_processeur" class="form-label">Processeur</label>
							<input type="text" class="form-control" id="edit_processeur" name="processeur">
						</div>
						<div class="col-md-6">
							<label for="edit_ram" class="form-label">Ram</label>
							<input type="number" class="form-control" id="edit_ram" name="ram">
						</div>

						<div class="col-md-6">
							<label for="edit_etat" class="form-label">Etat</label>
							<!-- <input class="form-control" id="edit_etat" name="etat"> -->
							<select class="form-select" id="edit_etat" name="etat">
								<option selected>selectionner</option>
								<option value="operationnel">operationnel</option>
								<option value="en panne">en panne</option>
							</select>
						</div>
						<div class="col-md-6">
							<label for="edit_etablissement" class="form-label">Etablissement</label>
							<!-- <input type="text" id="edit_etablissement" name="etablissement"> -->
							<select class="form-select" id="edit_etablissement" name="etablissement">
								<option selected>selectionner</option>
								<option value="manoy">manoy</option>
								<option value="finaritra">finaritra</option>
							</select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary"
								data-bs-dismiss="modal">fermer</button>
							<button type="submit" class="btn btn-primary">modifier</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
	$(document).ready(function() {
		// Soumission du formulaire pour ajouter un nouveau matériel
		$("#materielForm").on("submit", function(e) {
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "insert.php",
				data: $(this).serialize(),
				success: function(response) {
					alert("Données enregistrées avec succès !");
					$("#data-table").html(response);
				}
			});
		});

		// Chargement initial des données
		$.ajax({
			type: "POST",
			url: "fetch.php",
			success: function(response) {
				$("#data-table").html(response);
			}
		});

		// Fonction pour filtrer les données
		$("#search").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#data-table table tbody tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});

		// Fonction pour supprimer un matériel
		$(document).on("click", ".delete-btn", function() {
			var id = $(this).data("id");

			if (confirm("Voulez-vous vraiment supprimer cet élément?")) {
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: id
					},
					success: function(response) {
						alert("Matériel supprimé avec succès !");
						$("#data-table").html(response);
					}
				});
			}
		});

		// Lorsqu'on clique sur le bouton Modifier
		$(document).on("click", ".edit-btn", function() {
			var id = $(this).data("id");

			// Récupérer les données du matériel à modifier
			$.ajax({
				type: "POST",
				url: "fetch_single.php",
				data: {
					id: id
				},
				dataType: "json",
				success: function(response) {
					// Remplir le formulaire de modification avec les données récupérées
					$("#edit_id").val(response.id);
					$("#edit_article").val(response.article);
					$("#edit_date").val(response.date);
					$("#edit_marque").val(response.marque);
					$("#edit_modele").val(response.modele);
					$("#edit_processeur").val(response.processeur);
					$("#edit_ram").val(response.ram);
					$("#edit_etat").val(response.etat);
					$("#edit_etablissement").val(response.etablissement);
					// Afficher le modal de modification
					$("#editModal").modal("show");
				}
			});
		});

		// Soumettre le formulaire de modification via AJAX
		$("#editMaterielForm").on("submit", function(e) {
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "update.php",
				data: $(this).serialize(),
				success: function(response) {
					alert("Données mises à jour avec succès !");
					$("#data-table").html(response);
					$("#editModal").modal("hide");
				}
			});
		});
	});
	</script>
</body>

</html>