<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients =  client::all();
        return view('client.client',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
            'cni_client' => 'required|string||max:50|unique:clients',
            'telephone_client' => 'required|string||max:15|unique:clients',
            'addresse_client' => 'required|string||max:100',

        ]);
        $clients =  client::all();
        if($validatedData->fails()){
            return view('client.client', compact("clients"))->with(["Error"=>"Form not well filled"]);
        }

        try {
            $client = client::create(array_merge($request->all(), ["id_client" => $this ->generateID()]));
            $message = "client created successfully.";
            $clients =  client::all();
            return view("client.client", compact("clients"))->with("message",$message);
        } catch (\Throwable $th) {

            return view('client.client', compact(["clients"]))->with(["Error"=>"Registration error".$th]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $u = client::find($id);
        return view('user.showUser', $u);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client_to_del = client::findOrFail($id);
        $client_to_del->delete();
        $clients =  client::all();
        return view("client.client", compact("clients"))->with("message","client");
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

