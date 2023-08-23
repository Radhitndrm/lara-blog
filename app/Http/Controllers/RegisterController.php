<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register.index',[
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
      $validateData = $request->validate([
        'name' => 'required|max:225',
        'username' => 'required|min:5|unique:users|max:225',
        'email' => 'required|email:dns|unique:users',
        'password' =>'required|min:5|max:255',
       ]);

       $validateData['password'] = Hash::make($validateData['password']);

       User::create($validateData);

      $request->session()->flash('success','Registration Successfull! Please Login.');
       return redirect('/');
    }
}
