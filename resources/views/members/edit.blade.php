@extends('layouts.trainer-app')

@section('content')
<div class="px-60 mt-8 font-poppins bg-white">

    <h2 class="pt-4 text-2xl font-poppins font-bold mb-4">Update Member's Status</h2>

    <form action="{{ route('members.update', $members) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="status" class="block text-gray-600 text-sm font-medium">Status</label>
            <select name="status" id="status" class="mt-1 p-2 w-full border rounded">
            <option disabled selected>Choose a status...</option>
                </option>
            <option value="Active" {{ old('status', $members->status) === 'Active' ? 'selected' : '' }}>
                Active
                </option>
                <option value="Inactive" {{ old('status', $members->status) === 'Inactive' ? 'selected' : '' }}>
                Inactive
                </option>
            </select>
            @error('status')
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