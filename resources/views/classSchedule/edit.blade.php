@extends('layouts.trainer-app')

@section('content')
<div class="px-60 mt-8 font-poppins bg-white">

    <h2 class="pt-4 text-2xl font-poppins font-bold mb-4">Update Class Details</h2>

    <form action="{{ route('classSchedule.update', $classSchedule->class_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="pt-4 mb-4">
            <label for="user_id" class="block text-gray-600 text-sm font-medium">Trainer</label>
            <select id="user_id" name="user_id" class="mt-1 p-2 w-full border rounded">
                <option selected>Select your trainer</option>

                @foreach($trainers as $trainer)
                <option value="{{ $trainer->id }}"
                    {{ old('user_id', $classSchedule->user_id) == $trainer->id ? 'selected' : '' }}>
                    {{ $trainer->name }}
                </option>
                @endforeach
            </select>
            @error('user_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="class_title" class="block text-gray-600 text-sm font-medium">Class Title</label>
            <input type="text" name="class_title" id="class_title"
                value="{{ old('class_title', $classSchedule->class_title) }}" class="mt-1 p-2 w-full border rounded">
            @error('class_title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="class_description" class="block text-gray-600 text-sm font-medium">Class Description</label>
            <input type="text" name="class_description" id="class_description"
                value="{{ old('class_description', $classSchedule->class_description) }}"
                class="mt-1 p-2 w-full border rounded">
            @error('class_description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex w-full gap-5">
            <div class="w-96 mb-4">
                <label for="class_start_date" class="block text-gray-600 text-sm font-medium">Class Start
                    Date</label>
                <input type="date" name="class_start_date" id="class_start_date"
                    value="{{ old('class_start_date', $classSchedule->class_start_date ?? '') }}"
                    class="mt-1 p-2 w-full border rounded">
                @error('class_start_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-96 mb-4">
                <label for="class_end_date" class="block text-gray-600 text-sm font-medium">Class End Date</label>
                <input type="date" name="class_end_date" id="class_end_date"
                    value="{{ old('class_end_date', $classSchedule->class_end_date ?? '') }}"
                    class="mt-1 p-2 w-full border rounded">
                @error('class_end_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex w-full gap-5">
            <div class="w-96 mb-4">
                <label for="class_start_time" class="block text-gray-600 text-sm font-medium">Class Start
                    Time</label>
                <select id="class_start_time" name="class_start_time" class="mt-1 p-2 w-full border rounded">
                    <option selected>Select time</option>
                    <option value="7:00 AM"
                        {{ old('class_start_time', $classSchedule->class_start_time ?? '') === '7:00' ? 'selected' : '' }}>
                        7:00 AM</option>
                    <option value="8:00 AM"
                        {{ old('class_start_time', $classSchedule->class_start_time ?? '') === '8:00' ? 'selected' : '' }}>
                        8:00 AM</option>
                </select>
                @error('class_start_time')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-96 mb-4">
                <label for="class_end_time" class="block text-gray-600 text-sm font-medium">Class End
                    Time</label>
                <select id="class_end_time" name="class_end_time" class="mt-1 p-2 w-full border rounded">
                    <option selected>Select time</option>
                    <option value="10:00 AM"
                        {{ old('class_end_time', $classSchedule->class_end_time ?? '') === '7:00' ? 'selected' : '' }}>
                        10:00 AM</option>
                    <option value="5:00 PM"
                        {{ old('class_end_time', $classSchedule->class_end_time ?? '') === '8:00' ? 'selected' : '' }}>
                        5:00 PM</option>
                </select>
                @error('class_end_time')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="class_limit" class="block text-gray-600 text-sm font-medium">Number of Enrolees</label>
            <input type="text" name="class_limit" id="class_limit"  value="{{ old('class_limit', $classSchedule->class_limit ?? '') }}"
                class="mt-1 p-2 w-full border rounded" placeholder="Class Limit">
            @error('class_limit')
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