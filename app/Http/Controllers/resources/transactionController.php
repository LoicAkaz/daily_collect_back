<?php

namespace App\Http\Controllers\resources;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions =  Transaction::all();
        return response()->json($transactions, 200);
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
            return response() ->json(['message' => 'Transaction registered successfully'],200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Erreur d\enregistrement'],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $t = Transaction::find($transaction->id_trans);
        return response()->json($t,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = Validator::make($request->all(), [

            'montant' => 'required|integer|min:100'
        ]);
        if($validatedData->fails()){
            return response()->json($validatedData->errors()->all(), 400);
        }
        try {
            $new_transaction = Transaction :: findOrFail($transaction->id_trans);
            $new_transaction->update($request->all());
            return response()->json(['message' => 'Transaction updated successfully'],200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error while updating Transaction'],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction_to_del = Transaction::findOrFail($transaction->id_trans);
        $transaction_to_del->delete();
        return response()->json(['message' => 'Transaction deleted successfully'],200);
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
