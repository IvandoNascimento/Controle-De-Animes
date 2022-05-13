<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index()
    {
        return view('entrar.index');
    }
    public function entrar(Request $request)
    {
        if (!Auth::attempt($request->only(['email','password'])))
        {
            return redirect()->back()->withErrors('Usuario e/ou senha invalidos');
        }
        return redirect()->route('animes.index');
        
    }
}   
