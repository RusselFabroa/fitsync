@extends('layouts.trainer-app')

@section('content')
<div class="px-60 mt-8 font-poppins bg-white">

    <h2 class="pt-4 text-2xl font-poppins font-bold mb-4">Update Exercise</h2>

        <form action="{{ route('exercises.update', $exercises->exercise_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="exercise_name" class="block text-gray-600 text-sm font-medium">Exercise Name</label>
                <input type="text" name="exercise_name" id="exercise_name" value="{{ old('exercise_name', $exercises->exercise_name) }}" class="mt-1 p-2 w-full border rounded">
                @error('exercise_name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="exercise_reps" class="block text-gray-600 text-sm font-medium">Reps</label>
                <input type="text" name="exercise_reps" id="exercise_reps" value="{{ old('exercise_reps', $exercises->exercise_reps) }}" class="mt-1 p-2 w-full border rounded">
                @error('exercise_reps')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="exercise_sets" class="block text-gray-600 text-sm font-medium">Sets</label>
                <input type="text" name="exercise_sets" id="exercise_sets" value="{{ old('exercise_sets', $exercises->exercise_sets) }}" class="mt-1 p-2 w-full border rounded">
                @error('exercise_sets')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection