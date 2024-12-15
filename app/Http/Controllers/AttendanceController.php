<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use App\Models\Attendance;

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'time_in' => 'required|date_format:H:i',
            'user_id' => 'required|exists:users,id',
        ]);

        Attendance::create($validated);

        
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
    
        return (new AuthenticatedSessionController)->destroy2($request);

    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendance.index')->with('success', 'Attendance deleted successfully.');
    }
}
