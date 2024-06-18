@extends('layouts.app')

@section('content')
<div class="mt-24 mb-24 max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
    <form method="POST" action="{{ route('register') }}" class="px-6 py-3" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Work/Profession</label>
            <input id="profession" type="text" name="profession" value="{{ old('profession') }}" required autocomplete="profession" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('profession')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

           <!-- Date of Birth -->
           <div class="mb-4">
            <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
            <input id="dob" type="date" name="dob" value="{{ old('dob') }}" required autofocus autocomplete="dob" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('dob')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

           <!-- Address -->
           <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input id="address" type="text" name="address" value="{{ old('address') }}" required autofocus autocomplete="address" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('address')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

          <!-- Number -->
          <div class="mb-4">
            <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
            <input id="contact_number" type="text" name="contact_number" value="{{ old('contact_number') }}" required autofocus autocomplete="contact_number" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('contact_number')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div class=" mb-4">
            <label for="is_disabled" class="block text-gray-600 text-sm font-medium">Do you have a disability?</label>
            <select id="is_disabled" name="is_disabled" class="p-2 w-full border rounded">
            <option disabled selected>Choose an option...</option>
        <option value="YES">YES</option>
        <option value="NO">NO</option>
            </select>
            @error('is_disabled')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

         <!-- Specify -->
         <div class="mb-4">
            <label for="specify" class="block text-sm font-medium text-gray-700">If YES, please specify</label>
            <input id="specify" type="text" name="specify" value="{{ old('specify') }}" autofocus autocomplete="specify" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('specify')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('password')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('password_confirmation')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <p for="emergency_contact" class="block text-sm font-bold mb-4 text-gray-700">EMERGENCY CONTACT DETAILS</p>
                 <!-- Email -->
                 <div class="mb-4">
            <label for="emergency_name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="emergency_name" type="text" name="emergency_name" value="{{ old('emergency_name') }}" required autofocus autocomplete="emergency_name" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('emergency_name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

                 <!-- Email -->
                 <div class="mb-4">
            <label for="emergency_contact" class="block text-sm font-medium text-gray-700">Contact Number</label>
            <input id="emergency_contact" type="text" name="emergency_contact" value="{{ old('emergency_contact') }}" required autofocus autocomplete="emergency_contact" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('emergency_contact')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

                 <!-- Email -->
                 <div class="mb-4">
            <label for="emergency_relationship" class="block text-sm font-medium text-gray-700">Relationship</label>
            <input id="emergency_relationship" type="text" name="emergency_relationship" value="{{ old('emergency_relationship') }}" required autofocus autocomplete="emergency_relationship" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('emergency_relationship')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="membership_title" class="block text-gray-600 text-sm font-medium">Membership</label>
            <p class="text-xs font-poppins mb-1">Please indicate the membership you require</p>
            <select name="membership_title" id="membership_title" class="mt-1 p-2 w-full border rounded">
            <option value="{{ old('membership_title') }}" selected>
                Select a membership...
                </option>
            <option value="With Mindoro ID">
            ₱350.00 with Mindoro ID
                </option>
                <option value="Without Mindoro ID">
                ₱450.00 Without Mindoro ID
                </option>
                <option value="1 Month">
                ₱2,500.00 1 Month
                </option>
                <option value="6 Months">
                ₱14,100.00 6 Months
                </option>
                <option value="12 Months">
                ₱24,000.00 - 12 Months
                </option>
            </select>
            @error('membership_title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="membership_mop" class="block text-sm font-medium text-gray-700">Mode of Payment</label>
            <select id="membership_mop" onchange="mop_change()" type="text" name="membership_mop" value="" required autofocus autocomplete="membership_mop" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
            @error('membership_mop')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
            <option value="gcash" selected>Gcash</option>
            <option value="cash">Cash/Over-the-counter</option>
            <option value="bpi">BPI / Gcash to BPI</option>
            </select>
        </div>

        <div class="mb-4">
        <img src="{{ asset('/images/gcash-lazaro.jpg') }}" id="gcash_logo" alt="Logo" class="block py-2 text-white">
</div>

<div class="mb-4">
    <img src="{{ asset('/images/BPI.jpg') }}" id="bpi_logo" alt="Logo2" class="hidden py-2 text-white">
</div>

   <!-- Email -->
   <div class="mb-4" >
    <input id="membership_payment_date" type="hidden" name="membership_payment_date" value="{{ \Carbon\Carbon::now()->toDateString() }}" required autofocus autocomplete="membership_payment_date" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
    @error('membership_payment_date')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>


   <!-- Email -->
   <div class="mb-4">
            <input id="membership_payment_status" type="hidden" name="membership_payment_status" value="Gcash" required autofocus autocomplete="membership_payment_status" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
            @error('membership_payment_status')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

             <!-- Email -->
             <div class="mb-4" id="payment_receipt2">
            <label for="payment_receipt" class="block text-sm font-medium text-gray-700">Payment Receipt</label>
            <input id="payment_receipt" type="file" name="payment_receipt" value="{{ old('payment_receipt') }}" required autofocus autocomplete="payment_receipt" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
            @error('membership_mop')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div class="flex items-center justify-between">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Already registered?</a>

            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</button>
        </div>
    </form>
</div>
@endsection