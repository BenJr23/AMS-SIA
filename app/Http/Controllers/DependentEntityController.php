<?php

namespace App\Http\Controllers;

use App\Models\DependentEntity;
use App\Models\Attendance;
use Illuminate\Http\Request;

class DependentEntityController extends Controller
{
    /**
     * Display a listing of the dependent entities.
     */
    public function index()
    {
        $dependentEntities = DependentEntity::all();
        return view('dependent-entities.index', compact('dependentEntities'));
    }

    /**
     * Show the form for creating a new dependent entity.
     */
    public function create()
    {
        $attendances = Attendance::all(); // To populate a dropdown or similar for attendance selection
        return view('dependent-entities.create', compact('attendances'));
    }

    /**
     * Store a newly created dependent entity in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'attendance_id' => 'required|exists:attendances,id',
        ]);

        DependentEntity::create($request->all());
        return redirect()->route('dependent-entities.index')
                         ->with('success', 'Dependent entity created successfully.');
    }

    /**
     * Display the specified dependent entity.
     */
    public function show($id)
    {
        $dependentEntity = DependentEntity::findOrFail($id);
        return view('dependent-entities.show', compact('dependentEntity'));
    }

    /**
     * Show the form for editing the specified dependent entity.
     */
    public function edit($id)
    {
        $dependentEntity = DependentEntity::findOrFail($id);
        $attendances = Attendance::all(); // To populate a dropdown or similar for attendance selection
        return view('dependent-entities.edit', compact('dependentEntity', 'attendances'));
    }

    /**
     * Update the specified dependent entity in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'attendance_id' => 'required|exists:attendances,id',
        ]);

        $dependentEntity = DependentEntity::findOrFail($id);
        $dependentEntity->update($request->all());

        return redirect()->route('dependent-entities.index')
                         ->with('success', 'Dependent entity updated successfully.');
    }

    /**
     * Remove the specified dependent entity from storage.
     */
    public function destroy($id)
    {
        $dependentEntity = DependentEntity::findOrFail($id);
        $dependentEntity->delete();

        return redirect()->route('dependent-entities.index')
                         ->with('success', 'Dependent entity deleted successfully.');
    }
}
