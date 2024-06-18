@extends('layouts.trainer-app')

@section('content')
<div class="px-60 mt-8 font-poppins bg-white">

    <h2 class="pt-4 text-2xl font-poppins font-bold mb-4">Update Forum Post</h2>

        <form action="{{ route('forums.update', $forums->forum_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="user_id" class="block text-gray-600 text-sm font-medium">User ID</label>
                <input type="text" name="user_id" id="user_id" value="{{ old('user_id', $forums->user_id) }}"
                    class="mt-1 p-2 w-full border rounded">
                @error('user_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="forum_content" class="block text-gray-600 text-sm font-medium">Forum Content</label>
                <input type="text" name="forum_content" id="forum_content"
                    value="{{ old('forum_content', $forums->forum_content) }}" class="mt-1 p-2 w-full border rounded">
                @error('forum_content')
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