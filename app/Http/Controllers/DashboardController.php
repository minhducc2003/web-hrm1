<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function logout(Request $request)
    {   
        Auth::logout();
        return redirect()->route('login');
    }
}
