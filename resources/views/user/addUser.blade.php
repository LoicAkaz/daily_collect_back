<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" style="color: white">Ajouter un utilisateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/user.store" method="POST">
            {{-- @csrf --}}
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="modal-body">
                {{-- <p>Modal body text goes here.</p> --}}
                {{-- formulaire contenant le nom, le prenom, le sexe, l'age, le username et le password, et le telephone --}}
                    <div class="mb-3">
                      <label for="nom" class="form-label" required>Nom</label>
                      <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom">
                    </div>
                    <div class="mb-3">
                      <label for="prenom" class="form-label">Prénom</label>
                      <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" required placeholder="Entrez votre numero de telephone">
                      </div>
                    <div class="mb-3">
                      <label for="sexe" class="form-label" required>Sexe</label>
                      <select class="form-select" id="sexe" name="sexe">
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
                      <label for="username" class="form-label" required>Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre username">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label" required>Mot de passe</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
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
