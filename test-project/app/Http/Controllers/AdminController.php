<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminHome(){
        $userData = User::where('is_admin',0)->get();
        return view('adminHome',compact('userData'));
    }

    public function deleteUser(Request $request){
        $id = $request->input('id');
        User::where('id',$id)->delete();
        return redirect()->route('adminHome')->with('message','User Deleted');
    }

    public function editUser(Request $request){
        $id = $request->input('id');
        $userData = User::find($id);
        return view('editUser',compact('userData'));
    }

    public function userEditSave(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        User::where('id',$id)->update([
            'name'=>$name,
            'email'=>$email,
        ]);

        return redirect()->route('adminHome')->with('message','User edited');
    }
}
