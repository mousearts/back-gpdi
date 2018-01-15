<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;



class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $users = User::all();
        
        return $users->toJson();
    }

    public function show($id){
        // return User::findOrFail($id);
        return 'User '.$id;
    }

    public function store(Request $request){
        
        // Validating Requests
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);


        // Creating New User
        $user = new User;
         $user->fill([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password'=>Crypt::encrypt($request->password)
        ])->save();

        $options = app('request')->header('accept-charset') == 'utf-8' ? JSON_UNESCAPED_UNICODE : null;

        // Response Code
        return response()->json([
            'message' => 'User Created',
            'results'=>[
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email
            ],
            'URL' => "http://localhost:8001/user/"
        ], 201, $options);

    }

}
