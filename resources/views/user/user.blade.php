@extends('template')
@include('user.addUser')
@section("content")
<center>
    <div class="card m -auto" style = "width: 90%;margin-top:20px; clear:both">
        <div class="card-body">
            <div class="row">
                <h5 class="card-title col-10">Liste des utilisateurs</h5>
                <button href="" class="btn btn-outline-primary col-2" data-bs-toggle="modal" data-bs-target="#createUserModal"> Ajouter </button>
            </div>
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
                                <a href="/user.update_form/{{$user->id_user}}" class=" btn btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button data-bs-target="#deleteUserModal" data-bs-toggle="modal" data-id="{{$user->id_user}}" class=" btn btn-outline-danger">
                                    <i class="bi bi-x"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</center>
@endsection
