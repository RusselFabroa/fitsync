@extends('layouts.user-app')

@section('content')
<div class="w-1/2 mx-auto text-center py-4 mt-8 font-poppins bg-white">
    <h2 class="pt-4 text-2xl font-bold mb-4">Upload Post</h2>
    <form action="{{ route('forums.store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" id="user_id" value="{{ old('user_id') }}">

        <div class="mb-4">
            <label for="forum_content" class="block text-gray-600 text-sm font-medium">What's on your mind?</label>
            <input type="text" name="forum_content" id="forum_content" value="{{ old('forum_content') }}" class="mt-1 p-2 w-full border rounded">
            @error('forum_content')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-6 justify-center flex">
            <button type="submit" class="bg-[#1A5C34] font-poppins text-md font-bold text-white px-4 py-2 rounded hover:bg-[#113B22] focus:outline-none focus:bg-[#113B22]">POST</button>
        </div>
    </form>
</div>

<div class="text-center w-1/2 mx-auto mt-8 font-poppins bg-white px-4">
    <h1 class="text-2xl font-poppins font-bold mb-6">Community Forum</h1>
    @foreach ($forums as $data)
    <div class="mb-4 grid items-center rounded-lg"  style="background-color: {{ $data->role === 'trainer' ? '#1A5C34' : 'transparent' }};">
    <hr>
    <p class="text-gray-600 font-medium mt-6" style="color: {{ $data->role === 'trainer' ? 'white' : 'black' }};">{{ $data->forum_content }}</p>
      <p class="text-gray-600 font-bold " style="color: {{ $data->role === 'trainer' ? 'white' : 'black' }};">{{ $data->user_name }}</p>
        <p class="text-gray-600 font-bold mb-6" style="color: {{ $data->role === 'trainer' ? 'white' : 'black' }};">{{ ucfirst($data->role) }}</p>
        <hr>
    </div>
    @endforeach
</div>
@endsection
