<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userHome(){
        $user = Auth::user();
        return view('userHome',compact('user'));
    }

    public function selfEdit(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        User::where('id',$id)->update([
            'name'=>$name,
            'email'=>$email,
        ]);

        return redirect()->route('userHome')->with('message','User edited');

    }
}
