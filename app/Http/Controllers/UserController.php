<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    function register(Request $req){
        $user=new User;
        $user->login=$req->input('login');
        $user->email=$req->input('email');
        $user->tel=$req->input('tel');
        $user->join_time=$req->input('join_time');
        $user->role=$req->input('role');
        $user->password= Hash::make($req->input('password'));
        $user->save();
        return $user;
    }

    function login(Request $req){
        $user =User::where('email' ,$req->email)->first();
        if(!$user || Hash::check($req->password,$user->password )){
            return $user;
        }
        else{
            return "error";
        }
        
     }
}
