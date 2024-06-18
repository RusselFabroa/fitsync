@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">Update Client's BMI</h2>

        <form action="{{ route('bmi.update', $bmi->bmi_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="user_id" class="block text-gray-600 text-sm font-medium">User ID</label>
                <input type="text" name="user_id" id="user_id" value="{{ old('user_id', $bmi->user_id) }}"
                    class="mt-1 p-2 w-full border rounded">
                @error('user_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bmi_height" class="block text-gray-600 text-sm font-medium">Height</label>
                <input type="text" name="bmi_height" id="bmi_height" value="{{ old('bmi_height', $bmi->bmi_height) }}"
                    class="mt-1 p-2 w-full border rounded">
                @error('bmi_height')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bmi_weight" class="block text-gray-600 text-sm font-medium">Weight</label>
                <input type="text" name="bmi_weight" id="bmi_weight" value="{{ old('bmi_weight', $bmi->bmi_weight) }}"
                    class="mt-1 p-2 w-full border rounded">
                @error('bmi_weight')
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