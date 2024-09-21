@extends('template')
@include('user.addUser')
@section("content")
<center>
    <div class="card m -auto" style = "width: 90%;margin-top:20px; clear:both">
        <div class="card-body">
            <div class="row">
                <h5 class="card-title col-10">Liste des transaction</h5>
                <button href="" class="btn btn-outline-primary col-2" data-bs-toggle="modal" data-bs-target="#createUserModal"> Ajouter </button>
            </div>
            <table class="table table-stripped">
                <thead>
                    <th scope="col">Id_trans</th>
                    <th scope="col">Montant</th>
                    <th scope="col">type transaction</th>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{$transaction->id_trans}}</td>
                            <td>{{$transaction->montant}}</td>
                            <td>{{$transaction->type_trans}}</td>
                            <td class="text-center">
                                <a href="/transaction.update_form/{{$transaction->id_trans}}" class=" btn btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button data-bs-target="#deleteTransModal" data-bs-toggle="modal" data-id="{{$transaction->id_trans}}" class=" btn btn-outline-danger">
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
