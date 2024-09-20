@extends("template")
@section('content')
<form action="/client.update/{{$client->id_client}}" method="POST" enctype="multipart/form-data">
    {{-- @csrf --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container" style="width: 70%">
        {{-- <p>Modal body text goes here.</p> --}}
        {{-- formulaire contenant le nom, le prenom, le sexe, l'age, le username et le password, et le telephone --}}
            <div class="mb-3">
              <label for="nom" class="form-label" required>Nom</label>
              <input type="text" class="form-control" id="nom" value="{{$client->nom_client}}" name="nom_client" placeholder="Entrez votre nom">
            </div>
            <div class="mb-3">
              <label for="prenom" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="prenom" name="prenom_client" value="{{$client->prenom_client}}" placeholder="Entrez votre prénom">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="telephone" name="telephone_client" value="{{$client->telephone_client}}" required placeholder="Entrez votre numero de telephone">
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
              <input type="number" class="form-control" id="age" name="age" value="{{$client->age}}" placeholder="Entrez votre âge" min="10" max="100">
            </div>
            <div class="mb-3">
              <label for="addresse" class="form-label" required>Addresse</label>
              <input type="text" class="form-control" id="addresse_client" name="addresse_client" value="{{$client->addresse_client}}" placeholder="Entrez votre username">
            </div>
            <div class="mb-3">
              <label for="cni" class="form-label" required> Numéro de Cni</label>
              <input type="text" class="form-control" id="cni_client" name="cni_client" value="{{$client->cni_client}}" placeholder="Entrez votre mot de passe">
            </div>
            <div class="mb-3">
                <label for="sexe" class="form-label" required>utilisateur</label>
                <select class="form-select" id="id_user" name="id_user">
                  <option value="">Sélectionnez l'utilisateur</option>

                </select>
              </div>

      </div>

<div class="container" style="width: 70%">
  <a href="/client.list" class="btn btn-secondary" >Close</a>
  <button type="submit" class="btn btn-primary">Save</button>
</div>
{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
</form>
@endsection
