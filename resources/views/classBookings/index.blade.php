@extends('layouts.user-app')

@section('content')
<div class="font-poppins bg-white pr-20 pl-20 pt-16">

    <h2 class="pb-2 text-4xl font-bold mb-2">AVAILABLE CLASSES</h2>
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





    <h2 class="pb-2 text-4xl mt-5 font-bold mb-2">OTHER CLASSES</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-2 mx-1">
        @foreach($classschedule as $data)
        @if( $data->class_current <= 0)
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
@endsection
