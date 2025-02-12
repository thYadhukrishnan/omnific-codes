<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function viewLogin(){
        return view('loginView');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $input = ['email'=>$validated['email'],'password'=>$validated['password']];

        if (Auth::attempt($input,true)){
            $userID = Auth::id();
            $user = User::find($userID);
            if($user->is_admin == 1){
                return redirect()->route('adminHome');
            }else{
                return redirect()->route('userHome');
            }
        }
        else{
            return redirect()->route('viewLogin')->with('message','Invalid User');
        }
    }

    public function register(){
        return view('register');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('viewLogin');
    }

    public function registerUser(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password =Hash::make($validated['password']);
        $user->save();

        SendWelcomeMail::dispatch($user);

        return redirect()->route('viewLogin')->with('message','User Created');
    }
}
