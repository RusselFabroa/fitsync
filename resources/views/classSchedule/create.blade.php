@extends('layouts.trainer-app')

@section('content')
<div class="px-60 mt-8 font-poppins bg-white">

    <h2 class="pt-4 text-2xl font-poppins font-bold mb-4">Schedule a Class</h2>

    <form action="{{ route('classSchedule.store') }}" method="POST">
        @csrf

        <div class="pt-4 mb-4">
            <label for="user_id" class="block text-gray-600 text-sm font-medium">Trainer</label>
            <select id="user_id" name="user_id" class="mt-1 p-2 w-full border rounded">
                <option disabled selected>Select your trainer</option>

                @foreach($trainers as $trainer)
                <option value="{{ $trainer->id }}" {{ old('user_id') == $trainer->id ? 'selected' : '' }}>
                    {{ $trainer->name }}
                </option>
                @endforeach
            </select>
            @error('user_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="class_title" class="block text-gray-600 text-sm font-medium">Class Type</label>
            <select type="text" name="class_type" id="class_type" value="{{ old('class_type') }}"
                class="mt-1 p-2 w-full border rounded" placeholder="Class Title">
            <option value="Functional Fitness Class">Functional Fitness Class</option>
            <option value="Skill-work Class">Skill-work Class</option>
            <option value="Functional Bodybuilding Class">Functional Bodybuilding Class</option>
            <option value="Saturday at OMNHS">Saturday at OMNHS</option>
            </select>
            @error('class_title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="class_title" class="block text-gray-600 text-sm font-medium">Class Title</label>
            <input type="text" name="class_title" id="class_title" value="{{ old('class_title') }}"
                class="mt-1 p-2 w-full border rounded" placeholder="Class Title">
            @error('class_title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="class_description" class="block text-gray-600 text-sm font-medium">Class Description</label>
            <input type="text" name="class_description" id="class_description" value="{{ old('class_description') }}"
                class="mt-1 p-2 w-full border rounded" placeholder="Class Description">
            @error('class_description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex w-full gap-5">
            <div class="w-96 mb-4">
                <label for="class_start_date" class="block text-gray-600 text-sm font-medium">Class Start
                    Date</label>
                <input type="date" name="class_start_date" id="class_start_date" value="{{ old('class_start_date') }}"
                    class="mt-1 p-2 w-full border rounded">
                @error('class_start_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-96 mb-4">
                <label for="class_end_date" class="block text-gray-600 text-sm font-medium">Class End Date</label>
                <input type="date" name="class_end_date" id="class_end_date" value="{{ old('class_end_date') }}"
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
                <select id="class_start_time" name="class_start_time" id="class_start_time"
                    value="{{ old('class_start_time') }}" class="mt-1 p-2 w-full border rounded">
                    <option disabled selected>Select time</option>
                    <option value="7:00 AM">7:00 AM</option>
                    <option value="8:00 AM">8:00 AM</option>
                </select>
                @error('class_start_time')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-96 mb-4">
                <label for="class_end_time" class="block text-gray-600 text-sm font-medium">Class End
                    Time</label>
                <select id="class_end_time" name="class_end_time" id="class_end_time"
                    value="{{ old('class_end_time') }}" class="mt-1 p-2 w-full border rounded">
                    <option disabled selected>Select time</option>
                    <option value="10:00 AM">10:00 AM</option>
                    <option value="5:00 PM">5:00 PM</option>
                </select>
                @error('class_end_time')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="exercises" class="block text-gray-600 text-sm font-medium">Select Exercises</label>
            <div class="grid grid-cols-2 gap-4">
                @foreach($exercises as $exercise)
                <div>
                    <input type="checkbox" name="exercises[]" id="exercise_{{ $exercise->id }}" value="{{ $exercise->exercise_id }}">
                    <label for="exercise_{{ $exercise->id }}">{{ $exercise->exercise_name }}</label>
                </div>
                @endforeach
            </div>
            @error('exercises')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="class_limit" class="block text-gray-600 text-sm font-medium">Number of Enrolees</label>
            <input type="text" name="class_limit" id="class_limit" value="{{ old('class_limit') }}"
                class="mt-1 p-2 w-full border rounded" placeholder="Class Limit">
            @error('class_limit')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                Create Class Schedule
            </button>
        </div>
    </form>
</div>
</div>
@endsection