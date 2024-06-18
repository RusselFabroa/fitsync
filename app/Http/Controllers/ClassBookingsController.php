<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ClassBookings;
use App\Models\ClassSchedule;
use App\Models\SelectedExercise;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreClassBookingsRequest;
use App\Http\Requests\UpdateClassBookingsRequest;


class ClassBookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classschedule = ClassSchedule::all();
        return view('classBookings.index', compact('classschedule'));
    }

    public function trainerindex()
    {
        $classbookings = ClassBookings::join('class_schedules', 'class_bookings.class_id', '=', 'class_schedules.class_id')
            ->select('class_bookings.*', 'class_schedules.*')
            ->get();

        return view('classBookings.trainerindex', compact('classbookings'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($classId)
    {
        $classId = $classId;

        $user = auth()->user();
        $userId = $user->id;
        $userName = $user->name;
        $classDetails = ClassSchedule::where('class_id', $classId)->first();
        $userDetails = ClassSchedule::where('class_id', $classId)->first(['class_title']);

        return view('classBookings.create', compact('classId', 'userId', 'classDetails', 'userName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Get the authenticated user's ID
            $user_id = auth()->id();
    
            // Check if the user has already booked the class
            $existingBooking = ClassBookings::where('user_id', $user_id)
                ->where('class_id', $request->class_id)
                ->first();
    
            if ($existingBooking) {
                // If the user has already booked the class, display an error message
                return redirect()->back()->withErrors(['error' => 'You have already booked this class.'])->withInput();
            }
    
            // Validate the request data
            $request->validate([
                'class_id' => 'required|integer',
                'booking_mop' => 'nullable|string',
                'booking_payment_date' => 'nullable|string',
                'booking_payment_status' => 'nullable|string',
                
            ]);
    
            // Create the booking
            $booking = ClassBookings::create([
                'user_id' => $user_id,
                'class_id' => $request->class_id,
                'booking_mop' => $request->booking_mop,
                'booking_payment_date' => $request->booking_payment_date,
                'booking_payment_status' => $request->booking_payment_status,
            ]);
    
            // Decrement class_current by 1 for the associated class
            if ($booking) {
                $classSchedule = ClassSchedule::find($request->class_id);
                if ($classSchedule) {
                    $classSchedule->decrement('class_current');
                }
            }
    
            // Redirect to the user-pendingclasses route with a success message
            return redirect()->route('user-classes.pending')->with('success', 'Booking created successfully.');
        } catch (ValidationException $exception) {
            // If validation fails, redirect back with the validation errors
            return redirect()->back()->withErrors(['error' => 'Validation error.'])->withInput();
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(ClassBookings $classBookings)
    {
        return view('classBookings.show', compact('classBookings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $classBookings = ClassBookings::findOrFail($id);
        return view('classBookings.edit', compact('classBookings'));
    }

    public function update(Request $request, $cb_id)
    {
        $classBooking = ClassBookings::findOrFail($cb_id);

        $classBooking->update([
            'booking_payment_status' => $request->input('booking_payment_status'),
        ]);

        return redirect()->route('classBookings.trainerindex')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassBookings $classBookings)
    {
        $classBookings->delete();
        return redirect()->route('classBookings.index')->with('success', 'Booking deleted successfully.');
    }

    public function userdestroy($id)
    {
        $classBooking = ClassBookings::find($id);
    
        if (!$classBooking) {
            return redirect()->route('user-classes.pending')->with('error', 'Booking not found.');
        }
    
        // Find the corresponding ClassSchedule record using class_id
        $classSchedule = ClassSchedule::where('class_id', $classBooking->class_id)->first();
    
        if (!$classSchedule) {
            return redirect()->route('user-classes.index')->with('error', 'Failed to find corresponding class schedule.');
        }
    
        // Attempt to delete the booking
        $deleted = $classBooking->delete();
    
        if ($deleted) {
            // Increment class_current by 1
            $classSchedule->increment('class_current');
            return redirect()->route('user-classes.index')->with('success', 'Booking cancelled successfully.');
        } else {
            return redirect()->route('user-classes.index')->with('error', 'Failed to cancel booking.');
        }
    }
    

    public function pending()
    {
        $userId = Auth::id();

        $classbookings = ClassBookings::join('class_schedules', 'class_bookings.class_id', '=', 'class_schedules.class_id')
            ->select('class_bookings.*', 'class_schedules.*')
            ->where('class_bookings.user_id', $userId)
            ->get();
            $select_exercises = SelectedExercise::join('exercises', 'select_exercises.selectedexercise_id', '=', 'exercises.exercise_id')
            ->select('select_exercises.*', 'exercises.exercise_name')
            ->get();
        return view('classBookings.pending', compact('classbookings', 'select_exercises','userId'));
    }
}
