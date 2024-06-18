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
</head>

<body class="font-sans antialiased">
    @include('layouts.navigation-superadmin')

    <div class="w-full p-10 grid grid-cols-4 gap-10">
        <a href="#"
            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-between pt-2">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Trainers</h5>
                <p class="font-bold pr-2 text-xl text-gray-700 dark:text-gray-400">{{ $trainers }}</p>
            </div>
        </a>


        <a href="#"
            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-between pt-2">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Members</h5>
                <p class="font-bold pr-2 text-xl text-gray-700 dark:text-gray-400">{{ $users }}</p>
            </div>
        </a>

        <a href="/superadmin/reportSale?search=&status=&date="
            class="col-span-2 block max-w-full p-6 bg-white border cols border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
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

   
    <section>
       
    </section>
</body>

</html>