<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function auth(){
        if(request("email")==null | request("pass")== null) {
            session(['empty' => 'null']);
            return redirect("/");
        }
        $user=User::find(request("email"));
        if($user==null) {
            session(['auth' => 'null']);
            return redirect("/");
        }
        if($user->password!= request("pass")){
            session(['password' => 'null']);
            return redirect("/");
        }
        session(['user_email' => request("email")]);
        session(['user_id'=> $user->id]);
        session(['user_name'=> $user->name]);
        return redirect("/home");
    }
    public function register(){
        if(request("email")==null | request("pass")== null | request("name")== null ) {
            session(['empty' => 'null']);
            return redirect("/register-page");
        }
        $user=User::find(request("email"));
        if($user!=null) {
            session(['exist' => 'null']);
            return redirect("/register-page");
        }
        $user=new User();
        $user->name=request("name");
        $user->email=request("email");
        $user->password=request("pass");
        $user->save();
        return redirect("/");
    }
    public function logout(){
        session()->forget("user_email");
        session()->forget("user_id");
        session()->forget("user_name");
        return redirect("/");
    }
}
