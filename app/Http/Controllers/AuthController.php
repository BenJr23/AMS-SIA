<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
            'username' => ['required','max:255'],
            'first_name' => ['required','max:255'],
            'last_name' => ['required','max:255'],
            'email' => ['required','max:255','email'],
            'password' => ['required','min:3','max:18','confirmed'],
            'role' => ['required'],
            'created_by' => ['required'],
        ]);
        User::create($validatedData);
        return redirect()->route('register')->with('success', 'Account created successfully!');
    }
    
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log in the user
        if (Auth::attempt($validatedData)) {
            // Check if the authenticated user's role is 'admin'
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('home');
            } else {
                // Log the user out if their role is not 'admin'
                Auth::logout();

                return back()->withErrors([
                    'failed' => 'Access denied. Admins only.',
                ]);
            }
        }

        // If authentication fails
        return back()->withErrors([
            'failed' => 'Account not found',
        ]);
    }
    public function clocking(Request $request){
        $validatedData = $request->validate([
            'email' => ['required','max:255','email'],
            'password' => ['required'],
            
        ]);
        if(Auth::attempt($validatedData, 0)){
            return redirect()->intended('clockingform');
        }
        else{
            return back()->withErrors([
                'failed' => 'Account not found'
            ]);
        }
    }
}
