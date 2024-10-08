@extends('template')
@include('client.addClient')
@section("content")
<center>
    <div class="card m -auto" style = "width: 90%;margin-top:20px; clear:both">
        <div class="card-body">
            <div class="row">
                <h5 class="card-title col-10">Liste des utilisateurs</h5>
                <button href="" class="btn btn-outline-primary col-2" data-bs-toggle="modal" data-bs-target="#createClientModal"> Ajouter </button>
            </div>
            <table class="table table-stripped">
                <thead>
                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Age</th>
                    <th scope="col">Cni</th>
                    <th scope="col">adresse</th>
                    <th scope="col">photo</th>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{$client->id_client}}</td>
                            <td>{{$client->nom_client}}</td>
                            <td>{{$client->prenom_client}}</td>
                            <td>{{$client->telephone_client}}</td>
                            <td>{{$client->sexe_client}}</td>
                            <td>{{$client->age}}</td>
                            <td>{{$client->cni_client}}</td>
                            <td>{{$client->addresse_client}}</td>
                            <td><img src="{{asset('/storage/profils/'.$client->photo_client)}}" alt="photo" width="50px"/></td>
                            <td class="text-center">
                                <a href="/client.update_form/{{$client->id_client}}" class=" btn btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a >
                                <button data-bs-target="#deleteClientModal" data-bs-toggle="modal" data-id="{{$client->id_client}}" class=" btn btn-outline-danger">
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
