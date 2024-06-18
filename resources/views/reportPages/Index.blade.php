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
      body{
          font-size: 0.9rem;
      }
      .styled-table {
          border-collapse: collapse;
          margin: 5px 0;
          font-size: 0.9em;
          width: 100%;
          box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
          text-align: center;
      }
      
      .styled-table thead tr {
          background-color: #1A5C34;
          color: #ffffff;
          text-align: center;
      }
      
      .styled-table th,
      .styled-table td {
          padding: 5px 15px;
      }
      
      .styled-table tbody tr {
          border-bottom: 1px solid #dddddd;
      }
      
      .styled-table tbody tr:nth-of-type(even) {
          background-color: #f3f3f3;
      }
      
      .styled-table tbody tr:last-of-type {
          border-bottom: 2px solid #009879;
      }
      
      .styled-table tbody tr.active-row {
          font-weight: bold;
          color: #009879;
      }
    </style>
</head>

<body class="font-sans antialiased">

  @include('layouts.navigation-superadmin')
<div class="px-5 mt-8 font-montserrat bg-white">
    

    {{-- <a type="button" href="{{ route('classSchedule.create') }}"
        class="font-poppins text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 font-bold">Print
        Schedule
    </a> --}}
    {{-- <h1>Search: {{$search}} </h1> 
    <h1>Status: {{$status}}</h1>
    <h1>Date: {{$date}} </h1> --}}
    <h2 class="pt-4 text-2xl font-poppins font-bold mb-4">SALES </h2>

    <section class=" grid grid-cols-1 gap-x-2 gap-y-8 sm:grid-cols-11">
        <div class="sm:col-span-2 sm:col-start-1">
            {{-- <label for="city" class="block text-sm font-medium leading-6 text-gray-900"></label> --}}
            <div class="mt-2">
              <input type="text" name="searchContent" id="searchContent" value="{{$search}}" placeholder="Type name" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          {{-- <div class="sm:col-span-2">
            <div class="mt-2">
              <select name="status" id="searchStatus" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @if ($status != null)
                <option value="{{$status}}" selected>{{$status}}</option>
                    @if ($status == "Active")
                    <option value="Inactive">Inactive</option>
                    @else
                    <option value="Active">Active</option>
                    @endif
                @else
                <option value="" selected>-Select status-</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                @endif
              
               
                
              </select>
            </div>
          </div> --}}
          <div class="sm:col-span-1">
            {{-- <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label> --}}
            <div class="mt-2">
              <select type="date" name="searchMonth" id="searchMonth" value="" autocomplete="searchMonth" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
            </div>
          </div>
          <div class="sm:col-span-1">
            {{-- <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label> --}}
            <div class="mt-2">
              <input type="date" name="searchDate" id="searchDate" value="{{$date}}" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="sm:col-span-1 ">
            {{-- <label for="region" class="block text-sm font-medium leading-6 text-gray-900"></label> --}}
            <div class="mt-2">
             <button onclick="searchData()" 
                class="font-poppins text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-10 py-1.5  me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 font-bold">
                Search
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
             <button onclick="printData()"
                id="printBtn"
                class="font-poppins text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-10 py-1.5  me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 font-bold">
                Print
                </button>
            </div>
          </div>
        
    </section>
    <table class="styled-table font-poppins">
        <thead>
            <tr class="">
                <th class="">User Name</th>
                <th class="">Membership Title</th>
                <th class="">Membership Fee</th>          
                <th class="">Method of Payment </th>
                <th class="">Membership Date</th>
                <th class="">Status</th>

            </tr>
        </thead>
        <tbody>
            
                @foreach ($membership_data as $item)
                <tr class="py-0">
                    <td class="py-0">{{$item->name}}</td>
                    <td class="py-0">{{$item->membership_title}}</td>
                    <td class="py-0">{{$item->membership_fee}}</td>
                    <td class="py-0">{{$item->membership_mop}}</td>
                    <td class="py-0">{{$item->membership_payment_date}}</td>
                    <td class="py-0">{{$item->status}}</td>
                </tr>
                @endforeach
           
        </tbody>
    </table>
</div>
</div>
</body>
</html>