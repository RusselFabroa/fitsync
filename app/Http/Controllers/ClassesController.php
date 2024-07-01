<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\DailyClasses;
use Illuminate\Http\Request;


class ClassesController extends Controller
{
    
    public function SaveClass(Request $request){

      $name = $request->class_name;
      $description = $request->class_description;
      $start_time = $request->start_time;
      $end_time = $request->end_time;

      $monday = $request->has('day1') ? 'checked' : 'unchecked';
      $tuesday = $request->has('day2') ? 'checked' : 'unchecked';
      $wednesday = $request->has('day3') ? 'checked' : 'unchecked';
      $thursday = $request->has('day4') ? 'checked' : 'unchecked';
      $friday = $request->has('day5') ? 'checked' : 'unchecked';
      $saturday = $request->has('day6') ? 'checked' : 'unchecked';
      $sunday = $request->has('day7') ? 'checked' : 'unchecked';


      //Save Class
      $class = Classes::create([
        'class_name' => $name,
        'class_descriptions' => $description,
      ]);

     if($class){
      //Monday
        DailyClasses::create([
            'class_id' => $class->class_id,
            'class_day' => "Monday",
            'class_start_time' => $start_time,
            'class_end_time' => $end_time,
            'attendees_limit'=> 20,
            'current_attendees' => 0,
            'status' => $monday
        ]);
      
      //Tuesday
      DailyClasses::create([
        'class_id' => $class->class_id,
        'class_day' => "Tuesday",
        'class_start_time' => $start_time,
        'class_end_time' => $end_time,
        'attendees_limit'=> 20,
        'current_attendees' => 0,
        'status' => $tuesday
      ]);

      //Wed
      DailyClasses::create([
        'class_id' => $class->class_id,
        'class_day' => "Wednesday",
        'class_start_time' => $start_time,
        'class_end_time' => $end_time,
        'attendees_limit'=> 20,
        'current_attendees' => 0,
        'status' => $wednesday
      ]);

      //Thursday
      DailyClasses::create([
        'class_id' => $class->class_id,
        'class_day' => "Thursday",
        'class_start_time' => $start_time,
        'class_end_time' => $end_time,
        'attendees_limit'=> 20,
        'current_attendees' => 0,
        'status' => $thursday
      ]);

      //Friday
      DailyClasses::create([
        'class_id' => $class->class_id,
        'class_day' => "Friday",
        'class_start_time' => $start_time,
        'class_end_time' => $end_time,
        'attendees_limit'=> 20,
        'current_attendees' => 0,
        'status' => $friday
      ]);

      //Saturday
      DailyClasses::create([
        'class_id' => $class->class_id,
        'class_day' => "Saturday",
        'class_start_time' => $start_time,
        'class_end_time' => $end_time,
        'attendees_limit'=> 20,
        'current_attendees' => 0,
        'status' => $saturday
      ]);

      //Sunday
      DailyClasses::create([
        'class_id' => $class->class_id,
        'class_day' => "Sunday",
        'class_start_time' => $start_time,
        'class_end_time' => $end_time,
        'attendees_limit'=> 20,
        'current_attendees' => 0,
        'status' => $sunday
      ]);


     }

    }
}
