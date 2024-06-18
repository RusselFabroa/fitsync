<?php

namespace App\Http\Controllers;

use App\Models\ClassBookings;
use App\Models\User;
use App\Models\ClassSchedule;
use App\Models\MembershipFees;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\TwilioService;
use Barryvdh\DomPDF\Facade\PDF;

class UserController extends Controller
{
    public function superadminDashboard()
    {
        $trainers = User::where('role', '=', 'trainer')->count();
        $users = User::where('role', '=', 'user')->count();

        $usersThisWeek = User::where('role', '=', 'user')->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $usersLastWeek = User::where('role', '=', 'user')->whereBetween('created_at', [now()->startOfWeek()->subWeek(), now()->endOfWeek()->subWeek()])->count();

        // Calculate the percentage increase
        $percentage = ($usersThisWeek - $usersLastWeek) / ($usersLastWeek ?: 1) * 100;


        // Additional logic to get data for the chart, assuming you have a column 'created_at' or any other relevant timestamp
        $userChartData = User::where('role', '=', 'user')
            ->whereDate('created_at', '>', now()->subDays(7)) // Change this based on your requirements
            ->get(['created_at']);

        // Extracting the count of users created on each day for the last 7 days
        $userChartData = $userChartData->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d');
        });

        $chartData = [];
        foreach ($userChartData as $date => $data) {
            $chartData[] = [
                'x' => $date,
                'y' => count($data),
            ];
        }

        return view('superadmin.dashboard', compact('users', 'trainers', 'chartData', 'percentage'));
    }

        public function trainerDashboard(Request $request)
        {
        $trainers = User::where('role', '=', 'trainer')->count();
        $users = User::where('role', '=', 'user')->count();
        $classes = ClassSchedule::withoutTrashed()->count();
        $member1 = MembershipFees::where('membership_title', '=', 'With Mindoro ID')->count();
        $member2 = MembershipFees::where('membership_title', '=', 'Without Mindoro ID')->count();
        $member3 = MembershipFees::where('membership_title', '=', '1 Month')->count();
        $member4 = MembershipFees::where('membership_title', '=', '6 Months')->count();
        $member5 = MembershipFees::where('membership_title', '=', '12 Months')->count();


       


        $class_schedule = ClassSchedule::withoutTrashed()->get();
   
        
        $classID = $request->query('classId');
        $classDate = $request->query('date');

        $class_first = ClassBookings::join('users', 'class_bookings.user_id', '=', 'users.id')
        ->leftJoin('class_schedules', 'class_bookings.class_id', '=', 'class_schedules.class_id')
        ->select('class_bookings.*', 'users.*', 'class_schedules.class_title', 'class_schedules.class_description', 'class_schedules.class_start_date', 'class_schedules.class_end_date', 'class_schedules.class_start_time', 'class_schedules.class_end_time')
        ->where('class_bookings.class_id', 'like', '%' . $classID . '%')
        ->whereDate('class_schedules.class_start_date', 'like', '%' . $classDate . '%')
        ->orderBy('class_bookings.created_at', 'desc')
        ->first();

      

        if($request->has("classId")){

            
            $class_data = ClassBookings::join('users', 'class_bookings.user_id', '=', 'users.id')
            ->leftJoin('class_schedules', 'class_bookings.class_id', '=', 'class_schedules.class_id')
            ->select('class_bookings.*', 'users.*', 'class_schedules.class_title', 'class_schedules.class_description', 'class_schedules.class_start_date', 'class_schedules.class_end_date', 'class_schedules.class_start_time', 'class_schedules.class_end_time')
            ->where('class_bookings.class_id', 'like', '%' . $classID . '%')
            ->whereDate('class_schedules.class_start_date', 'like', '%'.$classDate.'%')
            ->orderBy('class_bookings.created_at', 'desc')
            ->get();
        }else{

            $class_data = ClassBookings::join('users', 'class_bookings.user_id', '=', 'users.id')
            ->leftJoin('class_schedules', 'class_bookings.class_id', '=', 'class_schedules.class_id')
            ->select('class_bookings.*', 'users.*', 'class_schedules.class_title', 'class_schedules.class_description', 'class_schedules.class_start_date', 'class_schedules.class_end_date', 'class_schedules.class_start_time', 'class_schedules.class_end_time')
            ->where('class_bookings.class_id', '=' , $class_first->class_id )
            ->orderBy('class_bookings.created_at', 'desc')
            ->get();

       

        }

        $selected_date = $classDate;
       



        return view('trainer.dashboard',
         compact('class_first','class_data','class_schedule','trainers', 'users', 'classes', 'member1', 'member2', 'member3', 'member4', 'member5','selected_date'));
    }


    
    public function trainerPrint(Request $request)
    {
   
    $class_schedule = ClassSchedule::withoutTrashed()->get();

    
    $classID = $request->query('classId');
    $classDate = $request->query('date');

    $class_first = ClassBookings::join('users', 'class_bookings.user_id', '=', 'users.id')
    ->leftJoin('class_schedules', 'class_bookings.class_id', '=', 'class_schedules.class_id')
    ->select('class_bookings.*', 'users.*', 'class_schedules.class_title', 'class_schedules.class_description', 'class_schedules.class_start_date', 'class_schedules.class_end_date', 'class_schedules.class_start_time', 'class_schedules.class_end_time')
    ->where('class_bookings.class_id', 'like', '%' . $classID . '%')
    ->whereDate('class_schedules.class_start_date', 'like', '%' . $classDate . '%')
    ->orderBy('class_bookings.created_at', 'desc')
    ->first();

  

    if($request->has("classId")){

        
        $class_data = ClassBookings::join('users', 'class_bookings.user_id', '=', 'users.id')
        ->leftJoin('class_schedules', 'class_bookings.class_id', '=', 'class_schedules.class_id')
        ->select('class_bookings.*', 'users.*', 'class_schedules.class_title', 'class_schedules.class_description', 'class_schedules.class_start_date', 'class_schedules.class_end_date', 'class_schedules.class_start_time', 'class_schedules.class_end_time')
        ->where('class_bookings.class_id', 'like', '%' . $classID . '%')
        ->whereDate('class_schedules.class_start_date', 'like', '%'.$classDate.'%')
        ->orderBy('class_bookings.created_at', 'desc')
        ->get();
    }else{

        $class_data = ClassBookings::join('users', 'class_bookings.user_id', '=', 'users.id')
        ->leftJoin('class_schedules', 'class_bookings.class_id', '=', 'class_schedules.class_id')
        ->select('class_bookings.*', 'users.*', 'class_schedules.class_title', 'class_schedules.class_description', 'class_schedules.class_start_date', 'class_schedules.class_end_date', 'class_schedules.class_start_time', 'class_schedules.class_end_time')
        ->where('class_bookings.class_id', '=' , $class_first->class_id )
        ->orderBy('class_bookings.created_at', 'desc')
        ->get();

   

    }

    $selected_date = $classDate;
   



    $pdf = PDF::loadView('trainer.dashboardPrint',
     compact('class_first','class_data','class_schedule', 'selected_date'));

     return $pdf->stream();
}


    public function userDashboard()
    {
        return view('user.dashboard');
    }

    public function sendReminder(Request $request)
{
    $userId = $request->input('user');
    $reminderType = $request->input('reminder_type');

    $user = User::find($userId);

    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }

    $twilioService = new TwilioService();

    if ($reminderType === 'due_reminder') {
        // Logic for due reminder message
        $message = "Hello {$user->name}, your membership will expire in 3 days.";
    } elseif ($reminderType === 'inactive_account_reminder') {
        // Logic for inactive account reminder message
        $message = "Hello {$user->name}, your membership is currently inactive.";
    } else {
        return redirect()->back()->with('error', 'Invalid reminder type');
    }

    // Send SMS message
    $twilioService->sendMessage($user->phone_number, $message);

    return redirect()->back()->with('success', 'Reminder sent successfully');
}
}
