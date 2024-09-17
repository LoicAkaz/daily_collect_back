<?php

namespace App\Http\Controllers\resources;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients =  Client::all();
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [

            'nom_client' => 'required|string|max:255',
            'sexe_client' => 'required|string|max:1',
            'age' => 'required|integer|max:100',
            'cni_client' => 'required|string||max:15|unique:client',
            'telephone_client' => 'required|string||max:15|unique:client',
        ]);
        if($validatedData->fails()){
            return response()->json($validatedData->errors()->all(), 400);
        }
        try {
            $client = Client::create(array_merge($request->all(), ["id_client" => $this ->generateID()]));
            return response() ->json(['message' => 'Client registered successfully'],200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Erreur d\enregistrement'],500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $c = Client::find($client->id_client);
        return response()->json($c,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validatedData = Validator::make($request->all(), [

            'nom_client' => 'required|string|max:255',
            'sexe_client' => 'required|string|max:1',
            'age' => 'required|integer|max:100',
            'cni_client' => 'required|string||max:15|unique:client',
            'telephone_client' => 'required|string||max:15|unique:client',
        ]);
        if($validatedData->fails()){
            return response()->json($validatedData->errors()->all(), 400);
        }
        try {
            $new_client = Client :: findOrFail($client->id_client);
            $new_client->update($request->all());
            return response()->json(['message' => 'User updated successfully'],200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error while updating client'],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client_to_del = Client::findOrFail($client->id_client);
        $client_to_del->delete();
        return response()->json(['message' => 'client deleted successfully'],200);
    }

    function generateID()
    {
            $id = 'C'.rand(100,999).'T';
            $client= Client::where('id_client', $id)->first();
            if($client){
                return $this->generateID();
            }
            return $id;
        }
}
