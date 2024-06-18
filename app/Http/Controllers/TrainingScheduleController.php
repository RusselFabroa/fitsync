<?php

namespace App\Http\Controllers;

use App\Models\TrainingSchedule;
use App\Http\Requests\StoreTrainingScheduleRequest;
use App\Http\Requests\UpdateTrainingScheduleRequest;

class TrainingScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainingSchedules = TrainingSchedule::all();
        return view('trainingSchedules.index', compact('trainingSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trainingSchedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingScheduleRequest $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'training_title' => 'required|string',
            'training_description' => 'required|string',
            'training_date' => 'required|string',
            'training_time' => 'required|string',
        ]);

        TrainingSchedule::create($validatedData);

        return redirect()->route('trainingSchedules.index')->with('success', 'Training Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingSchedule $trainingSchedule)
    {
        return view('trainingSchedules.show', compact('trainingSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingSchedule $trainingSchedule)
    {
        return view('trainingSchedules.edit', compact('trainingSchedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingScheduleRequest $request, TrainingSchedule $trainingSchedule)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'training_title' => 'required|string',
            'training_description' => 'required|string',
            'training_date' => 'required|string',
            'training_time' => 'required|string',
        ]);

        $trainingSchedule->update($validatedData);

        return redirect()->route('trainingSchedules.index')->with('success', 'Training Schedule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingSchedule $trainingSchedule)
    {
        $trainingSchedule->delete();

        return redirect()->route('trainingSchedules.index')->with('success', 'Training Schedule deleted successfully.');
    }
}