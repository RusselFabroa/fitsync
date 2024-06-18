<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ClassSchedule;
use App\Models\SelectedExercise;
use App\Models\Exercises;
use App\Http\Requests\StoreClassScheduleRequest;
use App\Http\Requests\UpdateClassScheduleRequest;
use Illuminate\Support\Facades\Auth; 

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classSchedules = ClassSchedule::all();
        $select_exercises = SelectedExercise::join('exercises', 'select_exercises.selectedexercise_id', '=', 'exercises.exercise_id')
        ->select('select_exercises.*', 'exercises.exercise_name')
        ->get();
        return view('classSchedule.index', compact('classSchedules', 'select_exercises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trainers = User::where('role', 'trainer')->get();
        $exercises = Exercises::withoutTrashed()->get();
        return view('classSchedule.create', compact('trainers', 'exercises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'class_title' => 'required|string',
            'class_description' => 'required|string',
            'class_start_date' => 'required|string',
            'class_end_date' => 'required|string',
            'class_start_time' => 'required|string',
            'class_end_time' => 'required|string',
            'class_limit' => 'required|string',
            'exercises' => 'required|array',
            'class_type' =>'required|string'
        ]);
 // Get the authenticated user's ID
 $userId = Auth::id();

 // Set user_id in the validated data
 $validatedData['user_id'] = $userId;

 // Set class_current to the value of class_limit
 $validatedData['class_current'] = $validatedData['class_limit'];

 // Create the class schedule and assign it to $classSchedule
 $classSchedule = ClassSchedule::create($validatedData);

 // Store selected exercises
 if ($classSchedule) {
     foreach ($validatedData['exercises'] as $exerciseId) {
         SelectedExercise::create([
             'class_schedule_id' => $classSchedule->class_id, // Assuming 'id' is the primary key of ClassSchedule
             'exercise_id' => $exerciseId,
             'user_id' => $userId, 
         ]);
     }
 }
 
 return redirect()->route('classSchedule.index')->with('success', 'Class schedule created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(ClassSchedule $classSchedule)
    {
        return view('classSchedule.show', compact('classSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassSchedule $classSchedule)
    {
        $trainers = User::where('role', 'trainer')->get();

        return view('classSchedule.edit', compact('classSchedule', 'trainers'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassSchedule $classSchedule)
    {
        $this->validate($request, [
            'user_id' => 'required|integer',
            'class_title' => 'required|string',
            'class_description' => 'required|string',
            'class_start_date' => 'required|string',
            'class_end_date' => 'required|string',
            'class_start_time' => 'required|string',
            'class_end_time' => 'required|string',
            'class_limit' => 'required|string',
        ]);

        $classSchedule->update($request->all());

        return redirect()->route('classSchedule.index')->with('success', 'Class schedule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassSchedule $classSchedule)
    {
        $classSchedule->delete();
        return redirect()->route('classSchedule.index')->with('success', 'Class schedule deleted successfully.');
    }
}
