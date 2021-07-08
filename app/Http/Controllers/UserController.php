<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Category;

class UserController extends Controller
{
    public function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        $password = User::where(['password'=>$req->password])->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            return 'Username or Password not matched';
        } else {
            $req->session()->put('user', $user);
            return redirect('layouts/app');
        }
        
    }
}
