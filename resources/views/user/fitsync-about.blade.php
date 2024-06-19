<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .imagehays{
            height: auto;
    max-width: 100%; /* Ensures image doesn't overflow its container */
    height: 200px; /* Set desired height */
    width: auto; /* Automatically adjusts width to maintain aspect ratio */
        }
    </style>
</head>

<body class="antialiased bg-white">
    @include('layouts.navigation-user')


    <section class="mt-5" style="margin-bottom: 2rem">
        <div class="container mx-auto p-4 pt-6">
           <h1 class="text-5xl font-bold text-green-700" style="word-spacing: 30px">ABOUT</h1>
        </div>

        <div class="container mx-5 mx-auto p-4  shadow-md rounded py-24">
            <h1 class="text-3xl text-green-500 text-center font-bold mb-4">Mission</h1>
            <div class="w-full text-justify">
            <p class="text-center text-xl font-semibold text-black-700">To empower individuals of all fitness levels to achieve their health and wellness goals through personalized training programs, expert guidance, and a supportive community, fostering lifelong habits of physical activity and well-being.</p>
            </div>
        </div>

        <div class="container mx-auto p-4 shadow-md rounded py-24">
            <h1 class="text-3xl text-green-500 text-center font-bold mb-4">Vision</h1>
            <div class="w-full text-justify">
            <p class="text-center text-xl font-semibold text-black-700">To be the premier destination for fitness enthusiasts, where people come to transform their bodies, minds, and lives, guided by our passion for excellence, innovation, and inclusivity, inspiring a healthier, stronger, and happier community.</p>
            </div>
        </div>
    </section>
    <hr>
    <section class="mt-5 pb-24">
        <div class="container mx-auto p-4 pt-6 md:p-6">
           <h1 class="text-5xl font-bold text-green-700" style="word-spacing: 30px">COACHES</h1>
        </div>

        <div class="container mx-auto p-4 pt-6 md:p-6 shadow-md rounded">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 shadow">
                @php
                 $counterNumber = 1;   
                @endphp
                @foreach ($trainerData as $item)
                <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="img-container">
                        <img src="/images/gym_trainer.png" alt="Trainer Image"/>
                    </div>
                    <h5 class="text-right mt-2 text-xl font-medium text-gray-500 mt-2 dark:text-gray-700">Coaches #{{$counterNumber}}</h5>
                    <h5 class="mb-0 text-xl font-medium text-gray-800 dark:text-gray-700">{{$item->name}}</h5>
                    <h5 class="mb-0 text-sm font-normal text-gray-800 dark:text-gray-700">Occupation: {{$item->occupation}}</h5>
                    <h5 class="mb-0 text-sm font-normal text-gray-800 dark:text-gray-700">Address: {{$item->address}}</h5>
                    <h5 class="mb-2 text-sm font-normal text-gray-800 dark:text-gray-700">Age: {{$item->age}}</h5>



                    <h3 class="text-base font-normal leading-tight text-gray-700 dark:text-gray-400 font-semibold">Available Classes</h3>
                    <div class="flex items-baseline text-gray-900 dark:text-white min-h-[7rem]">
                       
                        <ul role="list" class="space-y-1 mt-2 mb-5">

                            @foreach ($classSchedule as $item2)
                             @if ($item2->user_id == $item->id )
                                    <li class="flex items-center">
                                     <svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                     <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">{{$item2->class_title}}</span>
                                    </li>
                            {{-- @else
                            <p class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">---</p> --}}

                            @endif
                           
                            @endforeach
                           
        
                          
                        </ul>
                    </div>
                    <a href="/user/user-classes" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Check</a>
                </div>
                @php
                    $counterNumber++;
                 @endphp
                @endforeach
            </div>
        </div>

    </section>
</body>

</html>