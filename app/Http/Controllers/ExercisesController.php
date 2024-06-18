<?php

namespace App\Http\Controllers;

use App\Models\Exercises;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExercisesRequest;
use App\Http\Requests\UpdateExercisesRequest;

class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exercises = Exercises::all();
        return view('exercises.index', compact('exercises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'exercise_name' => 'required|string',
            'exercise_reps' => 'required|string',
            'exercise_sets' => 'required|string',
        ]);

        Exercises::create($validatedData);
        return redirect()->route('exercises.index')->with('success', 'Exercise created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercises $exercises)
    {
        return view('exercises.show', compact('exercises'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $exercises = Exercises::findOrFail($id);
        return view('exercises.edit', compact('exercises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercises $exercise)
    {
        $validatedData = $request->validate([
            'exercise_name' => 'required|string',
            'exercise_reps' => 'required|string',
            'exercise_sets' => 'required|string',
        ]);

        $exercise->update($validatedData);

        return redirect()->route('exercises.index')->with('success', 'Exercise updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercises $exercise)
    {
        $exercise->delete();
        return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully.');
    }
}
