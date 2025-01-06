<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'phone_no' => 'required|max:15',
            'date_of_birth' => 'required|date',
            'address' => 'required|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Add validation for photo
            'employee_type' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']); // Hash the password

        // Store the file if a photo is uploaded
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        User::create($validatedData);

        return redirect()->route('employee')->with('success', 'Employee registered successfully!');
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
            if (Auth::user()->employee_type === 'admin') {
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
