<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions =  Transaction::all();
        $users = User::all();
        $clients = Client::all();
        return view('transactions.transaction',compact(['transactions', 'users', 'clients']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $users = User::all();
        $client = Client::all();
        return view("transactions.updateTransaction", compact(['transaction', 'users', 'client']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [

            'montant' => 'required|integer|min:100'
        ]);
        if($validatedData->fails()){
            return response()->json($validatedData->errors()->all(), 400);
        }
        try {
            $transaction = Transaction::create(array_merge($request->all(), ["id_trans" => $this ->generateID()]));
            $message = "Transaction created successfully.";
            $clients =  client::all();
            $users = User::all();
            return view("transactions.transaction", compact(["transaction","users", "clients"]))->with("message",$message);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Erreur d\enregistrement'],500);
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

            'montant' => 'required|integer|min:100'
        ]);
        if($validatedData->fails()){
            return response()->json($validatedData->errors()->all(), 400);
        }
        try {

            $transaction_to_update = Transaction::find($id);
            $transaction_to_update->update($request->all());
            $message = "Transaction updated successfully.";
            $transactions =  Transaction::all();
            return view("transactions.transaction", compact("transactions"))->with("message",$message);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Erreur d\enregistrement'],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction_to_del = Transaction::findOrFail($id);
        $transaction_to_del->delete();
        $transactions =  Transaction::all();
        $users =  User::all();
        $clients = Client::all();
        return view("transactions.transaction", compact(["transactions", "users", "clients"]))->with("message","transaction successfully deleted");
    }
    function generateID()
    {
            $datejour = Carbon::now()->format('ymd');
            $id = 'T'.rand(100,999).$datejour;
            $transaction= Transaction::where('id_trans', $id)->first();
            if($transaction){
                return $this->generateID();
            }
            return $id;
        }
}
