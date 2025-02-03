<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'user_nama' => 'required',
            'user_pass' => 'required',
        ]);

        $user = User::where('user_nama', $validated['user_nama'])->first();

        if ($user && Hash::check($validated['user_pass'], $user->user_pass)) {
            Auth::login($user);
            return redirect('/');
        }

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
