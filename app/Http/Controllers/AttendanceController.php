<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Http;


class AttendanceController extends Controller
{   
    
    public function index()
    {
        $attendances = Attendance::all();
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        return view('attendance.create');
    }
    public function store2(Request $request)
    {
        // Step 1: Validate the incoming request
        $validated = $request->validate([
            'time_in' => 'required|date_format:H:i',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
        ]);
    
        // Step 2: Create the Attendance record (user_id is nullable)
        $attendance = Attendance::create([
            'user_id' => null, // No user_id for guests
            'time_in' => $validated['time_in'],
        ]);
    
        // Step 3: Create the Dependent Entity linked to the attendance
        \App\Models\DependentEntity::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'attendance_id' => $attendance->id,
        ]);

        // Step 4: Redirect with a success message
        return redirect()->route('guestclockingform')->with('success', 'Attendance and dependent entity created successfully.');
    }

    public function datatime(Request $request)
    {
        $validated = $request->validate([
            'time_in' => 'required|date_format:H:i',
            'user_id' => 'required|exists:users,id',
        ]);

        Attendance::create($validated);

        $user = auth()->user(); // Retrieve the authenticated user

        if ($user) {
            $email = $user->email; // Get the authenticated user's email

            // Use the full URL of the external API
            $apiUrl = 'https://lms-admin-production-3b1d.up.railway.app/api/activate-user';

            // Call the activate API using the email
            $response = Http::post($apiUrl, [
                'email' => $email
            ]);

            // Optionally handle the API response if needed
            if ($response->successful()) {
                // Activation succeeded
            } else {
                // Log or handle errors
                \Log::error('Activation API failed', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            }
        }
        
        return (new AuthenticatedSessionController)->destroy2($request);
    }

    public function show(Attendance $attendance)
    {
        return view('attendance.show', compact('attendance'));
    }

    public function edit(Attendance $attendance)
    {
        return view('attendance.edit', compact('attendance'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'time_out' => 'required|date_format:H:i',
        ]);
    
        $attendance->update($validated);
        $user = auth()->user(); // Retrieve the authenticated user

        if ($user) {
            $email = $user->email; // Get the authenticated user's email

            // Use the full URL of the external API
            $apiUrl = 'https://lms-admin-production-3b1d.up.railway.app/api/deactivate-user';

            // Call the activate API using the email
            $response = Http::post($apiUrl, [
                'email' => $email
            ]);

            // Optionally handle the API response if needed
            if ($response->successful()) {
                // Activation succeeded
            } else {
                // Log or handle errors
                \Log::error('Activation API failed', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            }
        }
    
        return (new AuthenticatedSessionController)->destroy2($request);

    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendance.index')->with('success', 'Attendance deleted successfully.');
    }
}
