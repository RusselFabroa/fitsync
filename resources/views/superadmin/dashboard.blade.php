<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/sale.js') }}"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        td{
          
            font-size: .8rem;
        }
    </style>
</head>

<body class="font-sans antialiased">
    @include('layouts.navigation-superadmin')

    <div class="w-full p-10 grid grid-cols-4 gap-10">
        <a href="#"
            class="block max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-between pt-2">
                <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Trainers</h5>
                <p class="font-bold pr-2 text-xl text-gray-700 dark:text-gray-400">{{ $trainers }}</p>
            </div>
        </a>


        <a href="#"
            class="block max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-between pt-2">
                <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Members</h5>
                <p class="font-bold pr-2 text-xl text-gray-700 dark:text-gray-400">{{ $users }}</p>
            </div>
        </a>

        <a href="/superadmin/reportSale?search=&status=&date="
            class="col-span-2 block max-w-full p-2 bg-white border cols border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-between pt-2">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sales</h5>
                <p class="font-bold pr-2 text-xl text-gray-700 dark:text-gray-400">
                    <svg width="50" class="ms-2" height="50" fill="none" stroke="#7752ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m13.75 6.75 5.5 5.25-5.5 5.25"></path>
                        <path d="M19 12H4.75"></path>
                   </svg>
                </p>
            </div>
        </a>
    </div>

   <hr class="mb-3">
    <section class="shadow rounded mx-9 mb-5 border border-2 p-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">DAILY CLASSES</h5>
        <button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Class</button>
        @php
            $class_Num = 1;
        @endphp
            
        
        @foreach ($classes as $class)
        <table class="min-w-full border-collapse mb-4 shadow">
          <thead>
            <tr>
              <th class="text-md font-medium text-center border bg-gray-200" style="width:10%;">Class #{{$class_Num}}</th>
            
              <th class="text-md font-medium text-center border bg-gray-200" style="width:20%">Class Description</th>
              <th class="text-md font-medium border bg-gray-200">Schedule</th>
              <th class="text-md font-medium border bg-gray-200"  style="width: 10%"></th>
            </tr>
          </thead>
          <tbody>
          
           
            <tr class="border">
              <td class="text-center border">{{$class->class_name}}</td>
              <td class="border p-2">
                <h6 class="mb-2">{{$class->class_descriptions}}</h6>
               <p><b>Trainer:</b> {{$class->name}}</p>

              </td>
              <td class="border">
                <table class="min-w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="border p-0" style="width: 20%">Day</th>
                      <th class="border p-0" style="width: 20%">Start Time</th>
                      <th class="border p-0" style="width: 20%">End Time</th>
                      <th class="border p-0" style="width: 15%">Attendees Limit</th>
                      <th class="border p-0" style="width: 15%">Attendees this Week</th>
                      <th class="border p-0" style="width: 15%">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                 @foreach ($daily_class as $items)
                    @if ($items->class_id == $class->class_id && $items->status == "checked")
                        <tr>
                            <td class="border text-center p-0">{{ $items->class_day }}</td>
                            <td class="border text-center p-0">{{ $items->class_start_time }}</td>
                            <td class="border text-center p-0">{{ $items->class_end_time }}</td>
                            <td class="border text-center p-0">{{ $items->attendees_limit }}</td>
                            <td class="border text-center p-0">
                                @php
                                $countofAttendees = 0;
                                 foreach ($reservedClassesThisWeek as $reservedThisWeek) {
                                     if ($reservedThisWeek->class_id == $items->class_id && $reservedThisWeek->class_day == $items->class_day)
                                      {
                                         $countofAttendees++;
                                      }
                                  }

                             @endphp
                             {{$countofAttendees}}
                            </td>
                            <td class="border text-center p-0">Open</td>
                        </tr>
                    @endif
                 @endforeach
                  </tbody>
                </table>
              </td>
              <td class="block pt-3">
                <a href="/superadmin/superadmin-dashboard-edit/{{$class->class_id}}" class="px-4 py-1 mb-2 rounded bg-white border-2 w-full">Edit</a>
                <form action="{{ route('DeleteClass') }}" method="GET">
                    @csrf
                    <input type="hidden" id="class_id" name="class_id" value="{{$class->class_id}}">
                    <button type="submit" class="px-4 py-1 rounded bg-white border-2 w-full">Delete</button>
                </form>
                {{-- <a href="{{route('DeleteClass')}}" class="px-4 py-1 rounded bg-white border-2 w-full" >Delete</a> --}}
            </td>
            </tr>
      
          </tbody>
        </table>
       @php 
       $class_Num = $class_Num + 1;
       @endphp
        @endforeach
      </section>
      

      
<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black-200">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white border border-2 rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                   Add Class
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="{{ route('SaveClass') }}" method="POST">
                    @csrf
                  

                    <div>
                        <label for="email" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Class Name</label>
                        <input type="text" name="class_name" id="class_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                    </div>
                    <div>
                        <label for="password" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Class Description</label>
                        <textarea name="class_description" id="class_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required></textarea>
                    </div>
                    <div>
                        <label for="" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Trainer</label>
                        <select name="class_trainer" id="class_trainer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                           @foreach($class_trainers as $trainor){
                            <option value="{{$trainor->id}}">{{$trainor->name}}</option>
                           }        
                           @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="password" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Start Time</label>
                        <input type="time" name="start_time" id="start_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                    </div>
                    <div>
                        <label for="password" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">End Time</label>
                        <input type="time" name="end_time" id="end_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                    
                    </div>
                    <label for="" class="block mb-0 text-sm font-bold text-gray-900 dark:text-white">Day</label>

                    <div class="">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="day1" name="day1" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"  />
                            </div>
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Monday</label>
                        </div>

                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="day2" name="day2" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"  />
                            </div>
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tuesday</label>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="day3" name="day3" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"  />
                            </div>
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wednesday</label>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="day4"  name="day4" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"  />
                            </div>
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Thursday</label>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="day5"  name="day5" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"  />
                            </div>
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Friday</label>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="day6" name="day6" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"  />
                            </div>
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saturday</label>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="day7"  name="day7" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"  />
                            </div>
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sunday</label>
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                   
                </form>
            </div>
        </div>
    </div>
</div> 
</body>

</html>