<div class="modal fade" id="createClientModal" tabindex="-1" aria-labelledby="createClientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" style="color: white">Ajouter un utilisateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/client.store" method="POST" enctype="multipart/form-data">
            {{-- @csrf --}}
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="modal-body">
                {{-- <p>Modal body text goes here.</p> --}}
                {{-- formulaire contenant le nom, le prenom, le sexe, l'age, le username et le password, et le telephone --}}
                    <div class="mb-3">
                      <label for="nom" class="form-label" required>Nom</label>
                      <input type="text" class="form-control" id="nom" name="nom_client" placeholder="Entrez votre nom">
                    </div>
                    <div class="mb-3">
                      <label for="prenom" class="form-label">Prénom</label>
                      <input type="text" class="form-control" id="prenom" name="prenom_client" placeholder="Entrez votre prénom">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone_client" required placeholder="Entrez votre numero de telephone">
                      </div>
                    <div class="mb-3">
                      <label for="sexe" class="form-label" required>Sexe</label>
                      <select class="form-select" id="sexe" name="sexe_client">
                        <option value="">Sélectionnez votre sexe</option>
                        <option value="M">Masculin</option>
                        <option value="F">Féminin</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="age" class="form-label" required>Âge</label>
                      <input type="number" class="form-control" id="age" name="age" placeholder="Entrez votre âge" min="10" max="100">
                    </div>
                    <div class="mb-3">
                      <label for="addresse" class="form-label" required>Addresse</label>
                      <input type="text" class="form-control" id="addresse_client" name="addresse_client" placeholder="Entrez votre username">
                    </div>
                    <div class="mb-3">
                      <label for="cni" class="form-label" required> Numéro de Cni</label>
                      <input type="text" class="form-control" id="cni_client" name="cni_client" placeholder="Entrez votre mot de passe">
                    </div>

              </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
        </form>
      </div>
    </div>
  </div>

  <div div class="modal fade" id="deleteClientModal" tabindex="-1" aria-labelledby="deleteClientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Supprimer un client</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Voulez-vous vraiment supprimer ce client ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-bs-dismiss="modal">Non</button>
          <a href="" type="button" class="btn btn-danger" id="confirmClientUser">Oui</a>
        </div>
      </div>
    </div>
  </div>
