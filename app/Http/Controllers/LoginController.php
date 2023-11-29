<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email','password'))) return redirect()->back()->withErrors(['Usuário ou senha inválidos.']);
        Auth::attempt($request->only('email','password'));
        return redirect()->route('series.index')->with('mensagem.sucesso','Bem vindo.');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
