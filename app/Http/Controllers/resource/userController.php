<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =  User::all();
        return view('user.user',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $validatedData = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'sexe' => 'required|string|max:1',
            'age' => 'required|integer|max:100',
            'telephone' => 'required|string||max:15|unique:users',
            'username' => 'required|string||max:15|unique:users',
            'password' => 'required|string||min:8',

        ]);
        $users =  User::all();
        if($validatedData->fails()){
            return view('user.user', compact("users"))->with(["Error"=>"Form not well filled"]);
        }

        try {
            $user = User::create(array_merge($request->all(), ["id_user" => $this ->generateID()]));
            $message = "User created successfully.";
            $users =  User::all();
            return view("user.user", compact("users"))->with("message",$message);
        } catch (\Throwable $th) {

            return view('user.user', compact(["users"]))->with(["Error"=>"Registration error".$th]);
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $u = User::find($user->id_user);
        return view('user.showUser', $u);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = Validator::make($request->all(), [

            'nom' => 'required|string|max:255',
            'sexe' => 'required|string|max:1',
            'age' => 'required|integer|max:100',
            'telephone' => 'required|string||max:15|unique:users',
            'username' => 'required|string||max:15|unique:users',
            'password' => 'required|string||min:8',
        ]);
        if($validatedData->fails()){
            return response()->json($validatedData->errors()->all(), 400);
        }
        try {
            $new_user = User :: findOrFail($user->id_user);
            $new_user->update($request->all());
            return view('user.updateUser', $new_user);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error while updating user'],500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_to_del = User::findOrFail($id);
        $user_to_del->delete();
        $users =  User::all();
        return view("user.user", compact("users"))->with("message","User");
    }

    function generateID()
{
        $id = 'U'.rand(100,999).'R';
        $user= User::where('id_user', $id)->first();
        if($user){
            return $this->generateID();
        }
        return $id;
    }
}
