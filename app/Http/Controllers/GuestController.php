<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GuestController extends Controller
{
    public function clockval(Request $request)
    {
        // Validate the submitted form data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'username' => ['required', 'max:255'],
        ]);

        // Prepare data to send to System B's API
        $apiData = [
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
        ];

        // Send a request to System B's API
        $response = Http::get('https://lms-customer-production.up.railway.app/user?', $apiData);

        // Check if the API request was successful
        if ($response->successful()) {
            $userData = $response->json();

            // Do something with the fetched data (e.g., confirm user exists)
            return redirect()->route('guestclockingform')->with('userData', $userData);
        } elseif ($response->status() == 404) {
            // Handle case where user is not found
            return response()->json([
                'message' => 'User not found on the other system.'
            ], 404);
        } else {
            // Handle other API errors
            return response()->json([
                'message' => 'An error occurred while validating the user.',
                'error' => $response->body()
            ], $response->status());
        }
    }
}
