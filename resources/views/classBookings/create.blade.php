@extends('layouts.user-app')

@section('content')
<div class="font-montserrat bg-white pr-20 pl-20 pt-16">
    <h2 class="text-4xl  mb-4">Reserve a Slot for <i><b>{{ $classDetails->class_title }}</b></i> Class</h2>

    <form action="{{ route('user-classes.store') }}" method="POST">
        @csrf

                <p class="mb-3 pt-2 font-normal text-md text-[#344955] leading-tight dark:text-gray-400">
                    <span class="font-bold">Description:</span> {{ $classDetails->class_description }}
                </p>
                <p class="mb-3 font-normal text-md text-[#344955] leading-tight dark:text-gray-400">
                <span class="font-bold"> Day:</span> {{ \Carbon\Carbon::parse($classDetails->class_start_date)->format('F d, Y') }} -
                    {{ \Carbon\Carbon::parse($classDetails->class_end_date)->format('F d, Y') }}
                </p>

                <p class="mb-3 font-normal text-md text-[#344955] leading-tight dark:text-gray-400">
                <span class="font-bold">Time:</span> {{ $classDetails->class_start_time }} -
                    {{ $classDetails->class_end_time }}</p>

                    <p class="mb-3 font-normal text-md text-[#344955] leading-tight dark:text-gray-400">
                <span class="font-bold"> Current Reservations:</span> {{ $classDetails->class_current }} /
                {{ $classDetails->class_limit }}
                </p>

                    <p class="mb-3 font-normal text-md text-[#344955] leading-tight dark:text-gray-400">
                    <span class="font-bold">Available Slots Left:</span> {{ $classDetails->class_current }} slots left
                </p>
                @if($classDetails->class_current == 0)
                    <p class="text-red-900 font-bold font-poppins">NOTE: No more slots are available, please wait for more upcoming classes!</p>
                @endif
                <input type="hidden" name="class_id" value="{{ $classId }}">

    

        <!-- <div class="mb-4">
                <label for="booking_payment_status" class="block text-gray-600 text-md font-medium">Payment
                    Status</label>
                <select name="booking_payment_status" id="booking_payment_status"
                    class="mt-1 p-2 w-full border rounded">
                    <option value="Paid" {{ old('booking_payment_status') == 'Paid' ? ' selected' : '' }}>Paid</option>
                    <option value="Unpaid" {{ old('booking_payment_status') == 'Unpaid' ? ' selected' : '' }}>Unpaid
                    </option>
                </select>
                @error('booking_payment_status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> -->

        <div class="mt-6">
            <button type="submit" class="font-bold text-sm bg-[#1A5C34] text-white px-4 py-2 rounded hover:bg-[#113B22] focus:outline-none focus:bg-[#113B22]">
                RESERVE NOW
            </button>
        </div>
    </form>
</div>
@endsection