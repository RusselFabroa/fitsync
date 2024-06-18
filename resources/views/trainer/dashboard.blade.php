<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased pb-24">
        @include('layouts.navigation-trainer')
        <section class="mx-7 mt-12">
          <!-- Statistics Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
          <div class="bg-blue-100 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-gray-600 text-black font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">{{ $trainers }}</p>
              <p>No. of Trainers</p>
            </div>
          </div>

          <div class="bg-blue-100 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-gray-600 text-black font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">{{ $users }}</p>
              <p>No. of Users</p>
            </div>
          </div>

          <div class="bg-blue-100 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-gray-600 text-black font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">{{ $classes }}</p>
              <p>No. of Active Classes</p>
            </div>
          </div>

          <div class="bg-blue-100 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-gray-600 text-black font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">{{ $member1 }}</p>
              <p>No. of Users with Mindoro ID</p>
            </div>
          </div>

          <div class="bg-blue-100 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-gray-600 text-black font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">{{ $member2 }}</p>
              <p>No. of Users without Mindoro ID</p>
            </div>
          </div>

          <div class="bg-blue-100 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-gray-600 text-black font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">{{ $member3 }}</p>
              <p>No. of Users under 1 Month Membership</p>
            </div>
          </div>

          <div class="bg-blue-100 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-gray-600 text-black font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">{{ $member4 }}</p>
              <p>No. of Users under 6 Months Membership</p>
            </div>
          </div>

          <div class="bg-blue-100 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-gray-600 text-black font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">{{ $member5 }}</p>
              <p>No. of Users under 12 Months Membership</p>
            </div>
          </div>
        
      </div>
      <!-- ./Statistics Cards -->
      {{-- <div class="mx-4 mt-10">
        <div class="bg-blue-50 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3  dark:border-gray-600 text-black font-medium group">
          <div class="flex justify-center items-center w-14 h-14 transition-all duration-300 transform group-hover:rotate-12">
            {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg> --}}
          {{-- </div>
          <div class="text-right">
            <a href="/trainer/reportSale?search=&status=&date=" class=" font-semibold text-xl upper border border-gray-300 px-10 py-0  transition duration-500 hover:scale-30 flex items-center w-50">SALES
              <svg width="50" class="ms-2" height="50" fill="none" stroke="#7752ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="m13.75 6.75 5.5 5.25-5.5 5.25"></path>
                <path d="M19 12H4.75"></path>
           </svg>
            </a>
          </div>
        </div>
      </div>  --}}
      
    </section >

        {{-- <div class="mt-10 mx-20 border-2 w-100 p-2 border-gray-400 rounded-lg text-lime-950">
          <a href="/trainer/reportSale?search=&status=&date=" class=" font-semibold text-xl upper border border-gray-300 px-10 py-2  transition duration-500 hover:scale-30 flex items-center w-50">SALES
            <svg width="50" class="ms-2" height="50" fill="none" stroke="#7752ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="m13.75 6.75 5.5 5.25-5.5 5.25"></path>
              <path d="M19 12H4.75"></path>
         </svg>
          </a>
      </div>
    --}}
{{-- <hr class="mt-3"/> --}}
      <section class="mx-5">

        <div class="px-5 pt-5">
          <h2 class="font-bold text-xl">Classes and Attendees</h2>
        </div>


        <div class=" grid grid-cols-1 gap-x-2 gap-y-8 sm:grid-cols-11 mx-5">
          {{-- <div class="sm:col-span-2 sm:col-start-1">
              <label for="city" class="block text-sm font-medium leading-6 text-gray-900"></label>
              <div class="mt-2">
                <input type="text" name="searchContent" id="searchContent" value="" placeholder="Type name" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div> --}}
    
            <div class="sm:col-span-2">
              <div class="mt-2">
                <select name="searchClasses" id="searchClasses" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  
                  @if ($class_first != null)
                  <option value="{{$class_first->class_id}}" selected>{{$class_first->class_title}}</option> 
                    @foreach ($class_schedule as $item)
                      @if($item->class_id != $class_first->class_id)
                      <option value='{{$item->class_id}}'>{{$item->class_title}}</option>
                      @endif
                    @endforeach
                  
                  @else
                    @foreach ($class_schedule as $item)
                   
                    <option value='{{$item->class_id}}'>{{$item->class_title}}</option>
                 
                  @endforeach
                  
                  @endif
                   
                
                
                </select>
              </div>
            </div>
            <div class="sm:col-span-2">
              {{-- <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label> --}}
              <div class="mt-2">
               
                <input type="date" name="searchDate" id="searchDate" value= {{$selected_date}} autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
            <div class="sm:col-span-1 ">
              {{-- <label for="region" class="block text-sm font-medium leading-6 text-gray-900"></label> --}}
              <div class="mt-2">
               <button onclick="searchData()" 
                  class="font-poppins text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-10 py-1.5  me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 font-bold">
                  Load
                  </button>
              </div>
             
            </div>
            <div class="sm:col-span-1 ms-4">
              {{-- <label for="region" class="block text-sm font-medium leading-6 text-gray-900"></label> --}}
              <div class="mt-2">
               <button onclick="resetData()" 
                  class="font-poppins text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-10 py-1.5  me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 font-bold">
                  Reset
                  </button>
              </div>
             
            </div>
            <div class="sm:col-span-3">
           
            </div>
          
            <div class="sm:col-span-1">
              {{-- <label for="region" class="block text-sm font-medium leading-6 text-gray-900"></label> --}}
              <div class="mt-2">
               <button onclick="printData2()"
                  id="printBtn"
                  class="font-poppins text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-10 py-1.5  me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 font-bold">
                  Print
                  </button>
              </div>
            </div>
          
          </div>
<!-- Client Table -->
<div class="mt-3 mx-4 border border-gray-500 p-3">
 
  @if ($class_first != null)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 p-4 gap-4">
      <div class="">
        <div class="text-left">
          <p class="text-1xl font-semibold"> Class Name: {{$class_first->class_title}}</p>
          <p>Description: {{$class_first->class_description}}  </p>
        </div>
      </div>
  
      <div class="">
        <div class="text-left">
          <p class="text-1xl">Date Start: {{$class_first->class_start_date}} </p>
          <p>Start Time: {{$class_first->class_start_time}}</p>
        </div>
      </div>
      <div class="">
        <div class="text-left">
          <p class="text-1xl">Date End: {{$class_first->class_end_date}} </p>
          <p>End Time: {{$class_first->class_end_time}}</p>
        </div>
      </div>
    </div>
  @else
    <h2 class="text-center italic font-bold">No data</h2>
  
  @endif
  
  
    {{-- <div class="d-flex mb-1">
      <h1 class="text-md font-bold ">Class Name: Sample</h1>
      <p class="text-md">Class Description: sadasd</p>
    </div> --}}
 
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Attendees</th>
            <th class="px-4 py-3">Date Enrolled</th>
            <th class="px-4 py-3">Address</th>
            {{-- <th class="px-4 py-3">Date</th> --}}
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @foreach ($class_data as $item)
          <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
              <div class="flex items-center text-sm">
                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADWUlEQVR4nO2WXUgUURTHx6Sij5eo8EUhql17CmQjP8jYe9dQGWfGisWUIqweKnrMB0PJelL0oTBpYyGEapcsUEJ3RUFtZtPK1zALIj8gH6Iv0zuS6Yk7m6njbrvrjDNb7IE/O8w9d+/vN2cHlmESlahE6VZZWVmbEEKlGOPHGOPXCKEpjDEsxOFw2Jl4LbvdfhwhNLoUWB2EUC8Tj4Uxvv43cJXEG4RQHcY4hYmHQghVRguvyiRC6Jip8Bjjgxjj2VUK0Gn8xBgfMU0AIdSzWvglEqM2m2294fAOhyMjWshyZx40V+XD+3us8hmix2m4AEKoJhrokfssgJ9bFu+1AnX/XTMEev/2pNXQ6qgmMWiGwFikJx0p3sVJjBgugDEm9PBYodXBwRd52gwB0EsAYwwJgVgKPBa24mS2rNcEKk/nEPBaCxmjCrzW8TlPOjRezl8Gc7vcAq5yS1jYUOu3KvJh3psO4LGOGSoAXusKQArnOhNeIOy612q4QKEi0cHOa/0JgY+do/DgsRYYJvBHxFc0rFnAzw0ZDr4owLm1T4BzmSfg5/M0C3Rw2DQBRcJX1KNBoM9UeEWgnd0Nfu7jKn46n6CT28vEQ0E7fxj83OeY4P1sLhNPBV2sBVpzIsO3ZkPcPHl1gYsBaN4B8Gg/wBME0FEYDL2m9+iaizH+j1tMAlGEideCf1GgWJq2pVZ3D2456/0xWL9rJhI87aG9aVVdL/m+qQzTwHlxOlOQ5IAgyZBa1QVJJW7IOV81G0nAfqFylvamVXcD3cuLssgHpg8YBl7gg428RO4IIpmnADSHHo5C0gm3IlF7pSAsPF2jPbQ3t2Vc2RuUIHO8RJqcr2DDmsJzA99TeEl+tnDw0lhqA0G4EjccvXQRntZa4UvjZiX0mt5bWLfW9a/YLwSnITnFyZ1rAl/84tt2QSTDoQ5WIsqQXj8Ayb8nESrJpW7Y1/Bc6Q33PbxEhljp6zZ96QGSeIl0hoVfEtT2ATJrHsCecw2wtaxJCb3OrPEAapuIuF9QQtp15RdEciq6g/UMKdMF3tkCybxE3pkg8PYqwDrNArwk5xkPLwffh4CMNAsIErlploAgkhvaJyDK/aYJSHJAhwnIEyYKTOggQGbMEyAzmgUSlaj/vH4B/ih/Ifxu3R8AAAAASUVORK5CYII=">
                  {{-- <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" /> --}}
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold">{{$item->user->name}}</p>
                  <p class="text-xs text-gray-600 dark:text-gray-400">{{$item->user->contact_number}}</p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-sm">{{$item->created_at}}</td>
            <td class="px-4 py-3 text-xs">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> {{$item->user->address}}</span>
            </td>
            {{-- <td class="px-4 py-3 text-sm">15-01-2021</td> --}}
          </tr>
          
          @endforeach
          
          
        </tbody>
      </table>
    </div>
   
  </div>
</div>


      </section>
</body>

</html>