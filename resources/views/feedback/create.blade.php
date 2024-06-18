@extends('layouts.trainer-app')

@section('content')
<div class="px-60 mt-8 font-poppins bg-white">

    <h2 class="pt-4 text-2xl font-poppins font-bold mb-4">Add a Feedback</h2>

        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="user_id" class="block text-gray-600 text-sm font-medium">User ID</label>
                <input type="text" name="user_id" id="user_id" value="{{ old('user_id') }}" class="mt-1 p-2 w-full border rounded">
                @error('user_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="feedback_content" class="block text-gray-600 text-sm font-medium">Feedback Content</label>
                <input type="text" name="feedback_content" id="feedback_content" value="{{ old('feedback_content') }}" class="mt-1 p-2 w-full border rounded">
                @error('feedback_content')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                    Add
                </button>
            </div>
        </form>
    </div>
</div>
@endsection