<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    public function actionIndex(Request $request){
        if ($request->session()->exists('activeUser')) {
            return redirect('/');
        }
        return view('login.index');
    }

    public  function actionLogin(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');

        if($email == 'admin@gmail.com' && $password =='adminadmin'){
            $request->session()->put('activeUser', $email);
            return redirect('/');
        }else{
            echo "<div class='alert alert-danger'>email atau Password Salah!</div>";
            return view('login.index');
        }
    }

    public function actionLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
