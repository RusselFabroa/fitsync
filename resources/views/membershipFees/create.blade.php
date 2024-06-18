@extends('layouts.trainer-app')

@section('content')
<div class="font-montserrat bg-white pr-20 pl-20 pt-16">

    <h2 class="text-4xl  font-bold mb-4">Register Client's Membership Subscription</h2>

    <form action="{{ route('membershipFees.store') }}" method="POST">
        @csrf

        <div class="pt-4 mb-4">
            <label for="user_id" class="block text-gray-600 text-sm font-medium">Name</label>
            <select id="user_id" name="user_id" id="user_id" value="{{ old('user_id') }}" class="mt-1 p-2 w-full border rounded">
                <option selected>Select membership</option>
                @foreach($members as $member)
                <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
            @error('user_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="membership_title" class="block text-gray-600 text-sm font-medium">Membership Title</label>
            <select id="membership_title" name="membership_title" id="membership_title" value="{{ old('membership_title') }}" class="mt-1 p-2 w-full border rounded">
                <option selected>Select membership</option>
                <option value="Regular">Regular</option>
                <option value="Premium">Premium</option>
            </select>
            @error('membership_title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="membership_mop" class="block text-gray-600 text-sm font-medium">Mode of Payment</label>
            <select id="membership_mop" name="membership_mop" id="membership_mop" value="{{ old('membership_mop') }}" class="mt-1 p-2 w-full border rounded">
                <option selected>Select membership</option>
                <option value="Cash">Cash</option>
            </select>
            @error('membership_mop')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="membership_payment_date" class="block text-gray-600 text-sm font-medium">Payment
                Date</label>
            <input type="date" name="membership_payment_date" id="membership_payment_date" value="{{ old('membership_payment_date') }}" class="mt-1 p-2 w-full border rounded">
            @error('membership_payment_date')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="membership_payment_status" class="block text-gray-600 text-sm font-medium">Payment
                Status</label>
            <select id="membership_payment_status" name="membership_payment_status" id="membership_payment_status" value="{{ old('membership_payment_status') }}" class="mt-1 p-2 w-full border rounded">
                <option selected>Select status</option>
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
            </select>
            @error('membership_payment_status')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                Register
            </button>
        </div>
    </form>
</div>
</div>
@endsection