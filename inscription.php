<!-- Modal -->
<div
    class="modal fade"
    id="modalId"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"
            style="background-color:transparent;backdrop-filter: blur(40px);border-radius:17px;">
            <div class="modal-header bg-success" style="border-radius:17px;border:none;">
                <div class="w-100 text-center">
                    <h5 class="modal-title" id="modalTitleId" style="color:white; font-weight:900;">
                        créer un nouveau compte
                    </h5>
                </div>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" style="color:black;">
                    <form id="registrationForm" autocomplete="off" method="POST">
                        <div class="mb-3 d-flex flex-row justify-content-center align-items-center">
                            <!-- <label for="nom" class="form-label text-white">votre Nom</label> -->
                            <img src="./icons/nom.ico" alt="" width="40" style="border:1px solid white;padding:7px;border-radius:50%;margin-right:9px;">
                            <input type="text" class="form-control border border-success" name="nom" id="nom" placeholder="entrer votre nom"
                                style="border-radius: 15px; background-color:#aaa;" />
                        </div>
                        <div class="mb-3 d-flex flex-row justify-content-center align-items-center">
                            <!-- <label for="prenom" class="form-label text-white">votre Prenom</label> -->
                            <img src="./icons/nom.ico" alt="" width="40" style="border:1px solid white;padding:7px;border-radius:50%;margin-right:9px;">
                            <input type="text" class="form-control border-success" name="prenom" id="prenom" placeholder="entrer votre prenom"
                                style="border-radius: 15px; background-color:#aaa;" />
                        </div>
                        <div class="mb-3 d-flex flex-row justify-content-center align-items-center">
                            <!-- <label for="email" class="form-label text-white">Email</label> -->
                            <img src="./icons/mess.ico" alt="" width="40" style="border:1px solid white;padding:7px;border-radius:50%;margin-right:9px;">
                            <input type="email" class="form-control border-success" name="email" id="email" placeholder="abc@mail.com"
                                style="border-radius: 15px; background-color:#aaa;" />
                        </div>
                        <div class="mb-3 d-flex flex-row justify-content-center align-items-center">
                            <!-- <label for="motdepasse" class="form-label text-white">mot de passe</label> -->
                            <img src="./icons/password.ico" width="40" alt="" style="border:1px solid white;padding:7px;border-radius:50%;margin-right:9px;">
                            <input type="password" class="form-control border-success" name="motdepasse" id="motdepasse" placeholder="****************"
                                style="border-radius: 15px; background-color:#aaa;" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer bg-light" style="border-radius:17px;border:none;">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    fermer
                </button>
                <button type="submit" class="btn btn-primary " id="save">enregistrer</button>
            </div>
        </div>
    </div>
    <style>
        input {
            transition: all 600ms;
        }
    </style>
</div>
<!-- lien vers le sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="./plugins/sweetalert/sweetalert.min.js"></script>
<script>
    document.getElementById('modalId').addEventListener('show.bs.modal', function(event) {
        let button = event.relatedTarget;
        let recipient = button.getAttribute('data-bs-whatever');
    });

    document.getElementById('save').addEventListener('click', function() {
    let form = document.getElementById('registrationForm');
    let formData = new FormData(form);

    fetch('creationCompte.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: 'Votre compte a bien été créé!',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Réinitialiser le formulaire
                    form.reset();
                    // Fermer le modal (supposons que le modal ait l'ID 'myModal')
                    // let modal = bootstrap.Modal.getInstance(document.getElementById('modalId'));
                    // modal.hide();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Erreur: ' + data.message,
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: 'Erreur lors de l\'enregistrement.',
                confirmButtonText: 'OK'
            });
        });
});

</script>
</div>