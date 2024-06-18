@extends('layouts.user-app')

@section('content')
<div class="font-montserrat bg-white pr-20 pl-20 pt-16">
    <h2 class="text-4xl  font-bold mb-4">Approve Booking</h2>

    <form action="{{ route('classBookings.update', $classBookings->cb_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="user_id" class="pt-4 block text-gray-600 text-sm font-medium">User ID</label>
            <input type="text" name="user_id" id="user_id" value="{{ old('user_id', $classBookings->user_id) }}"
                class="mt-1 p-2 w-full border rounded" readonly>
            @error('user_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="class_id" class="block text-gray-600 text-sm font-medium">Class ID</label>
            <input type="text" name="class_id" id="class_id" value="{{ old('class_id', $classBookings->class_id) }}"
                class="mt-1 p-2 w-full border rounded" readonly>
            @error('class_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="booking_mop" class="block text-gray-600 text-sm font-medium">Mode of Payment</label>
            <input type="text" name="booking_mop" id="booking_mop"
                value="{{ old('booking_mop', $classBookings->booking_mop) }}" class="mt-1 p-2 w-full border rounded"
                readonly>
            @error('booking_mop')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="booking_payment_date" class="block text-gray-600 text-sm font-medium">Payment
                Date</label>
            <input type="text" name="booking_payment_date" id="booking_payment_date"
                value="{{ old('booking_payment_date', $classBookings->booking_payment_date) }}"
                class="mt-1 p-2 w-full border rounded" readonly>
            @error('booking_payment_date')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="booking_payment_status" class="block text-gray-600 text-sm font-medium">Payment Status</label>
            <select name="booking_payment_status" id="booking_payment_status" class="mt-1 p-2 w-full border rounded">
                <option value="Paid"
                    {{ old('booking_payment_status', $classBookings->booking_payment_status) === 'Paid' ? 'selected' : '' }}>
                    Paid</option>
                <option value="Unpaid"
                    {{ old('booking_payment_status', $classBookings->booking_payment_status) === 'Unpaid' ? 'selected' : '' }}>
                    Unpaid</option>
            </select>
            @error('booking_payment_status')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                Update
            </button>
        </div>
    </form>
</div>
</div>
@endsection