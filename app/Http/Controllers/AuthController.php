<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function index(){
        return view('user');
    }
    public function login(Request $request){
        $user = User::create(
            array(
                "name"=>$request->name
            )
        );
         auth()->login($user);
         return redirect('questions');
    }
}
