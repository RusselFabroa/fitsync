<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
 
        rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-[#152D35]">
    <div class="flex justify-center items-center">
    <!-- Image -->
    <div class="w-1/2 h-screen">
        <img src="/images/CF FITSYNC-02.png" class="w-full h-full object-cover" alt="fitsync banner" />
    </div>

    <!-- Text -->
    <div class="w-1/2 px-8">
        <h2 class="text-3xl text-white font-montserrat text-justify tracking-wide font-bold mb-4">
        FITSYNC | CF Mindoro
        </h2>
        <p class="text-xl pr-20 text-white font-poppins text-justify tracking-wide text-semibold mb-4">
            At fitsync, we're more than just a fitness platform; we're your dedicated partner on the path to a
            healthier, stronger, and happier you. Our mission is to synchronize your fitness aspirations with seamless,
            personalized solutions that evolve with you.
        </p>
        <div class="flex gap-2">
                <a href="{{ route('login') }}" class="h-fit p-2 w-fit font-poppins grid items-center font-bold text-sm bg-[#1A5C34] text-white px-4 py-2 rounded hover:bg-[#113B22] focus:outline-none focus:bg-[#113B22]">
                    Login
                </a>
                <a href="{{ route('register') }}" class="h-fit p-2 w-fit font-poppins grid items-center font-bold text-sm bg-[#1A5C34] text-white px-4 py-2 rounded hover:bg-[#113B22] focus:outline-none focus:bg-[#113B22]">
                    Register
                </a>
        </div>
    </div>

</div>

</body>

</html>