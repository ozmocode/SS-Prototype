<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except'=>'destroy']);
    }

    public function create()
    {
        return view('sessions.login');
    }
    public function store()
    {
        if (auth()->attempt(request(['email','password']))) {
            $role = Auth::user()->role_id;
            switch ($role) {
            case '1':
              return redirect('/dashboard');
              break;
            case '2':
              return redirect('/lptsi');
              break;
            case '3':
              return redirect('/webadmin');
              break;
            case '4':
              return redirect('/asprak');
              break;
            case '5':
              return redirect('/praktikan');
              break;
            default:
            return back();
              break;
          }
        }
        return back();
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/login');
    }
}
