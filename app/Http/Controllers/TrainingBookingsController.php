<?php

namespace App\Http\Controllers;

use App\Models\TrainingBookings;
use App\Http\Requests\StoreTrainingBookingsRequest;
use App\Http\Requests\UpdateTrainingBookingsRequest;

class TrainingBookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainingBookings = TrainingBookings::all();
        return view('trainingBookings.index', compact('trainingBookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trainingBookings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingBookingsRequest $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'trainings_id' => 'required|integer',
            'booking_mop' => 'required|string',
            'booking_payment' => 'required|string',
            'booking_payment_date' => 'required|string',
        ]);

        TrainingBookings::create($validatedData);

        return redirect()->route('trainingBookings.index')->with('success', 'Training Booking created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingBookings $trainingBookings)
    {
        return view('trainingBookings.show', compact('trainingBookings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingBookings $trainingBookings)
    {
        return view('trainingBookings.edit', compact('trainingBookings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingBookingsRequest $request, TrainingBookings $trainingBookings)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'trainings_id' => 'required|integer',
            'booking_mop' => 'required|string',
            'booking_payment' => 'required|string',
            'booking_payment_date' => 'required|string',
        ]);

        $trainingBookings->update($validatedData);

        return redirect()->route('trainingBookings.index')->with('success', 'Training Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingBookings $trainingBookings)
    {
        $trainingBookings->delete();

        return redirect()->route('trainingBookings.index')->with('success', 'Training Booking deleted successfully.');
    }
}