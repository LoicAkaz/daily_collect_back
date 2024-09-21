<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use App\Models\client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as Validator;
use League\CommonMark\Node\Block\Document;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients =  client::all();
        $users = User::all();
        return view('client.client',compact(['clients', 'users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $client = client::findOrFail($id);
        $users = User::all();
        return view("client.updateClient", compact(['client', 'users']));
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
            'cni_client' => 'required|string||max:20|unique:client',
            'telephone_client' => 'required|string||max:15|unique:client',
            'addresse_client' => 'required|string||max:100',

        ]);
        $clients =  client::all();
        if($validatedData->fails()){
            return view('client.client', compact("clients"))->with(["Error"=>"Form not well filled"]);
        }

        try {
            $photofile = $request->file('photo_client');

            $client = client::create(array_merge($request->all(), ["id_client" => $this ->generateID(),
             "photo_client"=>trim($request->nom_client)."_".$request->prenom_client.".".$photofile ->extension()]));
             $document_extension = ["jpg", "png"];
             if($client){
                $path = "public/profils";
                if(!Storage::exists($path)){
                    Storage::makeDirectory($path,0777,true);
                }
                if (($photofile != null)&&(in_array($photofile->extension(), $document_extension))) {
                    $photofile->storeAs($path, "{$request->nom_client}_{$request->prenom_client}.{$photofile->extension()}");
                }
             }
            $message = "client created successfully.";
            $clients =  client::all();
            $users = User::all();
            return view("client.client", compact(["clients", 'users']))->with("message",$message);
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
        return view('user.', $u);
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
        $validatedData = Validator::make($request->all(), [
            'nom_client' => 'required|string|max:255',
            'sexe_client' => 'required|string|max:1',
            'age' => 'required|integer|max:100',
            'cni_client' => 'required|string||max:20',
            'telephone_client' => 'required|string||max:15',
            'addresse_client' => 'required|string||max:100',

        ]);
        $clients =  client::all();
        $users = User::all();
        if($validatedData->fails()){
            return view('client.client', compact("clients"))->with(["Error"=>"Form not well filled"]);
        }

        try {

            $client_to_update = client::findOrFail($id);
            $photofile = $request->file('photo_client');
             $document_extension = ["jpg", "png"];
             if($photofile){
                $path = "/public/profils/".$client_to_update->photo_client;
                if(Storage::exists($path)){
                    Storage::delete($path);
                }
             }
             if($client_to_update){
                $path = "public/profils";

                if (($photofile != null)&&(in_array($photofile->extension(), $document_extension))) {
                    $photofile->storeAs($path, "{$request->nom_client}_{$request->prenom_client}.{$photofile->extension()}");
                }
             }
            $client_to_update->update(array_merge($request->all(), [
            "photo_client"=>trim($request->nom_client)."_".$request->prenom_client.".".$photofile ->extension()]));
            $message = "client updated successfully.";
            $clients =  client::all();
            $users = User::all();
            return view("client.client", compact(["clients","users"]))->with("message",$message);
        } catch (\Throwable $th) {

            return view('client.client', compact(["clients", "users"]))->with(["Error"=>"Registration error".$th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client_to_del = client::findOrFail($id);
        $client_to_del->delete();
        $path = "/public/profils/".$client_to_del->photo_client;
        if(Storage::exists($path)){
            Storage::delete($path);
        }
        $clients =  client::all();
        $users =  User::all();
        return view("client.client", compact(["clients", "users"]))->with("message","client successfully deleted");
    }
    function generateID()
    {
            $id = 'C'.rand(100,999).'T';
            $client= client::where('id_client', $id)->first();
            if($client){
                return $this->generateID();
            }
            return $id;
        }
}

