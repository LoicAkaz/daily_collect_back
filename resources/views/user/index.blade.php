@extends('template')

{{-- @section
<div class="card m -auto" style = "width: 90%">
    <div class="card-body">
        <table class="table table-stripped">
            <thead>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Sexe</th>
                <th scope="col">Age</th>
                <th scope="col">Username</th>
                <th scope="col">Actions</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id_user}}</td>
                        <td>{{$user->nom}}</td>
                        <td>{{$user->prenom}}</td>
                        <td>{{$user->telephone}}</td>
                        <td>{{$user->sexe}}</td>
                        <td>{{$user->age}}</td>
                        <td>{{$user->username}}</td>
                        <td class="text-center">
                            <a href="" class="btn-outline-secondary">
                                Modifier
                            </a>
                            <a href="" class="btn-outline-danger">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection --}}

@section('content')
<div class="container mt-5">
    <h2>Formulaire d'inscription</h2>
    <form action="/submit-form" method="POST">
        <!-- Nom -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required maxlength="255">
        </div>

        <!-- Sexe -->
        <div class="mb-3">
            <label for="sexe" class="form-label">Sexe</label>
            <select class="form-select" id="sexe" name="sexe" required>
                <option value="">Sélectionnez votre sexe</option>
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
        </div>

        <!-- Age -->
        <div class="mb-3">
            <label for="age" class="form-label">Âge</label>
            <input type="number" class="form-control" id="age" name="age" placeholder="Entrez votre âge" required min="1" max="100">
        </div>

        <!-- Téléphone -->
        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone" required maxlength="15">
        </div>

        <!-- Username -->
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Choisissez un nom d'utilisateur" required maxlength="15">
        </div>

        <!-- Mot de passe -->
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required minlength="8">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
@endsection
