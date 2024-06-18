<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){

        $trainerData = User::where('role','trainer')->get();
        $classSchedule = ClassSchedule::get();
        
        return view('user.fitsync-about',compact('trainerData', 'classSchedule'));
    }
}
