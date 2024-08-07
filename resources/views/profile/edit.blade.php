<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/auth.js') }}"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="">
        @include('layouts.navigation')
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                <label for="name" class="block text-lg font-poppins font-medium text-gray-700">
                <b>PERSONAL DETAILS</b><br><br>
            </label>
                <label for="name" class="block text-md font-poppins font-medium text-gray-700">
                <b>NAME:</b> {{ $user->name }}
            </label>
            <label for="name" class="block text-md font-poppins font-medium text-gray-700">
                <b>Email:</b> {{ $user->email }}
            </label>
            <label for="name" class="block text-md font-poppins font-medium text-gray-700">
                <b>MEMBERSHIP:</b> {{ $user->membership_title }} Subscription
            </label>
            <label for="name" class="block text-md font-poppins font-medium text-gray-700">
                <b>MEMBERSHIP STATUS:</b> {{ $user->status }}
            </label>
            <label for="name" class="block text-md font-poppins font-medium text-gray-700">
                <b>CONTACT NUMBER:</b> {{ $user->contact_number }}
            </label>
            <label for="name" class="block text-md font-poppins font-medium text-gray-700">
                <b>DATE OF BIRTH:</b> {{ $user->dob }}
            </label>
            <label for="name" class="block text-md font-poppins font-medium text-gray-700">
                <b>ADDRESS:</b> {{ $user->address }}
            </label>
            
        </div>
</div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-membership')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

</body>

</html>