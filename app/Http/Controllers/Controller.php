<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
class PassportController extends Controller

{
    use ValidatesRequests;
    
   
    public function login($request) {
        
        $login = $request->Validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (! Auth::attempt($login)) {
            $msg = 'Invalid credential';
            return response()->json($msg);
        }
        $accesToken = Auth::user()->createToken('accessToken')->accessToken;
        return response()->json([
            'user' => Auth::user(),
            'access_token' => $accesToken
        ]);

        
    }

    public function users(){
        $users = User::all();
        return response()->json($users);
    }
}
