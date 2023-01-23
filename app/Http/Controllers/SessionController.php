<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        if(auth()-> attempt(request(['email', 'password'])) == false){
            return back()-> withErrors([
                'message'=>  'incorrectosssss',
            ]);
        }
        return redirect()->to('/categoria');
        //return view('categoria.index');
    }
    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }
}
