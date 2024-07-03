@extends('layouts.user-app')
<head>
    <style>
        td, p, span{
            font-size: .8rem;
        }

        th{
            font-size: .9rem;
        }
    </style>
</head>
@section('content')

<div class="font-poppins bg-white pr-20 pl-20 pt-16">

    {{-- <section>
        @foreach($reservedClassToday as $reserve)
        <h5>{{$reserve->class_id}}</h5>
        @endforeach

        <hr>
        <h4>{{$selectedDay}}</h4>
    </section> --}}
    <form action="/user/user-classes" method="get">
    <div class="flex flex-row">
        <div class="w-1/3"></div>
        <div class="w-1/3 "></div>
        
        <div class="w-1/3 mb-2 flex">   
            <div class="w-3/4">
            
                <select type="select" id="selectedDay" name="selectedDay" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ">
                    <option value="{{$selectedDay}}" selected>{{$selectedDay}}</option>
                    <hr>
                    
                    @foreach ($classDays as $current_day)
                    <option value="{{$current_day->class_day}}">{{$current_day->class_day}}</option>
                    @endforeach
                </select>
            </div>
            <button class="bg-gray-50 border border-gray-300 rounded-lg ms-2 px-4 py-1">Load</button>
        </div>
  
    </div>
</form>
    
<section class="border border-gray-300 rounded shadow p-3 ">
    <h2 class="pb-2 text-2xl font-bold mb-2">DAILY CLASSES</h2>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif


    <table class="min-w-full border-collapse mb-4 shadow">
        <thead>
          <tr>
            <th class="text-md font-medium text-center border bg-gray-200" style="width:10%;">Day</th>
          
            <th class="text-md font-medium text-center border bg-gray-200" style="width:80%">Class Schedule</th>
            {{-- <th class="text-md font-medium border bg-gray-200">Schedule</th> --}}
            {{-- <th class="text-md font-medium border bg-gray-200"  style="width: 10%"></th> --}}
          </tr>
        </thead>
        <tbody>
            @foreach ($classDays as $current_day)
            @if ($current_day->class_day == $selectedDay)
            <tr class="border">
                <td class="text-center border">{{$current_day->class_day}}</td>
                {{-- <td class="border p-2">
                  <h6>Sample Desc</h6>
                 <p>Trainer: Asel</p>
  
                </td> --}}
                <td class="border">
                    @foreach($daily_class as $data)
                        @if($current_day->class_day == $data->class_day )
                      
                            <table class="min-w-full border-collapse mb-3 shadow">
                                <thead>
                                  <tr>
                                    <td class="border p-0 text-center font-semibold bg-green-100" style="width: 15%">Class Name</td>
                                    <td class="border p-0 text-center font-semibold bg-green-100" style="width: 30%">Description</td>
                                    <td class="border p-0 text-center font-semibold bg-green-100" style="width: 15%">Trainer</td>
                                    {{-- <td class="border p-0 text-center font-semibold bg-green-100" style="width: 15%">Day</td> --}}

                                    <td class="border p-0 text-center font-semibold bg-green-100" style="width: 10%">Start Time</td>
                                    <td class="border p-0 text-center font-semibold bg-green-100" style="width: 10%">End Time</td>
                                    <td class="border p-0 text-center font-semibold bg-green-100" style="width: 10%">Attendees</td>
                                    <td class="border p-0 text-center font-semibold bg-green-100" style="width: 10%"></td>
                                  </tr>
                                </thead>
                                <tbody>
                              
                                      <tr>
                                          <td class="border text-center p-0">{{$data->class_name}}</td>
                                          <td class="border text-center p-0">{{$data->class_descriptions}}</td>
                                          <td class="border text-center p-0">{{$data->name}}</td>
                                          {{-- <td class="border text-center p-0">{{$data->class_day}}</td> --}}

            
                                          <td class="border text-center p-0">{{$data->class_start_time}}</td>
                                          <td class="border text-center p-0">{{$data->class_end_time}}</td>
                                     
                                          <td class="border text-center p-0">
                                                @php
                                                   $countofAttendees = 0;
                                                    foreach ($reservedClassesThisWeek as $reservedThisWeek) {
                                                        if ($reservedThisWeek->class_id == $data->class_id && $reservedThisWeek->class_day == $data->class_day)
                                                         {
                                                            $countofAttendees++;
                                                         }
                                                     }
                                                @endphp

                                            {{$countofAttendees}}/{{$data->attendees_limit}}
                                        
                                        
                                            </td>
                                          <td class="border text-center p-0">
                                            <form action="{{ route('AttendClass') }}" method="POST">
                                                @csrf
                                                <input type="hidden" id="class_id" name="class_id" value="{{$data->class_id}}">
                                                <input type="hidden" id="user_id" name="user_id" value="{{$userId}}">
                                                <input type="hidden" id="class_day" name="class_day" value="{{$data->class_day}}">
                                                @php
                                                    $isAlreadyReserved = false;
                                                    foreach ($reservedClassToday as $reserve) {
                                                        if($reserve->class_id == $data->class_id && $reserve->class_day == $data->class_day){
                                                            $isAlreadyReserved = true;
                                                        }
                                                    }    
                                                @endphp

                                                @if ($isAlreadyReserved)
                                                <button type="submit" disabled class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reserved</button>
                                                    
                                                @else
                                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Attend</button>
                                                    
                                                @endif
                                                
                                            </form>
                                            {{-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Attend</button> --}}
                                          </td>
                                      </tr>
                                 
                             
                                </tbody>
                              </table>
                            
                        @endif


                    @endforeach
                 
                  
                </td>
                {{-- <td class="block pt-3"></td> --}}
               
              </tr>
           
            @endif
            
        @endforeach
            </tbody>
          </table>
        </tbody>
    </table>
</section>

<section  class="border border-gray-300 rounded shadow p-3 my-3 ">


    <h2 class="pb-2 text-2xl font-bold mb-2">AVAILABLE TRAININGS</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-2 mx-1 mb-4">
        @foreach($classschedule as $data)
        @if( $data->class_current > 0)
        <div class="card  border-4 border-green-700 p-3 rounded">
            <div class="justify-center items-center  ">
                <img class="max-h-[30rem] max-w-full rounded-lg border-2 border-cyan-900" src="{{asset("/images/uploadedpic/workout.jpg")}}" alt="">
                {{-- <img width="120" height="120" src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/64/external-dumbell-gym-flatart-icons-flat-flatarticons.png" alt="external-dumbell-gym-flatart-icons-flat-flatarticons"/> --}}
            </div>
            <div>
                <a href="#">
                    <h5 class="mb-2 text-2xl text-center font-bold tracking-wide text-[#344955] dark:text-[#344955]">
                        {{ $data->class_title }}</h5>
                </a>
                <p class="mb-1 pt-2 font-normal text-sm text-[#344955] leading-tight dark:text-gray-400">
                    <span class="font-bold">Description:</span> {{ $data->class_description }}
                </p>
                <p class="mb-1 font-normal text-sm text-[#344955] leading-tight dark:text-gray-400">
                <span class="font-bold"> Day:</span> {{ \Carbon\Carbon::parse($data->class_start_date)->format('F d, Y') }} -
                    {{ \Carbon\Carbon::parse($data->class_end_date)->format('F d, Y') }}
                </p>
    
                <p class="mb-1 font-normal text-sm text-[#344955] leading-tight dark:text-gray-400">
                <span class="font-bold">Time:</span> {{ $data->class_start_time }} -
                    {{ $data->class_end_time }}</p>
                    <p class="mb-3 font-normal text-sm text-[#344955] leading-tight dark:text-gray-400">
                    <span class="font-bold">Available Slots Left:</span> {{ $data->class_current }} slots left
                </p>
                @if( $data->class_current <= 0)
                <button disabled
                    class="h-fit mt-4 grid text-center font-bold items-center  text-sm bg-gray-700 w-100 text-white px-4 py-2 ">
                    Class is full
                </button>
                @else
                <a href="{{ route('user-classes.create', ['classId' => $data->class_id]) }}"
                    class="h-fit mt-4 grid text-center font-bold items-center  text-sm bg-[#1A5C34] text-white px-4 py-2 rounded hover:bg-[#113B22] focus:outline-none focus:bg-[#113B22]">
                    RESERVE SLOT
                </a>
                @endif     
            </div>
        </div>
        @endif
       @endforeach
      
        <!-- Repeat the same structure for other images -->
    </div>

</section>


<section  class="border border-gray-300 rounded shadow p-3 my-3 ">
    <h2 class="pb-2 text-2xl mt-5 font-bold mb-2">OTHER TRAININGS</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-2 mx-1">
        @foreach($classschedule as $data)
        @if( $data->class_current <= 0)
        <div class="card  border-4 border-green-700 p-3 rounded">
            <div class="justify-center items-center  ">
                <img class="max-h-[30rem] max-w-full rounded-lg border-2 border-cyan-900" src="{{asset("/images/uploadedpic/workout.jpg")}}" alt="">
                {{-- <img width="120" height="120" src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/64/external-dumbell-gym-flatart-icons-flat-flatarticons.png" alt="external-dumbell-gym-flatart-icons-flat-flatarticons"/> --}}
            </div>
            <div class="">
                <a href="#">
                    <h5 class="mb-2 text-2xl text-center font-bold tracking-wide text-[#344955] dark:text-[#344955]">
                        {{ $data->class_title }}</h5>
                </a>
                <p class="mb-1 pt-2 font-normal text-sm text-[#344955] leading-tight dark:text-gray-400">
                    <span class="font-bold">Description:</span> {{ $data->class_description }}
                </p>
                <p class="mb-1 font-normal text-sm text-[#344955] leading-tight dark:text-gray-400">
                <span class="font-bold"> Day:</span> {{ \Carbon\Carbon::parse($data->class_start_date)->format('F d, Y') }} -
                    {{ \Carbon\Carbon::parse($data->class_end_date)->format('F d, Y') }}
                </p>
    
                <p class="mb-1 font-normal text-sm text-[#344955] leading-tight dark:text-gray-400">
                <span class="font-bold">Time:</span> {{ $data->class_start_time }} -
                    {{ $data->class_end_time }}</p>
                    <p class="mb-3 font-normal text-sm text-[#344955] leading-tight dark:text-gray-400">
                    <span class="font-bold">Available Slots Left:</span> {{ $data->class_current }} slots left
                </p>
                @if( $data->class_current <= 0)
                <button disabled
                    class="h-fit mt-4 grid text-center font-bold items-center  text-sm bg-gray-700 w-100 text-white px-4 py-2 ">
                    Class is full
                </button>
                @else
                <a href="{{ route('user-classes.create', ['classId' => $data->class_id]) }}"
                    class="h-fit mt-4 grid text-center font-bold items-center  text-sm bg-[#1A5C34] text-white px-4 py-2 rounded hover:bg-[#113B22] focus:outline-none focus:bg-[#113B22]">
                    RESERVE SLOT
                </a>
                @endif     
            </div>
        </div>
        @endif
        @endforeach

        <!-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
          <div class="bg-blue-100 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-gray-600 text-black font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <div class="text-right">
             
              <p>No. of Trainers</p>
            </div>
          </div>
        </div> -->

    </div>
    



</div>
</section>
@endsection
